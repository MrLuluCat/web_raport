<?php
// Koneksi ke database

require_once('../../koneksi.php');
require '../../view.php';

// if (isset($_SESSION['siswa_username'])) {
//     header("Location: index.php");
//     exit();
// }

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
    // Jika informasi siswa tidak ditemukan, lakukan penanganan sesuai kebutuhan Anda
    echo "Informasi siswa tidak ditemukan.";
    exit();
}

// ...
if (isset($_POST['submit'])) {
    $nama_siswa     = isset($_POST['nama_siswa']) ? $_POST['nama_siswa'] : "";
    $jenis_kelamin  = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : "";
    $tanggal_lahir  = isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : "";
    $alamat         = isset($_POST['alamat']) ? $_POST['alamat'] : "";
    $nomor_telepon  = isset($_POST['nomor_telepon']) ? $_POST['nomor_telepon'] : "";
    $email          = isset($_POST['email']) ? $_POST['email'] : "";

    // Perbarui data siswa di database
    $query = "UPDATE siswa SET 
                nama_siswa      ='$nama_siswa', 
                jenis_kelamin   ='$jenis_kelamin', 
                tanggal_lahir   ='$tanggal_lahir', 
                alamat          ='$alamat', 
                nomor_telepon   ='$nomor_telepon', 
                email           ='$email' 
            WHERE id_siswa ='$id_siswa' ";

    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Data Gagal Di Update.";
    }
}

View::section('title', 'SMPIT Auliya');
View::section('css', '../../');
View::section('nav', '../');
// View::section('header', 'This is the header of the Home page');

$content = '
<!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Siswa</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <section class="content">
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="card">
                <div class="card-body">
                <form action="" method="POST">
                    <input type="hidden" name="id_siswa" value="<?php echo $id_siswa; ?>">

                    <div class="mb-3">
                        <label for="nama_siswa" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="' . $nama_siswa . '" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="Laki-laki" ' . ($jenis_kelamin == "Laki-laki") . '"selected" >Laki-laki</option>
                            <option value="Perempuan" ' . ($jenis_kelamin == "Perempuan") . '"selected" >Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="'. $tanggal_lahir.'" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required>'. $alamat .'</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="'. $nomor_telepon.'" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="'. $email.'" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Update Siswa</button>
                </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>';

View::section('content', $content);
// Render the home view
View::extend('views/layout.php');