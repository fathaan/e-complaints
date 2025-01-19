<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class AuthController extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function register()
    {
        return view('admin/auth/register');
    }

    public function storeRegister()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nama_admin' => 'required',
            'nim_admin' => 'required|is_unique[admin.nim_admin]',
            'password_admin' => 'required|min_length[6]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('validation', $validation->getErrors());
        }

        $this->adminModel->save([
            'nama_admin' => $this->request->getPost('nama_admin'),
            'nim_admin' => $this->request->getPost('nim_admin'),
            'password_admin' => password_hash($this->request->getPost('password_admin'), PASSWORD_DEFAULT),
        ]);

        return redirect()->to('/admin/auth/login')->with('success', 'Akun berhasil didaftarkan. Tunggu hingga admin mengaktifkan akun Anda.');
    }

    public function login()
    {
        return view('admin/auth/login');
    }

    public function attemptLogin()
    {
        $nim = $this->request->getPost('nim_admin');
        $password = $this->request->getPost('password_admin');

        $admin = $this->adminModel->where('nim_admin', $nim)->first();

        if (!$admin) {
            return redirect()->back()->with('error', 'NIM tidak ditemukan.');
        }

        if ($admin['status_account_admin'] !== 'Aktif') {
            return redirect()->back()->with('error', 'Akun Anda belum aktif. Hubungi admin untuk mengaktifkan.');
        }

        if (!password_verify($password, $admin['password_admin'])) {
            return redirect()->back()->with('error', 'Password salah.');
        }

        session()->set('admin', [
            'id_admin' => $admin['id_admin'],
            'nama_admin' => $admin['nama_admin'],
        ]);

        return redirect()->to('/admin/dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/auth/login')->with('success', 'Berhasil logout.');
    }
}
