<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanUASModels extends Model
{
    protected $primaryKey = "id_kegiatan_uas";
    protected $table      = 'kegiatan_uas';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_kelas', 'kategori_uas', 'nama_uas', 'tgl_uas', 'created_by'];
    protected $updatedField  = false;
    protected $deletedField  = false;
    public function getAllKegiatanUASWhereKelas($id_kelas)
    {
        return $this->where('id_kelas', $id_kelas)->get()->getResultArray();
    }
    public function getTotalUAS($id_kelas)
    {
        return $this->where('id_kelas', $id_kelas)->get()->getNumRows();
    }
    public function getAllNilai()
    {
        $this->select('kegiatan_uas.*,uas.*');
        return $this->join('uas', 'uas.id_kegiatan_uas=kegiatan_uas.id_kegiatan_uas')->get()->getResultArray();
    }
}