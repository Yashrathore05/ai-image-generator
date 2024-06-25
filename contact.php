<?php
session_start();
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $contact_message = $_POST['contact'] ?? '';
    $phone = $_POST['phone'] ?? '';

    if ($name && $email && $contact_message) {
        $stmt = $conn->prepare("INSERT INTO contact_queries (name, email, contact_message, phone) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $contact_message, $phone);

        if ($stmt->execute()) {
            $success = "Your query has been submitted successfully!";
        } else {
            $error = "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $error = "Please fill in all required fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type=text], input[type=email], input[type=tel], textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f4f4f4;
        }

        button[type=submit] {
            background-color: #00bfa5;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button[type=submit]:hover {
            background-color: #009688;
        }

        p.error, p.success {
            text-align: center;
            margin-top: 10px;
            color: red;
        }

        p.success {
            color: green;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <h2>Contact Us</h2>
    <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <?php if (isset($success)): ?>
        <p class="success"><?php echo $success; ?></p>
    <?php endif; ?>
    <form action="contact.php" method="post">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="tel" name="phone" placeholder="Phone">
        <textarea name="contact" placeholder="Your Query" rows="4" required></textarea>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
