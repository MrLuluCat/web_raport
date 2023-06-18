<?php
// Koneksi ke database
require_once('../koneksi.php');

// Mendapatkan ID guru dari URL
$id_guru = isset($_GET["id_guru"]) ? $_GET["id_guru"] : "";

// Mendapatkan data guru dari database
$query = "SELECT * FROM guru WHERE id_guru = '$id_guru'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $nama_guru = $row["nama_guru"];
    $jenis_kelamin = $row["jenis_kelamin"];
    $tanggal_lahir = $row["tanggal_lahir"];
    $alamat = $row["alamat"];
    $nomor_telepon = $row["nomor_telepon"];
    $email = $row["email"];
} else {
    echo "Informasi guru tidak ditemukan.";
    exit();
}

// Fungsi untuk menghapus guru dan pengguna dari database
function deleteguru($conn, $id_guru)
{
    // Mendapatkan NIP guru
    $query = "SELECT NIP FROM guru WHERE id_guru = '$id_guru'";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $NIP = $row['NIP'];

        // Mendapatkan username berdasarkan NIP
        $query = "SELECT username FROM users WHERE username = '$NIP'";
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

    // Menghapus data guru dari tabel guru
    $queryDelete = "DELETE FROM guru WHERE id_guru = '$id_guru'";
    $resultDelete = mysqli_query($conn, $queryDelete);

    if ($resultDelete) {
        return true;
    } else {
        return false;
    }
}

// Periksa apakah tombol "Delete" telah diklik
if (isset($_POST['delete'])) {
    $id_guru = $_POST['id_guru'];

    // Panggil fungsi deleteguru untuk menghapus guru dan pengguna dari database
    $delete = deleteguru($conn, $id_guru);

    if ($delete) {
        echo "<script>
                alert('Data Berhasil Di Hapus');
                window.location='logout.php';
            </script>";
        // header("Location: logout.php");
        exit();
    } else {
        echo "Gagal menghapus guru.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete guru</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <h2>Delete guru</h2>
                <p>Anda akan menghapus guru dengan detail berikut:</p>
                <p><strong>Nama guru:</strong> <?php echo $nama_guru; ?></p>
                <p><strong>Jenis Kelamin:</strong> <?php echo $jenis_kelamin; ?></p>
                <p><strong>Tanggal Lahir:</strong> <?php echo $tanggal_lahir; ?></p>
                <p><strong>Alamat:</strong> <?php echo $alamat; ?></p>
                <p><strong>Nomor Telepon:</strong> <?php echo $nomor_telepon; ?></p>
                <p><strong>Email:</strong> <?php echo $email; ?></p>
                <p>Apakah Anda yakin ingin menghapus guru ini?</p>
                <form action="<?php echo $_SERVER["PHP_SELF"] . "?id_guru=$id_guru"; ?>" method="POST">
                    <input type="hidden" name="id_guru" value="<?php echo $id_guru; ?>">
                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                    <a href="logout.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>