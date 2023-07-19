

<?php
$host_name = "localhost";
$username = "root";
$password = "";
$db = "php_db";

// Create connection
$conn = new mysqli($host_name, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>