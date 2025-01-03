<?php
header("Access-Control-Allow-Origin: *");

include 'koneksi.php';

// Fungsi untuk mendapatkan protokol (http/https)
function getProtocol() {
    $protocol = isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] != 'off') ? 'https' : 'http';
    return $protocol . "://" . $_SERVER['HTTP_HOST'];
}

$keyword = isset($_GET["key"]) ? $_GET["key"] : '';

// Menyiapkan statement SQL untuk mencari data berdasarkan kata kunci
$statement = $con->prepare("SELECT * FROM news_catalog WHERE title LIKE ?");
$statement->execute(["%$keyword%"]);

// Menyimpan hasil dalam array
$data = array();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    // Menambahkan URL lengkap untuk gambar
    $row["img"] = getProtocol() . "/pemograman-web-utb/pertemuan-9/be/" . $row["img"];
    $data[] = $row;
}

// Mengatur header untuk JSON dan mencetak data
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
?>
