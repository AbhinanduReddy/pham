<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Display</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: auto;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>

    <h2>Feedback Display</h2>

    <?php
   $host = 'localhost'; // or your database host
   $username = 'root'; // your database username
   $password = ''; // your database password
   $database = 'pham'; // your database name
   
   
   // Connect to the database
   $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch feedback from the database
    $sql = "SELECT name, feedback FROM feedback";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display feedback in a table
        echo "<table>";
        echo "<tr><th>Name</th><th>Feedback</th></tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["name"] . "</td><td>" . $row["feedback"] . "</td></tr>";
        }

        echo "</table>";
    } else {
        echo "No feedback available.";
    }

    $conn->close();
    ?>

</body>
</html>
