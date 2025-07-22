<?php
session_set_cookie_params([
    'httponly' => true,
    'secure' => true,
    'samesite' => 'Lax' // Or 'Strict' depending on your needs
]);
session_start();
if (isset($_SESSION['user'])) {
    echo json_encode($_SESSION['user']);
} else {
    echo json_encode(null);
}
?>