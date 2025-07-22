<?php
session_start();
include 'db.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'employee') {
    echo json_encode([]);
    exit;
}
$employee_id = $_SESSION['user']['id'];
$sql = "SELECT applications.*, vacancies.title FROM applications 
        JOIN vacancies ON applications.vacancy_id = vacancies.id 
        WHERE applications.employee_id = $employee_id";
$result = $conn->query($sql);
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);
?>