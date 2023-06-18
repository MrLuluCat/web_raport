<?php
session_start();

// Kode untuk memeriksa apakah pengguna sudah login sebelumnya
if (!isset($_SESSION['guru_username'])) {
    header("Location: login.php");
    exit();
}

// Kode untuk mengambil informasi guru dari database berdasarkan username
require_once('../koneksi.php');

$username = $_SESSION['guru_username'];

// Query untuk mengambil informasi guru berdasarkan username
$sql = "SELECT * FROM guru WHERE NIP = '$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $NIP           = $row["NIP"];
    $nama_guru      = $row["nama_guru"];
    $jenis_kelamin  = $row["jenis_kelamin"];
    $tanggal_lahir  = $row["tanggal_lahir"];
    $alamat         = $row["alamat"];
    $nomor_telepon  = $row["nomor_telepon"];
    $email          = $row["email"];
} else {
    // Jika informasi guru tidak ditemukan, lakukan penanganan sesuai kebutuhan Anda
    echo "Informasi guru tidak ditemukan.";
    exit();
}

// Tutup koneksi ke database
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard guru</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <h2>Dashboard guru</h2>
                <table class="table">
                    <tr>
                        <th>NIP</th>
                        <td><?= $NIP; ?></td>
                    </tr>
                    <tr>
                        <th>Nama guru</th>
                        <td><?php echo $nama_guru; ?></td>
                    </tr>
                    <!-- <tr>
                        <th>ID Kelas</th>
                        <td><?php echo $id_kelas; ?></td>
                    </tr> -->
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td><?php echo $jenis_kelamin; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td><?php echo $tanggal_lahir; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?php echo $alamat; ?></td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td><?php echo $nomor_telepon; ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $email; ?></td>
                    </tr>
                </table>
                <a href="edit.php?id_guru=<?php echo $row['id_guru']; ?>" class="btn btn-primary">Edit</a>
                <a href="delete.php?id_guru=<?php echo $row['id_guru']; ?>" class="btn btn-danger">Delete</a>
                <a href="logout.php" class="btn btn-secondary">Logout</a>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>