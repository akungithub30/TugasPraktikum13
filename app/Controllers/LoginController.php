<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        // Load the necessary helpers
        helper(['form', 'url']);

        // Retrieve the request data
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Perform your authentication logic here
        if ($this->authenticate($username, $password)) {
            // If authentication succeeds, redirect to the desired page
            return redirect()->to('/dashboard');
        } else {
            // If authentication fails, display an error message
            $data['error'] = 'Invalid username or password';
            return view('login', $data);
        }
    }

    private function authenticate($username, $password)
    {
        // Perform your authentication logic here
        // You can check against a database or any other authentication mechanism
        // For this example, we'll assume a hardcoded username and password
        $validUsername = 'admin';
        $validPassword = 'password';

        if ($username === $validUsername && $password === $validPassword) {
            return true;
        }

        return false;
    }
}
