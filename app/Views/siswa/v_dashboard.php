<?= $this->extend('layouts/template_frontend'); ?>
<?= $this->section('content'); ?>

<?php if ($siswa['stat_ppdb'] == 1) { ?>
  <div class="col-md-12">
    <div class="text-center">
      <div class="alert bg-maroon alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h3><i class="icon fas fa-exclamation-triangle"></i> Pemberitahuan :</h3>
        Selamat Pendaftaran Anda Telah Kami Terima !!! Silahkan Klik <a href="<?= base_url('siswa/buktiLulus') ?>"><span class="text-primary">Disini</span></a>
      </div>
    </div>
  </div>
<?php } elseif ($siswa['stat_ppdb'] == 2) { ?>
  <div class="col-md-12">
    <div class="text-center">
      <div class="alert bg-maroon alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h3><i class="icon fas fa-exclamation-triangle"></i> Pemberitahuan :</h3>
        Maaf Pendaftaran Anda Telah Kami Tolak
      </div>
    </div>
  </div>
<?php } else { ?>
  <div class="col-md-12">
    <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h3><i class="icon fas fa-exclamation-triangle"></i> Pemberitahuan :</h3>
        Lengkapi Terlebih Dahulu Biodata Anda Sebelum Melakukan Apply Pendaftaran
      </div>
    <?php } else { ?>
      <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h3><i class="icon fas fa-exclamation-triangle"></i> Pendaftaran Sudah Dikirim !!!</h3>
        Silahkan Menunggu Sampai Pengumuman Hasil Kelulusan !!
      </div>
    <?php } ?>
    <?php
    session()->getFlashdata('errors');
    if (session()->getFlashdata('sukses')) {
      echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span><i class="icon fas fa-check"></i>';
      echo session()->getFlashdata('sukses');
      echo '</span></div>';
    } ?>
    <?php
    $errors = session()->getFlashdata('errors');
    if (!empty($errors)) { ?>
      <div class="alert alert-danger" role="alert">
        <ul>
          <?php foreach ($errors as $error) : ?>
            <li><?= esc($error) ?></li>
          <?php endforeach ?>
        </ul>
      </div>
    <?php } ?>
  </div>
  <div class="col-md-12">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title"><b>Biodata Siswa</b></h3>
      </div>
      <div class="card-body">
        <div class="col-md-12">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-align-justify"></i> <b>Pendaftaran</b></h3>
              <div class="card-tools">
                <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                  <button type="button" class="btn btn-outline-secondary btn-xs btn-flat" data-toggle="modal" data-target="#updatePendaftaran"><i class="fas fa-pencil-alt"></i> Edit</button>
                <?php } ?>
              </div>
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
                  <p class="text-danger"><?= $validation->hasError('foto') ? $validation->getError('foto') : ''; ?></p>
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
<?php } ?>

