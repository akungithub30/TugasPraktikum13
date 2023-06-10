<?php
class User_model extends Model
{
    public function save_user($name, $email)
    {
        $data = array(
            'name' => $name,
            'email' => $email
        );
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }
}
