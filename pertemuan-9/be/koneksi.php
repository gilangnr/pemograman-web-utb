<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "db_latihan9";
$db_port = "3306";

try {
    $con = new PDO("mysql:host=$hostname;port=$db_port;dbname=$db_name", $username, $password);
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>
