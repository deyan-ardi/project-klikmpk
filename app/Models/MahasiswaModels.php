<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModels extends Model
{
    protected $primaryKey = "id_mahasiswa";
    protected $table      = 'mahasiswa';
    protected $useTimestamps = true;
    protected $allowedFields = ['nim_mahasiswa', 'nama_mahasiswa', 'nilai_sikap', 'nilai_uts', 'nilai_uas','nilai_akhir','skala','karakter', 'created_by'];
    protected $updatedField  = false;
    protected $deletedField  = false;

    public function cekMahasiswaKelas($nim, $nama, $kelas){
        $this->join('detail_kelas','detail_kelas.id_mahasiswa = mahasiswa.id_mahasiswa');
        $this->where('detail_kelas.id_kelas',$kelas)->where('nim_mahasiswa',$nim)->where('nama_mahasiswa',$nama);
        return $this->get()->getNumRows();
    }
    public function getAllMahasiswaWhereKelas($kelas){
        $this->select('mahasiswa.*');
        $this->join('detail_kelas', 'detail_kelas.id_mahasiswa = mahasiswa.id_mahasiswa');
        $this->where('detail_kelas.id_kelas', $kelas);
        return $this->get()->getResultArray();
    }
    public function deleteWhereMahasiswa($id_kelas){
        $this->join('detail_kelas','detail_kelas.id_mahasiswa = mahasiswa.id_mahasiswa');
        return $this->where('id_kelas',$id_kelas)->get()->getResultArray();
    }
    public function getTotalMahasiswa($id_user){
        $this->join('detail_kelas', 'detail_kelas.id_mahasiswa = mahasiswa.id_mahasiswa');
        $this->join('kelas','kelas.id_kelas = detail_kelas.id_kelas');
        $this->where('id_user',$id_user);
        return $this->get()->getNumRows();
    }
    public function getTotalMahasiswaByKelas($id_kelas){
        $this->join('detail_kelas', 'detail_kelas.id_mahasiswa = mahasiswa.id_mahasiswa');
        return $this->where('id_kelas', $id_kelas)->get()->getNumRows();
    }
  
}