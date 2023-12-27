<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
   <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
   <title>Admin | M R R P</title>

   <link rel="website icon" type="png" href="{{ ('template/dist/img/pemkotptk.png') }}">


   <!-- Google Font: Source Sans Pro -->
   <link rel=" stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome Icons -->
   <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css') }}">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="{{asset('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
   <!-- Theme style -->
   <link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css') }} ">
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   @stack('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
   <div class="wrapper">

      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
         <img class="animation__wobble" src="{{ ('template/dist/img/kepala.png') }}" alt="kepala" height="100" width="100">
      </div>

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-dark">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
               <a href="/" class="nav-link">Home</a>
            <li class="nav-item d-none d-sm-inline-block">
               <a class="nav-link">
                  <?php
                  // Mendapatkan waktu server dalam format tertentu
                  $currentTime = date("H:i:s");

                  // Menampilkan waktu
                  echo $currentTime;
                  ?>
               </a>
            </li>
            </li>
         </ul>

         <!-- Right navbar links -->
         <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
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
            </li>
            <li class="nav-item">
               <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                  <i class="fas fa-th-large"></i>
               </a>
            </li>
         </ul>
      </nav>

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
         <!-- Brand Logo -->
         <a href="/" class="brand-link">
            <img src="{{ ('template/dist/img/pemkotptk.png') }}" alt="pemkotptk" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">M R R P </span>
         </a>

         <!-- Sidebar -->
         <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
               <div class="image">
                  <img src="{{ ('template/dist/img/user.png') }}" class="img-circle elevation-2" alt="user">
               </div>
               <div class="info">
                  <a href="#" class="d-block">{{ Auth::user()->name }}</a>
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
            <style>
               /* Add this CSS to position the logout button at the bottom */
               .footer {
                  margin-top: 460px;
                  /* Adjust the margin as needed */
                  /* Center the button */
               }

               .nav {
                  margin-bottom: 20px;
                  /* Add margin to the navbar */
               }
            </style>
            <!--  -->
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item">
                     <a href="/" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                           Dashboard
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="/pegawai" class="nav-link">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>
                           Rekap Data Teman Disko
                        </p>
                     </a>
                  </li>

                  <li class="nav-item">
                     <a href="/ppidpegawai" class="nav-link">
                        <i class="nav-icon fa fa-suitcase"></i>
                        <p>
                           Rekap Data PPID
                        </p>
                     </a>
                  </li>

                  <li class="nav-item">
                     <a href="/ppidpegawai" class="nav-link">
                        <i class="nav-icon fa fa-suitcase"></i>
                        <p>
                           Permintaan Hasil Dokumentasi Kegiatan dan Materi Publikasi
                        </p>
                     </a>
                  </li>

                  <div class="footer">
                     <a href="/logout" class="nav-link">
                        <i class="nav-icon fa fa-eject"></i>
                        <p>Logout</p>
                     </a>
                  </div>

               </ul>
            </nav>
            <!-- /.sidebar-menu -->
         </div>
         <!-- /.sidebar -->
      </aside>
      @yield('content')
      <!-- Content Wrapper. Contains page content -->

      <!-- /.content-wrapper -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
         <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->

      <!-- Main Footer -->
      <footer class="main-footer">
         <strong>Copyright &copy; Development mrievaldrp</a>.</strong>
         <div class="float-right d-none d-sm-inline-block">
         </div>
      </footer>
   </div>
   <!-- ./wrapper -->

   <!-- REQUIRED SCRIPTS -->
   <!-- jQuery -->
   <script src="{{ asset('template/plugins/jquery/jquery.min.js') }} "></script>
   <!-- Bootstrap -->
   <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
   <!-- overlayScrollbars -->
   <script src="{{ asset('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
   <!-- AdminLTE App -->
   <script src="{{ asset('template/dist/js/adminlte.js') }}"></script>

   <!-- PAGE PLUGINS -->
   <!-- jQuery Mapael -->
   <script src="{{ asset('template/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
   <script src="{{ asset('template/plugins/raphael/raphael.min.js') }}"></script>
   <script src="{{ asset('template/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
   <script src="{{ asset('template/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
   <!-- ChartJS -->
   <script src="{{ asset('template/plugins/chart.js/Chart.min.js') }}"></script>

   <!-- AdminLTE for demo purposes -->
   <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
   <script src="{{ asset('template/dist/js/pages/dashboard2.js') }}"></script>

   @stack('scripts')
</body>

</html>