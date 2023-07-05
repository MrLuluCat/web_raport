<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web e-Rapot @yield('title')</title>

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
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
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../style.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="@yield('css')assets/img/logo2.png" alt="logo" height="80" width="80">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="position: fixed; width: 100%; z-index: 100;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form method="POST" action="logout.php">
                        <button class="d-inline btn btn-secondary" name="logout">Logout</button>
                    </form>
                </li>
            </ul>
        </nav>


        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="@yield('nav')dashboard.php" class="brand-link">
                <img src="@yield('css')assets/img/logo2.png" alt="Logo" class="brand-image img-circle">
                <span class="brand-text font-weight-light">e-Rapot Auliya</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">


                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" class="collapsed">
                            <span>
                                <h1 class="mb-2"> billie</h1>
                                <div class="clearfix"></div>
                                <span class="caret"></span>
                                <span class="user-level">Administrator</span>
                            </span>
                        </a>
                        <div class="clearfix"></div>

                        <div class="in collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="#" class="collapsed">
                                        <span class="link-collapse">Ganti Passwowrd</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
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
                                    <a href="@yield('nav')mapel/index.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Mata Pelajaran</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="@yield('nav')kelas/index.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kelas</p>
                                    </a>
                                </li>

                        </li>
                    </ul>
                    </li>



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
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">@yield('contentTittle')</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="@yield('contentRoot')">@yield('contentLink')</a></li>
                                    <li class="breadcrumb-item active">@yield('contentLinkActive')</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        @yield('content1')
                        @yield('content2')
                        @yield('content3')
                        @yield('content4')
                        @yield('content5')
                        @yield('content')
                    </div>
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <strong>Web e-Raport Auliya &copy; 2023</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>2111500209 - </b> Nabil Abdul Salam F
                </div>
            </footer>
        </main>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Bootstrap 4 JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>

    <script>
        // Function to set description value based on selected value
        function setDescriptionValue(selectedValue, descriptionInput) {
            var description = '';
            switch (selectedValue) {
                case 'K':
                    description = 'Kurang';
                    break;
                case 'C':
                    description = 'Cukup';
                    break;
                case 'B':
                    description = 'Baik';
                    break;
                case 'SB':
                    description = 'Sangat Baik';
                    break;
            }
            descriptionInput.value = description;
        }

        // Get the select elements
        var nilaiKegiatanSelect = document.getElementById('nilai_kegiatan');
        var nilaiAhlakSelect = document.getElementById('nilai_ahlak');
        var nilaiKepribadianSelect = document.getElementById('nilai_kepribadian');

        // Get the input elements for deskripsi
        var deskripsiKegiatanInput = document.getElementById('deskripsi_kegiatan');
        var deskripsiAhlakInput = document.getElementById('deskripsi_ahlak');
        var deskripsiKepribadianInput = document.getElementById('deskripsi_kepribadian');

        // Add event listener to the select elements
        nilaiKegiatanSelect.addEventListener('change', function() {
            var selectedValue = nilaiKegiatanSelect.value;
            setDescriptionValue(selectedValue, deskripsiKegiatanInput);
        });

        nilaiAhlakSelect.addEventListener('change', function() {
            var selectedValue = nilaiAhlakSelect.value;
            setDescriptionValue(selectedValue, deskripsiAhlakInput);
        });

        nilaiKepribadianSelect.addEventListener('change', function() {
            var selectedValue = nilaiKepribadianSelect.value;
            setDescriptionValue(selectedValue, deskripsiKepribadianInput);
        });
    </script>
</body>

</html>