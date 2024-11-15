<?php
// register.php
session_start();
include 'db.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $filename = $_FILES['registration_pdf']['name'];
    $file_tmp = $_FILES['registration_pdf']['tmp_name'];
    
    // Upload PDF file
    $upload_dir = 'uploads/';
    $file_path = $upload_dir . basename($filename);
    move_uploaded_file($file_tmp, $file_path);
    
    // Insert submission data into the database
    $sql = "INSERT INTO submissions (name, contact, address, pdf_path) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $contact, $address, $file_path);
    $stmt->execute();

    echo "<p>Registration submitted successfully!</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <header>
        <h1>Register for Barangay Services</h1>
        <a href="index.php">Home</a>
    </header>

    <section class="container">
        <h2>Download the Registration Form</h2>
        <p>
            <a href="forms/registration_form.pdf" download class="btn btn-primary">Download Registration Form (PDF)</a>
        </p>

        <h2>Submit Your Filled-Out Form</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact Number</label>
                <input type="text" name="contact" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="registration_pdf">Upload Completed Registration Form (PDF)</label>
                <input type="file" name="registration_pdf" class="form-control" accept=".pdf" required>
            </div>
            <button type="submit" class="btn btn-success">Submit Registration</button>
        </form>
    </section>
</body>
</html>
