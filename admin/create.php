<?php
function addUser($username, $password, $role)
{
    // Mengenkripsi password menggunakan SHA256
    $hashedPassword = hash('sha256', $password);

    // Membangun query SQL
    $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashedPassword', '$role')";

    // Menjalankan query
    // Gantikan 'hostname', 'username', 'password', dan 'database' dengan informasi yang sesuai
    require_once('../koneksi.php');
    mysqli_query($conn, $query);
}

// Memproses data saat formulir dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan nilai dari formulir
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Memanggil fungsi addUser
    addUser($username, $password, $role);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Pengguna</title>
</head>

<body>
    <h2>Tambah Pengguna</h2>

    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="role">Role:</label>
        <select id="role" name="role">
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select><br>

        <input type="submit" value="Tambah Pengguna">
    </form>
</body>

</html>