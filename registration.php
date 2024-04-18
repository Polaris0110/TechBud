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

$universityName = $_POST['universityName'];
$teamLeader = $_POST['teamLeader'];
$email = $_POST['email'];
$phoneNo = $_POST['phoneNo'];
$regNoLeader = $_POST['regNoLeader'];
$member1 = $_POST['member1'];
$regNoMember1 = $_POST['regNoMember1'];
$member2 = $_POST['member2'];
$regNoMember2 = $_POST['regNoMember2'];
$member3 = $_POST['member3'];
$regNoMember3 = $_POST['regNoMember3'];

$sql = "INSERT INTO registration (universityName, teamLeader, email, phoneNo, regNoLeader, member1, regNoMember1, member2, regNoMember2, member3, regNoMember3) 
        VALUES ('$universityName', '$teamLeader', '$email', '$phoneNo', '$regNoLeader', '$member1', '$regNoMember1', '$member2', '$regNoMember2', '$member3', '$regNoMember3')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<br>Registered successfully!!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>