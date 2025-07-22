<?php
session_start();
include 'db.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'senior_manager') {
    echo json_encode(["success" => false, "message" => "Unauthorized"]);
    exit;
}
$data = json_decode(file_get_contents("php://input"));
$app_id = $data->application_id;
$status = $data->status;
$stmt = $conn->prepare("UPDATE applications SET status=? WHERE id=?");
$stmt->bind_param("si", $status, $app_id);
$stmt->execute();
$stmt->close();
echo json_encode(["success" => true, "message" => "Status updated"]);
?>