<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web e-Rapot @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="@yield('css')assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="@yield('css')assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="@yield('css')assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="@yield('css')assets/plugins/jqvmap/jqvmap.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="@yield('css')assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="@yield('css')assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="@yield('css')assets/plugins/summernote/summernote-bs4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="@yield('css')assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="@yield('css')assets/img/logo2.png" alt="logo" height="80" width="80">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li> -->
                <li class="nav-item">
                    <form method="POST" action="logout.php">
                        <button class="d-inline btn btn-secondary" name="logout">Logout</button>
                    </form>
                </li>
            </ul>
            
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="@yield('css')assets/img/logo2.png" alt="Logo" class="brand-image img-circle">
                <span class="brand-text font-weight-light">e-Rapot Auliya</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <!-- <div class="image">
            <img src="../assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div> -->
                    <div class="info">
                        <a href="#" class="d-block">Bilie</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="@yield('nav')dashboard.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <!-- <i class="nav-icon fas fa-columns"></i> -->
                                <!-- <i class="nav-icon fas fa-th"></i> -->
                                <p>
                                    Dashboard
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-server"></i>
                                <p>
                                    Data Master
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="@yield('nav')siswa/index.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Siswa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="@yield('nav')guru/index.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Guru</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="@yield('nav')bidang_studi/index.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bidang Studi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="@yield('nav')kelas/index.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kelas</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item"> -->
                                    <!-- <a href="@yield('nav')wali_kelas/index.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Wali Kelas</p>
                                    </a> -->
                                </li>
                            </ul>
                        </li>

                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chalkboard-teacher"></i> -->
                                <!-- <i class="nav-icon fas fa-th"></i> -->
                                <!-- <p> -->
                                    <!-- Wali Kelas -->
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                <!-- </p> -->
                            <!-- </a>
                        </li> -->

                        <li class="nav-item ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-file-alt"></i>
                                <p>
                                    Rapot
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../siswa/index.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Buat Rapot</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../guru/index.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./index3.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ketidakhadiran</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./index3.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Catatan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>

                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        <main>
            @yield('content')
        </main>


        <footer class="main-footer">
            <strong>Copyright &copy; 2023 <a href="#">Web e-Raport Auliya</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>2111500209 - </b> Nabil Abdul Salam F
            </div>
        </footer>

        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="@yield('css')assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="@yield('css')assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="@yield('css')assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="@yield('css')assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="@yield('css')assets/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="@yield('css')assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="@yield('css')assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="@yield('css')assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="@yield('css')assets/plugins/moment/moment.min.js"></script>
    <script src="@yield('css')assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="@yield('css')assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="@yield('css')assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="@yield('css')assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="@yield('css')assets/dist/js/adminlte.js"></script>

</body>

</html>