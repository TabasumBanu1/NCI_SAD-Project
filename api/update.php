<?php
include 'db.php';
$data = json_decode(file_get_contents("php://input"));
$id = $data->id;
$name = $data->name;
$email = $data->email;
$stmt = $conn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
$stmt->bind_param("ssi", $name, $email, $id);
$stmt->execute();
$stmt->close();
echo json_encode(["message" => "User updated"]);
?>