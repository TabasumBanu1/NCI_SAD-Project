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
$sql = "INSERT INTO vacancies (title, description, created_by) VALUES ('$title', '$description', $created_by)";
$conn->query($sql);
echo json_encode(["success" => true, "message" => "Vacancy created"]);
?>