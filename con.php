<?php
$servername = "sql300.infinityfree.com";
$username = "if0_40883908";
$password = "uXnbDFugQjy";
$dbname = "if0_40883908_shop";

// creation de connection
$conn = new mysqli($servername, $username, $password, $dbname);
// verrification de la connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

