<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "iwp_project1";
$conn = new mysqli($server, $username, $password, $dbname);
if($conn->connect_error)
    die($conn->connect_error);
?>