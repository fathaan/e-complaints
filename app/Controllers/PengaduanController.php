<?php

namespace App\Controllers;

use App\Models\PengaduanModel;

class PengaduanController extends BaseController
{
    protected $pengaduanModel;

    public function __construct()
    {
        $this->pengaduanModel = new PengaduanModel();
    }

    public function simpan()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nama_pengaduan' => 'required',
            'lokasi_gedung' => 'required',
            'jenis_pengaduan' => 'required',
            'desc_pengaduan' => 'required',
            'gambar_pengaduan' => [
                'rules' => 'uploaded[gambar_pengaduan]|max_size[gambar_pengaduan,2048]|is_image[gambar_pengaduan]|mime_in[gambar_pengaduan,image/jpg,image/jpeg,image/png]',
                'label' => 'Gambar Pengaduan',
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, kembali ke halaman form dengan pesan error
            return redirect()->back()->withInput()->with('validation', $validation->getErrors());
        }

        $fileGambar = $this->request->getFile('gambar_pengaduan');
        if (!$fileGambar->isValid()) {
            return redirect()->back()->with('error', $fileGambar->getErrorString());
        }

        // Simpan gambar ke folder uploads dengan nama acak
        $gambarName = $fileGambar->getRandomName();
        $fileGambar->move('uploads', $gambarName);

        // Simpan data pengaduan ke database
        $this->pengaduanModel->insert([
            'nama_pengaduan' => $this->request->getPost('nama_pengaduan'),
            'lokasi_gedung' => $this->request->getPost('lokasi_gedung'),
            'jenis_pengaduan' => $this->request->getPost('jenis_pengaduan'),
            'desc_pengaduan' => $this->request->getPost('desc_pengaduan'),
            'gambar_pengaduan' => $gambarName,
            'tgl_pengaduan' => date('Y-m-d'),
            'status_pengaduan' => 'Belum Ditanggapi',
        ]);

        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->to('/')->with('success', 'Pengaduan berhasil dikirim.');
    }

    public function belumDitanggapi()
    {
        $pengaduanModel = new PengaduanModel();
        $pengaduan = $pengaduanModel->where('status_pengaduan', 'Belum Ditanggapi')->findAll();
        return view('landing/belum_ditanggapi', ['pengaduan' => $pengaduan]);
    }

    public function sudahDitanggapi()
    {
        $data['pengaduan'] = $this->pengaduanModel->where('status_pengaduan', 'Sudah Ditanggapi')->findAll();
        return view('landing/sudah_ditanggapi', $data);
    }

    public function update($id)
    {
        $pengaduan = $this->pengaduanModel->find($id);
        if (!$pengaduan) {
            return $this->response->setJSON(['success' => false, 'message' => 'Pengaduan tidak ditemukan']);
        }

        $this->pengaduanModel->update($id, ['status_pengaduan' => 'Sudah Ditanggapi']);
        return $this->response->setJSON(['success' => true]);
    }

    public function delete($id)
    {
        if ($this->pengaduanModel->delete($id)) {
            return $this->response->setJSON(['success' => true]);
        }
        return $this->response->setJSON(['success' => false, 'message' => 'Gagal menghapus pengaduan']);
    }

    public function search()
    {
        $keyword = $this->request->getGet('keyword');
        $pengaduan = $this->pengaduanModel->like('nama_pengaduan', $keyword)->where('status_pengaduan', 'Belum Ditanggapi')->findAll();
        return $this->response->setJSON($pengaduan);
    }

    public function search_sudah()
    {
        $keyword = $this->request->getGet('keyword');
        $pengaduan = $this->pengaduanModel
            ->like('nama_pengaduan', $keyword)
            ->where('status_pengaduan', 'Sudah Ditanggapi')
            ->findAll();
        return $this->response->setJSON($pengaduan);
    }
}
