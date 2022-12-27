<?php
$servername = "localhost";
$username = "id20066913_root";
$password = "t<3sY=Bhv&Lm\NK0";
$dbname="id20066913_handdb";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else
// echo "Connected successfully <br>";
?>
