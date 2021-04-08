<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Invoice Print</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('adminlte3') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('adminlte3') ?>/dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
  <div class="container-fluid">
    <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-md-2 mt-2 mb-2">
            <img src="<?= base_url('logo/' . $setting['logo']) ?>" width="200px">
          </div>
          <div class="col-md-5">
            <h3 class="mt-3"><?= $setting['n_sekolah']; ?></h3>
            Alamat :
            <h4><?= $setting['alamat']; ?></h4>
            <h5>Desa <?= $setting['desa']; ?> Kec. <?= $setting['kecamatan']; ?> Kab. <?= $setting['kabupaten']; ?></h5>
          </div>
          <!-- /.col -->
        </div>
        <div class="col-md-12">
          <h3 class="text-center"><b>Laporan Pendaftaran yang Diterima</b></h3>
        </div>
        <!-- Table row -->
        <div class="row">
          <div class="col-12 table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Pendaftaran</th>
                  <th>NISN</th>
                  <th>Nama</th>
                  <th>Tempat Tanggal Lahir</th>
                  <th>Jalur Penerimaan</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($siswa as $key => $value) { ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['no_pendaftaran']; ?></td>
                    <td><?= $value['nisn']; ?></td>
                    <td><?= $value['n_lengkap']; ?></td>
                    <td><?= $value['t_lhr']; ?>, <?= date('d F Y', strtotime($value['tgl_lhr'])); ?></td>
                    <td><?= $value['jalur_msk']; ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- ./wrapper -->
  </div>

  <!-- <script type="text/javascript">
    window.addEventListener("load", window.print());
  </script> -->
</body>

</html>