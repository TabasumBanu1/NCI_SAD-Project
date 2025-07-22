<?php
include 'db.php';
$data = json_decode(file_get_contents("php://input"));
$id = $data->id;
$stmt = $conn->prepare("DELETE FROM users WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();
echo json_encode(["message" => "User deleted"]);
?>