<?= $this->extend('layouts/template_frontend') ?>
<?= $this->section('content'); ?>

<div class="col-md-5">
  <img src="<?= base_url('logo/locked.jpg') ?>" width="400px" class="img-fluid pad">
</div>

<div class="col-md-5">
  <?= form_open('auth/cekLoginSiswa'); ?>
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">
        Login Siswa
      </h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <?php session()->getFlashdata('errors'); ?>
      <?php if (session()->getFlashdata('sukses')) {
        echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span><i class="icon fas fa-check"></i>';
        echo session()->getFlashdata('sukses');
        echo '</span></div>';
      } ?>
      <?php if (session()->getFlashdata('gagal')) {
        echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span><i class="icon fas fa-check"></i>';
        echo session()->getFlashdata('gagal');
        echo '</span></div>';
      } ?>
      <div class="form-group">
        <div class="text-danger">*) Bagi Yang Belum Daftar Silahkan Daftar terlebih dahulu ...!!!</div>
        <div class="text-danger">*) Gunakan No NISN Sebagai Password</div>
      </div>
      <div class="input-group mb-3">
        <input type="text" name="nisn" class="form-control" placeholder="NISN" autofocus>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>
      <span style="margin-top: 10px;">
        <small class="text-danger ml-2"><?= $validation->hasError('nisn') ? $validation->getError('nisn') : '' ?></small>
      </span>
      <div class="input-group mb-3">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      <span>
        <small class="text-danger ml-2"><?= $validation->hasError('password') ? $validation->getError('password') : '' ?></small>
      </span>
      <div class="row">
        <div class="col-md-6">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
        <div class="col-md-6">
          <a href="<?= base_url('pendaftaran') ?>" class="btn btn-success btn-block btn-flat">Mendaftar</a>
        </div>
      </div>
    </div>
  </div>
  <?= form_close(); ?>
</div>

<?= $this->endSection(); ?>