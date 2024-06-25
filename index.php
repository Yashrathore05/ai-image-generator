<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMMERSIVE X</title>
    <link rel="icon" href="assets/images/cropped_image.png" type="image/png">

    
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
        .main {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 20px;
        }
        .main h1 {
            font-size: 48px;
            margin-bottom: 10px;
        }
        .main p {
            font-size: 18px;
            color: #777;
            margin-bottom: 20px;
        }
        .try-now {
            background-color: #00bfa5;
            padding: 15px 30px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            text-decoration: none;
        }
        .images {
            display: flex;
            gap: 20px;
            margin-top: 40px;
        }
        .images img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            color: #777;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="assets/images/logo.png" alt="Immersive X Logo">
        <div class="nav">
            <a href="index.php">Home</a>
      
            <a href="contact.php">Contact us</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="profile.php" class="profile">Profile</a>
                <a href="logout.php" class="logout">Logout</a>
            <?php else: ?>
                <a href="login.php" class="login">Login</a>
                <a href="signup.php" class="signup">Sign Up</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="main">
        <h1>Welcome to IMMERSIVE X</h1>
        <p>Generate stunning images from text with our advanced AI technology.</p>
        <button class="try-now" onclick="redirectToPage()">Try Now</button>
        <div class="images">
            <img src="assets/images/cat.png" alt="Image 1">
            <img src="assets/images/robot.png" alt="Image 2">
            <img src="assets/images/girl.png" alt="Image 3">
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2024 Immersive X. All rights reserved.</p>
    </div>

    <script>
        function redirectToPage() {
            <?php if (isset($_SESSION['user_id'])): ?>
                window.location.href = 'text_to_image.html';
            <?php else: ?>
                alert('Please register or login first.');
            <?php endif; ?>
        }
    </script>
</body>
</html>
