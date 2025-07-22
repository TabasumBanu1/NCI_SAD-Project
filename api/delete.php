<?php
include 'db.php';
$data = json_decode(file_get_contents("php://input"));
$id = $data->id;
$sql = "DELETE FROM users WHERE id=$id";
$conn->query($sql);
echo json_encode(["message" => "User deleted"]);
?>