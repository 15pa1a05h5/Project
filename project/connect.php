<?php
$servername = "159.89.161.164";
$username = "swetha";
$password = "swetha";
$db = "bookmark" ;

// Create connection
$conn = mysqli_connect($servername, $username, $password) or die("Connection failed: " . mysql_connect());

// Check connection
/*if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}*/

mysqli_select_db($conn,$db);

?>
