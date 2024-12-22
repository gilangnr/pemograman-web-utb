<?php
header("Access-Control-Allow-Origin: *");
include 'koneksi.php';

$session_token = $_POST['session_token'];

if (isset($session_token)) {
    $session_token = $session_token;

    $updateStatement = $con->prepare("UPDATE auth SET session_token = NULL WHERE session_token = ?");
    $updateStatement->execute([$session_token]);

    $affectedRows = $updateStatement->rowCount();
    if ($affectedRows > 0) {
        echo json_encode(['status' => 'success', 'message' => 'Logout berhasil']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Token sesi tidak valid']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>