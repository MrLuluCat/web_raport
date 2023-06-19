<?php
// Koneksi ke database
require_once('../koneksi.php');

// Fungsi untuk menambahkan guru dan generate pengguna
function createGuru($NIP, $nama_guru, $jenis_kelamin, $tanggal_lahir, $alamat, $nomor_telepon, $email)
{
    // Kode tambahan untuk validasi data guru jika diperlukan

    // Kode tambahan untuk menghindari serangan SQL Injection jika diperlukan

    // Kode tambahan untuk memastikan bahwa data guru unik jika diperlukan

    global $conn;

    // Insert data guru ke tabel guru
    $sql = "INSERT INTO guru (NIP, nama_guru, jenis_kelamin, tanggal_lahir, alamat, nomor_telepon, email) VALUES ('$NIP', '$nama_guru', '$jenis_kelamin', '$tanggal_lahir', '$alamat', '$nomor_telepon', '$email')";
    if ($conn->query($sql) === TRUE) {
        echo "guru berhasil ditambahkan.";

        // Generate username dan password
        $username = $NIP;
        $password = date("dmY", strtotime($tanggal_lahir));
        $encryptedPassword = hash('sha256', $password);


        // Insert data pengguna ke tabel Users
        $sql = "INSERT INTO Users (username, password, role) VALUES ('$username', '$encryptedPassword', 'guru')";
        if ($conn->query($sql) === TRUE) {
            echo " Pengguna berhasil ditambahkan: Username = $username, Password = $password";
        } else {
            echo " Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Memproses form saat data guru dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $NIP = $_POST["NIP"];
    $nama_guru = $_POST["nama_guru"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $alamat = $_POST["alamat"];
    $nomor_telepon = $_POST["nomor_telepon"];
    $email = $_POST["email"];

    createGuru($NIP, $nama_guru, $jenis_kelamin, $tanggal_lahir, $alamat, $nomor_telepon, $email);

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
    <title>Tambah guru</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <h2>Tambah guru</h2>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                    <div class="mb-3">
                        <label for="NIP" class="form-label">Nomor Induk</label>
                        <input type="text" class="form-control" id="NIP" name="NIP" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_guru" class="form-label">Nama guru</label>
                        <input type="text" class="form-control" id="nama_guru" name="nama_guru" required>
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
                    <button type="submit" class="btn btn-primary">Tambah guru</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>