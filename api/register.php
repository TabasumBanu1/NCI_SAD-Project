<?php
include 'db.php';
$data = json_decode(file_get_contents("php://input"));
$name = $data->name;
$email = $data->email;
$password = $data->password;
$role = $data->role;

$stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $password, $role);
$stmt->execute();
$stmt->close();
echo json_encode(["success" => true, "message" => "Account created"]);
?>