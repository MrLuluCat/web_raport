<?php
// Koneksi ke database
require_once('../koneksi.php');

// Fungsi untuk menambahkan siswa dan generate pengguna
function tambahSiswa($NISN, $nama_siswa, $jenis_kelamin, $tanggal_lahir, $alamat, $nomor_telepon, $email)
{
    // Kode tambahan untuk validasi data siswa jika diperlukan

    // Kode tambahan untuk menghindari serangan SQL Injection jika diperlukan

    // Kode tambahan untuk memastikan bahwa data siswa unik jika diperlukan

    global $conn;

    // Insert data siswa ke tabel Siswa
    $sql = "INSERT INTO siswa (NISN, nama_siswa, jenis_kelamin, tanggal_lahir, alamat, nomor_telepon, email) VALUES ('$NISN', '$nama_siswa', '$jenis_kelamin', '$tanggal_lahir', '$alamat', '$nomor_telepon', '$email')";
    if ($conn->query($sql) === TRUE) {
        echo "Siswa berhasil ditambahkan.";

        // Generate username dan password
        $username = $NISN;
        $password = date("dmY", strtotime($tanggal_lahir));
        $encryptedPassword = hash('sha256', $password);


        // Insert data pengguna ke tabel Users
        $sql = "INSERT INTO Users (username, password, role) VALUES ('$username', '$encryptedPassword', 'siswa')";
        if ($conn->query($sql) === TRUE) {
            echo " Pengguna berhasil ditambahkan: Username = $username, Password = $password";
        } else {
            echo " Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Memproses form saat data siswa dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $NISN = $_POST["NISN"];
    $nama_siswa = $_POST["nama_siswa"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $alamat = $_POST["alamat"];
    $nomor_telepon = $_POST["nomor_telepon"];
    $email = $_POST["email"];

    tambahSiswa($NISN, $nama_siswa, $jenis_kelamin, $tanggal_lahir, $alamat, $nomor_telepon, $email);

    // Redirect ke halaman baru setelah form diproses
    header("Location: success.php");
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
    <title>Tambah Siswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <h2>Tambah Siswa</h2>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                    <div class="mb-3">
                        <label for="NISN" class="form-label">Nomor Induk</label>
                        <input type="text" class="form-control" id="NISN" name="NISN" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_siswa" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="id_kelas" class="form-label">ID Kelas</label>
                        <input type="text" class="form-control" id="id_kelas" name="id_kelas" required>
                    </div> -->
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Siswa</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>