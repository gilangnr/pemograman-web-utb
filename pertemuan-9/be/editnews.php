<?php
header("Access-Control-Allow-Origin: *");
include 'koneksi.php';

$id = $_POST["idnews"];
$title = $_POST["judul"];
$content = $_POST["deskripsi"];
$date = $_POST["tanggal"];

// Periksa apakah file gambar dikirimkan
if (isset($_FILES['url_image']) && $_FILES['url_image']['error'] === UPLOAD_ERR_OK) {
    // File gambar dikirimkan, tangani unggahan
    $namafile = $_FILES['url_image']['name'];
    $tmp_name = $_FILES['url_image']['tmp_name'];
    $upload_directory = 'archive/';

    // Pindahkan file ke direktori yang ditentukan
    move_uploaded_file($tmp_name, $upload_directory . $namafile);

    // Update data dengan file gambar
    $statement = $con->prepare("UPDATE `news_catalog` SET `title`=?, `desc`=?, `img`=?, `date`=? WHERE `id`=?");
    $statement->execute([$title, $content, $upload_directory . $namafile, $date, $id]);
} else {
    // File gambar tidak dikirimkan, tangani tanpa file gambar
    $statement = $con->prepare("UPDATE `news_catalog` SET `title`=?, `desc`=?, `date`=? WHERE `id`=?");
    $statement->execute([$title, $content, $date, $id]);
}

$pesan = "Data berhasil diubah";
echo $pesan;
?>
