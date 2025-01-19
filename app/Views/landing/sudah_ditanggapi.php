<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<main class="main">
    <section id="hero" class="section dark-background">
        <div class="container mt-5 h-100 flex-column align-items-center">
            <div class="row">
                <div class="col-lg-12 d-flex align-items-stretch">
                    <div class="card w-100">
                        <div class="card-body p-4">
                            <div class="row align-items-center mb-3">
                                <div class="col-lg-6 mb-3">
                                    <h5 class="card-title fw-semibold">Sudah Ditanggapi</h5>
                                </div>
                                <div class="col-lg-6 mb-3 text-end">
                                    <div class="input-group">
                                        <input type="text" id="searchInput" class="form-control" placeholder="Cari Jenis Kerusakan..">
                                        <button class="btn btn-outline-primary" id="searchButton">Search</button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-middle mb-0 bg-white">
                                    <thead>
                                        <tr>
                                            <th><h6 class="card-title fw-semibold">Lokasi</h6></th>
                                            <th><h6 class="card-title fw-semibold">Jenis</h6></th>
                                            <th class="col-lg-6"><h6 class="card-title fw-semibold">Deskripsi</h6></th>
                                            <th><h6 class="card-title fw-semibold">Photo</h6></th>
                                            <th><h6 class="card-title fw-semibold">Status</h6></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $number = 1;
                                        foreach ($pengaduan as $p) { ?>
                                            <tr>
                                                <td class="border-bottom-0"> <h6 class="card-title fw-normal"><?= $p['lokasi_gedung'] ?></h6></td>
                                                <td class="border-bottom-0"> <h6 class="card-title fw-normal"><?= $p['jenis_pengaduan'] ?></h6></td>
                                                <td class="border-bottom-0 col-lg-6"> <h6 class="card-title fw-normal"><?= $p['desc_pengaduan'] ?></h6></td>
                                                <td class="border-bottom-0"> <h6 class="card-title fw-normal"></h6> <?php if (!empty($p['gambar_pengaduan'])): ?>
                                                        <img src="<?= base_url('uploads/' . $p['gambar_pengaduan']) ?>" alt="Gambar Pengaduan" width="100">
                                                    <?php else: ?>
                                                        <h6 class="card-title fw-normal text-danger">null</h6>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="border-bottom-0"> <h6 class="card-title fw-normal text-success"><?= $p['status_pengaduan'] ?></h6></td>
                                            </tr>
                                        <?php $number++;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?= $this->endSection() ?>