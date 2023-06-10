<?php
class User extends Controller
{
    public function index()
    {
        $this->load->view('user_form');
    }

    public function save()
    {
        $this->load->model('User_model');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $user_id = $this->User_model->save_user($name, $email);
        redirect('user/view/' . $user_id);
    }

    public function view($user_id)
    {
        $this->load->model('User_model');
        $data['user'] = $this->User_model->get_user($user_id);
        $this->load->view('user_view', $data);
    }
}
