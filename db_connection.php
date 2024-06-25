<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = 'Yash';
$dbname = 'immersivexai';

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>
