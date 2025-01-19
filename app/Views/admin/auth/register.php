<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- Favicons -->
    <link href="<?= base_url('assets') ?>/img/favicon.jpg" rel="icon">
    <link href="<?= base_url('assets') ?>/img/apple-touch-icon.jpg" rel="apple-touch-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.80), rgba(0, 0, 0, 0.80)), url('<?= base_url('assets') ?>/img/hero-bg.jpg') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .card {
            background-color: rgb(184, 184, 184);
            border: none;
            border-radius: 10px;
        }

        .form-control,
        .btn {
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card p-4">
                    <h3 class="text-center">Register</h3>
                    <form action="/admin/auth/register" method="post">
                        <div class="mb-3">
                            <label for="nama_admin" class="form-label"><small>Nama</small></label>
                            <input type="text" class="form-control" id="nama_admin" name="nama_admin" required>
                        </div>
                        <div class="mb-3">
                            <label for="nim_admin" class="form-label"><small>NIM</small></label>
                            <input type="text" class="form-control" id="nim_admin" name="nim_admin" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_admin" class="form-label"><small>Password</small></label>
                            <input type="password" class="form-control" id="password_admin" name="password_admin" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                    <div class="mt-3 text-center">
                        <small>Jika sudah pernah mendaftar<br>Silahkan <a href="/admin/auth/login" class="text-info" style="text-decoration: none;">Login di sini</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>