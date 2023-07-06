<?php
// Koneksi ke database
require '../../koneksi.php';

// Mendapatkan ID Rapot yang akan diupdate
$id_rapot = isset($_GET["id_rapot"]) ? $_GET["id_rapot"] : "";

$sql = "SELECT siswa.NISN, siswa.nama_siswa, guru.nama_guru AS wali_kelas, kelas.tingkat_kelas, kelas.nama_kelas, 
        rapot.id_rapot, rapot.tahun_pelajaran, rapot.semester
        FROM Rapot rapot
        JOIN Siswa siswa ON rapot.id_siswa = siswa.id_siswa
        JOIN Guru guru ON rapot.id_guru = guru.id_guru
        JOIN Kelas kelas ON rapot.id_kelas = kelas.id_kelas
        ORDER BY rapot.id_rapot ASC";

$result = $conn->query($sql);

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

// Mengambil data dari tabel "mapel"
$query_rapot = "SELECT * FROM rapot where id_rapot = '$id_rapot'";
$result_rapot = mysqli_query($conn, $query_rapot);
$row_rapot = mysqli_fetch_assoc($result_rapot);

$query_kegiatan = "SELECT * FROM kegiatan";
$result_kegiatan = mysqli_query($conn, $query_kegiatan);
$row_kegiatan = mysqli_fetch_assoc($result_kegiatan);

$query_ketidakhadiran = "SELECT * FROM ketidakhadiran";
$result_ketidakhadiran = mysqli_query($conn, $query_ketidakhadiran);
$row_ketidakhadiran = mysqli_fetch_assoc($result_ketidakhadiran);

$query_ahlak_kepribadian = "SELECT * FROM ahlak_kepribadian";
$result_ahlak_kepribadian = mysqli_query($conn, $query_ahlak_kepribadian);
$row_ahlak_kepribadian = mysqli_fetch_assoc($result_ahlak_kepribadian);

