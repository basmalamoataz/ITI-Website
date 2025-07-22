<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "myDB"; 

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);


// 4. Create users table if not exists
$sql = "CREATE TABLE IF NOT EXISTS members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";

?>