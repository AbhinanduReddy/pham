<?php
// Database configuration
$host = 'localhost'; // or your database host
$username = 'admin'; // your database username
$password = 'admin'; // your database password
$database = 'pham'; // your database name

// Connect to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input values and sanitize them
    $email = $conn->real_escape_string(trim($_POST['email']));
    $password = $conn->real_escape_string(trim($_POST['password']));
    $name = $conn->real_escape_string(trim($_POST['name']));


    // Password hashing
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user into the database
    $sql = "INSERT INTO user (email, password,name) VALUES ('$email', '$hashed_password','name')";

    if ($conn->query($sql) === TRUE) {
        header('Location: login.php');
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
