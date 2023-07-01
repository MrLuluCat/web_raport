<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa</title>

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
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Dashboard Siswa</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
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
        <h2 class="text-center mb-4">Pilih Rapot</h2>

        <div class="row" id="rapotContainer">
            <div class="col-md-4">
                <div class="card" data-kelas="Kelas 1" data-semester="Semester 1">
                    <div class="card-body text-center">
                        <i class="fas fa-book card-icon"></i>
                        <h5 class="card-title">Semester 1</h5>
                        <p class="card-text">Tahun Ajaran 2023/2024</p>
                        <button onclick="redirectToRapot('Kelas 1', 'Semester 1')" class="btn btn-primary mt-3">Lihat Rapot</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" data-kelas="Kelas 2" data-semester="Semester 2">
                    <div class="card-body text-center">
                        <i class="fas fa-book card-icon"></i>
                        <h5 class="card-title">Semester 2</h5>
                        <p class="card-text">Tahun Ajaran 2023/2024</p>
                        <button onclick="redirectToRapot('Kelas 2', 'Semester 2')" class="btn btn-primary mt-3">Lihat Rapot</button>
                    </div>
                </div>
            </div>
            <!-- Tambahkan card lain untuk rapot lainnya -->
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function redirectToRapot(kelas, semester) {
            // Lakukan filtering atau aksi lainnya berdasarkan kelas dan semester yang dipilih
            console.log("Kelas: " + kelas + ", Semester: " + semester);

            // Simulasi pengalihan ke halaman rapot
            window.location.href = "rapot.php"; // Ganti dengan halaman yang sesuai

            // Atau Anda dapat mengirim parameter kelas dan semester ke halaman rapot
            // window.location.href = "rapot.html?kelas=" + kelas + "&semester=" + semester;
        }
    </script>
</body>

</html>