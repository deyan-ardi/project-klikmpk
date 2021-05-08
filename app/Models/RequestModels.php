<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestModels extends Model
{
    protected $primaryKey = "id_request";
    protected $table      = 'request_unduh';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_bank_soal', 'id_user', 'status_unduh', 'pesan_pengajuan'];
    protected $updatedField  = false;
    protected $deletedField  = false;
    public function cekApakahAda($id_soal, $id_user)
    {
        return $this->where('id_bank_soal', $id_soal)->where('id_user', $id_user)->where('status_unduh', 0)->get()->getNumRows();
    }
    public function whereUser($id_user)
    {
        $this->join('bank_soal', 'bank_soal.id_bank_soal = request_unduh.id_bank_soal');
        return $this->where('id_user', $id_user)->get()->getResultArray();
    }
    public function getAll()
    {
        $this->join('bank_soal', 'bank_soal.id_bank_soal = request_unduh.id_bank_soal');
        $this->join('users', 'users.id = request_unduh.id_user');
        return $this->get()->getResultArray();
    }
}