<?= $this->extend('layouts/template_backend'); ?>
<?= $this->section('content'); ?>
<div class="col-md-12">
  <?php if (session()->getFlashdata('sukses')) {
    echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span><i class="icon fas fa-check"></i>';
    echo session()->getFlashdata('sukses');
    echo '</span></div>';
  } ?>
</div>

<!-- Main content -->
<div class="col-md-12">
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-secondary">
            <div class="inner">
              <h3><?= $totaljurusan; ?></h3>
              <p>Total Jurusan</p>
            </div>
            <div class="icon">
              <i class="fas fa-people-arrows"></i>
            </div>
            <a href="<?= base_url('jurusan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?= $totalpekerjaan; ?></h3>
              <p>Total Pekerjaan</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-md"></i>
            </div>
            <a href="<?= base_url('pekerjaan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3><?= $totalpendidikan; ?></h3>
              <p>Pendidikan</p>
            </div>
            <div class="icon">
              <i class="fas fa-university"></i>
            </div>
            <a href="<?= base_url('pendidikan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $totalagama; ?></h3>
              <p>Total Agama</p>
            </div>
            <div class="icon">
              <i class="fas fa-place-of-worship"></i>
            </div>
            <a href="<?= base_url('agama') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $totalpenghasilan; ?></h3>
              <p>Penghasilan</p>
            </div>
            <div class="icon">
              <i class="fas fa-money-check-alt"></i>
            </div>
            <a href="<?= base_url('penghasilan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $totaluser; ?></h3>
              <p>Total User</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="<?= base_url('user') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?= $totalpmasuk; ?></h3>
              <p>Pendaftaran Masuk</p>
            </div>
            <div class="icon">
              <i class="fas fa-sign-in-alt"></i>
            </div>
            <a href="<?= base_url('ppdb') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $totalpditerima; ?></h3>
              <p>Pendaftaran yang Diterima</p>
            </div>
            <div class="icon">
              <i class="fas fa-hand-holding-heart"></i>
            </div>
            <a href="<?= base_url('ppdb/listDiterima') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $totalpditolak; ?></h3>
              <p>Pendaftaran yang Ditolak</p>
            </div>
            <div class="icon">
              <i class="fas fa-handshake-slash"></i>
            </div>
            <a href="<?= base_url('ppdb/listDitolak') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?= $this->endSection('content'); ?>