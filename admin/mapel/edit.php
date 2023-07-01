<?php
require '../../view.php';
require_once('../../koneksi.php');

$id_mapel = isset($_GET["id_mapel"]) ? $_GET["id_mapel"] : "";

// Ambil ID Kelas dari query database langsung
$query = "SELECT * FROM mapel WHERE id_mapel = '$id_mapel'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $nama_mapel = $row["nama_mapel"];
    $kkm = $row["kkm"];
} else {
    // Jika informasi siswa tidak ditemukan, lakukan penanganan sesuai kebutuhan Anda
    echo "Informasi mapel tidak ditemukan.";
    exit();
}


if (isset($_POST['submit'])) {
    $nama_mapel   = isset($_POST['nama_mapel']) ? $_POST['nama_mapel'] : "";
    $kkm          = isset($_POST['kkm']) ? $_POST['kkm'] : "";

    $query = "UPDATE mapel SET 
                nama_mapel  = '$nama_mapel', 
                kkm         = '$kkm'
            WHERE id_mapel = '$id_mapel'";

    $result = mysqli_query($conn, $query);

    // Tambahkan pesan sukses/kesalahan
    if ($result) {
        $pesan = "Data Bidang Studi berhasil Di Update.";
        header("Location:index.php");
    } else {
        $pesan = "Terjadi kesalahan saat menambahkan data kelas.";
    }
}

View::section('title', 'Edit Mapel');
View::section('contentTittle', 'Edit');
View::section('contentRoot', 'javascript:javascript:history.go(-1)');
View::section('contentLink', 'Mata Pelajaran');
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
                                    <div>
                                    <label class="mb-2">Bidang Studi</label>
                                    <div class="form-floating mb-3">
                                        <input
                                        type="text"
                                        class="form-control"
                                        id="nama_mapel"
                                        name="nama_mapel"
                                        value="' . $nama_mapel . '"
                                        required
                                        />
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">KKM</label>
                                    <div class="form-floating mb-3">
                                        <input
                                        type="text"
                                        class="form-control"
                                        id="kkm"
                                        name="kkm"
                                        value="' . $kkm . '"
                                        required
                                        />
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
