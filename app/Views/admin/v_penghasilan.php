<?php $this->extend('layouts/template_backend') ?>
<?php $this->section('content') ?>
<div class="col-md-12">
  <?php if (session()->getFlashdata('sukses')) {
    echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span><i class="icon fas fa-check"></i>';
    echo session()->getFlashdata('sukses');
    echo '</span></div>';
  } ?>
</div>
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar <?= $subtitle; ?></h3>
      <div class="card-tools">
        <a href="" class="btn btn-success btn-sm btn-flat" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambah</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table table-sm">
        <thead>
          <tr>
            <th width="70px">No</th>
            <th>Pendidikan</th>
            <th width="170px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($penghasilan as $data) : ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $data['penghasilan']; ?></td>
              <td>
                <button class="btn btn-info btn-sm btn-flat" data-toggle="modal" data-target="#ubah<?= $data['id_penghasilan'] ?>"><i class="fas fa-edit"></i> Ubah</button>
                <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#hapus<?= $data['id_penghasilan']; ?>"><i class="fas fa-trash"></i> hapus</button>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Penghasilan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('penghasilan/add')  ?>
        <div class="form-group">
          <label for="penghasilan">Penghasilan</label>
          <input type="text" name="penghasilan" id="penghasilan" class="form-control" placeholder="Ex: Rp. 0 - Rp. 500.000">
        </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-warning btn-flat">Reset</button>
        <button type="button" data-dismiss="modal" class="btn btn-danger btn-flat">batal</button>
        <button type="submit" class="btn btn-success btn-flat">Tambah</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<?php foreach ($penghasilan as $data) { ?>
  <div class="modal fade" id="ubah<?= $data['id_penghasilan'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ubah Data Penghasilan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?= form_open('penghasilan/ubah/' . $data['id_penghasilan']) ?>
        <div class="modal-body">
          <div class="form-group">
            <label for="penghasilan">Penghasilan</label>
            <input type="text" class="form-control" name="penghasilan" id="penghasilan" value="<?= $data['penghasilan'] ?>">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" data-dismiss="modal" class="btn btn-danger btn-flat">Batal</button>
          <button type="submit" class="btn btn-success btn-flat">Simpan</button>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
<?php } ?>

<?php foreach ($penghasilan as $data) { ?>
  <div class="modal fade" id="hapus<?= $data['id_penghasilan'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h4 class="modal-title">Hapus Data Penghasilan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5>Apakan Anda Yakin Ingin Menghapusnya</h5>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" data-dismiss="modal" class="btn btn-danger btn-flat">Batal</button>
          <a href="<?= base_url('penghasilan/hapus/' . $data['id_penghasilan']) ?>" class="btn btn-success btn-flat">Ya, Hapus</a>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<?php $this->endSection('content') ?>