<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Todo extends CI_Controller
{

    public function index()
    {
        $this->load->model('Todo_model');
        $data['todos'] = $this->Todo_model->getTodos();
        $this->load->view('todo_view', $data);
    }

    public function add()
    {
        $this->load->model('Todo_model');
        $kegiatan = $this->input->post('nama');
        $this->Todo_model->addTodo($kegiatan);
        redirect('todo');
    }

    public function complete($id)
    {
        $this->load->model('Todo_model');
        $this->Todo_model->completeTodo($id);
        redirect('todo');
    }

    public function delete($id)
    {
        $this->load->model('Todo_model');
        $this->Todo_model->deleteTodo($id);
        redirect('todo');
    }
}
