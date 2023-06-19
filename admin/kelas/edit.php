<?php
require_once('../../koneksi.php');

// Ambil ID Kelas dari URL
// $id_kelas = $_GET['id_kelas'];

// Ambil ID Kelas dari query database langsung
$query = "SELECT * FROM kelas WHERE id_kelas = '4'";
$result = mysqli_query($conn, $query);
$kelas = mysqli_fetch_assoc($result);

// Pastikan data kelas ada sebelum melanjutkan
if (!$kelas) {
    echo "Data kelas tidak ditemukan.";
    exit;
}

// Update data kelas
if (isset($_POST['update'])) {
    $tingkat_kelas = mysqli_real_escape_string($conn, $_POST['tingkat_kelas']);
    $nama_kelas = mysqli_real_escape_string($conn, $_POST['nama_kelas']);

    $query = "UPDATE kelas SET tingkat_kelas='$tingkat_kelas', nama_kelas='$nama_kelas' WHERE id_kelas='4'";
    $result = mysqli_query($conn, $query);

    // Tambahkan pesan sukses/kesalahan
    if ($result) {
        $pesan = "Data kelas berhasil diperbarui.";
    } else {
        $pesan = "Terjadi kesalahan saat memperbarui data kelas.";
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Web Raport Dashboard</title>
    <!-- Masukkan link CSS AdminLTE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>

        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">Web Raport</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Menu Item -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Raport Siswa
                                </p>
                            </a>
                        </li>
                        <!-- End of Menu Item -->
                    </ul>
                </nav>
                <!-- End of Sidebar Menu -->
            </div>
            <!-- End of Sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Buat Kelas</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Add your content here -->
                            <p>Welcome to the Web Raport Dashboard!</p>
                        </div>
                    </div>

                    <!-- Bagian form -->
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="id_kelas">ID Kelas:</label>
                                    <input type="text" class="form-control" id="id_kelas" name="id_kelas" value="<?php echo $kelas['id_kelas']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tingkat_kelas">Tingkat Kelas:</label>
                                    <input type="text" class="form-control" id="tingkat_kelas" name="tingkat_kelas" value="<?php echo $kelas['tingkat_kelas']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama_kelas">Nama Kelas:</label>
                                    <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?php echo $kelas['nama_kelas']; ?>">
                                </div>
                                <button type="submit" class="btn btn-primary" name="update">Update</button>
                            </form>
                        </div>
                    </div>

                    <!-- Bagian pesan sukses/kesalahan -->
                    <?php if (isset($pesan)) { ?>
                        <div class="alert alert-<?php echo ($result) ? 'success' : 'danger'; ?>">
                            <?php echo $pesan; ?>
                        </div>
                    <?php } ?>



                </div>
            </section>
            <!-- End of Main content -->
        </div>
        <!-- End of Content Wrapper -->

        <!-- Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>
    </div>
    <!-- End of Wrapper -->

    <!-- Masukkan script JS AdminLTE -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
</body>

</html>