// $query_catatan = "SELECT * FROM catatan";
// $result_catatan = mysqli_query($conn, $query_catatan);
// $row_catatan = mysqli_fetch_assoc($result_catatan);

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
    $deskripsi_ahlak = $_POST['nilai_ahlak'];
    $deskripsi_kepribadian = $_POST['nilai_kepribadian'];
    $sakit = $_POST['sakit'];
    $izin = $_POST['izin'];
    $tanpa_keterangan = $_POST['tanpa_keterangan'];



    // Query UPDATE untuk tabel Rapot
    $query_rapot = "UPDATE Rapot
                    SET id_siswa = '$id_siswa',
                        id_guru = '$id_guru',
                        id_kelas = '$id_kelas',
                        semester = '$semester',
                        tahun_pelajaran = '$tahun_pelajaran',
                        tempat_terbit = '$tempat_terbit',
                        tanggal_terbit = '$tanggal_terbit',
                        catatan_wali_kelas = '$catatan_wali_kelas',
                        harapan_wali_murid = '$harapan_wali_murid'
                    WHERE id_rapot = '$id_rapot'";

    // Lakukan eksekusi query UPDATE
    $result_rapot = mysqli_query($conn, $query_rapot);

    // Cek apakah UPDATE berhasil atau tidak
    if ($result_rapot) {
        // Query SELECT untuk mendapatkan data Grade yang sudah ada berdasarkan id_rapot
        $query_existing_grades = "SELECT * FROM Grade WHERE id_rapot = '$id_rapot'";
        $result_existing_grades = mysqli_query($conn, $query_existing_grades);

        // Memeriksa apakah terdapat data Grade yang sudah ada
        if (mysqli_num_rows($result_existing_grades) > 0) {
            // Loop untuk mengupdate nilai_rapot pada setiap record Grade yang sudah ada
            $i = 0;
            while ($row_existing_grade = mysqli_fetch_assoc($result_existing_grades)) {
                $id_grade = $row_existing_grade['id_grade'];
                $id_mapel_existing = $row_existing_grade['id_mapel'];

                // Memperoleh nilai_rapot yang sesuai berdasarkan id_mapel
                $nilai_rapot_existing = $nilai_rapot[$i];

                // Query UPDATE untuk tabel Grade
                $query_update_grade = "UPDATE Grade SET nilai_rapot = '$nilai_rapot_existing' WHERE id_grade = '$id_grade'";
                $result_update_grade = mysqli_query($conn, $query_update_grade);

                $i++;
            }
        }

        // Memasukkan nilai_rapot baru jika ada
        for ($i = count($id_mapel_existing); $i < count($id_mapel); $i++) {
            $id_mapel_new = $id_mapel[$i];
            $nilai_rapot_new = $nilai_rapot[$i];

            // Query INSERT untuk tabel Grade
            $query_insert_grade = "INSERT INTO Grade (id_rapot, id_siswa, id_mapel, nilai_rapot)
                           VALUES ('$id_rapot', '$id_siswa', '$id_mapel_new', '$nilai_rapot_new')";
            // Lakukan eksekusi query INSERT untuk tabel Grade
            $result_insert_grade = mysqli_query($conn, $query_insert_grade);
        }

        // Query UPDATE untuk tabel Kegiatan
        $query_kegiatan = "UPDATE Kegiatan
                           SET jenis_kegiatan = '$jenis_kegiatan',
                               nilai_kegiatan = '$nilai_kegiatan',
                               deskripsi_kegiatan = '$deskripsi_kegiatan'
                           WHERE id_siswa = '$id_siswa'";
        $result_kegiatan = mysqli_query($conn, $query_kegiatan);

        // Query UPDATE untuk tabel AhlakKepribadian
        $query_ahlak_kepribadian = "UPDATE AhlakKepribadian
                                    SET nilai_ahlak = '$deskripsi_ahlak',
                                        nilai_kepribadian = '$deskripsi_kepribadian'
                                    WHERE id_siswa = '$id_siswa'";
        $result_ahlak_kepribadian = mysqli_query($conn, $query_ahlak_kepribadian);

        // Query UPDATE untuk tabel Ketidakhadiran
        $query_ketidakhadiran = "UPDATE Ketidakhadiran
                                 SET sakit = '$sakit',
                                     izin = '$izin',
                                     tanpa_keterangan = '$tanpa_keterangan'
                                 WHERE id_siswa = '$id_siswa'";
        $result_ketidakhadiran = mysqli_query($conn, $query_ketidakhadiran);

        // Jika semua UPDATE berhasil
        echo "Data Rapot berhasil diupdate.";
        header('location: index.php');
        exit();
    } else {
        // Penanganan jika UPDATE gagal
        echo "Terjadi kesalahan saat mengupdate data Rapot.";
        // Mengganti aksi yang sesuai, seperti menampilkan pesan error, melakukan rollback, atau melakukan tindakan lainnya.
    }
}

