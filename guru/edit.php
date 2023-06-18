<?php
// Koneksi ke database
require_once('../koneksi.php');

if (isset($_SESSION['siswa_username'])) {
    header("Location: index.php");
    exit();
}

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
    // Jika informasi guru tidak ditemukan, lakukan penanganan sesuai kebutuhan Anda
    echo "Informasi guru tidak ditemukan.";
    exit();
}

// ...
if (isset($_POST['submit'])) {
    $nama_guru = isset($_POST['nama_guru']) ? $_POST['nama_guru'] : "";
    $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : "";
    $tanggal_lahir = isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : "";
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : "";
    $nomor_telepon = isset($_POST['nomor_telepon']) ? $_POST['nomor_telepon'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";

    // Perbarui data guru di database
    $query = "UPDATE guru SET 
                nama_guru='$nama_guru', 
                jenis_kelamin='$jenis_kelamin', 
                tanggal_lahir='$tanggal_lahir', 
                alamat='$alamat', 
                nomor_telepon='$nomor_telepon', 
                email='$email' 
            WHERE id_guru ='$id_guru' ";

    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Data Gagal Di Update.";
    }
}


// Fungsi untuk mengupdate data guru
// function updateguru($id_guru, $nama_guru, $jenis_kelamin, $tanggal_lahir, $alamat, $nomor_telepon, $email)
// {
// global $conn;

// // Update data guru berdasarkan NIP
// $sql = "UPDATE guru SET guru='$nama_guru', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir',
// alamat='$alamat', nomor_telepon='$nomor_telepon', email='$email' WHERE id_guru ='$id_guru'";
// var_dump($id_guru);
// if ($conn->query($sql) === TRUE) {
// echo "guru berhasil diperbarui.";
// header("Location: index.php");
// exit();
// } else {
// echo "Error: " . $sql . "<br>" . $conn->error;
// }
// }

// // ...


// // Query untuk mendapatkan data guru berdasarkan ID
// $sql = "SELECT * FROM guru WHERE id_guru ='$id_guru'";

// $result = $conn->query($sql);

// if (isset($_POST['submit'])) {
// updateguru($id_guru, $nama_guru,
// $jenis_kelamin, $tanggal_lahir, $alamat,
// $nomor_telepon, $email);
// } else {
// // Jika informasi guru tidak ditemukan, lakukan penanganan sesuai kebutuhan Anda
// echo "Informasi guru tidak ditemukan.";
// exit();
// }

// Tutup koneksi ke database
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit guru</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <h2>Edit guru</h2>
                <form action="<?php echo $_SERVER["PHP_SELF"] . "?id_guru=$id_guru"; ?>" method="POST">
                    <?php var_dump($id_guru); ?>
                    <input type="hidden" name="id_guru" value="<?php echo $id_guru; ?>">

                    <div class="mb-3">
                        <label for="nama_guru" class="form-label">Nama guru</label>
                        <input type="text" class="form-control" id="nama_guru" name="nama_guru" value="<?php echo $nama_guru; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="Laki-laki" <?php if ($jenis_kelamin == "Laki-laki") echo "selected"; ?>>Laki-laki</option>
                            <option value="Perempuan" <?php if ($jenis_kelamin == "Perempuan") echo "selected"; ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?php echo $alamat; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="<?php echo $nomor_telepon; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Update guru</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>