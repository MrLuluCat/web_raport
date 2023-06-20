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

$query = "SELECT * FROM bidang_studi";
$result = mysqli_query($conn, $query);
// Define sections
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
                            <h1 class="m-0">Bidang Studi</h1>
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
                        <a href="create.php" class="btn btn-success">+ Tambah Bidang Studi</a>
                        </div>

                        <table id="" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th class="col-sm-1">No</th>
                            <th class="col-md-2">Bidang Studi</th>
                            <th class="col-md-3">Guru Bidang Studi</th>
                            <th class="col-sm-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>';
                        while ($row = mysqli_fetch_assoc($result)) {
                            $content .= '<tr>
                                    <td>' . $row["id_bidang_studi"] . '</td>
                                    <td>' . $row["nama_bidang_studi"] . '</td>
                                    <td>' . $namaGuru . '</td>
                                    <td><a href="edit.php?id_bidang_studi=' . $row['id_bidang_studi'] . '" class="btn btn-warning btn-sm ">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm ">Delete</a>
                                    </td>
                                </tr>';
                            }
                        $content .= '</tbody>
                    </table>
                </div>
            </section>
        </div>';

View::section('content', $content);
// Render the home view
View::extend('views/layout.php');
