<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>E-COMPLAINTS</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <!-- Favicons -->
  <link href="<?= base_url('assets') ?>/img/favicon.jpg" rel="icon">
  <link href="<?= base_url('assets') ?>/img/apple-touch-icon.jpg" rel="apple-touch-icon">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets') ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url('assets') ?>/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url('assets') ?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url('assets') ?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Main CSS File -->
  <link href="<?= base_url('assets') ?>/css/main.css" rel="stylesheet">
  <!-- =======================================================
  * version Bootstrap : v5.3.3
  ======================================================== -->
  <style>
    #hero {
        position: relative; /* Agar elemen ::before terpasang ke #hero */
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background: url('<?= base_url("assets/img/hero-bg.jpg") ?>') no-repeat center center;
        background-size: cover;
        color: #fff;
        z-index: 1; /* Pastikan konten di #hero berada di atas overlay */
    }

    #hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.80); /* Warna hitam dengan transparansi 50% */
        z-index: -1; /* Overlay berada di bawah konten #hero */
    }
</style>

</head>

<body class="index-page">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="<?= base_url('/') ?>#hero" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="<?= base_url('assets') ?>/img/logo.png" alt=""> -->
        <h1 class="sitename">E-COMPLAINTS</h1>
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?= base_url('/') ?>#hero">Home</a></li>
          <li><a href="<?= base_url('/') ?>#form">Form Pengaduan</a></li>
          <li class="dropdown"><a href=""><span>Data Pengaduan</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="<?= base_url('/pengaduan/sudah') ?>">Sudah Ditanggapi</a></li>
              <li><a href="<?= base_url('/pengaduan/belum') ?>">Belum Ditanggapi</a></li>
            </ul>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <a class="cta-btn" href="<?= base_url('admin/auth/login') ?>">TANGGAPI</a>
    </div>
  </header>

  <!-- ISI KONTEN -->
  <?= $this->renderSection('content') ?>
  <!-- END KONTEN -->

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/aos/aos.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="<?= base_url('assets') ?>/js/main.js"></script>

</body>

</html>