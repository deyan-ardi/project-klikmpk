<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModels extends Model
{
    protected $primaryKey = "id_kelas";
    protected $table      = 'kelas';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_user', 'sampul_kelas', 'nama_kelas', 'semester', 'mata_kuliah', 'created_by'];
    protected $updatedField  = false;
    protected $deletedField  = false;
    
    public function getAllKelas($id_mahasiswa){
        return $this->where('id_user',$id_mahasiswa)->get()->getResultArray();
    }
    public function getKelasByIDAndUser($id_kelas,$id_mahasiswa){
        return $this->where('id_kelas',$id_kelas)->where('id_user',$id_mahasiswa)->get()->getResultArray();
    }
    public function getTotalKelas($id_mahasiswa){
        return $this->where('id_user',$id_mahasiswa)->get()->getNumRows();
    }
}