<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapot Siswa</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        .navbar {
            background-color: #343a40;
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            color: #fff;
        }

        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .card-title {
            margin-bottom: 0.5rem;
        }

        .card-text {
            margin-bottom: 1rem;
        }

        .card-container {
            padding: 1rem;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Rapot Siswa</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2 class="text-center mb-4">Rapot Siswa - Kelas 1, Semester 1</h2>

        <div class="row" id="rapotContainer">
            <?php
            // Koneksi ke database
            include '../koneksi.php';
            // Periksa koneksi
            if ($conn->connect_error) {
                die("Koneksi database gagal: " . $conn->connect_error);
            }

            // Query untuk mengambil data nilai dari tabel "grade" dan "mapel"
            $sql = "SELECT g.nilai_rapot, m.nama_mapel
              FROM grade g
              JOIN mapel m ON g.id_mapel = m.id_mapel";
            $result = $conn->query($sql);

            // Periksa hasil query
            if ($result->num_rows > 0) {
                // Looping untuk mengambil setiap baris data
                while ($row = $result->fetch_assoc()) {
                    $nilaiRapot = $row["nilai_rapot"];
                    $namaMapel = $row["nama_mapel"];

                    // Hilangkan .00 desimal jika ada
                    $nilaiRapot = ($nilaiRapot == intval($nilaiRapot)) ? intval($nilaiRapot) : $nilaiRapot;
            ?>
                    <div class="col-md-4">
                        <div class="card card-container mb-4">
                            <div class="card-body text-center">
                                <i class="fas fa-book card-icon"></i>
                                <h5 class="card-title"><?php echo $namaMapel; ?></h5>
                                <p class="card-text">Nilai: <?php echo $nilaiRapot; ?></p>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "Tidak ada data nilai.";
            }

            // Tutup koneksi database
            $conn->close();
            ?>
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>