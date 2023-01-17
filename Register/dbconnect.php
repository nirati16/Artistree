<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "artistree";

$conn = mysqli_connect($server, $username, $password, $database, "3307");
if($conn->connect_error){
    die("Connection Failed: " .$conn->connect_error);
}

?>