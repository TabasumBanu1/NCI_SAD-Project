<?php
include 'db.php';
$data = json_decode(file_get_contents("php://input"));
$id = $data->id;
$name = $data->name;
$email = $data->email;
$sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
$conn->query($sql);
echo json_encode(["message" => "User updated"]);
?>