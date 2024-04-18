<?php
echo "Welcome to the database";

$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Sorry, we failed to connect: " . mysqli_connect_error());
} else {
    echo "Connection was successful";
}

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$mno = $_POST['mno'];
$email = $_POST['email'];
$uname = $_POST['uname'];
$password = $_POST['password'];
$gender = $_POST['gender'];

$sql = "INSERT INTO signup (fname, lname, mno, email, uname, password, gender) 
        VALUES ('$fname', '$lname', '$mno', '$email', '$uname', '$password', '$gender')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<br>Record inserted successfully!";
    
    // Set session variables
    session_start();
    $_SESSION['loggedin'] = true; // Set a session variable to indicate login status
    $_SESSION['username'] = $uname; // Set the username in session
    $_SESSION['email'] = $email; // Set the email in session
    
    // Redirect to the dashboard with username and email as query parameters
    header("Location: user_dashboard.php?username=" . urlencode($uname) . "&email=" . urlencode($email));
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>