<?php

require '../../view.php';
require_once('../../koneksi.php');


$query = "SELECT * FROM kelas";
$result = mysqli_query($conn, $query);

// Define sections
View::section('title', 'Kelas');
View::section('contentTittle', 'Kelas');
View::section('contentRoot', '../dashboard.php');
View::section('contentLink', 'Dashboard');
View::section('contentLinkActive', 'Kelas');

View::section('css', '../../');
View::section('nav', '../');
// View::section('header', 'This is the header of the Home page');

$content = '

        <section class="content">
                <div class="my-3 p-3 bg-body rounded shadow-sm">

                    <div class="pb-3">
                        <a href="create.php" class="btn btn-success">+ Tambah Kelas</a>
                    </div>

                    <table id="" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="col-md-1">No</th>
                                <th class="col-sm-1">Tingkat Kelas</th>
                                <th class="col-md-2">Nama Kelas</th>
                                <th class="col-sm-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>';
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $content .= '<tr>
                                    <td>' . $no . '</td>
                                    <td>' . $row["tingkat_kelas"] . '</td>
                                    <td>' . $row["nama_kelas"] . '</td>
                                    <td><a href="edit.php?id_kelas=' . $row['id_kelas'] . '" class="btn btn-warning btn-sm ">Edit</a>
                                        <button onclick="confirmDelete(' . $row['id_kelas'] . ')" class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>';
                                $no++;
                            }
            $content .= '</tbody>
                    </table>
                </div>
            </section>

            <script>
                function confirmDelete(id_kelas) {
                    var confirmation = confirm("Apakah Anda yakin ingin menghapus data ini?");
                    if (confirmation) {
                        window.location.href = "delete.php?id_kelas=" + id_kelas;
                    }
                }
            </script>

        </div>';

View::section('content', $content);
// Render the home view
View::extend('views/layout.php');
