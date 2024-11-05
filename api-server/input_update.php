<?php 
require_once "koneksi.php";

$nama = $_POST["nama"];
$jurusan = $_POST["jurusan"];
$npm = $_POST["npm"];

if(!empty($_POST["id"])) {
    try {
        $sql = "UPDATE `mahasiswa` SET `nama` = ?, `jurusan` = ?, `npm` = ? WHERE id = `id`";
        $koneksi = $con->prepare($sql);
        $koneksi->execute([$nama, $jurusan, $npm]);

        echo "Data updated successfully";
    } catch (PDOException $err) {
        die("Error updating data: " . $err->getMessage());
    }
} else {
    try {
        $sql = "INSERT INTO `mahasiswa` (`nama`, `jurusan`, `npm`) VALUES (?, ?, ?)";
        $koneksi = $con->prepare($sql);
        $koneksi->execute([$nama, $jurusan, $npm]);

        echo "Data inserted successfully";
    } catch (PDOException $err) {
        die("Error insert data: " . $err->getMessage());
    }
}

?>