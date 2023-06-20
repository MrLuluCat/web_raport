<?php

require '../../view.php';
require_once('../../koneksi.php');

$query = "SELECT wk.id_wali_kelas, g.nama_guru, k.tingkat_kelas, k.nama_kelas 
          FROM wali_kelas wk
          JOIN guru g ON wk.id_guru = g.id_guru
          JOIN kelas k ON wk.id_kelas = k.id_kelas";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // echo '<select class="form-control" id="wali_kelas" name="wali_kelas">';
    while ($row = mysqli_fetch_assoc($result)) {
        $idWaliKelas = $row['id_wali_kelas'];
        $namaGuru = $row['nama_guru'];
        $tingkatKelas = $row['tingkat_kelas'];
        $namaKelas = $row['nama_kelas'];
        
        $option = '<option value="' . $idWaliKelas . '">' . $namaGuru . ' - ' . $tingkatKelas . ' - ' . $namaKelas. '</option>';
    }
    // echo '</select>';
} else {
    $option = '<option value="">Tidak Ada Data</option>';
}

$query = "SELECT * FROM wali_kelas";
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
                            <h1 class="m-0">Wali Kelas</h1>
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
                        <a href="create.php" class="btn btn-success">+ Tambah Wali Kelas</a>
                        </div>

                        <table id="" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th class="col-sm-1">No</th>
                            <th class="col-md-2">Guru</th>
                            <th class="col-md-3">Kelas</th>
                            <th class="col-sm-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>';
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $content .= '<tr>
                                    <td>' . $no . '</td>
                                    <td>' . $namaGuru . '</td>
                                    <td>' . $tingkatKelas . ' - ' . $namaKelas . '</td>
                                    <td><a href="edit.php?id_bidang_studi=' . $row['id_wali_kelas'] . '" class="btn btn-warning btn-sm ">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm ">Delete</a>
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
