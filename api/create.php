<?php
include 'db.php';
$data = json_decode(file_get_contents("php://input"));
$name = $data->name;
$email = $data->email;
$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
$conn->query($sql);
echo json_encode(["message" => "User added"]);
?>