<?php
session_start();

// Check if$_SESSION["username"] the user is logged in (you can modify this logic based on your authentication system)
if (isset($_SESSION['username'])) {
    // User is logged in
    $welcomeMessage = "Welcome, " . $_SESSION['username'] . "!";
    $loginButton = '<a href="logout.php">Logout</a>';
} else {
    // User is not logged in
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
        
    </style>
</head>
<body>
    <header>
    <div class="logo"><a href="/pham"><img src="icon.png"></img> </a></div>
        <nav>
            <ul>
                 <li  id="login-button"><a href="index.php">Most Visited Products in Companies</a></li>
                <li  id="login-button"><a href="about.php">Most Visited Products in PHAM</a></li>
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
       
            <a href="https://abhinandu.000webhostapp.com/schoolsupplies" class="tile-link">
                
                <div class="tile"><img class="tile-icon" src="icon.png"><div>School Supplies</div></div>
            </a>
            <a href="https://abhinandu.000webhostapp.com/schoolsupplies" class="tile-link">
            <div class="tile"><img class="tile-icon" src="icon.png"><div>Photo Palace</div></div>
            </a>
            <a href="https://abhinandu.000webhostapp.com/schoolsupplies" class="tile-link">
            <div class="tile"><img class="tile-icon" src="icon.png"><div>Movies</div></div>
            </a>
            <a href="https://abhinandu.000webhostapp.com/schoolsupplies" class="tile-link">
            <div class="tile"><img class="tile-icon" src="icon.png"><div>StyleIt</div></div>
            </a>
            
           
    </div>



</body>
</html>
