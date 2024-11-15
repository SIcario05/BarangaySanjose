<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $address = $_POST['address']; // Make sure 'address' is correctly retrieved
    $file = $_FILES['file'];

    // Check if address is set and not empty
    if (empty($address)) {
        echo "Address field is required.";
        exit;
    }

    // File upload handling
    $upload_dir = "uploads/";
    $file_name = basename($file['name']);
    $upload_file = $upload_dir . $file_name;

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    if (move_uploaded_file($file['tmp_name'], $upload_file)) {
        // Prepare and execute the insert statement
        $stmt = $conn->prepare("INSERT INTO submissions (name, contact, address, pdf_path) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $contact, $address, $upload_file);

        if ($stmt->execute()) {
            echo "Form submitted successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "File upload failed.";
    }
}
$conn->close();
?>
