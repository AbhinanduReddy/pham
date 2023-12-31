<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="tracking.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container-login {
            color:black;
            width: 300px;
            margin: 0 auto;
            margin-top: 100px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
        .signup-link {
            text-align: center;
            margin-top: 20px;
        }
        .signup-link a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
<header>
        <div class="logo"><a href="/pham"><img src="icon.png"></img> </a></div>
        
       
    </header>
    <div class="container-login">
        <form action="signup_processor.php" method="post"> <!-- Point this to your PHP script for processing -->
        <h1 style="padding-left:30%">Sign Up</h1>

        <div class="form-group">
                <label for="name">Name:</label>
                <input type="name" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Sign Up</button>
            </div>
            <div class="signup-link">
                <a href="login.php"> Login</a>
            </div>
        </form>
    </div>
</body>
</html>
