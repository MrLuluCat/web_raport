<?php

require '../View.php';
require_once('../koneksi.php');

$sqlSiswa = "SELECT COUNT(*) AS id_siswa FROM siswa";
$resultSiswa = mysqli_query($conn, $sqlSiswa);

$sqlGuru = "SELECT COUNT(*) AS id_guru FROM guru";
$resultGuru = mysqli_query($conn, $sqlGuru);

$sqlKelas = "SELECT COUNT(*) AS id_kelas FROM kelas";
$resultKelas = mysqli_query($conn, $sqlKelas);

$sqlBidang_studi = "SELECT COUNT(*) AS id_bidang_studi FROM bidang_studi";
$resultBidang_studi = mysqli_query($conn, $sqlBidang_studi);

if ($resultSiswa) {
    // Mengambil hasil sebagai array asosiatif
    $row = mysqli_fetch_assoc($resultSiswa);
    $jumlahSiswa = $row["id_siswa"];
}
if ($resultGuru) {
    // Mengambil hasil sebagai array asosiatif
    $row = mysqli_fetch_assoc($resultGuru);
    $jumlahGuru = $row["id_guru"];
}
if ($resultKelas) {
    // Mengambil hasil sebagai array asosiatif
    $row = mysqli_fetch_assoc($resultKelas);
    $jumlahKelas = $row["id_kelas"];
}
if ($resultBidang_studi) {
    // Mengambil hasil sebagai array asosiatif
    $row = mysqli_fetch_assoc($resultBidang_studi);
    $jumlahBidang_studi = $row["id_bidang_studi"];
}
// Define sections
View::section('title', 'Home');
View::section('css', '../');
View::section('nav', '../admin/');
// View::section('header', 'This is the header of the Home page');

$content = '<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">

                        <div class="inner">
                            <h3>' . $jumlahSiswa . '</h3>
                            <p>Siswa</p>
                        </div>

                        <div class="icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>'. $jumlahGuru . '</h3>

                            <p>Guru</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>'. $jumlahBidang_studi . '</h3>

                            <p>Bidang Studi</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>'. $jumlahKelas .'</h3>

                            <p>Kelas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-school"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">

                                    </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">

                    <!-- /.card -->
                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>';

View::section('content', $content);
// View::section('footer', 'This is the footer of the Home page');

// Render the home view
View::extend('views/layout.php');
