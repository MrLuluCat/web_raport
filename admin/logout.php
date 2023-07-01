<?php
if (isset($_POST['logout'])) {
    // Lakukan tindakan logout di sini

    // Hapus data sesi
    session_start();
    session_unset();
    session_destroy();

    // Alihkan pengguna ke halaman login
    header('Location: login.php');
    exit();
}

header('Location: login.php');
exit();
