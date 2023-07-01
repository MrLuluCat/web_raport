<?php 
session_start();
include '../koneksi.php';

// Kode untuk memeriksa apakah pengguna sudah login sebelumnya
if (!isset($_SESSION['siswa'])) {
header("Location: login.php");
exit();
}

$username = $_SESSION['siswa'];

$query = "SELECT * FROM siswa WHERE NISN=$username";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);
$NISN = $row["NISN"];
$nama_siswa = $row["nama_siswa"];
$jenis_kelamin = $row["jenis_kelamin"];
$tanggal_lahir = $row["tanggal_lahir"];
$alamat = $row["alamat"];
$nomor_telepon = $row["nomor_telepon"];
$email = $row["email"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Siswa</title>

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

        .profile-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 40px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .profile-info {
            text-align: center;
        }

        .profile-info h2 {
            margin-bottom: 10px;
        }

        .profile-info p {
            margin-bottom: 5px;
        }

        .profile-info .profile-label {
            font-weight: bold;
        }

        .profile-info .profile-value {
            color: #888;
        }

        .social-icons {
            text-align: center;
            margin-top: 30px;
        }

        .social-icons a {
            color: #888;
            font-size: 1.5rem;
            margin: 0 10px;
            transition: color 0.3s;
        }

        .social-icons a:hover {
            color: #007bff;
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
        <div class="profile-container">
            <div class="profile-info">

                    <!-- <img src="<?php echo $row['foto']; ?>" alt="Profile Picture" class="profile-img"> -->
                    <h2><?php echo $row['nama_siswa']; ?></h2></br>
                    <p><span class="profile-label">NISN:</span> <span class="profile-value"><?php echo $row['NISN']; ?></span></p>
                    <p><span class="profile-label">Tanggal Lahir:</span> <span class="profile-value"><?php echo $row['tanggal_lahir']; ?></span></p>
                    <p><span class="profile-label">Jenis Kelamin:</span> <span class="profile-value"><?php echo $row['jenis_kelamin']; ?></span></p>
                    <p><span class="profile-label">Alamat:</span> <span class="profile-value"><?php echo $row['alamat']; ?></span></p>
                    <p><span class="profile-label">No. Telepon:</span> <span class="profile-value"><?php echo $row['nomor_telepon']; ?></span></p>
                    <p><span class="profile-label">Email:</span> <span class="profile-value"><?php echo $row['email']; ?></span></p>
            </div>

            <div class="social-icons">
                <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- FontAwesome Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>

</html>