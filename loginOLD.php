<?php
session_start();

// Kode untuk memeriksa apakah pengguna sudah login sebelumnya
if (isset($_SESSION['siswa_username'])) {
    header("Location: index.php");
    exit();
}

// Koneksi ke database dan fungsi validasi login
require_once('../koneksi.php');

function validasiLogin($username, $password)
{
    global $conn;

    // Menghindari serangan SQL Injection
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // Mengenkripsi password dengan SHA-256
    $encryptedPassword = hash('sha256', $password);

    // Memeriksa apakah username dan password cocok dalam tabel Users
    $sql = "SELECT * FROM Users WHERE username = '$username' AND password = '$encryptedPassword' AND role = 'siswa'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        return true;
    } else {
        return false;
    }
}

// Memproses form login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (validasiLogin($username, $password)) {
        $_SESSION['siswa_username'] = $username;
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Username atau password salah";
    }
}

// Tutup koneksi ke database
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Siswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <h2>Login Siswa</h2>
                <?php if (isset($error_message)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>