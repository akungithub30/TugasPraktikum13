<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'login';

    // protected $allowedFields = ['username', 'password'];
    protected $allowedFields = ['Username', 'Password'];

    public function ambil($username)
    {
        //akan terhubung ke table database asisten
        //nanti akan dicek nim nya, dimana akan mengambil row pertama
        return $this->where(['Username' => $username])->first();
    }
}
