<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Fetch all submissions
$sql = "SELECT * FROM submissions ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Submissions</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Admin - View User Submissions</h1>
        <a href="dashboard.php" class="btn btn-secondary mb-3">Back to Dashboard</a>

        <?php if ($result->num_rows > 0): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>PDF Form</th>
                        <th>Submission Date</th>
                        <th>Actions</th> <!-- Added Actions column -->
                    </tr>
                </thead>
                <tbody>
                    <?php while ($submission = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($submission['name']); ?></td>
                            <td><?php echo htmlspecialchars($submission['contact']); ?></td>
                            <td><?php echo htmlspecialchars($submission['address']); ?></td>
                            <td><a href="<?php echo htmlspecialchars($submission['pdf_path']); ?>" download>Download PDF</a></td>
                            <td><?php echo date("F j, Y, g:i a", strtotime($submission['submitted_at'])); ?></td>
                            <td>
                                <!-- Delete button form for each submission -->
                                <form action="delete_submission.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this submission?');">
                                    <input type="hidden" name="submission_id" value="<?php echo $submission['id']; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No submissions available at the moment.</p>
        <?php endif; ?>
    </div>
</body>
</html>
