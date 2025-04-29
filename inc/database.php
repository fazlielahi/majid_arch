<?php
$servername = "sql109.infinityfree.com";
$username = "if0_38647626";
$password = "miamajd787";
$database = "if0_38647626_arch";

// Enable error display
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connect
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
} 
?>
