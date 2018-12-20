<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="e-com";
// Create connection
$conn = new mysqli($servername, $username, $password,$db);
// Chec
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


 ?>
