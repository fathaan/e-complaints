<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaduanModel extends Model
{
    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';
    protected $allowedFields = [
        'nama_pengaduan',
        'lokasi_gedung',
        'jenis_pengaduan',
        'desc_pengaduan',
        'gambar_pengaduan',
        'tgl_pengaduan',
        'status_pengaduan',
    ];
}
