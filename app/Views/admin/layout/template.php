<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin E-Complaints</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets_admin') ?>/images/logos/favicon.png" />
    <link rel="stylesheet" href="<?= base_url('assets_admin') ?>/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <h4 class="mx-auto">
                        <a href="<?= base_url('/') ?>" class="badge bg-dark rounded-2 fw-semibold m-1">E-COMPLAINTS</a>
                    </h4>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url('/admin/dashboard') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                        <!-- Menu Untuk Table -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Data Pengaduan</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url('/admin/pengaduan/belum-ditanggapi') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-cards"></i>
                                </span>
                                <span class="hide-menu">Belum Ditanggapi</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url('/admin/pengaduan/sudah-ditanggapi') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-file-description"></i>
                                </span>
                                <span class="hide-menu">Sudah Ditanggapi</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">User Admin</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url('/admin/user-management') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user"></i>
                                </span>
                                <span class="hide-menu">User Admin</span>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <!-- ISI KONTEN -->
            <?= $this->renderSection('content') ?>
            <!-- END KONTEN -->
        </div>
    </div>
    <script src="<?= base_url('assets_admin') ?>/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('assets_admin') ?>/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets_admin') ?>/js/sidebarmenu.js"></script>
    <script src="<?= base_url('assets_admin') ?>/js/app.min.js"></script>
    <script src="<?= base_url('assets_admin') ?>/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="<?= base_url('assets_admin') ?>/libs/simplebar/dist/simplebar.js"></script>
    <script src="<?= base_url('assets_admin') ?>/js/dashboard.js"></script>
</body>

</html>