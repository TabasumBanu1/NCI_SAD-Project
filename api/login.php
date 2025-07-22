<?php
session_start();
include 'db.php';

$data = json_decode(file_get_contents("php://input"));
$email = $data->email;
$password = $data->password;

$stmt = $conn->prepare("SELECT * FROM users WHERE email=? AND password=?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if ($user) {
    $_SESSION['user'] = $user;
    echo json_encode(["success" => true, "user" => $user]);
} else {
    echo json_encode(["success" => false, "message" => "Invalid credentials"]);
}
?>