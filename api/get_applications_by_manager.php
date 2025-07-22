<?php
session_start();
include 'db.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'senior_manager') {
    echo json_encode([]);
    exit;
}
$manager_id = $_SESSION['user']['id'];
$sql = "SELECT applications.*, users.name AS employee_name, vacancies.title 
        FROM applications 
        JOIN users ON applications.employee_id = users.id 
        JOIN vacancies ON applications.vacancy_id = vacancies.id 
        WHERE vacancies.created_by = $manager_id";
$result = $conn->query($sql);
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);
?>