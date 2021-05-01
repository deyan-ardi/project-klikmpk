<?php

namespace App\Models;

use CodeIgniter\Model;

class UASModels extends Model
{
    protected $primaryKey = "id_uas";
    protected $table      = 'uas';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_mahasiswa', 'id_kegiatan_uas', 'nilai_uas'];
    protected $updatedField  = false;
    protected $deletedField  = false;
    public function cekWhereUserKegiatan($id_mahasiswa, $id_kegiatan)
    {
        return  $this->where('id_mahasiswa', $id_mahasiswa)->where('id_kegiatan_uas', $id_kegiatan)->get()->getNumRows();
    }
    public function getAllNilaiWhereMahasiswa($id_mahasiswa)
    {
        return $this->where('id_mahasiswa', $id_mahasiswa)->get()->getResultArray();
    }
    public function hapusNilaiWhereUser($id_mahasiswa)
    {
        return $this->where('id_mahasiswa', $id_mahasiswa)->delete();
    }
    public function hapusAllNilaiUAS($id_kelas)
    {
        $this->select('*');
        $this->join('mahasiswa', 'mahasiswa.id_mahasiswa = uas.id_mahasiswa');
        $this->join('detail_kelas', 'detail_kelas.id_mahasiswa = mahasiswa.id_mahasiswa');
        $this->where('id_kelas', $id_kelas);
        return $this->get()->getResultArray();
    }
}