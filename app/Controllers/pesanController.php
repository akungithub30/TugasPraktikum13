<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class PesanController extends Controller
{
    public function index()
    {
        return view('pesan_form');
    }

    public function tampil()
    {
        return view('pesan_tampil');
    }
}
