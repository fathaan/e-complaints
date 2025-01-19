<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\PengaduanModel;

class AdminController extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    // Halaman Login Admin
    public function login()
    {
        return view('admin/auth/login');
    }

    // Proses Login Admin
    public function doLogin()
    {
        $nim = $this->request->getPost('nim_admin');
        $password = $this->request->getPost('password_admin');

        $admin = $this->adminModel->where('nim_admin', $nim)->first();

        if ($admin && password_verify($password, $admin['password_admin'])) {
            if ($admin['status_account_admin'] === 'Non-Aktif') {
                return redirect()->back()->with('error', 'Akun Anda belum aktif.');
            }

            session()->set('admin', $admin);
            return redirect()->to(base_url('admin/dashboard'));
        }

        return redirect()->back()->with('error', 'NIM atau Password salah.');
    }

    // Logout Admin
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('admin/login'));
    }

    // Halaman Dashboard Admin
    public function dashboard()
    {
        if (!session()->has('admin')) {
            return redirect()->to(base_url('admin/login'));
        }

        return view('admin/dashboard');
    }

    public function belumDitanggapi()
    {
        $pengaduanModel = new \App\Models\PengaduanModel();
        $pengaduan = $pengaduanModel->where('status_pengaduan', 'Belum Ditanggapi')->findAll();

        return view('admin/pengaduan/belum_ditanggapi', [
            'pengaduan' => $pengaduan
        ]);
    }

    public function sudahDitanggapi()
    {
        $pengaduanModel = new \App\Models\PengaduanModel();
        $pengaduan = $pengaduanModel->where('status_pengaduan', 'Sudah Ditanggapi')->findAll();
    
        return view('admin/pengaduan/sudah_ditanggapi', [
            'pengaduan' => $pengaduan
        ]);
    }    

    public function userManagement()
    {
        $adminModel = new \App\Models\AdminModel();
        $admins = $adminModel->findAll();

        return view('admin/user/user', [
            'admins' => $admins
        ]);
    }


    // Proses Toggle Status Admin
    public function toggle_status()
    {
        $requestData = $this->request->getJSON(true);

        $idAdmin = $requestData['id_admin'];
        $newStatus = $requestData['status_account_admin'];

        $updated = $this->adminModel->update($idAdmin, ['status_account_admin' => $newStatus]);

        return $this->response->setJSON(['success' => $updated]);
    }

    // Halaman Registrasi Admin
    public function register()
    {
        return view('admin/auth/register');
    }

    // Proses Registrasi Admin
    public function doRegister()
    {
        $data = [
            'nama_admin' => $this->request->getPost('nama_admin'),
            'nim_admin' => $this->request->getPost('nim_admin'),
            'password_admin' => password_hash($this->request->getPost('password_admin'), PASSWORD_DEFAULT),
            'status_account_admin' => 'Non-Aktif',
        ];

        $this->adminModel->save($data);

        return redirect()->to(base_url('admin/login'))->with('success', 'Registrasi berhasil. Tunggu aktivasi akun.');
    }

    public function updateStatus($id)
    {
        $pengaduanModel = new PengaduanModel();

        // Cari pengaduan berdasarkan ID
        $pengaduan = $pengaduanModel->find($id);
        if (!$pengaduan) {
            return redirect()->to(base_url('/admin/pengaduan/belum-ditanggapi'))
                ->with('error', 'Pengaduan tidak ditemukan.');
        }

        // Ubah status pengaduan
        $pengaduan['status_pengaduan'] = 'Sudah Ditanggapi';
        $pengaduanModel->save($pengaduan);

        return redirect()->to(base_url('/admin/pengaduan/belum-ditanggapi'))
            ->with('success', 'Status pengaduan berhasil diubah.');
    }

    public function deletePengaduan($id)
    {
        $pengaduanModel = new PengaduanModel();

        // Hapus pengaduan berdasarkan ID
        if ($pengaduanModel->delete($id)) {
            return redirect()->to(base_url('/admin/pengaduan/belum-ditanggapi'))
                ->with('success', 'Pengaduan berhasil dihapus.');
        }

        return redirect()->to(base_url('/admin/pengaduan/belum-ditanggapi'))
            ->with('error', 'Gagal menghapus pengaduan.');
    }
}
