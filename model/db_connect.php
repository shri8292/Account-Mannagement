<?php

/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myaccount";
$conn = mysqli_connect($servername, $username, $password, $dbname) 
or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connection failed: %s\n", mysqli_connect_error());
    exit();
}
?>