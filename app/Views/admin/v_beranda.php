<?= $this->extend('layouts/template_backend'); ?>
<?= $this->section('content'); ?>
<div class="col-md-12">
  <?php if (session()->getFlashdata('sukses')) {
    echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span><i class="icon fas fa-check"></i>';
    echo session()->getFlashdata('sukses');
    echo '</span></div>';
  } ?>
</div>
<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">Beranda</h3>
    </div>
    <div class="card-body">
      <?= form_open('admin/saveBeranda') ?>
      <div class="form-group">
        <textarea name="beranda" class="textarea"><?= $beranda['beranda']; ?></textarea>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-success btn-flat"><i class="fas fa-save"></i> Simpan</button>
    </div>
    <?= form_close() ?>
  </div>
</div>
<?= $this->endSection('content'); ?>