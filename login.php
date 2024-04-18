<?php
session_start(); // Start the session

$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

// Creating connection
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    echo "Database not connected" . mysqli_connect_error();
} else {
    echo "Database Connected! <br>";
}

$uname = $_POST['uname'];
$password = $_POST['password'];

$sql = "SELECT * from signup  WHERE uname = '$uname' AND password = '$password' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['loggedin'] = true; 
    $_SESSION['username'] = $row['uname']; 
    $_SESSION['email'] = $row['email']; 
    header("Location: user_dashboard.php?username=" . urlencode($row['uname']) . "&email=" . urlencode($row['email'])); // Redirect to the dashboard with username and email as query parameters
    exit(); 
} else {
    echo "Incorrect Email Id or Password";
}
?>