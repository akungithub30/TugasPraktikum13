<?php

namespace App\Controllers;

use App\Models\TodolistModel;

class Todolist extends BaseController
{
    protected $todolistModel;

    public function __construct()
    {
        $this->todolistModel = new TodolistModel();
    }

    public function index()
    {
        $todolist = $this->todolistModel->findAll();
        $data = [
            'title' => 'To Do List',
            'todolist' => $todolist
        ];

        return view('todolist/index', $data);
    }

    public function save()
    {
        $this->validate([
            'kegiatan' => 'required' // Validasi bahwa field 'kegiatan' tidak boleh kosong
        ]);

        $this->todolistModel->insert([
            'kegiatan' => $this->request->getPost('kegiatan'), // Mengambil nilai 'kegiatan' dari form
            'status' => 'Aktif'
        ]);

        return redirect()->to('/todolist');
    }
}
