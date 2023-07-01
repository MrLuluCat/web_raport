<?php
// Koneksi ke database
require 'koneksi.php';

// Mengambil data dari tabel "siswa"
$query_siswa = "SELECT * FROM siswa";
$result_siswa = mysqli_query($conn, $query_siswa);

// Mengambil data dari tabel "mapel"
$query = "SELECT * FROM mapel";
$result = mysqli_query($conn, $query);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil data dari form
    $id_siswa = $_POST['id_siswa'];
    $nilai_rapot = $_POST['nilai_rapot'];

    // Loop untuk memasukkan data ke database
    for ($i = 0; $i < count($nilai_rapot); $i++) {
        $id_mapel = $_POST['id_mapel'][$i];
        $nilai    = $_POST['nilai_rapot'][$i];

        // Query untuk memasukkan data ke tabel "grade"
        $query = "INSERT INTO grade (id_siswa, id_mapel, nilai_rapot) VALUES ('$id_siswa', '$id_mapel', '$nilai')";

        // Jalankan query
        mysqli_query($conn, $query);
    }
}
// Menutup koneksi ke database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Form 1 -->
    <div class="form-1-container section-container">
        <div class="container">
            <div class="row">
                <div class="col form-1 section-description wow fadeIn">
                    <h2>Form 1</h2>
                    <div class="divider-1 wow fadeInUp"><span></span></div>
                    <p>A form with 2 "fieldset"-s and 2 "legend"-s: "User's credentials" and "User's preferences".</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1 form-1-box wow fadeInUp">

                    <form action="" method="post">
                        <!-- User's Credentials  -->
                        <fieldset class="form-group border p-3">
                            <legend class="w-auto px-2">Input Siswa</legend>
                            <label for="id_siswa">Pilih Siswa:</label>
                            <select class="custom-select" name="id_siswa" id="id_siswa" required>
                                <?php while ($row_siswa = mysqli_fetch_assoc($result_siswa)) : ?>
                                    <option value="<?php echo $row_siswa['id_siswa']; ?>"><?php echo $row_siswa['nama_siswa']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </fieldset>
                        <!-- User's Preferences  -->
                        <fieldset class="form-group border p-3">
                            <legend class="w-auto px-2">Input Nilai</legend>
                            <?php
                            // Loop untuk menghasilkan form berdasarkan jumlah data dari tabel "mapel"
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id_mapel = $row['id_mapel'];
                                $nama_mapel = $row['nama_mapel'];
                            ?>

                                <fieldset class="form-group border p-3">
                                    <legend class="w-auto px-2"><?php echo $nama_mapel; ?></legend>
                                    <input type="hidden" name="id_mapel[]" value="<?php echo $id_mapel; ?>">
                                    <div class="form-group">
                                        <label for="nilai_rapot_<?php echo $id_mapel; ?>">Nilai Rapot:</label>
                                        <input class="form-control" type="number" id="nilai_rapot_<?php echo $id_mapel; ?>" name="nilai_rapot[]" required>
                                    </div>
                                </fieldset>
                            <?php
                            }

                            ?>
                        </fieldset>
                        <!-- Submit Button  -->
                        <div class="form-group row text-right">
                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-customized" name="submit">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>
<!-- Form 1 -->