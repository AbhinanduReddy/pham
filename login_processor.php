<?php
session_start(); // Start a new session or resume the existing one

// Database configuration
$host = 'localhost'; // or your database host
$username = 'root'; // your database username
$password = ''; // your database password
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

    // SQL query to check the user
    $sql = "SELECT name, password FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct, redirect to the home page
            $_SESSION['username'] = $row['name']; // Store user id in session
            header('Location: index.php'); // Redirect to home page
            exit;
        } else {
            // Password is not correct, show an error
            $error = "Invalid email or password.";
        }
    } else {
        // Email does not exist, show an error
        $error = "Invalid email or password.";
    }
}

// Close the database connection
$conn->close();
?>
