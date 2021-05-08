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
}