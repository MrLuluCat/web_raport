<?php
require_once('../../koneksi.php');
require '../../view.php';


if (isset($_SESSION['guru_username'])) {
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

View::section('tittle', 'Guru - Edit');
View::section('contentTittle', 'Edit Guru');
View::section('contentRoot', 'javascript:javascript:history.go(-1)');
View::section('contentLink', 'Guru');
View::section('contentLinkActive', 'Edit');

View::section('css', '../../');
View::section('nav', '../');
// View::section('header', 'This is the header of the Home page');

$content = '

            <section class="content">
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="card">
                <div class="card-body">
                <form action="" method="POST">
                    <input type="hidden" name="id_guru" value="<?php echo $id_guru; ?>">

                    <div class="mb-3">
                        <label for="nama_guru" class="form-label">Nama guru</label>
                        <input type="text" class="form-control" id="nama_guru" name="nama_guru" value="' . $nama_guru . '" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="Laki-laki" ' . ($jenis_kelamin === "Laki-laki" ? "selected" : "") . '>Laki-laki</option>
                            <option value="Perempuan" ' . ($jenis_kelamin === "Perempuan" ? "selected" : "") . '>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="' . $tanggal_lahir . '" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required>' . $alamat . '</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="' . $nomor_telepon . '" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="' . $email . '" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Update guru</button>
                </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>';

View::section('content', $content);
// Render the home view
View::extend('views/layout.php');