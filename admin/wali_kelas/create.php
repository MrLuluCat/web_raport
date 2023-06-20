<?php
require '../../view.php';
require_once('../../koneksi.php');

$queryKelas = "SELECT * FROM kelas";
$resultKelas = mysqli_query($conn, $queryKelas);

$queryGuru = "SELECT * FROM guru";
$resultGuru = mysqli_query($conn, $queryGuru);

if (mysqli_num_rows($resultGuru) > 0) {
    $optionsGuru = '';
    while ($row = mysqli_fetch_assoc($resultGuru)) {
        $idGuru = $row['id_guru'];
        $namaGuru = $row['nama_guru'];

        // Buat opsi dalam elemen select
        $optionsGuru .= '<option value="' . $idGuru . '">' . $namaGuru . '</option>';
    }
} else {
    $optionsGuru = '<option value="">Tidak ada data guru</option>';
}

if (mysqli_num_rows($resultKelas) > 0) {
    $optionsKelas = '';
    while ($row = mysqli_fetch_assoc($resultKelas)) {
        $idKelas = $row['id_kelas'];
        $namaKelas = $row['nama_kelas'];

        // Buat opsi dalam elemen select
        $optionsKelas .= '<option value="' . $idKelas . '">' . $namaKelas . '</option>';
    }
} else {
    $optionsKelas = '<option value="">Tidak ada data kelas</option>';
}


if (isset($_POST['submit'])) {
    // Sanitasi input
    $id_guru = mysqli_real_escape_string($conn, $_POST['id_guru']);
    $id_kelas = mysqli_real_escape_string($conn, $_POST['id_kelas']);

    $query = "INSERT INTO `wali_kelas` (`id_guru`, `id_kelas`) VALUES ('$id_guru', '$id_kelas');";
    $result = mysqli_query($conn, $query);

    // Tambahkan pesan sukses/kesalahan
    if ($result) {
        $pesan = "Data Bidang Studi berhasil ditambahkan.";
        header("Location:index.php");
    } else {
        $pesan = "Terjadi kesalahan saat menambahkan data kelas.";
    }
}

View::section('title', 'SMPIT Auliya');
View::section('css', '../../');
View::section('nav', '../');
// View::section('header', 'This is the header of the Home page');

$content = '<!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Kelas</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <section class="content">
                <div class="my-3 p-3 bg-body rounded shadow-sm">

                    <div class="card">
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-group">
                                <div>
                                    <label class="mb-2">Guru</label>
                                    <div class="form-floating mb-3">
                                        <select class="form-control" id="id_guru" name="id_guru">
                                        ' . $optionsGuru . '
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">Tingkat - Kelas</label>
                                    <select class="form-control" id="id_kelas" name="id_kelas">
                                        ' . $optionsKelas . '
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </form>
                        </div>
                    </div>

                </div>
            </section>
        </div>';

View::section('content', $content);
// Render the home view
View::extend('views/layout.php');

        
        