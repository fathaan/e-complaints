<?= $this->extend('layout/template') ?>
<?= $this->Section('content') ?>

<main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
        <div class="container d-flex flex-column align-items-center">
            <h2 data-aos="fade-up" data-aos-delay="100">BERIKAN LAPORANMU.</h2>
            <p data-aos="fade-up" data-aos-delay="200">Laporkan keluhan anda terkait kerusakan fasilitas yg ada di Politeknik Negeri Lampung.</p>
            <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                <a href="#form" class="btn-get-started">FORM LAPORAN</a>
            </div>
        </div>
    </section>
    <section id="form" class="contact section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Isi pengaduan anda</h2>
            <p>Form Pengaduan</p>
        </div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <form action="<?= base_url('/pengaduan/simpan') ?>" method="post" enctype="multipart/form-data" class="form-label p-3 border rounded">
                <div class="row gy-4">
                    <div class="col-md-6">
                        <label for="nama_pengaduan" class="form-label">Nama Pelapor</label>
                        <input type="text" name="nama_pengaduan" class="form-control" placeholder="Nama Lengkap anda." required>
                    </div>
                    <div class="col-md-6">
                        <label for="lokasi_gedung" class="form-label">Lokasi</label>
                        <input type="text" class="form-control" name="lokasi_gedung" placeholder="Contoh: Gedung Sakura, dsb." required>
                    </div>
                    <div class="col-md-12">
                        <label for="jenis_pengaduan" class="form-label">Terkait Apa yg ingin anda ajukan?</label>
                        <input type="text" class="form-control" name="jenis_pengaduan" placeholder="Contoh: Kursi, Meja, dsb." required>
                    </div>
                    <div class="col-md-12">
                        <label for="desc_pengaduan" class="form-label">Deskripsi Pengajuan</label>
                        <textarea class="form-control" name="desc_pengaduan" rows="4" placeholder="Deskripsikan kerusakan yang seperti apa terkait hal yg diajukan." required></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="gambar_pengaduan" class="form-label">Unggah Gambar</label>
                        <input type="file" class="form-control" name="gambar_pengaduan" accept="image/*" required>
                    </div>
                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-primary">Kirim Pengaduan</button>
                    </div>
                </div>
            </form>
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php elseif (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <p><?= $error ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<footer id="footer" class="footer dark-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span class="sitename">E-COMPLAINTS</span>
                </a>
                <div class="footer-contact pt-3">
                    <p>Jl. Soekarno Hatta No.10, Rajabasa Raya,</p>
                    <p>Kec. Rajabasa, Kota Bandar Lampung, Lampung. <br> 35144</p>
                    <p class="mt-3"><strong>Phone:</strong> <span>(0721) 703995</span></p>
                    <p><strong>Email:</strong> <span>puskom@polinela.ac.id</span></p>
                </div>
                <div class="social-links d-flex mt-4">
                    <a href="https://www.instagram.com/politeknik_negeri_lampung/"><i class="bi bi-twitter-x"></i></a>
                    <a href="https://web.facebook.com/humaspolinela/"><i class="bi bi-facebook"></i></a>
                </div>
            </div>
            <!-- <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Our Newsletter</h4>
          <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
          </form>
        </div> -->
        </div>
    </div>
    <div class="container copyright text-center mt-4">
        <p><span>Copyright</span> © 2024 <strong class="px-1 sitename">E-Complaints</strong> <span>All Rights Reserved</span></p>
        <div class="credits">
            Project Mandiri at Politeknik Negeri Lampung.
        </div>
    </div>

</footer>

<?= $this->endSection('') ?>