<?= $this->extend('layouts/template_backend'); ?>
<?= $this->section('content'); ?>

<div class="col-md-12">
  <?php if (session()->getFlashdata('sukses')) {
    echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span><i class="icon fas fa-check"></i>';
    echo session()->getFlashdata('sukses');
    echo '</span></div>';
  } ?>

  <?php if (session()->getFlashdata('danger')) {
    echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span><i class="icon fas fa-times"></i>';
    echo session()->getFlashdata('danger');
    echo '</span></div>';
  } ?>
</div>

<div class="col-md-12">
  <div class="card">
    <div class="card-header bg-primary">
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
            <th width="280px">Aksi</th>
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
                <a href="<?= base_url('ppdb/diterima/' . $value['id_siswa']) ?>" class="btn btn-flat btn-success btn-sm">
                  <i class="fas fa-check"></i> Diterima
                </a>
                <a href="<?= base_url('ppdb/ditolak/' . $value['id_siswa']) ?>" class="btn btn-flat btn-danger btn-sm">
                  <i class="fas fa-times"></i> Ditolak
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