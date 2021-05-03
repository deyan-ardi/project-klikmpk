<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanTugasModels extends Model
{
    protected $primaryKey = "id_kegiatan_tugas";
    protected $table      = 'kegiatan_tugas';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_kelas', 'kategori_tugas', 'nama_tugas', 'tgl_tugas', 'created_by'];
    protected $updatedField  = false;
    protected $deletedField  = false;
    public function getAllKegiatanTugasWhereKelas($id_kelas)
    {
        return $this->where('id_kelas', $id_kelas)->get()->getResultArray();
    }
    public function getTotalTugas($id_kelas)
    {
        return $this->where('id_kelas', $id_kelas)->get()->getNumRows();
    }
    public function getAllNilai()
    {
        $this->select('kegiatan_tugas.*,tugas.*');
        return $this->join('tugas', 'tugas.id_kegiatan_tugas=kegiatan_tugas.id_kegiatan_tugas')->get()->getResultArray();
    }
}