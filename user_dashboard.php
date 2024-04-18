<?php
session_start(); // Start the session

$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

// Creating connection
$conn = mysqli_connect($servername, $username, $password, $database);

// if (!$conn) {
//     echo "Database not connected" . mysqli_connect_error();
// } else {
//     echo "Database Connected! <br>";
// }

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.html"); // Redirect to login page if not logged in
    exit();
}

$username = $_GET['username']; // Retrieve username from query parameter
$email = $_GET['email']; // Retrieve email from query parameter

// Fetch user data using the username
$sql = "SELECT * FROM signup WHERE uname = '$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $email = $row["email"]; // Assuming email is a field in your database table
        // You can fetch other fields as needed
    }
} else {
    echo "User not found";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url("./Images/M2.png");
            background-size: cover;
        }

        header {
            background-color: #ffffff73;
            color: black;
        }

        .container-nav {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            margin: 0;
        }

        .nav a {
            color: black;
            text-decoration: none;
            transition: color 0.3s ease;
            margin-right: 20px;
        }

        .nav a:hover {
            color: #ffcc00;
            text-decoration: underline;
        }

        .container {
            width: 80%;
            margin: 20px auto;
        }

        h2 {
            color: #000;
        }

        p {
            color: #000;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin: 10px;
            text-align: center;
        }

        button:hover {
            background-color: #0056b3;
        }

        button:focus {
            outline: none;
        }

        footer {
            /* background-color: #f5f5f5; */
            padding: 20px 0;
            text-align: center;
            color: #333;
            font-size: 14px;
            margin-top: 370px;
        }
    </style>
</head>

<body>
    <header>
        <div class="container-nav">
            <div class="header">
                <h1>TechBud</h1>
            </div>

            <div class="nav">
                <a href="home.html">Home</a>
                <a href="hackathons.html">Hackathons</a>
                <a href="courses.html">Courses</a>
                <button><a href="signup.html">Sign Up</a></button>
                <button><a href="login.html">Login</a></button>
            </div>
        </div>
        <hr />
    </header>
    <div class="container">
        <h2>User Dashboard</h2>
        <?php
        if (isset($username) && isset($email)) {
            echo "<p>Username: $username</p>";
            echo "<p>Email: $email</p>";
        } else {
            echo "<p>User not found</p>";
        }
        ?>
    </div>

</body>
<footer>
    <p>&copy; 2024 TechBud. All rights reserved.</p>
</footer>

</html>