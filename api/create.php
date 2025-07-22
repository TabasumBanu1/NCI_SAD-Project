<?php
include 'db.php';
$data = json_decode(file_get_contents("php://input"));
$name = $data->name;
$email = $data->email;
$stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $email);
$stmt->execute();
$stmt->close();
echo json_encode(["message" => "User added"]);
?>