// includes/db.php
<?php
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "blogdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
?>
