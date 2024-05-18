<?php
$host = 'localhost';
$dbUser = 'root';    
$dbPassword = '';   
$dbName = 'dashboard';


$conn = new mysqli($host, $dbUser, $dbPassword, $dbName);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
?>
