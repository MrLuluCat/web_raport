<?php
require '../../view.php';
require_once('../../koneksi.php');
// session_start();

// // Kode untuk memeriksa apakah pengguna sudah login sebelumnya
// if (!isset($_SESSION['siswa_username'])) {
//     header("Location: login.php");
//     exit();
// }

// Kode untuk mengambil informasi siswa dari database berdasarkan username


// Mengambil data dari tabel "siswa"
$query_siswa = "SELECT * FROM siswa";
$result_siswa = mysqli_query($conn, $query_siswa);

$query_guru = "SELECT * FROM guru";
$result_guru = mysqli_query($conn, $query_guru);

$query_kelas = "SELECT * FROM kelas";
$result_kelas = mysqli_query($conn, $query_kelas);

// Mengambil data dari tabel "mapel"
$query_mapel = "SELECT * FROM mapel";
$result_mapel = mysqli_query($conn, $query_mapel);

// Mengambil Data dari table untuk dimasukkan ke variable


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil data dari form
    $id_siswa = $_POST['id_siswa'];
    $nilai_rapot = $_POST['nilai_rapot'];

    // Loop untuk memasukkan data ke database
    for ($i = 0; $i < count($nilai_rapot); $i++) {
        $id_mapel = $_POST['id_mapel'][$i];
        $nilai    = $_POST['nilai_rapot'][$i];

        // Query untuk memasukkan data ke tabel "grade"
        $queryGrade = "INSERT INTO grade (id_siswa, id_mapel, nilai_rapot) VALUES ('$id_siswa', '$id_mapel', '$nilai')";

        // Jalankan query
        mysqli_query($conn, $queryGrade);
    }

    header('location :index.php');
}


// Define sections
View::section('title', 'From Input Rapot');
View::section('contentTittle', 'Form Input Rapot');
View::section('contentRoot', '../dashboard.php');
View::section('contentLink', 'Dashboard');
View::section('contentLinkActive', 'Form Input Rapot');

View::section('css', '../../');
View::section('nav', '../');

$content2 = '';
$content3 = '';
$content4 = '';
$content5 = '';
$content = '';

