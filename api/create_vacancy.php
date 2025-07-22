<?php
session_start();
include 'db.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'senior_manager') {
    echo json_encode(["success" => false, "message" => "Unauthorized"]);
    exit;
}
$data = json_decode(file_get_contents("php://input"));
$title = $data->title;
$description = $data->description;
$created_by = $_SESSION['user']['id'];
$stmt = $conn->prepare("INSERT INTO vacancies (title, description, created_by) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $title, $description, $created_by);
$stmt->execute();
$stmt->close();
echo json_encode(["success" => true, "message" => "Vacancy created"]);
?>