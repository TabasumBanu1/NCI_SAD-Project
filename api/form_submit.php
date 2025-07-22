<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user'])) {
    echo json_encode(["success" => false, "message" => "Not logged in"]);
    exit;
}

$data = json_decode(file_get_contents("php://input"));
$title = $data->title;
$description = $data->description;
$user_id = $_SESSION['user']['id'];

$stmt = $conn->prepare("INSERT INTO form_data (user_id, title, description) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $user_id, $title, $description);
$stmt->execute();
$stmt->close();

echo json_encode(["success" => true, "message" => "Form submitted"]);
?>