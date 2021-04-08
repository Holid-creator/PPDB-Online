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
  <div class="card">
    <div class="card-header bg-danger">
      <h3 class="card-title">Daftar <?= $subtitle; ?></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table table-striped projects">
        <thead>
          <tr>
            <th>No</th>
            <th>Foto</th>
            <th>No Pendaftaran</th>
            <th>Tahun</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Jalur Masuk</th>
            <th width="120px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($ppdb as $key => $value) { ?>
            <tr>
              <td><?= $no++; ?></td>
              <td>
                <img src="<?= base_url('foto_siswa/' . $value['foto']) ?>" width="100px" class="table-avatar">
              </td>
              <td><?= $value['no_pendaftaran']; ?></td>
              <td><?= $value['thn']; ?></td>
              <td><?= $value['nisn']; ?></td>
              <td><?= $value['n_lengkap']; ?></td>
              <td><span class="badge badge-warning"><?= $value['jalur_msk']; ?></span></td>
              <td>
                <a href="<?= base_url('ppdb/detailData/' . $value['id_siswa']) ?>" class="btn btn-flat btn-primary btn-sm">
                  <i class="fas fa-eye"></i> View
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection('content'); ?>