<div class="modal fade" id="apply">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h3 class="modal-title">Perhatian</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Pastikan Data semua Benar, Data yang sudah dikirim tidak dapat diubah lagi...!!!
      </div>
      <div class="modal-footer justify-content-between bg-warning">
        <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"> Batal</button>
        <a href="<?= base_url('siswa/apply/' . $siswa['id_siswa']) ?>" type="submit" class="btn btn-success btn-flat"> Kirim</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="updatePendaftaran">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h3 class="modal-title">Pendaftaran</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('siswa/updatePendaftaran/' . $siswa['id_siswa']); ?>
      <div class="modal-body">
        <div class="form-group">
          <label for="pendaftaran">Pendaftaran</label>
          <input type="text" class="form-control" name="pendaftaran" id="pendaftaran" value="<?= $siswa['nisn'] ?>" readonly>
        </div>
        <div class="form-group">
          <label for="no_pendaftaran">No Pendaftaran</label>
          <input type="text" class="form-control" name="no_pendaftaran" id="no_pendaftaran" value="<?= $siswa['no_pendaftaran'] ?>" readonly>
        </div>
        <div class="form-group">
          <label for="jurusan">Jurusan</label>
          <select name="jurusan" id="jurusan" class="form-control">
            <option value="">-- Pilih Jurusan --</option>
            <?php foreach ($jurusan as $key => $value) { ?>
              <option value="<?= $value['id_jurusan'] ?>" <?= $siswa['id_jurusan'] == $value['id_jurusan'] ? 'selected' : '' ?>><?= $value['jurusan']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="pendaftaran">Tanggal Pendaftaran</label>
          <input type="text" class="form-control" name="pendaftaran" id="pendaftaran" value="<?= date('d-F-Y', strtotime($siswa['tgl_pendaftaran'])) ?>" readonly>
        </div>
        <div class="form-group">
          <label for="id_jalur_msk">Jalur Masuk</label>
          <select name="id_jalur_msk" class="form-control" id="id_jalur_msk">
            <option value="">-- Pilih Jalur Masuk __</option>
            <?php foreach ($jalur as $key => $value) { ?>
              <option value="<?= $value['id_jalur_msk'] ?>" <?= $siswa['id_jalur_msk'] == $value['id_jalur_msk'] ? 'selected' : '' ?>><?= $value['jalur_msk']; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"> Batal</button>
        <button type="submit" class="btn btn-success btn-flat"> Simpan</button>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>

<div class="modal fade" id="editFoto">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h3 class="modal-title">Edit Foto</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('siswa/updateFoto/' . $siswa['id_siswa']); ?>
      <div class="modal-body">
        <div class="form-group text-center">
          <label for="foto">Ganti Foto</label><br>
          <?php if ($siswa['foto'] == null) { ?>
            <img src="<?= base_url('foto_siswa/blank.jpg') ?>" width="200px" class="img-fluid" id="gambar_load">
          <?php } else { ?>
            <img src="<?= base_url('foto_siswa/' . $siswa['foto']) ?>" width="200px" id="gambar_load">
          <?php } ?>
          <input type="file" class="form-control mt-3" name="foto" id="preview_gambar">
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"> Batal</button>
        <button type="submit" class="btn btn-success btn-flat"> Simpan</button>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>

<div class="modal fade" id="editSiswa">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h3 class="modal-title">Edit Identitas Siswa</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('siswa/updateSiswa/' . $siswa['id_siswa']); ?>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="n_lengkap">Nama Lengkap</label>
              <input type="text" name="n_lengkap" id="n_lengkap" class="form-control" value="<?= $siswa['n_lengkap'] ?>">
            </div>
            <div class="form-group">
              <label for="t_lhr">Tempat Lahir</label>
              <input type="text" name="t_lhr" id="t_lhr" class="form-control" value="<?= $siswa['t_lhr'] ?>">
            </div>
            <div class="form-group">
              <label for="nik">NIK</label>
              <input type="text" name="nik" id="nik" class="form-control" value="<?= $siswa['nik'] ?>">
            </div>
            <div class="form-group">
              <label for="id_agama">Agama</label>
              <select name="id_agama" id="agama" class="form-control">
                <option value="">-- Pilih Agama --</option>
                <?php foreach ($agama as $key => $value) { ?>
                  <option value="<?= $value['id_agama'] ?>" <?= $siswa['id_agama'] == $value['id_agama'] ? 'selected' : '' ?>><?= $value['agama']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="n_panggilan">Nama Panggilan</label>
              <input type="text" name="n_panggilan" id="n_panggilan" class="form-control" value="<?= $siswa['n_panggilan'] ?>">
            </div>
            <div class="form-group">
              <label for="tgl_lhr">Tanggal Lahir</label>
              <input type="date" name="tgl_lhr" id="tgl_lhr" class="form-control" value="<?= $siswa['tgl_lhr'] ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="jk">Jenis Kelamin</label>
              <select name="jk" id="jk" class="form-control">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="L" <?= $siswa['jk'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="P" <?= $siswa['jk'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="telp">No Telepon</label>
              <input type="number" name="telp" id="telp" class="form-control" value="<?= $siswa['telp'] ?>">
            </div>
            <div class="form-group">
              <label for="tinggi_bdn">Tinggi Badan</label>
              <input type="number" name="tinggi_bdn" id="tinggi_bdn" class="form-control" value="<?= $siswa['tinggi_bdn'] ?>">
            </div>
            <div class="form-group">
              <label for="brt_bdn">Berat Badan</label>
              <input type="number" name="brt_bdn" id="brt_bdn" class="form-control" value="<?= $siswa['brt_bdn'] ?>">
            </div>
            <div class="form-group">
              <label for="jml_saudara">Jumlah Saudara</label>
              <input type="number" name="jml_saudara" id="jml_saudara" class="form-control" value="<?= $siswa['jml_saudara'] ?>">
            </div>
            <div class="form-group">
              <label for="anak_ke">Anak Ke</label>
              <input type="number" name="anak_ke" id="anak_ke" class="form-control" value="<?= $siswa['anak_ke'] ?>">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"> Batal</button>
        <button type="submit" class="btn btn-success btn-flat"> Simpan</button>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>

<div class="modal fade" id="editAyah">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h3 class="modal-title">Edit Ayah Kandung</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('siswa/updateAyah/' . $siswa['id_siswa']); ?>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nik_ayah">NIK Ayah</label>
              <input type="text" name="nik_ayah" id="nik_ayah" class="form-control" value="<?= $siswa['nik_ayah'] ?>">
            </div>
            <div class="form-group">
              <label for="n_ayah">Nama Ayah</label>
              <input type="text" name="n_ayah" id="n_ayah" class="form-control" value="<?= $siswa['n_ayah'] ?>">
            </div>
            <div class="form-group">
              <label for="p_ayah">Pekerjaan</label>
              <select name="p_ayah" id="p_ayah" class="form-control">
                <option value="">-- Pilih Pekerjaan --</option>
                <?php foreach ($pekerjaan as $key => $value) { ?>
                  <option value="<?= $value['pekerjaan'] ?>" <?= $siswa['p_ayah'] == $value['pekerjaan'] ? 'selected' : '' ?>><?= $value['pekerjaan']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="pend_ayah">Pendidikan</label>
              <select name="pend_ayah" id="pend_ayah" class="form-control">
                <option value="">-- Pilih Pendidikan --</option>
                <?php foreach ($pendidikan as $key => $value) { ?>
                  <option value="<?= $value['pendidikan'] ?>" <?= $siswa['pend_ayah'] == $value['pendidikan'] ? 'selected' : '' ?>><?= $value['pendidikan']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="peng_ayah">Penghasilan/ Bulan</label>
              <select name="peng_ayah" class="form-control">
                <option value="">-- Pilih Penghasilan --</option>
                <?php foreach ($penghasilan as $key => $value) { ?>
                  <option value="<?= $value['penghasilan'] ?>" <?= $siswa['peng_ayah'] == $value['penghasilan'] ? 'selected' : '' ?>><?= $value['penghasilan']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="telp_ayah">No Telpon</label>
              <input type="name" name="telp_ayah" id="telp_ayah" class="form-control" value="<?= $siswa['telp_ayah'] ?>">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"> Batal</button>
        <button type="submit" class="btn btn-success btn-flat"> Simpan</button>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>

<div class="modal fade" id="editIbu">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h3 class="modal-title">Edit ibu Kandung</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('siswa/updateIbu/' . $siswa['id_siswa']); ?>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nik_ibu">NIK ibu</label>
              <input type="text" name="nik_ibu" id="nik_ibu" class="form-control" value="<?= $siswa['nik_ibu'] ?>">
            </div>
            <div class="form-group">
              <label for="n_ibu">Nama ibu</label>
              <input type="text" name="n_ibu" id="n_ibu" class="form-control" value="<?= $siswa['n_ibu'] ?>">
            </div>
            <div class="form-group">
              <label for="p_ibu">Pekerjaan</label>
              <select name="p_ibu" id="p_ibu" class="form-control">
                <option value="">-- Pilih Pekerjaan --</option>
                <?php foreach ($pekerjaan as $key => $value) { ?>
                  <option value="<?= $value['pekerjaan'] ?>" <?= $siswa['p_ibu'] == $value['pekerjaan'] ? 'selected' : '' ?>><?= $value['pekerjaan']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="pend_ibu">Pendidikan</label>
              <select name="pend_ibu" id="pend_ibu" class="form-control">
                <option value="">-- Pilih Pendidikan --</option>
                <?php foreach ($pendidikan as $key => $value) { ?>
                  <option value="<?= $value['pendidikan'] ?>" <?= $siswa['pend_ibu'] == $value['pendidikan'] ? 'selected' : '' ?>><?= $value['pendidikan']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="peng_ibu">Penghasilan/ Bulan</label>
              <select name="peng_ibu" class="form-control">
                <option value="">-- Pilih Penghasilan --</option>
                <?php foreach ($penghasilan as $key => $value) { ?>
                  <option value="<?= $value['penghasilan'] ?>" <?= $siswa['peng_ibu'] == $value['penghasilan'] ? 'selected' : '' ?>><?= $value['penghasilan']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="telp_ibu">No Telpon</label>
              <input type="name" name="telp_ibu" id="telp_ibu" class="form-control" value="<?= $siswa['telp_ibu'] ?>">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"> Batal</button>
        <button type="submit" class="btn btn-success btn-flat"> Simpan</button>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>

<div class="modal fade" id="editWilayah">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h3 class="modal-title">Edit Wilayah</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('siswa/updateWilayah/' . $siswa['id_siswa']); ?>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="prov">Provinsi</label>
              <input type="text" name="prov" id="prov" class="form-control" value="<?= $siswa['prov'] ?>">
            </div>
            <div class="form-group">
              <label for="kab">Kabupaten/ Kota</label>
              <input type="text" name="kab" id="kab" class="form-control" value="<?= $siswa['kab'] ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="kec">Kecamatan</label>
              <input type="text" class="form-control" id="kec" name="kec" value="<?= $siswa['kec'] ?>">
            </div>
            <div class="form-group">
              <label for="desa">Desa</label>
              <input type="text" class="form-control" id="desa" name="desa" value="<?= $siswa['desa'] ?>">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"> Batal</button>
        <button type="submit" class="btn btn-success btn-flat"> Simpan</button>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>

<div class="modal fade" id="editSekolah">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h3 class="modal-title">Edit Sekolah</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('siswa/updateSekolah/' . $siswa['id_siswa']); ?>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="n_sek">Nama Sekolah</label>
              <input type="text" name="n_sek" id="n_sek" class="form-control" value="<?= $siswa['n_sek'] ?>">
            </div>
            <div class="form-group">
              <label for="thn_lulus">Tahun Lulus</label>
              <input type="text" name="thn_lulus" id="thn_lulus" class="form-control" value="<?= $siswa['thn_lulus'] ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="ijazah">Ijazah</label>
              <input type="text" class="form-control" id="ijazah" name="ijazah" value="<?= $siswa['ijazah'] ?>">
            </div>
            <div class="form-group">
              <label for="skhun">No SKHUN</label>
              <input type="text" class="form-control" id="skhun" name="skhun" value="<?= $siswa['skhun'] ?>">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"> Batal</button>
        <button type="submit" class="btn btn-success btn-flat"> Simpan</button>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>

<div class="modal fade" id="addBerkas">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h3 class="modal-title">Tambah Berkas</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('siswa/addBerkas/' . $siswa['id_siswa']); ?>
      <div class="modal-body">
        <div class="form-group">
          <label for="id_lampiran">Jenis File</label>
          <select name="id_lampiran" id="id_lampiran" class="form-control">
            <option value="">-- Pilih Jenis File --</option>
            <?php foreach ($lampiran as $key => $value) { ?>
              <option value="<?= $value['id_lampiran'] ?>"><?= $value['lampiran']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="ket">Keterangan</label>
          <textarea name="ket" id="ket" cols="30" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label for="berkas">File</label>
          <input type="file" name="berkas" id="berkas" class="form-control" accept=".pdf">
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"> Batal</button>
        <button type="submit" class="btn btn-success btn-flat"> Simpan</button>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>

<?php foreach ($berkas as $data) : ?>
  <div class="modal fade" id="hapusBerkas<?= $data['id_berkas']; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h4 class="modal-title">Hapus Data Berkas</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah Anda Yakin ingin Menghapusnya
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm btn-flat">Tidak</button>
          <a href="<?= base_url('siswa/hapusBerkas/' . $data['id_berkas']) ?>" class="btn btn-success btn-sm btn-flat">Ya, Hapus</a>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
<?php endforeach ?>
<?= $this->endSection('content'); ?>