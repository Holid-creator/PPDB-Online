<?= $this->extend('layouts/template_frontend'); ?>

<?= $this->section('content'); ?>

<div class="col-md-8">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <?php $no = 1;
      foreach ($benner as $key => $value) {
        $a = $no;
      ?>
        <li data-target="#carouselExampleIndicators" data-slide-to="<?= $no++ ?>" class="<?= $a == 1 ? 'active' : '' ?>"></li>
      <?php } ?>
    </ol>
    <div class="carousel-inner">
      <?php $nomor = 1;
      foreach ($benner as $key => $value) {
        echo $b = $nomor++; ?>
        <div class="carousel-item <?= ($b == 1) ? 'active' : '' ?>">
          <img class="d-block w-100" height="420px" src="<?= base_url('banner/' . $value['benner']) ?>" alt="<?= $b++ ?>">
        </div>
      <?php } ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div class="col-md-4">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">
        Estimasi Pendaftaran
      </h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <div class="info-box">
        <span class="info-box-icon bg-info"><i class="fas fa-graduation-cap"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Jumlah Pendaftaran</span>
          <span class="info-box-text"><?= $jumlahpendaftar; ?></span>
        </div>
      </div>
      <div class="info-box">
        <span class="info-box-icon bg-success"><i class="fas fa-male"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Jumlah Laki-laki</span>
          <span class="info-box-text"><?= $jumlahcowo; ?></span>
        </div>
      </div>
      <div class="info-box">
        <span class="info-box-icon bg-warning"><i class="fas fa-female"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Jumlah Perempuan</span>
          <span class="info-box-text"><?= $jumlahcewe; ?></span>
        </div>
      </div>
      <a href="<?= base_url('pendaftaran') ?>" class="btn btn-primary btn-block btn-flat">Mendaftar</a>
    </div>
  </div>
</div>

<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">Beranda</h3>
    </div>
    <div class="card-body">
      <?= $beranda['beranda']; ?>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>