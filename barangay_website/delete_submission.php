<?php
session_start();
include 'db.php';

// Check if admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Check if submission ID is provided
if (isset($_POST['submission_id'])) {
    $submission_id = $_POST['submission_id'];

    // Prepare the delete query
    $stmt = $conn->prepare("DELETE FROM submissions WHERE id = ?");
    $stmt->bind_param("i", $submission_id);

    if ($stmt->execute()) {
        // Redirect back to the view submissions page with success message
        header("Location: view_submissions.php?message=Submission deleted successfully");
    } else {
        // Redirect back with an error message
        header("Location: view_submissions.php?error=Failed to delete submission");
    }

    $stmt->close();
}

$conn->close();
?>
