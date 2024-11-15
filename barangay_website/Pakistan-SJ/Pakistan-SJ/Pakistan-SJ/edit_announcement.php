<?php
// edit_announcement.php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include '../db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the existing announcement data
    $sql = "SELECT * FROM announcements WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $announcement = $result->fetch_assoc();
}

// Handle the form submission for updating the announcement
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE announcements SET title = ?, content = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $title, $content, $id);
    $stmt->execute();

    header("Location: manage_announcements.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Announcement</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h2>Edit Announcement</h2>
    <form method="POST" action="edit_announcement.php">
        <input type="hidden" name="id" value="<?php echo $announcement['id']; ?>">
        <label for="title">Title</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($announcement['title']); ?>" required>
        <label for="content">Content</label>
        <textarea name="content" required><?php echo htmlspecialchars($announcement['content']); ?></textarea>
        <button type="submit">Update Announcement</button>
    </form>
</body>
</html>
