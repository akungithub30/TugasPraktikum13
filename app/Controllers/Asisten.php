<?php

namespace App\Controllers;

use App\Models\AsistenModel;

class Asisten extends BaseController
{
    protected $asistenModel;
    public function __construct()
    {
        $this->asistenModel = new AsistenModel();
    }

    public function index()
    {
        // $daftar = $this->asisten->findAll();
        // $data = ['List' => $daftar];
        // return view('AsistenView', $data);

        if (session()->has('pengguna')) {
            $asisten = $this->asistenModel->findAll();
            $data = [
                'asisten' => $asisten
            ];
            return view('AsistenView', $data);
        } else {
            return view('/Asisten/login');
        }
    }

    public function simpan()
    {
        if (session()->has('pengguna')) {
            helper('form');

            if (!$this->request->is('post')) {
                return view('Asisten/simpan');
            }

            $post = $this->request->getPost([
                'nim', 'nama', "praktikum",
                "ipk"
            ]);

            $model = model(AsistenModel::class);
            $hasil = $model->simpan($post);

            return view('asisten/success');
        } else {
            return view('/Asisten/login');
        }
    }
    public function update()
    {
        if (session()->has('pengguna')) {
            $db = \Config\Database::connect();
            $Builder = $db->table('asisten');

            helper('form');
            if (!$this->request->is('post')) {
                return view('/asisten/update');
            }
            $data = [
                'nama' => [$this->request->getPost('nama')],
                'praktikum' => [$this->request->getPost('praktikum')],
                'ipk' => [$this->request->getPost('ipk')],
            ];
            $Builder->where('nim', $this->request->getPost('nim'));
            $Builder->update($data);
            return view('/asisten/successupdate');
        } else {
            return view('/Asisten/login');
        }
    }
    public function delete()
    {
        if (session()->has('pengguna')) {
            $db = \Config\Database::connect();
            $builder = $db->table('asisten');

            helper('form');
            if (!$this->request->is('post')) {
                return view('/asisten/delete');
            }
            $post = $this->request->getPost([
                'nim'
            ]);
            $builder->where('nim', $post);
            $builder->delete();
            return view('/asisten/successdelete');
        } else {
            return view('/Asisten/login');
        }
    }


    public function search()
    {
        if (session()->has('pengguna')) {
            if (!$this->request->is('post')) {
                return view('/asisten/search');
            }
            $nim = $this->request->getPost(['key']);

            $model = model(AsistenModel::class);
            $asisten = $model->ambil($nim['key']);

            $data = ['hasil' => $asisten];
            return view('asisten/search', $data);
        } else {
            return view('/Asisten/login');
        }
    }

    // public function login()
    // {
    //     helper('form');

    //     if (!$this->request->is('post')) {
    //         return view('Asisten/login');
    //     }

    //     $validation = \Config\Services::validation();
    //     $validation->setRules([
    //         'username' => 'required',
    //         'password' => 'required'
    //     ]);

    //     if (!$validation->withRequest($this->request)->run()) {
    //         $response = [
    //             'status' => 'error',
    //             'errors' => $validation->getErrors()
    //         ];
    //         return $this->response->setJSON($response);
    //     }

    //     $username = $this->request->getPost('username');
    //     $password = $this->request->getPost('password');

    //     // Lakukan validasi login
    //     if ($username != 'admin') {
    //         // Jika login berhasil, set session pengguna
    //         $session = session();
    //         $session->set('pengguna', $username);

    //         // Redirect ke 'asisten/simpan'
    //         return redirect()->to(site_url('asisten'));
    //     } else {
    //         // Jika login gagal
    //         $response = [
    //             'status' => 'error',
    //             'message' => 'Login gagal, username atau password salah'
    //         ];

    //         return $this->response->setJSON($response);
    //     }
    // }
    public function check()
    {
        $userpass = $this->request->getPost(['username', 'password']);

        $model = model(LoginModel::class);

        $login = $model->ambil($userpass['username']);

        $asistenModel = new AsistenModel();
        $asisten = $asistenModel->findAll();
        $data = [
            'asisten' => $asisten
        ];

        if (!empty($login) && $userpass['username'] == $login['Username'] && $userpass['password'] == $login['Password']) { // mengecek kalau usr dan pws nya admin dan 123. kalau iya maka akan buat session 
            $session = session(); //buat session 
            $session->set('pengguna', $userpass['username']); //session ini akan mencangkup nilai user dengan nama atribut pengguna
            return view('AsistenView', $data); //nampilin tabel asisten 
        } else {
            return view('Asisten/login');
        }
    }

    public function login()
    {
        return view('Asisten/login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return view('/Asisten/login');
    }
}
