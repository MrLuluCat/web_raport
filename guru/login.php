<?php
session_start();

// Kode untuk memeriksa apakah pengguna sudah login sebelumnya
if (isset($_SESSION['guru_username'])) {
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
  $sql = "SELECT * FROM Users WHERE username = '$username' AND password = '$encryptedPassword' AND role = 'guru'";
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
    $_SESSION['guru_username'] = $username;
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

  <body class="hold-transition login-page">
    <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <img src="../img/logo.png" alt="logo">
          </br>
          <a href="../../index2.html" class="h1"><b>Login</b> Guru</a>
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

            <a href="../siswa/login.php" class="btn btn-block btn-outline-secondary">
              <!-- <i class="fas fa-chalkboard-teacher"></i> Login Sebagai Guru -->
              <i class="fas fa-user-graduate mr-2"></i> Login Sebagai Siswa
            </a>
            <a href="../siswa/login.php" class="btn btn-block btn-outline-danger">
              <i class="fas fa-user-cog mr-1"></i> Login Sebagai Admin
            </a>

          </div>
          <!-- /.social-auth-links -->

          <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
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