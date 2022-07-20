<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "employee-system_db";

//create connection string
$conn = new mysqli($hostname, $username, $password, $database_name);

//check connection string
if($conn->connect_error){
    de("Unable to connect to database: " . $conn->connect_error);
}
?>