<?php
header("Access-Control-Allow-Origin: *");
include 'koneksi.php'; 

$username = $_POST['username'];
$password = $_POST['password'];

if (isset($username) && isset($password)) {
 
    $statement = $con->prepare("SELECT id, username, password, name FROM auth WHERE username = ?");
    $statement->execute([$username]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user && sha1($password) === $user['password']) {
        $session_token = bin2hex(random_bytes(16));

        $updateStatement = $con->prepare("UPDATE auth SET session_token = ? WHERE id = ?");
        $updateStatement->execute([$session_token, $user['id']]);

        $name = $user['name'];

        echo json_encode(['status' => 'success', 'session_token' => $session_token, 'name' => $name]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Kredensial tidak valid']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Permintaan tidak valid']);
}
?>