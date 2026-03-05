<?php
class User_model extends CI_Model {

   public function checkEmail($email)
{
    return $this->db->get_where('users', ['email' => $email])->row();
}

public function insertUser($data)
{
    return $this->db->insert('users', $data);
}
    public function insert_user($data) {
        return $this->db->insert('users', $data);
    }

    public function login_check($email, $password)
{
    $user = $this->db->where('email', $email)
                     ->get('users')
                     ->row();

    if($user && password_verify($password, $user->password))
    {
        return $user;
    }

    return false;
}
}