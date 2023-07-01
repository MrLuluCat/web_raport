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
<html>

<head>
    <title>Input Rapot</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form action="" method="POST">
        <!-- Form 3 -->
        <!-- Form 2 -->
        <div class="form-2-container section-container section-container-gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col form-2 section-description wow fadeIn">
                        <h2>Form 2</h2>
                        <div class="divider-1 wow fadeInUp"><span></span></div>
                        <p>A form with 3 "fieldset"-s and 3 "legend"-s: "First / Last name", "About" and "Preferences".</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col form-2-box wow fadeInUp">

                        <form action="" method="post">

                            <div class="row">
                                <div class="col-md-6">
                                    <!-- First / Last Name -->
                                    <fieldset class="form-group border p-3">
                                        <legend class="w-auto px-2">First / Last Name</legend>
                                        <div class="form-group">
                                            <label for="firstname">First name:</label>
                                            <input type="text" class="form-control firstname" id="firstname" placeholder="First name..." name="firstname">
                                        </div>
                                        <div class="form-group">
                                            <label for="lastname">Last name:</label>
                                            <input type="text" class="form-control lastname" id="lastname" placeholder="Last name..." name="lastname">
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <!-- About -->
                                    <fieldset class="form-group border p-3">
                                        <legend class="w-auto px-2">About You</legend>
                                        <div class="form-group">
                                            <label for="about">About:</label>
                                            <textarea class="form-control about" id="about" placeholder="Tell us about you..." name="about"></textarea>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Preferences  -->
                                    <fieldset class="form-group border p-3">
                                        <legend class="w-auto px-2">Preferences</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="john" id="john" value="john">
                                            <label class="form-check-label" for="john">I want to subscribe to <strong>John's</strong> newsletter</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="sarah" id="sarah" value="sarah">
                                            <label class="form-check-label" for="sarah">I want to subscribe to <strong>Sarah's</strong> newsletter</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="paolo" id="paolo" value="paolo">
                                            <label class="form-check-label" for="paolo">I want to subscribe to <strong>Paolo's</strong> newsletter</label>
                                        </div>
                                    </fieldset>
                                </div>
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
</body>

</html>