<?php

$db = \Config\Database::connect();
$setting = $db->table('tb_setting')->where('id', '1')->get()->getRowArray();

?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?= $title; ?> | <?= $subtitle; ?></title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('adminlte3') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('adminlte3') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('adminlte3') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('adminlte3') ?>/dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('adminlte3') ?>/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <h3>Halaman Admin</h3>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('auth/logout') ?>"><i class="fa fa-user"></i> Logout</a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url('admin') ?>" class="brand-link">
        <img src="<?= base_url() ?>/logo/<?= $setting['logo'] ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PPDB Online</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url() ?>/foto/<?= session()->get('foto') ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= session()->get('n_user') ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="/admin" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p> Dashboard</p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Master Data
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('pekerjaan') ?>" class="nav-link">
                    <i class="nav-icon fas fa-suitcase"></i>
                    <p> Pekerjaan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('pendidikan') ?>" class="nav-link">
                    <i class="nav-icon fas fa-graduation-cap"></i>
                    <p> Pendidikan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('jurusan') ?>" class="nav-link">
                    <i class="nav-icon fas fa-people-arrows"></i>
                    <p> Jurusan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('agama') ?>" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p> Agama</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('lampiran') ?>" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p> Lampiran</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('penghasilan') ?>" class="nav-link">
                    <i class="nav-icon fa fa-money-bill-wave"></i>
                    <p> Penghasilan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('user') ?>" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p> User</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p> Pendaftaran
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('ppdb') ?>" class="nav-link">
                    <i class="nav-icon fas fa-download text-primary"></i>
                    <p> Masuk</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('ppdb/listDiterima') ?>" class="nav-link">
                    <i class="nav-icon fas fa-check text-success"></i>
                    <p> Diterima</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('ppdb/listDitolak') ?>" class="nav-link">
                    <i class="nav-icon fas fa-times text-danger"></i>
                    <p> Ditolak</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('ppdb/laporan') ?>" class="nav-link">
                <i class="nav-icon fas fa-paper-plane"></i>
                <p> Laporan</p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  Settings
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('ta') ?>" class="nav-link">
                    <i class="nav-icon fas fa-calendar"></i>
                    <p> Tahun Ajaran</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('jalurmasuk') ?>" class="nav-link">
                    <i class="nav-icon fas fa-sitemap"></i>
                    <p> Jalur masuk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/setting') ?>" class="nav-link">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>Setting</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('benner') ?>" class="nav-link">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>Setting Web</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/beranda') ?>" class="nav-link">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>Setting Beranda</p>
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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><?= $subtitle; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <?= $this->renderSection('content') ?>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="<?= base_url('adminlte3') ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('adminlte3') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('adminlte3') ?>/dist/js/adminlte.min.js"></script>
  <!-- Summernote -->
  <script src="<?= base_url('adminlte3') ?>/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- DataTables -->
  <script src="<?= base_url('adminlte3') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('adminlte3') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('adminlte3') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url('adminlte3') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <script>
    $(function() {
      // Summernote
      $('.textarea').summernote()
    })
  </script>

  <script>
    window.setTimeout(function() {
      $('.alert').fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 3000);
  </script>

  <script>
    function bacaGambar(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#gambar_load').attr('src', e.target.result)
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    $('#preview_gambar').change(function() {
      bacaGambar(this);
    });
  </script>
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "buttons": ["Copy", "csv", "excel", "pdf", "print", "colvis"]
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