<?php



function loginAdmin($username, $password)
{
    // Mengenkripsi password menggunakan SHA256
    $hashedPassword = hash('sha256', $password);

    // Membangun query SQL
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$hashedPassword' AND role = 'admin'";

    // Menjalankan query
    require_once('../koneksi.php');
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    // Memeriksa keberhasilan login
    if ($user) {
        // Login berhasil
        // Menyimpan data pengguna ke dalam sesi
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Alihkan pengguna ke halaman yang sesuai setelah login berhasil
        header('Location: dashboard.php');
        exit();
    } else {
        $error_message = "Username atau password salah";
        return $error_message;
    }
}

// Memproses data saat formulir login dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan nilai dari formulir login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Memanggil fungsi login
    $error_message = loginAdmin($username, $password);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WEB Raport</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="../assets/plugins/toastr/toastr.min.css">

    <script src="https://kit.fontawesome.com/ec930b21b5.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">

</head>

<body class="hold-transition login-page">

    <?php if (isset($error_message)) : ?>
        <div id="toast-container" class="toast-top-right">
            <div class="toast toast-error" aria-live="assertive" style="display: block;">
                <div class="toast-title">Error</div>
                <div class="toast-message"><?php echo $error_message; ?></div>
            </div>
        </div>
        <script>
            // Menghilangkan pesan toastr setelah 5 detik
            setTimeout(function() {
                $('#toast-container').fadeOut();
            }, 2000);
        </script>
    <?php endif; ?>

    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <img src="../assets/img/logo.png" alt="logo">
                </br>
                <a href="#" class="h1"><b>Login</b> Admin</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <div class="input-group mb-3">
                        <input id="username" name="username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center mt-2 mb-3">

                    <a href="../guru/login.php" class="btn btn-block btn-outline-secondary">
                        <i class="fas fa-chalkboard-teacher mr-2"></i> Login Sebagai Guru

                    </a>

                    <a href="../siswa/login.php" class="btn btn-block btn btn-outline-secondary">
                        <i class="fas fa-user-graduate mr-2"></i> Login Sebagai Siswa
                    </a>

                </div>
                <!-- /.social-auth-links -->

                <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="../assets/plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.min.js"></script>
    <!-- Page specific script -->

</body>

</html>