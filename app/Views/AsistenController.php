<?php

namespace App\Controllers;

use App\Models\AsistenModel;

class AsistenController extends BaseController
{
    protected $asisten;
    public function __construct()
    {
        $this->asisten = new AsistenModel();
    }

    public function index()
    {
        $daftar = $this->asisten->findAll();
        $data = ['List' => $daftar];
        return view('AsistenView', $data);
    }
    public function simpan()
    {
        helper('form');
        // Memeriksa apakah melakukan submit data atau tidak.
        if (!$this->request->is('post')) {
            return view('/Asisten/simpan');
        }
        // Mengambil data yang disubmit dari form
        $post = $this->request->getPost([
            'nim', 'nama', "praktikum",
            "ipk"
        ]);
        // Mengakses Model untuk menyimpan data
        $model = model(AsistenModel::class);
        $model->simpan($post);
        return view('/Asisten/success');
    }
}
