<?php

namespace App\Models;

use CodeIgniter\Model;

class SikapModels extends Model
{
    protected $primaryKey = "id_sikap_partisipasi";
    protected $table      = 'sikap_partisipasi';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_mahasiswa','nilai_santun','nilai_disiplin','nilai_berani','hasil_nilai_sikap','nilai_kehadiran','nilai_kepatuhan','nilai_keaktifan','hasil_nilai_partisipasi'];
    protected $updatedField  = false;
    protected $deletedField  = false;
    public function cekNilaiWhereMahasiswa($id_mahasiswa, $id_kelas)
    {
        $this->join('mahasiswa','mahasiswa.id_mahasiswa = sikap_partisipasi.id_mahasiswa');
        $this->join('detail_kelas','detail_kelas.id_mahasiswa = mahasiswa.id_mahasiswa');
        return  $this->where('sikap_partisipasi.id_mahasiswa', $id_mahasiswa)->where('detail_kelas.id_kelas', $id_kelas)->get()->getNumRows();
    }
    public function hapusAllNilaiSikapPartisipasi($id_kelas){
        $this->join('mahasiswa', 'mahasiswa.id_mahasiswa = sikap_partisipasi.id_mahasiswa');
        $this->join('detail_kelas', 'detail_kelas.id_mahasiswa = mahasiswa.id_mahasiswa');
        return  $this->where('detail_kelas.id_kelas', $id_kelas)->get()->getResultArray();
    }
    public function hapusNilaiWhereUser($id_mahasiswa){
       return $this->where('id_mahasiswa',$id_mahasiswa)->delete();
    }
}