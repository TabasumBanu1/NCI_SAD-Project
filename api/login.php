<?php
session_start();
include 'db.php';

$data = json_decode(file_get_contents("php://input"));
$email = $data->email;
$password = $data->password;

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

if ($user) {
    $_SESSION['user'] = $user;
    echo json_encode(["success" => true, "user" => $user]);
} else {
    echo json_encode(["success" => false, "message" => "Invalid credentials"]);
}
?>