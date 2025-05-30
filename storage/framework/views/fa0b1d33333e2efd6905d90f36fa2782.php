<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SMPN 1 MERAWANG | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('template/plugins/fontawesome-free/css/all.min.css')); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo e(asset('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo e(asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo e(asset('template/plugins/jqvmap/jqvmap.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('template/dist/css/adminlte.min.css')); ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo e(asset('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo e(asset('template/plugins/daterangepicker/daterangepicker.css')); ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo e(asset('template/plugins/summernote/summernote-bs4.min.css')); ?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?php echo e(asset('template/dist/img/AdminLTELogo.png')); ?>" alt="AdminLTELogo" height="60" width="60">
    </div>

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
        <!-- Navbar Search -->
        

        <!-- Messages Dropdown Menu -->
        
        <!-- Notifications Dropdown Menu -->
        
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?php echo e(route('dashboardadmin')); ?>" class="brand-link">
        
        <span class="brand-text font-weight-light"><strong><b>SMPN 1 MERAWANG</b></strong></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo e(asset('gambar/icon.jpg')); ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="/admin/dashboard" class="d-block"><?php echo e(Session::get('ambilUser')->nama); ?></a>
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
                 <a href="<?php echo e(route('dashboardadmin')); ?>" class="nav-link <?php echo e(Request::routeIs('dashboardadmin') ? 'active' : ''); ?>">
                   <i class="fas fa-tachometer-alt nav-icon"></i>
                   <p>Dashboard</p>
                 </a>
               </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-bars"></i> <!-- Ikon hamburger -->
                <p>
                    Menu
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>

              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="<?php echo e(route('dataSiswa')); ?>" class="nav-link <?php echo e(Request::routeIs('dataSiswa') ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                      KELOLA DATA SISWA
                    </p>
                  </a>
                </li>
                
                <li class="nav-item">
                  <a href="<?php echo e(route('materi')); ?>" class="nav-link <?php echo e(Request::routeIs('materi') ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                      KELOLA MATERI
                    </p>
                  </a>
                </li>
                
                <li class="nav-item">
                  <a href="<?php echo e(route('kuis')); ?>" class="nav-link <?php echo e(Request::routeIs('kuis') ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-comment"></i>
                    <p>
                      KELOLA QUIZ
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo e(route('hasil-kuis')); ?>" class="nav-link <?php echo e(Request::routeIs('hasil.kuis') ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-clipboard"></i>
                    <p>
                      HASIL QUIZ
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo e(route('leaderboard')); ?>" class="nav-link <?php echo e(Request::routeIs('leaderboard') ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-trophy"></i>
                    <p>
                      RANKING SISWA
                    </p>
                  </a>
                </li>
                

              </ul>
            </li>
            <li class="nav-item">
            <a href="<?php echo e(route('logout')); ?>" class="nav-link <?php echo e(Request::routeIs('datagempa')); ?>">
                <i class="nav-icon fas fa-sign-out-alt"></i> <!-- Menggunakan ikon sign-out -->
                <p>Log-out</p>
            </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <?php echo $__env->yieldContent('content'); ?>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>SMP NEGERI 1 MERAWANG</strong>

    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?php echo e(asset('template/plugins/jquery/jquery.min.js')); ?>"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo e(asset('template/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo e(asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <!-- ChartJS -->
  <script src="<?php echo e(asset('template/plugins/chart/Chart.min.js')); ?>"></script>
  <!-- Sparkline -->
  <script src="<?php echo e(asset('template/plugins/sparklines/sparkline.js')); ?>"></script>
  <!-- JQVMap -->
  <script src="<?php echo e(asset('template/plugins/jqvmap/jquery.vmap.min.js')); ?>"></script>
  <script src="<?php echo e(asset('template/plugins/jqvmap/maps/jquery.vmap.usa.js')); ?>"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?php echo e(asset('template/plugins/jquery-knob/jquery.knob.min.js')); ?>"></script>
  <!-- daterangepicker -->
  <script src="<?php echo e(asset('template/plugins/moment/moment.min.js')); ?>"></script>
  <script src="<?php echo e(asset('template/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?php echo e(asset('template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
  <!-- Summernote -->
  <script src="<?php echo e(asset('template/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
  <!-- overlayScrollbars -->
  <script src="<?php echo e(asset('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo e(asset('template/dist/js/adminlte.js')); ?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo e(asset('template/dist/js/demo.js')); ?>"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?php echo e(asset('template/dist/js/pages/dashboard.js')); ?>"></script>
  <!-- DataTables  & Plugins -->
  <script src="<?php echo e(asset('template/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
  <script src="<?php echo e(asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
  <script src="<?php echo e(asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
  <script src="<?php echo e(asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
  <script src="<?php echo e(asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
  <script src="<?php echo e(asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
  <script src="<?php echo e(asset('template/plugins/jszip/jszip.min.js')); ?>"></script>
  <script src="<?php echo e(asset('template/plugins/pdfmake/pdfmake.min.js')); ?>"></script>
  <script src="<?php echo e(asset('template/plugins/pdfmake/vfs_fonts.js')); ?>"></script>
  <script src="<?php echo e(asset('template/plugins/datatables-buttons/js/buttons.html5.min.js')); ?>"></script>
  <script src="<?php echo e(asset('template/plugins/datatables-buttons/js/buttons.print.min.js')); ?>"></script>
  <script src="<?php echo e(asset('template/plugins/datatables-buttons/js/buttons.colVis.min.js')); ?>"></script>

  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": true,
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>

</html>
<?php /**PATH /home/fadil/fadil/admin-ab/resources/views/admin/layout.blade.php ENDPATH**/ ?>