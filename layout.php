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
    <!-- <link rel="stylesheet" href="@yield('css')assets/plugins/fontawesome-free/css/all.min.css"> -->
    <!-- Tempusdominus Bootstrap 4 -->
    <!-- <link rel="stylesheet" href="@yield('css')assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> -->
    <!-- iCheck -->
    <!-- <link rel="stylesheet" href="@yield('css')assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
    <!-- JQVMap -->
    <!-- <link rel="stylesheet" href="@yield('css')assets/plugins/jqvmap/jqvmap.min.css"> -->
    <!-- overlayScrollbars -->
    <!-- <link rel="stylesheet" href="@yield('css')assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"> -->
    <!-- Daterange picker -->
    <!-- <link rel="stylesheet" href="@yield('css')assets/plugins/daterangepicker/daterangepicker.css"> -->
    <!-- summernote -->
    <!-- <link rel="stylesheet" href="@yield('css')assets/plugins/summernote/summernote-bs4.min.css"> -->
    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="@yield('css')assets/dist/css/adminlte.min.css"> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="../style.css"> -->
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
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li> -->
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
            <a href="@yield('nav')dashboard.php" class="brand-link">
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
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" class="collapsed">
                            <span>
                                <h1 class="mb-2">User</h1>
                                <div class="clearfix"></div>
                                <span class="caret"></span>
                                <span class="user-level">Nasabah Status</span>
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
                                    XXXXXXX
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

                    <li class="nav-item">
                        <a href="@yield('nav')rapot/index.php" class="nav-link">
                            <i class="nav-icon far fa-file-alt"></i>
                            <!-- <i class="nav-icon fas fa-columns"></i> -->
                            <!-- <i class="nav-icon fas fa-th"></i> -->
                            <p>
                                User Profile
                                <!-- <span class="right badge badge-danger">New</span> -->
                            </p>
                        </a>
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
                                <h1 class="m-0">IT Perbankan</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="@yield('contentRoot')">Home</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Selamat Datang di Website e-Rapot SMPIT Auliya</h1>
                <p class="lead">
                    Website ini membantu memantau Rapot Siswa dengan mudah.
                </p>
                <hr class="my-4">
                <p>
                    menyediakan solusi yang mudah dan efisien untuk memantau Rapot Siswa.
                </p>
            </div>
        </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">

                        <div class="inner">
                            <h3>'XXX'</h3>
                            <p>Siswa</p>
                        </div>

                        <div class="icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <a href="siswa/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>XXX</h3>

                            <p>Guru</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <a href="guru/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-purple text-white">
                        <div class="inner">
                            <h3>XXX</h3>

                            <p>Mata Pelajaran</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <a href="mapel/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>XXX</h3>

                            <p>Kelas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-school"></i>
                        </div>
                        <a href="kelas/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                
                <!-- ./col -->
                <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            // <h3>XXX</h3>

                            <p>Rapot</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon far fa-file-alt"></i>
                        </div>
                        <a href="rapot/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">

                                    </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">

                    <!-- /.card -->
                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

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

    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


</body>

</html>