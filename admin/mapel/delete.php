<?php

require_once('../../koneksi.php');

// Memeriksa koneksi
if ($conn->connect_error) {
die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan nilai ID yang ingin dihapus dari parameter URL
$id_mapel = $_GET['id_mapel'];

// Membuat query SQL untuk menghapus data berdasarkan ID
$sql = "DELETE FROM mapel WHERE id_mapel = $id_mapel";

// Menjalankan query dan memeriksa keberhasilan penghapusan
if ($conn->query($sql) === TRUE) {
    header("Location:index.php");
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi ke database
$conn->close();
?>