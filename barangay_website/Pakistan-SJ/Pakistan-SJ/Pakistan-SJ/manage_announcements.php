<?php
// manage_announcements.php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include '../db.php';

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

// Fetch all announcements from the database
$sql = "SELECT * FROM announcements ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Announcements</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h2>Manage Announcements</h2>
    <a href="dashboard.php">Back to Dashboard</a>

    <!-- Form to add new announcement -->
    <h3>Add New Announcement</h3>
    <form method="POST" action="manage_announcements.php">
        <label for="title">Title</label>
        <input type="text" name="title" required>
        <label for="content">Content</label>
        <textarea name="content" required></textarea>
        <button type="submit" name="add_announcement">Add Announcement</button>
    </form>

    <!-- List of existing announcements -->
    <h3>Existing Announcements</h3>
    <?php while ($row = $result->fetch_assoc()): ?>
        <div>
            <h4><?php echo htmlspecialchars($row['title']); ?></h4>
            <p><?php echo htmlspecialchars($row['content']); ?></p>
            <small>Posted on <?php echo htmlspecialchars($row['created_at']); ?></small>
            <a href="manage_announcements.php?delete=<?php echo $row['id']; ?>">Delete</a>
        </div>
        <hr>
    <?php endwhile; ?>

</body>
</html>
