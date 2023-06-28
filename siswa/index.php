<?php
session_start();
include '../koneksi.php';

// Kode untuk memeriksa apakah pengguna sudah login sebelumnya
if (!isset($_SESSION['siswa_username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['siswa_username'];

$query = "SELECT * FROM siswa";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);
$NISN           = $row["NISN"];
$nama_siswa     = $row["nama_siswa"];
$jenis_kelamin  = $row["jenis_kelamin"];
$tanggal_lahir  = $row["tanggal_lahir"];
$alamat         = $row["alamat"];
$nomor_telepon  = $row["nomor_telepon"];
$email          = $row["email"];

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WEB Rapot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <main>
        <div class="w-auto ms-5 mt-5">
            <div class="col-lg-9">
                <div class="card h-auto">
                    <div class="card-header">
                        <h3 class="card-title">Selamat Datang, <?php echo $nama_siswa ?></h3>
                    </div>
                    <div class="card-body h-auto">
                        <div class="flex-row d-flex">
                            <img src="../assets/img/logo.png" alt="logo" style="width: 203px; height: 249px" />

                            <div class="ms-5">
                                <div class="d-flex flex-row">
                                    <div>
                                        <p class="fs-4">Nama</p>
                                        <p class="fs-4">NISN</p>
                                        <p class="fs-4">Jenis Kelamin</p>
                                        <p class="fs-4">Tanggal Lahir</p>
                                        <p class="fs-4">Nomor Telepon</p>
                                        <p class="fs-4">Alamat</p>
                                        <p class="fs-4">Email</p>
                                    </div>
                                    <div class="ms-5">
                                        <p class="fs-4">:</p>
                                        <p class="fs-4">:</p>
                                        <p class="fs-4">:</p>
                                        <p class="fs-4">:</p>
                                        <p class="fs-4">:</p>
                                        <p class="fs-4">:</p>
                                        <p class="fs-4">:</p>
                                    </div>
                                    <div class="ms-5">
                                        <p class="fs-4"><?= $nama_siswa ?></p>
                                        <p class="fs-4"><?= $NISN ?></p>
                                        <p class="fs-4"><?= $jenis_kelamin ?></p>
                                        <p class="fs-4"><?= $tanggal_lahir ?></p>
                                        <p class="fs-4"><?= $nomor_telepon ?></p>
                                        <p class="fs-4"><?= $alamat ?></p>
                                        <p class="fs-4"><?= $email ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-5 w-25">
                    <div class="card-header">
                        <h3 class="card-title">Lihat Rapot</h3>
                    </div>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">Lihat Raport</a>
                        <form class="d-inline" action="logout.php" method="post">
                            <button name="logout" id="logout" class="btn btn-danger d-inline">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>