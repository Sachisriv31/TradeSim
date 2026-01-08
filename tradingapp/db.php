<?php
$conn = new mysqli("localhost", "root", "", "trading_db");
if ($conn->connect_error) {
    die("Database connection failed");
}
?>
