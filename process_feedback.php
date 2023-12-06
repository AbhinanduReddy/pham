<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $feedback = $_POST["feedback"];

    // Database connection details
    $host = 'localhost'; // or your database host
    $username = 'root'; // your database username
    $password = ''; // your database password
    $database = 'pham'; // your database name

    // Create connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert feedback into the database
    $sql = "INSERT INTO feedback (name, feedback) VALUES ('$name', '$feedback')";
    if ($conn->query($sql) === TRUE) {
        echo "<h2>Thank you for your feedback, $name!</h2>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
