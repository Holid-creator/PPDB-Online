<?= $this->extend('layouts/template_backend'); ?>
<?= $this->section('content'); ?>

<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title"><b>Formulir Pendaftaran Peserta Didik</b></h3>
      <div class="card-tools">
        <?php if ($siswa['stat_ppdb'] == '1') { ?>
          <a href="<?= base_url('ppdb/listDiterima') ?>" class="btn btn-outline-primary btn-sm btn-flat"><i class="fas fa-forward"></i> Kembali</a>
        <?php } elseif ($siswa['stat_ppdb'] == '2') { ?>
          <a href="<?= base_url('ppdb/listDitolak') ?>" class="btn btn-outline-primary btn-sm btn-flat"><i class="fas fa-forward"></i> Kembali</a>
        <?php } else { ?>
          <a href="<?= base_url('ppdb') ?>" class="btn btn-outline-primary btn-sm btn-flat"><i class="fas fa-forward"></i> Kembali</a>
        <?php } ?>
      </div>
      <br>
      <div class="card-body">
        <div class="col-md-12">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-align-justify"></i> <b>Pendaftaran</b></h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <strong><i class="fas fa-book"></i> NISN</strong>
                  <p class="text-muted"><?= $siswa['nisn']; ?></p>
                </div>
                <div class="col-md-3">
                  <strong><i class="fas fa-book"></i> No Pendaftaran/ Jurusan</strong>
                  <p class="text-muted"><?= $siswa['no_pendaftaran']; ?>/ <?= $siswa['jurusan'] ?></p>
                </div>
                <div class="col-md-3">
                  <strong><i class="fas fa-book"></i> Tanggal Pendaftaran</strong>
                  <p class="text-muted"><?= date('d-F-Y', strtotime($siswa['tgl_pendaftaran'])); ?></p>
                </div>
                <div class="col-md-3">
                  <strong><i class="fas fa-book"></i> Jalur Pendaftaran</strong>
                  <?= ($siswa['jalur_msk'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p class="text-muted">' . $siswa['jalur_msk'] . '</p>'; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-image"></i> <b>Foto Siswa</b></h3>
                <div class="card-tools">
                  <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                    <button type="button" class="btn btn-outline-secondary btn-xs btn-flat" data-toggle="modal" data-target="#editFoto"><i class="fas fa-pencil"></i> Edit</button>
                  <?php } ?>
                </div>
              </div>
              <div class="card-body">
                <div class="text-center">
                  <?php if ($siswa['foto'] == null) { ?>
                    <img src="<?= base_url('foto_siswa/blank.jpg') ?>" width="250px" class="img-fluid">
                  <?php } else { ?>
                    <img src="<?= base_url('foto_siswa/' . $siswa['foto']) ?>" width="250px">
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-graduation-cap"></i> <b>Identitas Peserta Didik</b></h3>
                <div class="card-tools">
                  <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                    <button type="button" class="btn btn-outline-secondary btn-xs btn-flat" data-toggle="modal" data-target="#editSiswa"><i class="fas fa-pencil"></i> Edit</button>
                  <?php } ?>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <strong><i class="fas fa-book"></i> Nama Lengkap</strong>
                    <?= ($siswa['n_lengkap'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['n_lengkap'] . '</p>' ?>
                    <strong><i class="fas fa-map-marker-alt"></i> Tempat Lahir</strong>
                    <?= ($siswa['t_lhr'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['t_lhr'] . '</p>' ?>
                    <strong><i class="fas fa-pencil-alt"></i> NIK</strong>
                    <?= ($siswa['nik'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['nik'] . '</p>' ?>
                    <strong><i class="fas fa-book"></i> Agama</strong>
                    <?= ($siswa['id_agama'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['agama'] . '</p>' ?>
                  </div>
                  <div class="col-md-4">
                    <strong><i class="fas fa-book"></i> Nama Panggilan</strong>
                    <?= ($siswa['n_panggilan'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['n_panggilan'] . '</p>' ?>
                    <strong><i class="fas fa-map-marker-alt"></i> Tanggal Lahir</strong>
                    <?= ($siswa['tgl_lhr'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . date('d-F-Y', strtotime($siswa['tgl_lhr'])) . '</p>' ?>
                    <strong><i class="fas fa-male"></i> Jenis Kelamin</strong>
                    <?= ($siswa['jk'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . ($siswa['jk'] == 'L' ? 'Laki-laki' : 'Perempuan') . '</p>' ?>
                    <strong><i class="fas fa-phone"></i> No Telepon</strong>
                    <?= ($siswa['telp'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['telp'] . '</p>' ?>
                  </div>
                  <div class="col-md-4">
                    <strong><i class="fas fa-book"></i> Tinggi Badan</strong>
                    <?= ($siswa['tinggi_bdn'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['tinggi_bdn'] . ' Kg</p>' ?>
                    <strong><i class="fas fa-map-marker-alt"></i> Berat Badan</strong>
                    <?= ($siswa['brt_bdn'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['brt_bdn'] . ' Kg</p>' ?>
                    <strong><i class="fas fa-map-marker-alt"></i> Jumlah Bersaudara</strong>
                    <?= ($siswa['jml_saudara'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['jml_saudara'] . ' Saudara</p>' ?>
                    <strong><i class="fas fa-map-marker-alt"></i> Anak Ke</strong>
                    <?= ($siswa['anak_ke'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['anak_ke'] . '</p>' ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-male"></i> <b>Data Ayah Kandung</b></h3>
                <div class="card-tools">
                  <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                    <button type="button" class="btn btn-outline-secondary btn-xs btn-flat" data-toggle="modal" data-target="#editAyah"><i class="fas fa-pencil"></i> Edit</button>
                  <?php } ?>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <strong><i class="fas fa-book"></i> NIK Ayah</strong>
                    <?= ($siswa['nik_ayah'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['nik_ayah'] . '</p>' ?>
                    <strong><i class="fas fa-map-marker-alt"></i> Nama Ayah</strong>
                    <?= ($siswa['n_ayah'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['n_ayah'] . '</p>' ?>
                  </div>
                  <div class="col-md-4">
                    <strong><i class="fas fa-book"></i> Pekerjaan</strong>
                    <?= ($siswa['p_ayah'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['p_ayah'] . '</p>' ?>
                    <strong><i class="fas fa-map-marker-alt"></i> Pendidikan</strong>
                    <?= ($siswa['pend_ayah'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['pend_ayah'] . '</p>' ?>
                  </div>
                  <div class="col-md-4">
                    <strong><i class="fas fa-book"></i> Penghasilan/ Bulan</strong>
                    <?= ($siswa['peng_ayah'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['peng_ayah'] . '</p>' ?>
                    <strong><i class="fas fa-map-marker-alt"></i> No Telpon</strong>
                    <?= ($siswa['telp_ayah'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['telp_ayah'] . '</p>' ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-male"></i> <b>Data Ibu Kandung</b></h3>
                <div class="card-tools">
                  <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                    <button type="button" class="btn btn-outline-secondary btn-xs btn-flat" data-toggle="modal" data-target="#editIbu"><i class="fas fa-pencil"></i> Edit</button>
                  <?php } ?>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <strong><i class="fas fa-book"></i> NIK Ibu</strong>
                    <?= ($siswa['nik_ibu'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['nik_ibu'] . '</p>' ?>
                    <strong><i class="fas fa-map-marker-alt"></i> Nama Ibu</strong>
                    <?= ($siswa['n_ibu'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['n_ibu'] . '</p>' ?>
                  </div>
                  <div class="col-md-4">
                    <strong><i class="fas fa-book"></i> Pekerjaan</strong>
                    <?= ($siswa['p_ibu'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['p_ibu'] . '</p>' ?>
                    <strong><i class="fas fa-map-marker-alt"></i> Pendidikan</strong>
                    <?= ($siswa['pend_ibu'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['pend_ibu'] . '</p>' ?>
                  </div>
                  <div class="col-md-4">
                    <strong><i class="fas fa-book"></i> Penghasilan/ Bulan</strong>
                    <?= ($siswa['peng_ibu'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['peng_ibu'] . '</p>' ?>
                    <strong><i class="fas fa-map-marker-alt"></i> No Telpon</strong>
                    <?= ($siswa['telp_ibu'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['telp_ibu'] . '</p>' ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-map"></i> <b>Alamat Lengkap</b></h3>
                <div class="card-tools">
                  <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                    <button type="button" class="btn btn-outline-secondary btn-xs btn-flat" data-toggle="modal" data-target="#editWilayah"><i class="fas fa-pencil"></i> Edit</button>
                  <?php } ?>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <strong><i class="fas fa-book"></i> Provinsi</strong>
                    <?= ($siswa['prov'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['prov'] . '</p>' ?>
                  </div>
                  <div class="col-md-3">
                    <strong><i class="fas fa-map-marker-alt"></i> Kabupaten/ Kota</strong>
                    <?= ($siswa['kab'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['kab'] . '</p>' ?>
                  </div>
                  <div class="col-md-3">
                    <strong><i class="fas fa-map-marker-alt"></i> Kecamatan</strong>
                    <?= ($siswa['kec'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['kec'] . '</p>' ?>
                  </div>
                  <div class="col-md-3">
                    <strong><i class="fas fa-map-marker-alt"></i> Desa</strong>
                    <?= ($siswa['desa'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['desa'] . '</p>' ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-school"></i> <b>Sekolah Asal</b></h3>
                <div class="card-tools">
                  <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                    <button type="button" class="btn btn-outline-secondary btn-xs btn-flat" data-toggle="modal" data-target="#editSekolah"><i class="fas fa-pencil"></i> Edit</button>
                  <?php } ?>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <strong><i class="fas fa-map-marker-alt"></i> Nama Sekolah</strong>
                    <?= ($siswa['n_sek'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['n_sek'] . '</p>' ?>
                  </div>
                  <div class="col-md-3">
                    <strong><i class="fas fa-book"></i> Tahun Lulus</strong>
                    <?= ($siswa['thn_lulus'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['thn_lulus'] . '</p>' ?>
                  </div>
                  <div class="col-md-3">
                    <strong><i class="fas fa-book"></i> No Ijazah</strong>
                    <?= ($siswa['ijazah'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['ijazah'] . '</p>' ?>
                  </div>
                  <div class="col-md-3">
                    <strong><i class="fas fa-map-marker-alt"></i> No SKHUN</strong>
                    <?= ($siswa['skhun'] == null) ? '<p class="text-danger">Wajib Diisi</p>' : '<p>' . $siswa['skhun'] . '</p>' ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-file"></i> <b>File Pendukung</b></h3>
                <div class="card-tools">
                  <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                    <button type="button" class="btn btn-outline-success btn-xs btn-flat" data-toggle="modal" data-target="#addBerkas"><i class="fas fa-plus"></i> Add</button>
                  <?php } ?>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Jenis File</th>
                      <th>Keterangan</th>
                      <th>File</th>
                      <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                        <th width="100px">Aksi</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    foreach ($berkas as $key => $value) { ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $value['lampiran']; ?></td>
                        <td><?= $value['ket']; ?></td>
                        <td class="text-center"><a target="blank" href="<?= base_url('berkas/' . $value['berkas']) ?>"><i class="fas fa-file-pdf fa-2x"></i></a></td>
                        <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                          <td>
                            <a href="" data-toggle="modal" data-target="#hapusBerkas<?= $value['id_berkas'] ?>"><i class="fas fa-trash text-danger"></i></a>
                          </td>
                        <?php } ?>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="text-center">
          <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
            <button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#apply"><i class="fas fa-check"></i> Apply Pendaftaran</button>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <?= $this->endSection('content'); ?>