<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModels extends Model
{
    protected $table      = 'users';
    protected $useTimestamps = true;
    protected $allowedFields = ['username','email','foto_profil','foto_sampul','deskripsi','password_hash'];
    public function getUserRoleAdmin()
    {
        $this->select('users.*');
        $this->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        return $this->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')->where('auth_groups_users.group_id', '2')->get()->getResult();
    }
}