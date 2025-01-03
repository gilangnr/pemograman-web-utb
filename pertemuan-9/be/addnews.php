<?php
header("Access-Control-Allow-Origin: *");
header("Cache-Control: no-cache, no-store, max-age=0, must-revalidate");
header("X-Content-Type-Options: nosniff");

include 'koneksi.php';

$title = $_POST['judul'];
$content = $_POST['deskripsi'];
$date = $_POST['tanggal'];

// Handle file upload
$namafile = $_FILES['url_image']['name'];
$tmp_name = $_FILES['url_image']['tmp_name'];

if (move_uploaded_file($tmp_name, 'archive/' . $namafile)) {
    try {
        $statement = $con->prepare(
            "INSERT INTO news_catalog (id, title, `desc`, img, `date`) VALUES (NULL, ?, ?, ?, ?)"
        );
        $statement->execute([$title, $content, 'archive/' . $namafile, $date]);

        $pesan = "Data berhasil ditambah";
        echo $pesan;
    } catch (PDOException $e) {
        // This will catch any PDOExceptions
        echo "Database error: " . $e->getMessage();
    } catch (Exception $e) {
        // This will catch any general exceptions
        echo "General error: " . $e->getMessage();
    }
} else {
    echo "File upload failed.";
}
?>
