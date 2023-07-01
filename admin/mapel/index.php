<?php

require '../../view.php';
require_once('../../koneksi.php');

// $query = "SELECT b.id_guru, g.nama_guru FROM bidang_studi b
//           JOIN guru g ON b.id_guru = g.id_guru";

$query = "SELECT * FROM mapel";

$result = mysqli_query($conn, $query);

// $options = ''; // Inisialisasi variabel dengan string kosong

// if (mysqli_num_rows($result) > 1) {
//     while ($row = mysqli_fetch_assoc($result)) {
//         $idGuru = $row['id_guru'];
//         $namaGuru = $row['nama_guru'];

//         // Gabungkan opsi-opsi dalam elemen select
//         $options .= '<option value="' . $idGuru . '">' . $namaGuru . '</option>';
//     }
// } else {
//     $options = '<option value="">Tidak ada data guru</option>';
// }


$query = "SELECT * FROM mapel";
$result = mysqli_query($conn, $query);
// Define sections
View::section('title', 'Mapel');
View::section('contentTittle', 'Mata Pelajaran');
View::section('contentRoot', '../dashboard.php');
View::section('contentLink', 'Dashboard');
View::section('contentLinkActive', 'Mapel');

View::section('css', '../../');
View::section('nav', '../');

$content = '

            <section class="content">
                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                        <div class="pb-3">
                        <a href="create.php" class="btn btn-success">+ Tambah Mata Pelajaran</a>
                        </div>

                        <table id="" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th class="col-sm-1">No</th>
                            <th class="col-sm-3">Mata Pelajaran</th>
                            <th class="col-md-2">KKM</th>
                            <th class="col-sm-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>';
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $content .= '<tr>
                                    <td>' . $no . '</td>
                                    <td>' . $row["nama_mapel"] . '</td>
                                    <td>' . $row["kkm"] . '</td>
                                    <td><a href="edit.php?id_mapel=' . $row['id_mapel'] . '" class="btn btn-warning btn-sm ">Edit</a>
                                        <button onclick="confirmDelete(' . $row['id_mapel'] . ')" class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>';
                                $no++;
                            }
                        $content .= '</tbody>
                    </table>
                </div>
            </section>

            <script>
                function confirmDelete(id_mapel) {
                    var confirmation = confirm("Apakah Anda yakin ingin menghapus data ini?");
                    if (confirmation) {
                        window.location.href = "delete.php?id_mapel=" + id_mapel;
                    }
                }
            </script>

        </div>';

View::section('content', $content);
// Render the home view
View::extend('views/layout.php');
