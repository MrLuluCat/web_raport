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
$sql = "SELECT siswa.NISN, siswa.nama_siswa, guru.nama_guru AS wali_kelas, kelas.tingkat_kelas, kelas.nama_kelas, 
        rapot.id_rapot, rapot.tahun_pelajaran, rapot.semester
        FROM Rapot rapot
        JOIN Siswa siswa ON rapot.id_siswa = siswa.id_siswa
        JOIN Guru guru ON rapot.id_guru = guru.id_guru
        JOIN Kelas kelas ON rapot.id_kelas = kelas.id_kelas
        ORDER BY rapot.id_rapot ASC";
$result = $conn->query($sql);

// Tutup koneksi ke database
$conn->close();


// Define sections
View::section('title', 'Rapot');
View::section('contentTittle', 'Rapot');
View::section('contentRoot', '../dashboard.php');
View::section('contentLink', 'Dashboard');
View::section('contentLinkActive', 'Rapot');

View::section('css', '../../');
View::section('nav', '../');

$content = '

            <section class="content">
                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                        <div class="pb-3">
                        <a href="create.php" class="btn btn-success">+ Buat Rapot</a>
                        </div>

                        <table id="" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                            <th class="col-sm-1">No</th>
                            <th class="col-md-1">NISN</th>
                            <th class="col-md-2">Nama Siswa</th>
                            <th class="col-sm-2">Wali Kelas</th>
                            <th class="col-sm-2">Kelas</th>
                            <th class="col-sm-1">Semester</th>
                            <th class="col-sm-1">Tahun Ajaran</th>
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
                                    <td>' . $row["wali_kelas"] . '</td>
                                    <td>' . $row["tingkat_kelas"] . ' - ' . $row["nama_kelas"] . '</td>
                                    <td>' . $row["semester"] . '</td>
                                    <td>' . $row["tahun_pelajaran"] . '</td>
                                    <td>
                                        <a href="edit.php?id_rapot=' . $row['id_rapot'] . '" class="btn-sm btn-warning">Edit</a>
                                        <a href="delete.php?id_rapot=' . $row['id_rapot'] . '" class="btn-sm btn-danger">Delete</a>
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


