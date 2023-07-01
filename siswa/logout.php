<?php
if (isset($_POST['logout'])) {
    // Lakukan tindakan logout di sini
    // Contoh: Menghapus data sesi dan mengalihkan pengguna ke halaman login

    // Hapus data sesi
    session_start();
    session_unset();
    session_destroy();

    // Alihkan pengguna ke halaman login
    header('Location: login.php');
    exit();
}

session_start();
session_unset();
session_destroy();
exit();
