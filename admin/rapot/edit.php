<?php
// Koneksi ke database
require 'koneksi.php';

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan nilai dari form
    $id_siswa = $_POST['id_siswa'];
    $id_guru = $_POST['id_guru'];
    $id_kelas = $_POST['id_kelas'];
    $semester = $_POST['semester'];
    $tahun_pelajaran = $_POST['tahun_pelajaran'];
    $tempat_terbit = $_POST['tempat_terbit'];
    $tanggal_terbit = $_POST['tanggal_terbit'];
    $catatan_wali_kelas = $_POST['catatan_wali_kelas'];
    $harapan_wali_murid = $_POST['harapan_wali_murid'];
    $id_mapel = $_POST['id_mapel'];
    $nilai_rapot = $_POST['nilai_rapot'];
    $jenis_kegiatan = $_POST['jenis_kegiatan'];
    $nilai_kegiatan = $_POST['nilai_kegiatan'];
    $deskripsi_kegiatan = $_POST['deskripsi_kegiatan'];
    // $ahlak = $_POST['ahlak'];
    // $kepribadian = $_POST['kepribadian'];
    $deskripsi_ahlak = $_POST['nilai_ahlak'];
    $deskripsi_kepribadian = $_POST['nilai_kepribadian'];
    $sakit = $_POST['sakit'];
    $izin = $_POST['izin'];
    $tanpa_keterangan = $_POST['tanpa_keterangan'];

    // Query INSERT untuk tabel Kegiatan
    $query_kegiatan = "INSERT INTO kegiatan (id_siswa, jenis_kegiatan, nilai_kegiatan, deskripsi_kegiatan)
                       VALUES ('$id_siswa', '$jenis_kegiatan', '$nilai_kegiatan', '$deskripsi_kegiatan')";
    // Lakukan eksekusi query INSERT untuk tabel Kegiatan
    $result_kegiatan = mysqli_query($conn, $query_kegiatan);

    // Mendapatkan ID Kegiatan yang baru saja di-generate
    $id_kegiatan = mysqli_insert_id($conn);

    // Query INSERT untuk tabel AhlakKepribadian
    $query_ahlak_kepribadian = "INSERT INTO ahlak_kepribadian (id_siswa, nilai_ahlak, nilai_kepribadian)
                                VALUES ('$id_siswa', '$deskripsi_ahlak', '$deskripsi_kepribadian')";
    // Lakukan eksekusi query INSERT untuk tabel AhlakKepribadian
    $result_ahlak_kepribadian = mysqli_query($conn, $query_ahlak_kepribadian);

    // Mendapatkan ID AhlakKepribadian yang baru saja di-generate
    $id_ak = mysqli_insert_id($conn);

    // Query INSERT untuk tabel Ketidakhadiran
    $query_ketidakhadiran = "INSERT INTO Ketidakhadiran (id_siswa, sakit, izin, tanpa_keterangan)
                             VALUES ('$id_siswa', '$sakit', '$izin', '$tanpa_keterangan')";
    // Lakukan eksekusi query INSERT untuk tabel Ketidakhadiran
    $result_ketidakhadiran = mysqli_query($conn, $query_ketidakhadiran);

    // Mendapatkan ID Ketidakhadiran yang baru saja di-generate
    $id_ketidakhadiran = mysqli_insert_id($conn);

    // // Query INSERT untuk tabel Catatan
    // $query_catatan = "INSERT INTO Catatan (id_siswa, catatan_wali_kelas, harapan_wali_murid)
    //                   VALUES ('$id_siswa', '$catatan_wali_kelas', '$harapan_wali_murid')";
    // // Lakukan eksekusi query INSERT untuk tabel Catatan
    // $result_catatan = mysqli_query($conn, $query_catatan);

    // Mendapatkan ID Catatan yang baru saja di-generate
    $id_catatan = mysqli_insert_id($conn);

    // Query INSERT untuk tabel Rapot
    $query_rapot = "INSERT INTO Rapot (id_siswa, id_guru, id_kelas, semester, tahun_pelajaran, tempat_terbit, tanggal_terbit, id_kegiatan, id_ak, id_ketidakhadiran, catatan_wali_kelas, harapan_wali_murid)
                   VALUES ('$id_siswa', '$id_guru', '$id_kelas', '$semester', '$tahun_pelajaran', '$tempat_terbit', '$tanggal_terbit', '$id_kegiatan', '$id_ak', '$id_ketidakhadiran', '$catatan_wali_kelas', '$harapan_wali_murid')";

    // Lakukan eksekusi query INSERT
    $result_rapot = mysqli_query($conn, $query_rapot);

    // Cek apakah INSERT berhasil atau tidak
    if ($result_rapot) {
        $id_rapot = mysqli_insert_id($conn); // Mendapatkan ID Rapot yang baru saja di-generate

        // Query INSERT untuk tabel Grade
        for ($i = 0; $i < count($id_mapel); $i++) {
            $query_grade = "INSERT INTO Grade (id_rapot, id_siswa, id_mapel, nilai_rapot)
                            VALUES ('$id_rapot', '$id_siswa', '$id_mapel[$i]', '$nilai_rapot[$i]')";
            // Lakukan eksekusi query INSERT untuk tabel Grade
            $result_grade = mysqli_query($conn, $query_grade);
        }

        // Jika semua INSERT berhasil
        echo "Data Rapot berhasil disimpan.";
        header('location: admin/rapot/index.php');
        exit();
    } else {
        // Penanganan jika INSERT gagal
        echo "Terjadi kesalahan saat menyimpan data Rapot.";
        // Mengganti aksi yang sesuai, seperti menampilkan pesan error, melakukan rollback, atau melakukan tindakan lainnya.
    }
}

