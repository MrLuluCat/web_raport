<?php
session_start();

// Kode untuk memeriksa apakah pengguna sudah login sebelumnya
// if (!isset($_SESSION['guru_username'])) {
//     header("Location: login.php");
//     exit();
// }

// Kode untuk mengambil informasi guru dari database berdasarkan username
require '../../view.php';
require_once('../../koneksi.php');

// $username = $_SESSION['guru_username'];

// Query untuk mengambil informasi guru berdasarkan username
$sql = "SELECT * FROM guru";
$result = mysqli_query($conn,$sql);

// if ($result->num_rows == 1) {
//     $row = $result->fetch_assoc();
//     $NIP           = $row["NIP"];
//     $nama_guru      = $row["nama_guru"];
//     $jenis_kelamin  = $row["jenis_kelamin"];
//     $tanggal_lahir  = $row["tanggal_lahir"];
//     $alamat         = $row["alamat"];
//     $nomor_telepon  = $row["nomor_telepon"];
//     $email          = $row["email"];
// } else {
//     // Jika informasi guru tidak ditemukan, lakukan penanganan sesuai kebutuhan Anda
//     echo "Informasi guru tidak ditemukan.";
//     exit();
// }

View::section('title', 'SMPIT Auliya');
View::section('css', '../../');
View::section('nav', '../');

$content = '<!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Guru</h1>
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
                        <div class="pb-3">
                        <a href="create.php" class="btn btn-success">+ Tambah Guru</a>
                        </div>

                        <table id="" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-2">NIP</th>
                            <th class="col-md-3">Nama</th>
                            <th class="col-sm-2">Jenis Kelamin</th>
                            <th class="col-sm-2">Nomor</th>
                            <th class="col-sm-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>';
                        $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    $content .= '<tr>
                                    <td>' . $no . '</td>
                                    <td>' . $row["NIP"] . '</td>
                                    <td>' . $row["nama_guru"] . '</td>
                                    <td>' . $row["jenis_kelamin"] . '</td>
                                    <td>' . $row["nomor_telepon"] . '</td>
                                    <td>
                                        <a href="edit.php?id_guru=' . $row['id_guru'] . '" class="btn-sm btn-warning">Edit</a>
                                        <a href="delete.php?id_guru=' . $row['id_guru'] . '" class="btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>';
                            $no++;
                        }
            $content .= '</tbody>
                    </table>
                </div>
            </section>
        </div>';

View::section('content', $content);
// Render the home view
View::extend('views/layout.php');
    