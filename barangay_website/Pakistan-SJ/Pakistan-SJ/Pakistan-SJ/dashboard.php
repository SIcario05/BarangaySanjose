<?php
// dashboard.php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h2>Welcome, Admin!</h2>
    <nav>
        <a href="manage_announcements.php">Manage Announcements</a>
        <a href="view_submissions.php">View Submissions</a>
        <a href="logout.php">Logout</a>
    </nav>
</body>
</html>