// Menutup koneksi ke database
mysqli_close($conn);
?>


<!DOCTYPE html>
<html>

<head>
    <title>Input Rapot</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form action="" method="POST">
        <div class="form-2-container section-container section-container-gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col form-2 section-description wow fadeIn">
                        <h2>Form Input Rapot</h2>
                        <div class="divider-1 wow fadeInUp"><span></span></div>
                        </br>
                        <!-- <p>Form </p> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col form-2-box wow fadeInUp">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Input Data Rapot -->
                                    <fieldset class="form-group border p-3">
                                        <legend class="w-auto px-2">Input Data Rapot</legend>
                                        <div class="form-group">
                                            <label for="id_siswa">Pilih Siswa:</label>
                                            <select class="custom-select" name="id_siswa" id="id_siswa" required>
                                                <?php while ($row_siswa = mysqli_fetch_assoc($result_siswa)) : ?>
                                                    <option value="<?php echo $row_siswa['id_siswa']; ?>">
                                                        <?php echo $row_siswa['nama_siswa']; ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_guru">Pilih Wali Kelas:</label>
                                            <select class="custom-select" name="id_guru" id="id_guru" required>
                                                <?php while ($row_guru = mysqli_fetch_assoc($result_guru)) : ?>
                                                    <option value="<?php echo $row_guru['id_guru']; ?>">
                                                        <?php echo $row_guru['nama_guru']; ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_kelas">Pilih Kelas:</label>
                                            <select class="custom-select" name="id_kelas" id="id_kelas" required>
                                                <?php while ($row_kelas = mysqli_fetch_assoc($result_kelas)) : ?>
                                                    <option value="<?php echo $row_kelas['id_kelas']; ?>">
                                                        <?= $row_kelas['tingkat_kelas'] . ' - ' . $row_kelas['nama_kelas']; ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="semester">Semester :</label>
                                                <select class="custom-select" name="semester" id="semester" required>
                                                    <option value="ganjil">1 (Satu)</option>
                                                    <option value="genap">2 (Dua)</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="tahun_pelajaran">Tahun Pelajaran :</label>
                                                <select class="form-control" name="tahun_pelajaran" id="tahun_pelajaran">
                                                    <?php
                                                    for ($tahun = 1994; $tahun <= 2023; $tahun++) {
                                                        $tahun_ajaran = $tahun . '/' . ($tahun + 1);
                                                        $selected = ($tahun_ajaran == '2014/2015') ? 'selected' : ''; // Menandai tahun ajaran yang dipilih sebagai default
                                                        echo '<option value="' . $tahun_ajaran . '" ' . $selected . '>' . $tahun_ajaran . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
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
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Input Grade -->
                                    <fieldset class="form-group border p-3">
                                        <legend class="w-auto px-2">Input Grade</legend>
                                        <div class="row">
                                            <?php
                                            // Loop untuk menghasilkan form berdasarkan jumlah data dari tabel "mapel"
                                            while ($row = mysqli_fetch_assoc($result_mapel)) {
                                                $id_mapel = $row['id_mapel'];
                                                $nama_mapel = $row['nama_mapel'];
                                            ?>
                                                <div class="col-md-4">
                                                    <fieldset class="form-group border p-3">
                                                        <legend class="w-auto px-2 legend-md">
                                                            <?php echo $nama_mapel; ?>
                                                        </legend>
                                                        <input type="hidden" name="id_mapel[]" value="<?php echo $id_mapel; ?>">
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label legend-sm" for="nilai_rapot_<?php echo $id_mapel; ?>">Input Nilai :</label>

                                                            <div class="col-sm-8">
                                                                <input class="form-control" type="number" id="nilai_rapot_<?php echo $id_mapel; ?>" name="nilai_rapot[]" required>
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
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
                                                                <select class="custom-select" name="ahlak" id="ahlak" required>
                                                                    <option value="K">K</option>
                                                                    <option value="C">C</option>
                                                                    <option value="B">B</option>
                                                                    <option value="SB">SB</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="nilai_kepribadian">Kepribadian:</label>
                                                                <select class="custom-select" name="kepribadian" id="kepribadian" required>
                                                                    <option value="K">K</option>
                                                                    <option value="C">C</option>
                                                                    <option value="B">B</option>
                                                                    <option value="SB">SB</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="deskripsi_ahlak">Deskripsi Ahlak:</label>
                                                            <input type="text" class="form-control" id="nilai_ahlak" name="nilai_ahlak" readonly>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="deskripsi_kepribadian">Deskripsi Kepribadian:</label>
                                                            <input type="text" class="form-control" id="nilai_kepribadian" name="nilai_kepribadian" readonly>
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
                                                            <input type="number" class="form-control" id="sakit" name="sakit">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="jenis_kegiatan">Izin :</label>
                                                            <input type="number" class="form-control" id="izin" name="izin">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="jenis_kegiatan">Tanpa Keterangan :</label>
                                                            <input type="number" class="form-control" id="tanpa_keterangan" name="tanpa_keterangan">
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
                                                        <textarea class="form-control" id="harapan_wali_murid" placeholder="" name="harapan_wali_murid"></textarea>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>



                                    </fieldset>
                                </div>


                            </div>

                            <div class="row">

                            </div>

                            <!-- Submit Button  -->
                            <div class="form-group row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary btn-customized">Subscribe</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        // Function to set description value based on selected value
        function setDescriptionValue(selectedValue, descriptionInput) {
            var description = '';
            switch (selectedValue) {
                case 'K':
                    description = 'Kurang';
                    break;
                case 'C':
                    description = 'Cukup';
                    break;
                case 'B':
                    description = 'Baik';
                    break;
                case 'SB':
                    description = 'Sangat Baik';
                    break;
            }
            descriptionInput.value = description;
        }

        // Get the select elements
        var nilaiKegiatanSelect = document.getElementById('nilai_kegiatan');
        var nilaiAhlakSelect = document.getElementById('ahlak');
        var nilaiKepribadianSelect = document.getElementById('kepribadian');

        // Get the input elements for deskripsi
        var deskripsiKegiatanInput = document.getElementById('deskripsi_kegiatan');
        var deskripsiAhlakInput = document.getElementById('nilai_ahlak');
        var deskripsiKepribadianInput = document.getElementById('nilai_kepribadian');

        // Add event listener to the select elements
        nilaiKegiatanSelect.addEventListener('change', function() {
            var selectedValue = nilaiKegiatanSelect.value;
            setDescriptionValue(selectedValue, deskripsiKegiatanInput);
        });

        nilaiAhlakSelect.addEventListener('change', function() {
            var selectedValue = nilaiAhlakSelect.value;
            setDescriptionValue(selectedValue, deskripsiAhlakInput);
        });

        nilaiKepribadianSelect.addEventListener('change', function() {
            var selectedValue = nilaiKepribadianSelect.value;
            setDescriptionValue(selectedValue, deskripsiKepribadianInput);
        });
    </script>

</body>

</html>