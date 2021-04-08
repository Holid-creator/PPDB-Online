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
            <th>Pekerjaan</th>
            <th width="170px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($pekerjaan as $data) : ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $data['pekerjaan']; ?></td>
              <td>
                <button class="btn btn-info btn-sm btn-flat" data-toggle="modal" data-target="#edit<?= $data['id_pekerjaan']; ?>"><i class="fas fa-edit"></i> Ubah</button>
                <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#hapus<?= $data['id_pekerjaan']; ?>"><i class="fas fa-trash"></i> hapus</button>
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
        <h4 class="modal-title">Tambah Data Pekerjaan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('pekerjaan/insert') ?>
        <div class="form-group">
          <label for="pekerjaan">Pekerjaan</label>
          <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" required>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm btn-flat">Tutup</button>
        <button type="submit" class="btn btn-success btn-sm btn-flat">Tambah</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<?php foreach ($pekerjaan as $data) : ?>
  <div class="modal fade" id="edit<?= $data['id_pekerjaan']; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Pekerjaan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?= form_open('pekerjaan/edit/' . $data['id_pekerjaan']) ?>
          <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="<?= $data['pekerjaan'] ?>">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm btn-flat">Tutup</button>
          <button type="submit" class="btn btn-success btn-sm btn-flat">Simpan</button>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
<?php endforeach ?>

<?php foreach ($pekerjaan as $data) : ?>
  <div class="modal fade" id="hapus<?= $data['id_pekerjaan']; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h4 class="modal-title">Hapus Data Pekerjaan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah Anda Yakin ingin Menghapusnya <?= $data['pekerjaan']; ?>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm btn-flat">Tidak</button>
          <a href="<?= base_url('pekerjaan/hapus/' . $data['id_pekerjaan']) ?>" class="btn btn-success btn-sm btn-flat">Ya, Hapus</a>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
<?php endforeach ?>
<?php $this->endSection('content') ?>