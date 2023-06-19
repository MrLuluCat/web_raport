<?php
session_start();

// Kode untuk memeriksa apakah pengguna sudah login sebelumnya
if (!isset($_SESSION['siswa_username'])) {
    header("Location: login.php");
    exit();
}

// Kode untuk mengambil informasi siswa dari database berdasarkan username
require_once('../koneksi.php');

$username = $_SESSION['siswa_username'];

// Query untuk mengambil informasi siswa berdasarkan username
$sql = "SELECT * FROM Siswa WHERE NISN = '$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $NISN           = $row["NISN"];
    $nama_siswa     = $row["nama_siswa"];
    $jenis_kelamin  = $row["jenis_kelamin"];
    $tanggal_lahir  = $row["tanggal_lahir"];
    $alamat         = $row["alamat"];
    $nomor_telepon  = $row["nomor_telepon"];
    $email          = $row["email"];
} else {
    // Jika informasi siswa tidak ditemukan, lakukan penanganan sesuai kebutuhan Anda
    echo "Informasi siswa tidak ditemukan.";
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
    <title>Dashboard Siswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <?php if (isset($success_message)) : ?>
            <div id="toast-container" class="toast-top-right">
                <div class="toast toast-success" aria-live="assertive" style="display: block;">
                    <div class="toast-title">Success</div>
                    <div class="toast-message"><?php echo $success_message; ?></div>
                </div>
            </div>
            <script>
                // Menghilangkan pesan toastr setelah 5 detik
                setTimeout(function() {
                    $('#toast-container').fadeOut();
                }, 5000);
            </script>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <h2>Dashboard Siswa</h2>
                <table class="table">
                    <tr>
                        <th>NISN</th>
                        <td><?= $NISN; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Siswa</th>
                        <td><?php echo $nama_siswa; ?></td>
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
                <a href="edit.php?id_siswa=<?php echo $row['id_siswa']; ?>" class="btn btn-primary">Edit</a>
                <a href="delete.php?id_siswa=<?php echo $row['id_siswa']; ?>" class="btn btn-danger d-inline">Delete</a>
                <form method="POST" action="logout.php">
                    <button class="d-inline btn btn-secondary" name="logout">Logout</button>
                </form>

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>