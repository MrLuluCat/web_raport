<?php

require '../View.php';
require_once('../koneksi.php');

$sqlSiswa = "SELECT COUNT(*) AS id_siswa FROM siswa";
$resultSiswa = mysqli_query($conn, $sqlSiswa);

$sqlGuru = "SELECT COUNT(*) AS id_guru FROM guru";
$resultGuru = mysqli_query($conn, $sqlGuru);

$sqlKelas = "SELECT COUNT(*) AS id_kelas FROM kelas";
$resultKelas = mysqli_query($conn, $sqlKelas);

$sqlmapel = "SELECT COUNT(*) AS id_mapel FROM mapel";
$resultmapel = mysqli_query($conn, $sqlmapel);

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
if ($resultmapel) {
    // Mengambil hasil sebagai array asosiatif
    $row = mysqli_fetch_assoc($resultmapel);
    $jumlahmapel = $row["id_mapel"];
}
// Define sections
View::section('title', 'Dashboard');
View::section('contentTittle', 'Dashboard');
View::section('contentLink', '');
View::section('contentLinkActive', 'Dashboard');
View::section('css', '../');
View::section('nav', '../admin/');
// View::section('header', 'This is the header of the Home page');

$content = '

    <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Selamat Datang di Website e-Rapot SMPIT Auliya</h1>
                <p class="lead">
                    Website ini membantu memantau Rapot Siswa dengan mudah.
                </p>
                <hr class="my-4">
                <p>
                    menyediakan solusi yang mudah dan efisien untuk memantau Rapot Siswa.
                </p>
            </div>
        </div>

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
                        <a href="siswa/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                        <a href="guru/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-purple text-white">
                        <div class="inner">
                            <h3>'. $jumlahmapel . '</h3>

                            <p>Mata Pelajaran</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <a href="mapel/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>'. $jumlahKelas . '</h3>

                            <p>Kelas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-school"></i>
                        </div>
                        <a href="kelas/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
</div>

';

View::section('content', $content);

// Render the home view
View::extend('views/layout.php');
