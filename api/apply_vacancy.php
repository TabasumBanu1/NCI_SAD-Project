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
$sql = "INSERT INTO applications (employee_id, vacancy_id) VALUES ($employee_id, $vacancy_id)";
$conn->query($sql);
echo json_encode(["success" => true, "message" => "Application submitted"]);
?>