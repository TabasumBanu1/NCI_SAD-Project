<?php
include 'db.php';

$sql = "SELECT form_data.*, users.name AS user_name FROM form_data JOIN users ON form_data.user_id = users.id ORDER BY form_data.created_at DESC";
$result = $conn->query($sql);

$entries = [];
while ($row = $result->fetch_assoc()) {
    $entries[] = $row;
}

echo json_encode($entries);
?>