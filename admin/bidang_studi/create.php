<?php
require '../../view.php';
require_once('../../koneksi.php');

$query = "SELECT b.id_guru, g.nama_guru FROM bidang_studi b
          JOIN guru g ON b.id_guru = g.id_guru";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $options = '';
    while ($row = mysqli_fetch_assoc($result)) {
        $idGuru = $row['id_guru'];
        $namaGuru = $row['nama_guru'];

        // Buat opsi dalam elemen select
        $options .= '<option value="' . $idGuru . '">' . $namaGuru . '</option>';
    }
} else {
    $options = '<option value="">Tidak ada data guru</option>';
}

if (isset($_POST['submit'])) {
    // Sanitasi input
    $nama_bidang_studi = mysqli_real_escape_string($conn, $_POST['nama_bidang_studi']);
    $id_guru = mysqli_real_escape_string($conn, $_POST['id_guru']);

    $query = "INSERT INTO bidang_studi (nama_bidang_studi, id_guru) VALUES ('$nama_bidang_studi', '$id_guru')";
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
                                    <label class="mb-2">Bidang Studi</label>
                                    <div class="form-floating mb-3">
                                        <input
                                        type="text"
                                        class="form-control"
                                        id="nama_bidang_studi"
                                        name="nama_bidang_studi"
                                        required
                                        />
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">Guru Bidang Studi</label>
                                    <select class="form-control" id="id_guru" name="id_guru">
                                        ' . $options . '
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

        
        