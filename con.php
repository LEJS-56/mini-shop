<?php
$servername = "localhost";
$username = "php";
$password = "21DWBM5ozO]QPdRi";
$dbname = "shop";

// creation de connection
$conn = new mysqli($servername, $username, $password, $dbname);
// verrification de la connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