$content1 = '<section class="content">
<div class="my-3 p-3 bg-body rounded shadow-sm">
<form action="" method="POST">
    <div class="form-2-container section-container section-container-gray-bg">
        <div class="container">
            <div class="row">
                <div class="col form-2 section-description wow fadeIn">
                </div>
            </div>
            <div class="row">
                <div class="col form-2-box wow fadeInUp">
                    
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Input Data Rapot -->';
                                $content1 .= '<fieldset class="form-group border p-3">
                                    <legend class="w-auto px-2">Input Data Siswa</legend>
                                    <div class="form-group">
                                        <label for="id_siswa">Pilih Siswa:</label>

                                        <select class="custom-select" name="id_siswa" id="id_siswa" required>';

                                        while ($row_siswa = mysqli_fetch_assoc($result_siswa)) {
                                            $content1 .= '<option value="' . $row_siswa['id_siswa'] . '">';
                                            $content1 .= $row_siswa['nama_siswa'];
                                            $content1 .= '</option>';
                                        }

                                        $content1 .= '</select>
                                                    </div>
                                                        <div class="form-group">
                                                            <label for="id_guru">Pilih Wali Kelas:</label>

                                                        <select class="custom-select" name="id_guru" id="id_guru" required>';

                                        while ($row_guru = mysqli_fetch_assoc($result_guru)) {
                                            $content2 .= '<option value="' . $row_guru['id_guru'] . '">';
                                            $content2 .= $row_guru['nama_guru'];
                                            $content2 .= '</option>';
                                        }

                                        $content2 .= '</select>

                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="id_kelas">Pilih Kelas:</label>

                                        <select class="custom-select" name="id_kelas" id="id_kelas" required>';

                                    while ($row_kelas = mysqli_fetch_assoc($result_kelas)) {
                                        $content3 .= '<option value="' . $row_kelas['id_kelas'] . '">';
                                        $content3 .= $row_kelas['tingkat_kelas'] . ' - ' . $row_kelas['nama_kelas'];
                                        $content3 .= '</option>';
                                    }

                                    $content3 .= '</select>';


                                    $content3 .= '</div>';
                                    
                                    $content4 = '<div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="semester">Semester :</label>
                                            <select class="custom-select" name="semester" id="semester" required>
                                                <option value="ganjil">1 (Satu)</option>
                                                <option value="genap">2 (Dua)</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tahun_pelajaran">Tahun Pelajaran :</label>
                                    <select class="form-control" name="tahun_pelajaran" id="tahun_pelajaran">';
                                    for ($tahun = 1994; $tahun <= 2023; $tahun++) {
                                        $tahun_ajaran = $tahun . '/' . ($tahun + 1);
                                        $selected = ($tahun_ajaran == '2014/2015') ? 'selected' : '';
                                        $content4 .= '<option value="' . $tahun_ajaran . '" ' . $selected . '>' . $tahun_ajaran . '</option>';
                                    }
                                    $content4 .= '</select>

                                    </div>
                                    </div> ';

                        $content4 .= '<div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="tempat_terbit">Tempat Terbit:</label>
                                            <input type="text" class="form-control" id="tempat_terbit" name="tempat_terbit">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tanggal_terbit">Tanggal Terbit:</label>
                                            <input type="date" class="form-control" id="tanggal_terbit" name="tanggal_terbit">
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>';

                        $content5 .= '<div class="row">
                            <div class="col-md-12">
                                <!-- Input Grade -->
                                <fieldset class="form-group border p-3">
                                    <legend class="w-auto px-2">Input Grade</legend>
                                    <div class="row">';

                                    while ($row = mysqli_fetch_assoc($result_mapel)) {
                                        $id_mapel = $row['id_mapel'];
                                        $nama_mapel = $row['nama_mapel'];

                                        $content5 .= '<div class="col-md-4">
                                        <fieldset class="form-group border p-3">
                                            <legend class="w-auto px-2 legend-md">
                                                ' . $nama_mapel . '
                                            </legend>
                                            <input type="hidden" name="id_mapel[]" value="' . $id_mapel . '">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label legend-sm" for="nilai_rapot_' . $id_mapel . '">Input Nilai :</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="number" id="nilai_rapot_' . $id_mapel . '" name="nilai_rapot[]" required>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>';
                                    }

            $content5 .= '</div>
                        </fieldset>
                        </div>
                        </div>';

            $content .= '<div class="row">
                            <div class="col-md-12">
                                <!-- Input Catatan -->
                                <fieldset class="form-group border p-3">
                                    <legend class="w-auto px-2">Input Catatan</legend>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!-- Kegiatan -->
                                            <fieldset class="form-group border p-3">
                                                <legend class="w-auto px-2">Kegiatan</legend>
                                                <div class="form-column">
                                                    <div class="form-group col-md-12">
                                                        <label for="jenis_kegiatan">Jenis Kegiatan :</label>
                                                        <input type="text" class="form-control" id="jenis_kegiatan" name="jenis_kegiatan">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="nilai_kegiatan">Nilai:</label>
                                                        <select class="custom-select" name="nilai_kegiatan" id="nilai_kegiatan" required>
                                                            <option value="K">K</option>
                                                            <option value="C">C</option>
                                                            <option value="B">B</option>
                                                            <option value="SB">SB</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="deskripsi_kegiatan">Deskripsi :</label>
                                                        <input type="text" class="form-control" id="deskripsi_kegiatan" name="deskripsi_kegiatan" readonly>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-4">
                                            <!-- Ahlak & Kepribadian -->
                                            <fieldset class="form-group border p-3">
                                                <legend class="w-auto px-2">Ahlak & Kepribadian</legend>
                                                <div class="form-coloumn">
                                                    <div class="form-row mx-2">
                                                        <div class="form-group col-md-6">
                                                            <label for="nilai_ahlak">Ahlak:</label>
                                                            <select class="custom-select" name="nilai_ahlak" id="nilai_ahlak" required>
                                                                <option value="K">K</option>
                                                                <option value="C">C</option>
                                                                <option value="B">B</option>
                                                                <option value="SB">SB</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="nilai_kepribadian">Kepribadian:</label>
                                                            <select class="custom-select" name="nilai_kepribadian" id="nilai_kepribadian" required>
                                                                <option value="K">K</option>
                                                                <option value="C">C</option>
                                                                <option value="B">B</option>
                                                                <option value="SB">SB</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="deskripsi_ahlak">Deskripsi Ahlak:</label>
                                                        <input type="text" class="form-control" id="deskripsi_ahlak" name="deskripsi_ahlak" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="deskripsi_kepribadian">Deskripsi Kepribadian:</label>
                                                        <input type="text" class="form-control" id="deskripsi_kepribadian" name="deskripsi_kepribadian" readonly>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-4">
                                            <!-- Ketidakhadiran -->
                                            <fieldset class="form-group border p-3">
                                                <legend class="w-auto px-2">Ketidakhadiran</legend>
                                                <div class="form-coloumn">
                                                    <div class="form-group col-md-12">
                                                        <label for="jenis_kegiatan">Sakit :</label>
                                                        <input type="number" class="form-control" id="jenis_kegiatan" name="jenis_kegiatan">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="jenis_kegiatan">Izin :</label>
                                                        <input type="number" class="form-control" id="jenis_kegiatan" name="jenis_kegiatan">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="jenis_kegiatan">Tanpa Keterangan :</label>
                                                        <input type="number" class="form-control" id="jenis_kegiatan" name="jenis_kegiatan">
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-12">
                                            <!-- Catatan -->
                                            <fieldset class="form-group border p-3">
                                                <legend class="w-auto px-2">Catatan</legend>
                                                <div class="form-group">
                                                    <label for="catatan_wali_kelas">Catatan Wali Kelas :</label>
                                                    <textarea class="form-control" id="catatan_wali_kelas" placeholder="" name="catatan_wali_kelas"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="harapan_orangtua">Harapan Orang Tua / Wali Murid :</label>
                                                    <textarea class="form-control" id="harapan_orangtua" placeholder="" name="harapan_orangtua"></textarea>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>



                                </fieldset>
                            </div>


                        </div>

                        <div class="row">
                        <!-- Submit Button  -->
                        <div class="form-group row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-customized">Subscribe</button>
                            </div>
                        </div>
                        </div>

                        
                    
                </div>
            </div>
        </div>
    </div>
</form>
</div>
</section>
</div>';


View::section('content1', $content1);
View::section('content2', $content2);
View::section('content3', $content3);
View::section('content4', $content4);
View::section('content5', $content5);
View::section('content', $content);
// Render the home view
View::extend('views/layoutInput.php');