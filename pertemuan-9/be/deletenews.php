<?php
header("Access-Control-Allow-Origin: *");
include 'koneksi.php';

$id = $_POST["idnews"];

try {
    // Persiapkan query untuk menghapus data berdasarkan ID
    $statement = $con->prepare("DELETE FROM `news_catalog` WHERE `news_catalog`.`id` = ?");
    
    // Eksekusi query dengan ID yang diterima dari POST
    $statement->execute([$id]);
    
    // Pesan berhasil
    $pesan = "Data berhasil dihapus";
    echo $pesan;
} catch (PDOException $cek_koneksi) {
    // Tangani error jika terjadi kesalahan pada koneksi atau query
    die($cek_koneksi->getMessage());
}
?>
