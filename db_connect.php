<?php
$servername = "localhost";
$username = "root";
$password = ""; // Assuming no password is set for your XAMPP MySQL server
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}