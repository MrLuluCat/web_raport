<?php
require '../../view.php';
require_once('../../koneksi.php');

if (isset($_POST['submit'])) {
    // Sanitasi input
    $tingkat_kelas = mysqli_real_escape_string($conn, $_POST['tingkat_kelas']);
    $nama_kelas = mysqli_real_escape_string($conn, $_POST['nama_kelas']);

    $query = "INSERT INTO kelas (tingkat_kelas, nama_kelas) VALUES ('$tingkat_kelas', '$nama_kelas')";
    $result = mysqli_query($conn, $query);

    // Tambahkan pesan sukses/kesalahan
    if ($result) {
        $pesan = "Data kelas berhasil ditambahkan.";
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
                                    <label for="tingkat_kelas">Tingkat Kelas:</label>
                                    <!-- <input type="text" class="form-control" id="tingkat_kelas" name="tingkat_kelas"> -->
                                    <select class="form-control" id="tingkat_kelas" name="tingkat_kelas">
                                        <option value="Kelas 7">Kelas 7</option>
                                        <option value="Kelas 8">Kelas 8</option>
                                        <option value="Kelas 9">Kelas 9</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_kelas">Nama Kelas:</label>
                                    <input type="text" class="form-control" id="nama_kelas" name="nama_kelas">
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

        
        