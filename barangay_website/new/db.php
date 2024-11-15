<?php
// db.php

$servername = "localhost";
$username = "root"; // This is your MySQL username
$password = "davejustine.1005"; // Leave this empty if you have no password, or set it if you do
$dbname = "barangay_website"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
