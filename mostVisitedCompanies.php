<?php
session_start();

// Check if the user is logged in via Facebook
if (isset($_SESSION['fb_user_name'])) {
    $welcomeMessage = "Welcome, " . $_SESSION['fb_user_name'] . "!";
    $loginButton = '<a href="logout.php">Logout</a>';
} elseif (isset($_SESSION['username'])) {
    // Check if the user is logged in with your regular authentication system
    $welcomeMessage = "Welcome, " . $_SESSION['username'] . "!";
    $loginButton = '<a href="logout.php">Logout</a>';
} else {
    $welcomeMessage = "";
    $loginButton = '<a href="login.php">Login</a>';
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">

    <title>School Supplies</title>
    <style>
        .container {
            display:  block !important;
        }
        .tile {
            display: inline-block;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 10px;
            padding: 10px;
        }
        img {
            max-width: 100px;
            height: auto;
        }
        .company-container {
            
        }
    </style>
</head>
<body>
    <header>
    <div class="logo"><a href="/pham"><img src="icon.png"></img> </a></div>
        <nav>
            <ul>
                 <li  id="login-button"><a href="mostVisitedCompanies.php">Most Visited Products in Companies</a></li>
                <li  id="login-button"><a href="mostVisitedProduct.php">Most Visited Products in PHAM</a></li>
                <li  id="login-button"><a href="products.php">Page Tracking</a></li>

    <?php
    if (isset($_SESSION['username']) && $_SESSION['username'] === 'admin') {
        // Display the "Users" link only if the user is logged in as admin
        echo '<li><a href="users.php">Users</a></li>';
        echo '<li><a href="user.php">UsersInfo</a></li>';
    }
    ?>

                <li id="login-button">
                <?php echo $welcomeMessage, $loginButton; ?>
    </li>
            </ul>
        </nav>
       
    </header>
 
    <div class="container">
       
    <?php
    // Array of companies to fetch data for
    $companies = ['ss', 'pic', 'st'];

    // Loop through companies
    foreach ($companies as $company) {
        // URL to fetch top five products for each company
        $url = 'https://pham-market-place.000webhostapp.com/pham/topFiveProduct.php?company=' . $company;

        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute cURL session
        $response = curl_exec($ch);

        // Check for errors and process the response
        if ($response === false) {
            echo "Error occurred: " . curl_error($ch);
        } else {
            // Decode the JSON response
            $products = json_decode($response, true);
            echo "<div class='company-container'>";

            echo "<h2>Company: $company</h2>";

            if (!empty($products)) {
                foreach ($products as $product) {
                    echo "<div class='tile'>";
                    echo "<img src='" . urldecode($product['img_url']) . "' alt='Product Image'>";
                    echo "<h3>" . $product['product_name'] . "</h3>";
                    echo "<p>Average Rating: " . $product['average_rating'] . "</p>";
                    // Display more product details as needed
                    echo "</div>";
                }
            } else {
                echo "<p>No data available for this company.</p>";
            }
            echo "</div>"; // Close company-container

        }

        // Close cURL session
        curl_close($ch);
    }
    ?>
            
           
    </div>



</body>
</html>

