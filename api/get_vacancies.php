<?php
include 'db.php';
$sql = "SELECT vacancies.*, users.name as manager_name FROM vacancies JOIN users ON vacancies.created_by = users.id ORDER BY vacancies.created_at DESC";
$result = $conn->query($sql);
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);
?>