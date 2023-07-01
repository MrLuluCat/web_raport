<?php
require '../../view.php';
require_once('../../koneksi.php');

$query = "SELECT * FROM mapel";
$result = mysqli_query($conn, $query);

// if (mysqli_num_rows($result) > 0) {
//     $options = '';
//     while ($row = mysqli_fetch_assoc($result)) {
//         $kkm = $row['kkm'];
//         $namaGuru = $row['nama_guru'];

//         // Buat opsi dalam elemen select
//         $options .= '<option value="' . $idGuru . '">' . $namaGuru . '</option>';
//     }
// } else {
//     $options = '<option value="">Tidak ada data guru</option>';
// }

if (isset($_POST['submit'])) {
    // Sanitasi input
    $nama_mapel = mysqli_real_escape_string($conn, $_POST['nama_mapel']);
    $kkm        = mysqli_real_escape_string($conn, $_POST['kkm']);

    $query = "INSERT INTO mapel (nama_mapel, kkm) VALUES ('$nama_mapel', '$kkm')";
    $result = mysqli_query($conn, $query);

    // Tambahkan pesan sukses/kesalahan
    if ($result) {
        $pesan = "Data Bidang Studi berhasil ditambahkan.";
        header("Location:index.php");
    } else {
        $pesan = "Terjadi kesalahan saat menambahkan data kelas.";
    }
}

View::section('title', 'Create Mapel');
View::section('contentTittle', 'Create');
View::section('contentRoot', 'javascript:javascript:history.go(-1)');
View::section('contentLink', 'Mata Pelajaran');
View::section('contentLinkActive', 'Create');

View::section('css', '../../');
View::section('nav', '../');
// View::section('header', 'This is the header of the Home page');

$content = '

<section class="content">
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="POST">

                                <div class="form-group">
                                    <label class="mb-2">Mata Pelajaran</label>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" required autofocus/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="mb-2">KKM</label>
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control"id="kkm" name="kkm" required/>
                                    </div>
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

        
        