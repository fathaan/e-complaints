<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<header class="app-header">
  <nav class="navbar navbar-expand-lg navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item d-block d-xl-none">
        <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
          <i class="ti ti-menu-2"></i>
        </a>
      </li>
    </ul>
    <div class="mx-auto">
      <h5 class="card-title fw-semibold">Data Pengaduan Sudah Ditanggapi</h5>
    </div>
  </nav>
</header>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <div class="row align-items-center mb-3">
            <div class="col-lg-4 mb-3">
              <h5 class="card-title fw-semibold">Pengaduan Sudah Ditanggapi</h5>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0">No.</th>
                  <th class="border-bottom-0">Gambar</th>
                  <th class="border-bottom-0">Nama Pengaduan</th>
                  <th class="border-bottom-0">Lokasi</th>
                  <th class="border-bottom-0">Jenis</th>
                  <th class="border-bottom-0">Deskripsi</th>
                  <th class="border-bottom-0">Tanggal</th>
                </tr>
              </thead>
              <tbody>
                <?php $number = 1; foreach ($pengaduan as $p) { ?>
                  <tr>
                    <td><?= $number++ ?></td>
                    <td><img src="<?= base_url('uploads/' . $p['gambar_pengaduan']); ?>" width="50"></td>
                    <td><?= $p['nama_pengaduan'] ?></td>
                    <td><?= $p['lokasi_gedung'] ?></td>
                    <td><?= $p['jenis_pengaduan'] ?></td>
                    <td><?= $p['desc_pengaduan'] ?></td>
                    <td><?= date('d-m-Y', strtotime($p['tgl_pengaduan'])) ?></td>
                  </tr>
                <?php } ?>
                <?php if (empty($pengaduan)) { ?>
                  <tr>
                    <td colspan="7" class="text-center">Tidak ada data pengaduan yang sudah ditanggapi</td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
