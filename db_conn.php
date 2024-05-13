<?php
// Start session
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my-db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
 //echo "Connected successfullyyy";
// Set session variables
$_SESSION["servername"] = $servername;
$_SESSION["username"] = $username;
$_SESSION["password"] = $password;
$_SESSION["dbname"] = $dbname;