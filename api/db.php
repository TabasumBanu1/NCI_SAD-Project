<?php
$conn = new mysqli("localhost", "root", "", "crud_demo");
if ($conn->connect_error) {
    die("Database connection failed.");
}
?>