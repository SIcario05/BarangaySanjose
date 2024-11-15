<?php
// create_admin.php
include 'db.php'; // Ensure this points to your database connection file

// Set admin credentials
$username = 'admin'; // desired username
$password = 'password123'; // desired password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Check if an admin with the same username already exists
$sql = "SELECT * FROM admin WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Admin account with this username already exists.";
} else {
    // Insert new admin account
    $sql = "INSERT INTO admin (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
        echo "Admin account created successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$stmt->close();
$conn->close();
?>
