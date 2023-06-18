<?php
// Koneksi ke database
$server = "localhost";
$username = "root";
$password = "";
$db = "web_raport";

$conn = new mysqli($server, $username, $password, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
