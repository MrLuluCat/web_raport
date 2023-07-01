<?php
// session_start();

// // Kode untuk memeriksa apakah pengguna sudah login sebelumnya
// if (!isset($_SESSION['siswa_username'])) {
//     header("Location: login.php");
//     exit();
// }

// Kode untuk mengambil informasi siswa dari database berdasarkan username
require '../../view.php';
require_once('../../koneksi.php');

// $username = $_SESSION['siswa_username'];

// Query untuk mengambil informasi siswa berdasarkan username
$sql = "SELECT * FROM Siswa ";
$result = $conn->query($sql);

// if ($result->num_rows == 1) {
//     $row = $result->fetch_assoc();
//     $NISN           = $row["NISN"];
//     $nama_siswa     = $row["nama_siswa"];
//     $jenis_kelamin  = $row["jenis_kelamin"];
//     $tanggal_lahir  = $row["tanggal_lahir"];
//     $alamat         = $row["alamat"];
//     $nomor_telepon  = $row["nomor_telepon"];
//     $email          = $row["email"];
// } else {
//     // Jika informasi siswa tidak ditemukan, lakukan penanganan sesuai kebutuhan Anda
//     echo "Informasi siswa tidak ditemukan.";
//     exit();
// }

// Tutup koneksi ke database
$conn->close();


// Define sections
View::section('title', 'Siswa');
View::section('contentTittle', 'Siswa');
View::section('contentRoot', '../dashboard.php');
View::section('contentLink', 'Dashboard');
View::section('contentLinkActive', 'Siswa');

View::section('css', '../../');
View::section('nav', '../');

$content = '

            <section class="content">
                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                        <div class="pb-3">
                        <a href="create.php" class="btn btn-success">+ Tambah Siswa</a>
                        </div>

                        <table id="" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-2">NISN</th>
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
                                    <td>' . $row["NISN"] . '</td>
                                    <td>' . $row["nama_siswa"] . '</td>
                                    <td>' . $row["jenis_kelamin"] . '</td>
                                    <td>' . $row["nomor_telepon"] . '</td>
                                    <td>
                                        <a href="edit.php?id_siswa=' . $row['id_siswa'] . '" class="btn-sm btn-warning">Edit</a>
                                        <a href="delete.php?id_siswa=' . $row['id_siswa'] . '" class="btn-sm btn-danger">Delete</a>
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


