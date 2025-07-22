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
$sql = "UPDATE applications SET status='$status' WHERE id=$app_id";
$conn->query($sql);
echo json_encode(["success" => true, "message" => "Status updated"]);
?>