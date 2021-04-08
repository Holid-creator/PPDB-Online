<?= $this->extend('layouts/template_frontend') ?>
<?= $this->section('content'); ?>

<?php

$db = \Config\Database::connect();

$ta = $db->table('tb_ta')->where('status', '1')->get()->getRowArray();

?>

<?php if ($ta['status'] == 1) { ?>
  <div class="col-md-5">
    <img src="<?= base_url('logo/pendaftaran.png') ?>" width="400px" class="img-fluid pad">
  </div>

  <div class="col-md-7">
    <?= form_open('pendaftaran/simpan'); ?>
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title">
          Pendaftaran
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
        <div class="row">
          <div class="col-md-6">
            <label for="nisn">NISN</label>
            <input type="text" class="form-control" name="nisn" id="nisn" value="<?= old('nisn') ?>" autofocus>
            <small class="text-danger ml-2"><?= $validation->hasError('nisn') ? $validation->getError('nisn') : '' ?></small>
          </div>
          <div class="col-md-6">
            <label for="jalur">Jalur Masuk</label>
            <select name="jalur" id="jalur" class="form-control">
              <option value="">-- Pilih Jalur Masuk --</option>
              <?php foreach ($jalur as $key => $value) { ?>
                <option value="<?= $value['id_jalur_msk'] ?>"><?= $value['jalur_msk']; ?></option>
              <?php } ?>
            </select>
            <small class="text-danger ml-2"><?= $validation->hasError('jalur') ? $validation->getError('jalur') : '' ?></small>
          </div>
          <div class="col-md-6">
            <label for="n_lengkap">Nama Lengkap</label>
            <input type="text" class="form-control" name="n_lengkap" id="n_lengkap" value="<?= old('n_lengkap') ?>">
            <small class="text-danger ml-2"><?= $validation->hasError('n_lengkap') ? $validation->getError('n_lengkap') : '' ?></small>
          </div>
          <div class="col-md-6">
            <label for="n_panggilan">Nama Panggilan</label>
            <input type="text" class="form-control" name="n_panggilan" id="n_panggilan" value="<?= old('n_panggilan') ?>">
            <small class="text-danger ml-2"><?= $validation->hasError('n_panggilan') ? $validation->getError('n_panggilan') : '' ?></small>
          </div>
          <div class="col-md-6">
            <label for="jk">Jenis Kelamin</label>
            <select name="jk" id="jk" class="form-control">
              <option value="">-- Jenis Kelamin --</option>
              <option value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select>
            <small class="text-danger ml-2"><?= $validation->hasError('jk') ? $validation->getError('jk') : '' ?></small>
          </div>
          <div class="col-md-6">
            <label for="t_lhr">Tempat Lahir</label>
            <input type="text" class="form-control" name="t_lhr" id="t_lhr" value="<?= old('t_lhr') ?>">
            <small class="text-danger ml-2"><?= $validation->hasError('t_lhr') ? $validation->getError('t_lhr') : '' ?></small>
          </div>
          <div class="col-md-4">
            <label for="tgl">Tanggal</label>
            <select name="tgl" id="tgl" class="form-control">
              <option value="">-- Tanggal --</option>
              <?php
              for ($i = 1; $i <= 31; $i++) { ?>
                <option value="<?= $i ?>"><?= $i; ?></option>
              <?php } ?>
            </select>
            <small class="text-danger ml-2"><?= $validation->hasError('tgl') ? $validation->getError('tgl') : '' ?></small>
          </div>
          <div class="col-md-4">
            <label for="bln">Bulan</label>
            <select name="bln" id="bln" class="form-control">
              <option value="">-- Bulan --</option>
              <?php $bln = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
              for ($i = 1; $i <= 12; $i++) { ?>
                <option value="<?= $i ?>"><?= $bln[$i - 1]; ?></option>
              <?php } ?>
            </select>
            <small class="text-danger ml-2"><?= $validation->hasError('bln') ? $validation->getError('bln') : '' ?></small>
          </div>
          <div class="col-md-4">
            <label for="thn">Tahun</label>
            <select name="thn" id="thn" class="form-control">
              <option value="">-- Tahun --</option>
              <?php $now = date('Y');
              for ($i = 1990; $i <= $now; $i++) { ?>
                <option value="<?= $i ?>"><?= $i; ?></option>
              <?php } ?>
            </select>
            <small class="text-danger ml-2"><?= $validation->hasError('thn') ? $validation->getError('thn') : '' ?></small>
          </div>

          <div class="col-md-12">
            <label for="jurusan">Jurusan <span class="text-danger">( Pilih Jika Ada )</span></label>
            <select name="jurusan" id="jurusan" class="form-control">
              <option value="">-- Pilih Jurusan --</option>
              <?php foreach ($jurusan as $key => $value) { ?>
                <option value="<?= $value['id_jurusan'] ?>"><?= $value['jurusan']; ?></option>
              <?php } ?>
            </select>
            <small class="text-danger ml-2"><?= $validation->hasError('jurusan') ? $validation->getError('jurusan') : '' ?></small>
          </div>
          <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-save"></i> Mendaftar</button>
        </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
<?php } else { ?>
  <div class="col-md-12">
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-exclamation-triangle"></i> Pemberitahuan !</h5>
      Mohon Maaf Pendaftaran Sudah Ditutup
    </div>
  </div>
<?php } ?>

<?= $this->endSection(); ?>