<?php

namespace App\Controllers;

use App\Models\DetailKelasModels;
use App\Models\KegiatanTugasModels;
use App\Models\KegiatanUASModels;
use App\Models\KelasModels;
use App\Models\MahasiswaModels;
use App\Models\UsersModels;
use App\Models\KegiatanUTSModels;
use App\Models\SikapModels;
use App\Models\TugasModels;
use App\Models\UASModels;
use App\Models\UTSModels;

class Bagikan extends BaseController
{
    public function __construct()
    {
        $this->m_kelas = new KelasModels();
        $this->m_mahasiswa = new MahasiswaModels();
        $this->m_detail_kelas = new DetailKelasModels();
        $this->m_kegiatan_uts = new KegiatanUTSModels();
        $this->m_kegiatan_uas = new KegiatanUASModels();
        $this->m_uas = new UASModels();
        $this->m_uts = new UTSModels();
        $this->m_sikap = new SikapModels();
        $this->m_tugas = new TugasModels();
        $this->m_kegiatan_tugas = new KegiatanTugasModels();
    }
    public function index($data = null)
    {
        if (!empty($data)) {
            $cariKelas = $this->m_kelas->cariTautan($data);
            if (!empty($cariKelas)) {
                if ($cariKelas[0]['bagikan'] == 1 && !empty($cariKelas[0]['n_seluruh']) && !empty($cariKelas[0]['n_tugas']) && !empty($cariKelas[0]['n_uts']) && !empty($cariKelas[0]['n_uas']) && !empty($cariKelas[0]['n_sikap'])) {
                    $data = [
                        "d_kelas" => $cariKelas,
                        "title" => "Data Penilaian Kelas " . $cariKelas[0]['nama_kelas'],
                        'mahasiswa' => $this->m_mahasiswa->getAllMahasiswaWhereKelas($cariKelas[0]['id_kelas']),
                        "kegiatan_uts" => $this->m_kegiatan_uts->getAllKegiatanUTSWhereKelas($cariKelas[0]['id_kelas']),
                        'nilai_uts' => $this->m_kegiatan_uts->getAllNilai(),
                        "kegiatan_uas" => $this->m_kegiatan_uas->getAllKegiatanUASWhereKelas($cariKelas[0]['id_kelas']),
                        "kegiatan_tugas" => $this->m_kegiatan_tugas->getAllKegiatanTugasWhereKelas($cariKelas[0]['id_kelas']),
                        'nilai_uas' => $this->m_kegiatan_uas->getAllNilai(),
                        'nilai_sikap' => $this->m_sikap->findAll(),
                        'nilai_tugas' => $this->m_kegiatan_tugas->getAllNilai(),
                        'total_per_kelas' => $this->m_mahasiswa->getTotalMahasiswaByKelas($cariKelas[0]['id_kelas']),
                    ];
                    return view('guest/page/kelas', $data);
                } else {
                    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                }
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}