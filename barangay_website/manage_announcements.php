<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include 'db.php';

// Handle announcement deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM announcements WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: manage_announcements.php");
    exit;
}

// Handle new announcement submission
if (isset($_POST['add_announcement'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO announcements (title, content) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $title, $content);
    $stmt->execute();
    header("Location: manage_announcements.php");
    exit;
}

// Fetch all announcements
$sql = "SELECT * FROM announcements ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Announcements</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Manage Announcements</h2>
        <a href="dashboard.php" class="btn btn-secondary mb-3">Back to Dashboard</a>

        <!-- Form to add new announcement -->
        <h3>Add New Announcement</h3>
        <form method="POST" action="manage_announcements.php">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="add_announcement">Add Announcement</button>
        </form>

        <!-- List of existing announcements -->
        <h3 class="mt-4">Existing Announcements</h3>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="border p-3 mb-3">
                <h4><?php echo htmlspecialchars($row['title']); ?></h4>
                <p><?php echo htmlspecialchars($row['content']); ?></p>
                <small>Posted on <?php echo htmlspecialchars($row['created_at']); ?></small>
                <a href="edit_announcement.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="manage_announcements.php?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
