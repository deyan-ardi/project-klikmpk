<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModels extends Model
{
    protected $table      = 'users';
    protected $useTimestamps = true;
    protected $allowedFields = ['username','email','foto_profil','foto_sampul','deskripsi','password_hash'];
}