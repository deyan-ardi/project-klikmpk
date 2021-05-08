<?php

namespace App\Models;

use CodeIgniter\Model;

class SoalModels extends Model
{
    protected $primaryKey = "id_bank_soal";
    protected $table      = 'bank_soal';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_soal', 'kategori_soal', 'mata_kuliah', 'deskripsi_soal', 'file_pdf', 'created_by'];
    protected $updatedField  = false;
    protected $deletedField  = false;
}