<?php
// Koneksi ke database
require_once('../koneksi.php');

// Mendapatkan ID siswa dari URL
$id_siswa = isset($_GET["id_siswa"]) ? $_GET["id_siswa"] : "";

// Mendapatkan data siswa dari database
$query = "SELECT * FROM siswa WHERE id_siswa = '$id_siswa'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $nama_siswa = $row["nama_siswa"];
    $jenis_kelamin = $row["jenis_kelamin"];
    $tanggal_lahir = $row["tanggal_lahir"];
    $alamat = $row["alamat"];
    $nomor_telepon = $row["nomor_telepon"];
    $email = $row["email"];
} else {
    echo "Informasi siswa tidak ditemukan.";
    exit();
}

// Fungsi untuk menghapus siswa dan pengguna dari database
function deleteSiswa($conn, $id_siswa)
{
    // Mendapatkan NISN siswa
    $query = "SELECT NISN FROM siswa WHERE id_siswa = '$id_siswa'";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $nisn = $row['NISN'];

        // Mendapatkan username berdasarkan NISN
        $query = "SELECT username FROM users WHERE username = '$nisn'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $username = $row['username'];

            // Menghapus data pengguna berdasarkan username
            $queryDeleteUser = "DELETE FROM users WHERE username = '$username'";
            $resultDeleteUser = mysqli_query($conn, $queryDeleteUser);

            if (!$resultDeleteUser) {
                return false;
            }
        }
    }

    // Menghapus data siswa dari tabel siswa
    $queryDelete = "DELETE FROM siswa WHERE id_siswa = '$id_siswa'";
    $resultDelete = mysqli_query($conn, $queryDelete);

    if ($resultDelete) {
        return true;
    } else {
        return false;
    }
}

// Periksa apakah tombol "Delete" telah diklik
if (isset($_POST['delete'])) {
    $id_siswa = $_POST['id_siswa'];

    // Panggil fungsi deleteSiswa untuk menghapus siswa dan pengguna dari database
    $delete = deleteSiswa($conn, $id_siswa);

    if ($delete) {
        header("Location: logout.php");
        exit();
    } else {
        echo "Gagal menghapus siswa.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Siswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <h2>Delete Siswa</h2>
                <p>Anda akan menghapus siswa dengan detail berikut:</p>
                <p><strong>Nama Siswa:</strong> <?php echo $nama_siswa; ?></p>
                <p><strong>Jenis Kelamin:</strong> <?php echo $jenis_kelamin; ?></p>
                <p><strong>Tanggal Lahir:</strong> <?php echo $tanggal_lahir; ?></p>
                <p><strong>Alamat:</strong> <?php echo $alamat; ?></p>
                <p><strong>Nomor Telepon:</strong> <?php echo $nomor_telepon; ?></p>
                <p><strong>Email:</strong> <?php echo $email; ?></p>
                <p>Apakah Anda yakin ingin menghapus siswa ini?</p>
                <form action="<?php echo $_SERVER["PHP_SELF"] . "?id_siswa=$id_siswa"; ?>" method="POST">
                    <input type="hidden" name="id_siswa" value="<?php echo $id_siswa; ?>">
                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                    <a href="logout.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>