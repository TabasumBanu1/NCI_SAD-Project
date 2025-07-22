<?php
session_start();
include 'db.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'employee') {
    echo json_encode(["success" => false, "message" => "Unauthorized"]);
    exit;
}
$data = json_decode(file_get_contents("php://input"));
$vacancy_id = $data->vacancy_id;
$employee_id = $_SESSION['user']['id'];
$stmt = $conn->prepare("INSERT INTO applications (employee_id, vacancy_id) VALUES (?, ?)");
$stmt->bind_param("ii", $employee_id, $vacancy_id);
$stmt->execute();
$stmt->close();
echo json_encode(["success" => true, "message" => "Application submitted"]);
?>