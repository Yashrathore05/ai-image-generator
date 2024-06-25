<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMMERSIVE X</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .header {
            background-color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e0e0e0;
            text-align: center; /* Center align content */
        }
        .header img {
            height: 80px;
        }
        .nav {
            display: flex;
            gap: 20px;
            justify-content: center; /* Center align navigation links */
            align-items: center; /* Vertically align items */
            margin-top: 10px; /* Adjust margin as needed */
        }
        .nav a {
            text-decoration: none;
            color: black;
            font-weight: bold;
            padding: 10px; /* Added padding to make clickable area larger */
        }
        .login, .signup, .profile, .logout {
            background-color: #00bfa5;
            padding: 10px 20px;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="assets/images/logo.png" alt="Immersive X Logo">
        <div class="nav">
            <a href="index.php">Home</a>
           
            <a href="contact.php">Contact</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="profile.php" class="profile">Profile</a>
                <a href="logout.php" class="logout">Logout</a>
            <?php else: ?>
                <a href="login.php" class="login">Login</a>
                <a href="signup.php" class="signup">Sign Up</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
