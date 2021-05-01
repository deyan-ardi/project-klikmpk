<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailKelasModels extends Model
{
    protected $primaryKey = "id_detail_kelas";
    protected $table      = 'detail_kelas';
    protected $useTimestamps = false;
    protected $allowedFields = ['id_mahasiswa', 'id_kelas'];
    public function deleteAllMahasiswaWhereKelas($kelas)
    {
        $this->join('mahasiswa', 'detail_kelas.id_mahasiswa = mahasiswa.id_mahasiswa');
        $this->where('id_kelas', $kelas);
        return $this->delete();
    }
}