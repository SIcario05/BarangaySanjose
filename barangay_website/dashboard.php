<?php
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
    <link rel="stylesheet" href="cssdashboard_styles.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['admin']); ?>!</h1>
        <p>Manage website content using the options below.</p>
        <nav>
            <a href="manage_announcements.php">Manage Announcements</a>
            <a href="view_submissions.php">View Submissions</a>
            <a href="logout.php">Logout</a>
        </nav>
    </div>
</body>
</html>
