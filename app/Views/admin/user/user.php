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
            <h5 class="card-title fw-semibold">Data Admin</h5>
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
                            <h5 class="card-title fw-semibold">User Admin</h5>
                        </div>
                        <div class="col-lg-4 mb-3 text-end">
                            <div class="input-group">
                                <input type="text" id="searchInput" class="form-control" placeholder="Cari Admin...">
                                <button class="btn btn-outline-primary" id="searchButton">Search</button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">No.</th>
                                    <th class="border-bottom-0">Nama Admin</th>
                                    <th class="border-bottom-0">NIM Admin</th>
                                    <th class="border-bottom-0">Status Akun</th>
                                    <th class="border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody id="adminTable">
                                <?php $number = 1;
                                foreach ($admins as $admin) { ?>
                                    <tr id="adminRow-<?= $admin['id_admin'] ?>">
                                        <td><?= $number++ ?></td>
                                        <td><?= $admin['nama_admin'] ?></td>
                                        <td><?= $admin['nim_admin'] ?></td>
                                        <td>
                                            <button
                                                class="btn btn-<?= $admin['status_account_admin'] === 'Aktif' ? 'success' : 'danger' ?> toggle-status"
                                                data-id="<?= $admin['id_admin'] ?>"
                                                data-status="<?= $admin['status_account_admin'] ?>">
                                                <?= $admin['status_account_admin'] ?>
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-edit" data-id="<?= $admin['id_admin'] ?>">Edit</button>
                                            <button class="btn btn-danger btn-delete" data-id="<?= $admin['id_admin'] ?>">Hapus</button>
                                        </td>
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

<script>
    const baseUrl = '<?= base_url() ?>';

    // Toggle status button
    document.querySelectorAll('.toggle-status').forEach(button => {
        button.addEventListener('click', () => {
            const adminId = button.getAttribute('data-id');
            const currentStatus = button.getAttribute('data-status');

            // Toggle status logic
            const newStatus = currentStatus === 'Aktif' ? 'Non-Aktif' : 'Aktif';

            // Update status in backend
            fetch(`${baseUrl}/admin/toggle_status`, { // Perbarui URL ke AdminController
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        id_admin: adminId,
                        status_account_admin: newStatus
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update button UI
                        button.textContent = newStatus;
                        button.setAttribute('data-status', newStatus);
                        button.classList.toggle('btn-success', newStatus === 'Aktif');
                        button.classList.toggle('btn-danger', newStatus === 'Non-Aktif');
                    } else {
                        alert('Gagal mengubah status.');
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });
</script>

<?= $this->endSection() ?>