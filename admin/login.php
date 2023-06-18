<?php
function login($username, $password)
{
    // Mengenkripsi password menggunakan SHA256
    $hashedPassword = hash('sha256', $password);

    // Membangun query SQL
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$hashedPassword'";

    // Menjalankan query
    // Gantikan 'hostname', 'username', 'password', dan 'database' dengan informasi yang sesuai
    $connection =
    require_once('../koneksi.php');
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    // Memeriksa keberhasilan login
    if ($user) {
        // Login berhasil
        // Lakukan tindakan setelah login berhasil, misalnya menyimpan data pengguna ke sesi
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Alihkan pengguna ke halaman yang sesuai setelah login berhasil
        header('Location: create.php');
        exit();
    } else {
        // Login gagal
        // Tampilkan pesan kesalahan atau lakukan tindakan lain sesuai kebutuhan
        echo "Login gagal. Periksa kembali username dan password.";
    }
}

// Memproses data saat formulir login dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan nilai dari formulir login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Memanggil fungsi login
    login($username, $password);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>

    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>
</body>

</html>