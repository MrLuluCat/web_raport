<?php
require '../../view.php';
require_once('../../koneksi.php');

// Ambil ID Kelas dari URL
// $id_kelas = $_GET['id_kelas'];
$id_kelas = isset($_GET["id_kelas"]) ? $_GET["id_kelas"] : "";

// Ambil ID Kelas dari query database langsung
$query = "SELECT * FROM kelas WHERE id_kelas = '$id_kelas'";
$result = mysqli_query($conn, $query);
$kelas = mysqli_fetch_assoc($result);

// Pastikan data kelas ada sebelum melanjutkan
if (!$kelas) {
    echo "Data kelas tidak ditemukan.";
    exit;
}

// Update data kelas
if (isset($_POST['submit'])) {
    $tingkat_kelas = mysqli_real_escape_string($conn, $_POST['tingkat_kelas']);
    $nama_kelas = mysqli_real_escape_string($conn, $_POST['nama_kelas']);

    $query = "UPDATE kelas 
    SET tingkat_kelas='$tingkat_kelas', nama_kelas='$nama_kelas' 
    WHERE id_kelas='$id_kelas'";
    $result = mysqli_query($conn, $query);

    // Tambahkan pesan sukses/kesalahan
    if ($result) {
        $pesan = "Data kelas berhasil diperbarui.";
        header("Location: index.php");
    } else {
        $pesan = "Terjadi kesalahan saat memperbarui data kelas.";
    }
}

// Define sections
View::section('title', 'Kelas');
View::section('contentTittle', 'Edit');
View::section('contentRoot', 'javascript:javascript:history.go(-1)');
View::section('contentLink', 'Kelas');
View::section('contentLinkActive', 'Edit');

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
                                    <label for="tingkat_kelas">Tingkat Kelas:</label>
                                    <!-- <input type="text" class="form-control" id="tingkat_kelas" name="tingkat_kelas"> -->
                                    <select class="form-control" id="tingkat_kelas" name="tingkat_kelas">
                                        <option value="Kelas 7" ' . ($kelas['tingkat_kelas'] == 'Kelas 7' ? 'selected' : '') . '>Kelas 7</option>
                                        <option value="Kelas 8" ' . ($kelas['tingkat_kelas'] == 'Kelas 8' ? 'selected' : '') . '>Kelas 8</option>
                                        <option value="Kelas 9" ' . ($kelas['tingkat_kelas'] == 'Kelas 9' ? 'selected' : '') . '>Kelas 9</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_kelas">Nama Kelas:</label>
                                    <input type="text" value="' .$kelas['nama_kelas']. '" class="form-control" id="nama_kelas" name="nama_kelas">
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </form>
                        </div>
                    </div>

                </div>
            </section>
        </div>
        </div>';

View::section('content', $content);
// Render the home view
View::extend('views/layout.php');
