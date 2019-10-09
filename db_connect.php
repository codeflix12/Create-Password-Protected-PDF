<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, "codeflix");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>