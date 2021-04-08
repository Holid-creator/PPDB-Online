<?= $this->extend('layouts/template_backend'); ?>
<?= $this->section('content'); ?>

<div class="col-md-12">
  <?php if (session()->getFlashdata('sukses')) {
    echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span><i class="icon fas fa-check"></i>';
    echo session()->getFlashdata('sukses');
    echo '</span></div>';
  } ?>
</div>

<div class="col-sm-4">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">
        Logo
      </h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <?= form_open_multipart('admin/saveSetting') ?>
      <div class="text-center">
        <img src="<?= base_url('logo/' . $setting['logo']) ?>" class="img-fluid pad" id="gambar_load">
      </div>
      <div class="form-group">
        <label for="">Ganti Foto</label>
        <input type="file" name="logo" class="form-control" accept="image/*" id="preview_gambar">
      </div>
    </div>
  </div>
</div>

<div class="col-sm-8">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">
        Data Sekolah
      </h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Nama Sekolah</label>
            <input name="n_sekolah" class="form-control" value="<?= $setting['n_sekolah'] ?>">
          </div>
          <div class="form-group">
            <label for="">Alamat</label>
            <input name="alamat" class="form-control" value="<?= $setting['alamat'] ?>">
          </div>
          <div class="form-group">
            <label for="">Desa</label>
            <input name="desa" class="form-control" value="<?= $setting['desa'] ?>">
          </div>
          <div class="form-group">
            <label for="">Kecamatan</label>
            <input name="kecamatan" class="form-control" value="<?= $setting['kecamatan'] ?>">
          </div>
          <div class="form-group">
            <label for="">Kabupaten</label>
            <input name="kabupaten" class="form-control" value="<?= $setting['kabupaten'] ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Provinsi</label>
            <input name="provinsi" class="form-control" value="<?= $setting['provinsi'] ?>">
          </div>
          <div class="form-group">
            <label for="">No. Telpon</label>
            <input name="telp" class="form-control" value="<?= $setting['telp'] ?>">
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input name="email" class="form-control" value="<?= $setting['email'] ?>">
          </div>
          <div class="form-group">
            <label for="">Website</label>
            <input name="web" class="form-control" value="<?= $setting['web'] ?>">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">Deskripsi Sekolah</h3>
    </div>
    <div class="card-body">
      <div class="form-group">
        <textarea name="deskripsi" class="form-control" rows="5"><?= $setting['deskripsi'] ?></textarea>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
    </div>
  </div>
</div>

<?= form_close() ?>


<?= $this->endSection('content'); ?>