<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hello extends CI_Controller
{

    public function index()
    {
        $data['message'] = "Hello, World!";
        $this->load->view('hello_view', $data);
    }
}
