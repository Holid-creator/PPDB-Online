<?php

$db = \Config\Database::connect();
$setting = $db->table('tb_setting')->where('id', '1')->get()->getRowArray();

$ta = $db->table('tb_ta')->where('status', '1')->get()->getRowArray();

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

  <title><?= $title ?> | <?= $subtitle ?></title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('adminlte3') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('adminlte3') ?>/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white fixed-top">
      <div class="container">
        <a href="<?= base_url() ?>" class="navbar-brand">
          <img src="<?= base_url() ?>/logo/<?= $setting['logo'] ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light"><b>PPDB</b> Online <?= $setting['n_sekolah'] ?></span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="<?= base_url('/') ?>" class="nav-link">Beranda</a>
            </li>
            <li class="nav-item">
              <a href="index3.html" class="nav-link">Pengumuman</a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('pendaftaran') ?>" class="nav-link">Pendaftaran</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Hubungi Kami</a>
            </li>
          </ul>

        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <!-- SEARCH FORM -->

          <li class="nav-item">
            <?php if (session()->get('nisn') == '') { ?>
              <a href="<?= base_url('auth/loginSiswa') ?>" class="nav-link">
                <i class="fa fa-user"></i> Login
              </a>
            <?php } else { ?>
          <li class="nav-item dropdown">
            <a href="" id="seret" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fas fa-user"></i> <?= session()->get('n_lengkap'); ?></a>
            <ul class="dropdown-menu border-0 shadow" aria-labelledby="seret1">
              <li><a href="<?= base_url('siswa') ?>" class="dropdown-item">Biodata</a></li>
              <li><a href="<?= base_url('auth/logoutSiswa') ?>" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
          </li>
        <?php } ?>
        </li>
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-top: 50px;">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-md-6">
              <?php if ($ta['status'] <> '1') { ?>
                <h1 class="m-0 text-danger">Pendaftaran Telah Ditutup !!!</h1>
              <?php } else { ?>
                <h1 class="m-0">Tahun Ajaran <?= $ta['ta']; ?></h1>
              <?php } ?>
            </div>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
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
      <strong>Copyright &copy; <?= date('Y'); ?> <a href="https://adminlte.io"><?= $setting['n_sekolah']; ?></a>.</strong> All rights reserved.
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

  <script>
    window.setTimeout(function() {
      $('.alert-success').fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 3000)
  </script>
  <script>
    window.setTimeout(function() {
      $('.alert-danger').fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 3000)
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

</body>

</html>