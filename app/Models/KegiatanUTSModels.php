<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanUTSModels extends Model
{
    protected $primaryKey = "id_kegiatan_uts";
    protected $table      = 'kegiatan_uts';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_kelas','kategori_uts','nama_uts','tgl_uts','created_by'];
    protected $updatedField  = false;
    protected $deletedField  = false;
    public function getAllKegiatanUTSWhereKelas($id_kelas){
       return $this->where('id_kelas',$id_kelas)->get()->getResultArray();
    }
    public function getTotalUTS($id_kelas){
        return $this->where('id_kelas',$id_kelas)->get()->getNumRows();
    }
    public function getAllNilai(){
        $this->select('kegiatan_uts.*,uts.*');
        return $this->join('uts','uts.id_kegiatan_uts=kegiatan_uts.id_kegiatan_uts')->get()->getResultArray();
    }
}