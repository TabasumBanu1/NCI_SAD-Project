<?php
include 'db.php';
$data = json_decode(file_get_contents("php://input"));
$name = $data->name;
$email = $data->email;
$password = $data->password;
$role = $data->role;

$sql = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
$conn->query($sql);
echo json_encode(["success" => true, "message" => "Account created"]);
?>