// ...

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

                                        <!-- Tampilkan opsi siswa dengan pilihan yang sesuai -->
                                        <div class="form-group">
                                            <label for="id_siswa">Pilih Siswa:</label>
                                            <select class="custom-select" name="id_siswa" id="id_siswa" required>
                                                <?php while ($row_siswa = mysqli_fetch_assoc($result_siswa)) : ?>
                                                    <?php $selected = ($row_siswa['id_siswa'] == $row_rapot['id_siswa']) ? 'selected' : ''; ?>
                                                    <option value="<?php echo $row_siswa['id_siswa']; ?>" <?php echo $selected; ?>>
                                                        <?php echo $row_siswa['nama_siswa']; ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>

                                        <!-- Tampilkan opsi guru dengan pilihan yang sesuai -->
                                        <div class="form-group">
                                            <label for="id_guru">Pilih Wali Kelas:</label>
                                            <select class="custom-select" name="id_guru" id="id_guru" required>
                                                <?php while ($row_guru = mysqli_fetch_assoc($result_guru)) : ?>
                                                    <?php $selected = ($row_guru['id_guru'] == $row_rapot['id_guru']) ? 'selected' : ''; ?>
                                                    <option value="<?php echo $row_guru['id_guru']; ?>" <?php echo $selected; ?>>
                                                        <?php echo $row_guru['nama_guru']; ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>

                                        <!-- Tampilkan opsi kelas dengan pilihan yang sesuai -->
                                        <div class="form-group">
                                            <label for="id_kelas">Pilih Kelas:</label>
                                            <select class="custom-select" name="id_kelas" id="id_kelas" required>
                                                <?php while ($row_kelas = mysqli_fetch_assoc($result_kelas)) : ?>
                                                    <?php $selected = ($row_kelas['id_kelas'] == $row_rapot['id_kelas']) ? 'selected' : ''; ?>
                                                    <option value="<?php echo $row_kelas['id_kelas']; ?>" <?php echo $selected; ?>>
                                                        <?= $row_kelas['tingkat_kelas'] . ' - ' . $row_kelas['nama_kelas']; ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>


                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="semester">Semester :</label>
                                                <select class="custom-select" id="semester" name="semester" required>
                                                    <option value="ganjil" <?php echo ($row_rapot['semester'] === "ganjil") ? "selected" : ""; ?>>1 (Satu)</option>
                                                    <option value="genap" <?php echo ($row_rapot['semester'] === "genap") ? "selected" : ""; ?>>2 (Dua)</option>
                                                </select>


                                                <!-- <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                                    <option value="Laki-laki" ' . ($jenis_kelamin === "Laki-laki" ? "selected" : "") . '>Laki-laki</option>
                                                    <option value="Perempuan" ' . ($jenis_kelamin === "Perempuan" ? "selected" : "") . '>Perempuan</option>
                                                </select> -->
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="tahun_pelajaran">Tahun Pelajaran :</label>
                                                <select class="form-control" name="tahun_pelajaran" id="tahun_pelajaran">
                                                    <?php
                                                    for ($tahun = 1994; $tahun <= 2023; $tahun++) {
                                                        $tahun_ajaran = $tahun . '/' . ($tahun + 1);
                                                        $selected = ($tahun_ajaran == '' . $row_rapot['tahun_pelajaran'] . '') ? 'selected' : ''; // Menandai tahun ajaran yang dipilih sebagai default
                                                        echo '<option value="' . $tahun_ajaran . '" ' . $selected . '>' . $tahun_ajaran . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="tempat_terbit">Tempat Terbit:</label>
                                                <input type="text" class="form-control" id="tempat_terbit" name="tempat_terbit" value="<?= $row_rapot['tempat_terbit'] ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="tanggal_terbit">Tanggal Terbit:</label>
                                                <input type="date" class="form-control" id="tanggal_terbit" name="tanggal_terbit" value="<?= $row_rapot['tanggal_terbit'] ?>">
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

                                                // Mengambil nilai dari tabel "grade" berdasarkan id_rapot dan id_mapel
                                                $query_grade = "SELECT * FROM grade WHERE id_rapot = $id_rapot AND id_mapel = $id_mapel";
                                                $result_grade = mysqli_query($conn, $query_grade);
                                                $row_grade = mysqli_fetch_assoc($result_grade);
                                                $nilai = $row_grade['nilai_rapot'];

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
                                                                <input class="form-control" type="number" id="nilai_rapot_<?php echo $id_mapel; ?>" name="nilai_rapot[]" value="<?php echo $nilai; ?>" required>
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
                                                            <?php $row_kegiatan['id_kegiatan'] == $row_rapot['id_kegiatan'] ? 'selected' : ''; ?>
                                                            <input type="text" class="form-control" id="jenis_kegiatan" name="jenis_kegiatan" value="<?= $row_kegiatan['jenis_kegiatan'] ?>">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="nilai_kegiatan">Nilai:</label>
                                                            <select class="custom-select" name="nilai_kegiatan" id="nilai_kegiatan" required>
                                                                <option value="K" <?php echo ($row_kegiatan['nilai_kegiatan'] === "K") ? "selected" : ""; ?>>K</option>
                                                                <option value="C" <?php echo ($row_rapot['nilai_kegiatan'] === "C") ? "selected" : ""; ?>>C</option>
                                                                <option value="B" <?php echo ($row_kegiatan['nilai_kegiatan'] === "B") ? "selected" : ""; ?>>B</option>
                                                                <option value="SB" <?php echo ($row_kegiatan['nilai_kegiatan'] === "SB") ? "selected" : ""; ?>>SB</option>
                                                            </select>

                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="deskripsi_kegiatan">Deskripsi :</label>
                                                            <input type="text" class="form-control" id="deskripsi_kegiatan" name="deskripsi_kegiatan" value="<?= $row_kegiatan['deskripsi_kegiatan'] ?>" readonly>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>

                                            <div class="col-md-4">
                                                <!-- Ahlak & Kepribadian -->
                                                <?php $row_ahlak_kepribadian['id_ak'] == $row_rapot['id_rapot'] ? 'selected' : ''; ?>
                                                <fieldset class="form-group border p-3">
                                                    <legend class="w-auto px-2">Ahlak & Kepribadian</legend>
                                                    <div class="form-coloumn">
                                                        <div class="form-row mx-2">
                                                            <div class="form-group col-md-6">
                                                                <label for="nilai_ahlak">Ahlak:</label>
                                                                <select class="custom-select" name="ahlak" id="ahlak" required>
                                                                    <option value="K" <?php echo ($row_ahlak_kepribadian['nilai_ahlak'] === "K") ? "selected" : ""; ?>>K</option>
                                                                    <option value="C" <?php echo ($row_ahlak_kepribadian['nilai_ahlak'] === "C") ? "selected" : ""; ?>>C</option>
                                                                    <option value="B" <?php echo ($row_ahlak_kepribadian['nilai_ahlak'] === "B") ? "selected" : ""; ?>>B</option>
                                                                    <option value="SB" <?php echo ($row_ahlak_kepribadian['nilai_ahlak'] === "SB") ? "selected" : ""; ?>>SB</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="nilai_kepribadian">Kepribadian:</label>
                                                                <select class="custom-select" name="kepribadian" id="kepribadian" required>
                                                                    <option value="K" <?php echo ($row_ahlak_kepribadian['nilai_kepribadian'] === "K") ? "selected" : ""; ?>>K</option>
                                                                    <option value="C" <?php echo ($row_ahlak_kepribadian['nilai_kepribadian'] === "C") ? "selected" : ""; ?>>C</option>
                                                                    <option value="B" <?php echo ($row_ahlak_kepribadian['nilai_kepribadian'] === "B") ? "selected" : ""; ?>>B</option>
                                                                    <option value="SB" <?php echo ($row_ahlak_kepribadian['nilai_kepribadian'] === "SB") ? "selected" : ""; ?>>SB</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="deskripsi_ahlak">Deskripsi Ahlak:</label>
                                                            <input type="text" class="form-control" id="nilai_ahlak" name="nilai_ahlak" value="<?= $row_ahlak_kepribadian['nilai_ahlak'] ?>" readonly>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="deskripsi_kepribadian">Deskripsi Kepribadian:</label>
                                                            <input type="text" class="form-control" id="nilai_kepribadian" name="nilai_kepribadian" value="<?= $row_ahlak_kepribadian['nilai_kepribadian'] ?>" readonly>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>

                                            <div class="col-md-4">
                                                <!-- Ketidakhadiran -->
                                                <?php $row_ketidakhadiran['id_ketidakhadiran'] == $row_rapot['id_ketidakhadiran'] ? 'selected' : ''; ?>
                                                <fieldset class="form-group border p-3">
                                                    <legend class="w-auto px-2">Ketidakhadiran</legend>
                                                    <div class="form-coloumn">
                                                        <div class="form-group col-md-12">
                                                            <label for="jenis_kegiatan">Sakit :</label>
                                                            <input type="number" class="form-control" id="sakit" name="sakit" value="<?= $row_ketidakhadiran['sakit'] ?>">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="jenis_kegiatan">Izin :</label>
                                                            <input type="number" class="form-control" id="izin" name="izin" value="<?= $row_ketidakhadiran['izin'] ?>">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="jenis_kegiatan">Tanpa Keterangan :</label>
                                                            <input type="number" class="form-control" id="tanpa_keterangan" name="tanpa_keterangan" value="<?= $row_ketidakhadiran['tanpa_keterangan'] ?>">
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
                                                        <textarea class="form-control" id="catatan_wali_kelas" placeholder="" name="catatan_wali_kelas" value=""><?= $row_rapot['catatan_wali_kelas'] ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="harapan_orangtua">Harapan Orang Tua / Wali Murid :</label>
                                                        <textarea class="form-control" id="harapan_wali_murid" placeholder="" name="harapan_wali_murid" value=""><?= $row_rapot['harapan_wali_murid'] ?></textarea>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>

                                    </fieldset>
                                </div>

                            </div>

                    </div>

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