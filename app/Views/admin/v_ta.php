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
  <?php if (session()->getFlashdata('gagal')) {
    echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span><i class="icon fas fa-check"></i>';
    echo session()->getFlashdata('gagal');
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
            <th>Tahun</th>
            <th>Tahun Ajaran</th>
            <th>Status</th>
            <th>Aktif/ NonAktif</th>
            <th width="170px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($ta as $data) : ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $data['thn']; ?></td>
              <td><?= $data['ta']; ?></td>
              <td>
                <?= ($data['status'] == 1)  ? '<label class="badge badge-success">Aktif</label>' : '<label class="badge badge-secondary">Tidak Aktif</label>' ?>
              </td>
              <td>
                <?php if ($data['status'] == 1) { ?>
                  <a href="<?= base_url('ta/statusNonAktif/' . $data['id_ta']) ?>" class="btn btn-danger btn-xs btn-flat">Nonaktifkan</a>
                <?php } else { ?>
                  <a href="<?= base_url('ta/statusAktif/' . $data['id_ta']) ?>" class="btn btn-success btn-xs btn-flat">Aktifkan</a>
                <?php } ?>
              </td>
              <td>
                <button class="btn btn-info btn-sm btn-flat" data-toggle="modal" data-target="#edit<?= $data['id_ta']; ?>"><i class="fas fa-edit"></i> Ubah</button>
                <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#hapus<?= $data['id_ta']; ?>"><i class="fas fa-trash"></i> hapus</button>
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
        <h4 class="modal-title">Tambah Data ta</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('ta/add') ?>
        <div class="form-group">
          <label for="thn">Tahun</label>
          <select name="thn" class="form-control">
            <?php $now = date('Y');
            for ($i = 2018; $i <= $now; $i++) { ?>
              <option value="<?= $i ?>" <?= ($now == $i) ? 'selected' : '' ?>><?= $i ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="ta">Tahun Ajaran</label>
          <input type="text" class="form-control" name="ta" id="ta" required>
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

<?php foreach ($ta as $data) : ?>
  <div class="modal fade" id="edit<?= $data['id_ta']; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data ta</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?= form_open('ta/ubah/' . $data['id_ta']) ?>
          <div class="form-group">
            <label for="ta">Tahun Ajaran</label>
            <select name="thn" class="form-control">
              <?php $now = date('Y');
              for ($i = 2018; $i <= $now; $i++) { ?>
                <option value="<?= $i ?>" <?= ($i == $data['thn']) ? 'selected' : '' ?>><?= $i ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="ta">Tahun Ajaran</label>
            <input type="text" class="form-control" name="ta" id="ta" value="<?= $data['ta'] ?>">
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

<?php foreach ($ta as $data) : ?>
  <div class="modal fade" id="hapus<?= $data['id_ta']; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h4 class="modal-title">Hapus Data ta</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah Anda Yakin ingin Menghapusnya <?= $data['ta']; ?>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm btn-flat">Tidak</button>
          <a href="<?= base_url('ta/hapus/' . $data['id_ta']) ?>" class="btn btn-success btn-sm btn-flat">Ya, Hapus</a>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
<?php endforeach ?>
<?php $this->endSection('content') ?>