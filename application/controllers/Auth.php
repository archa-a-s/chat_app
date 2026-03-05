<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function signup()
    {
        $this->load->view('signup');
    }

    public function landing()
{
    if(!$this->session->userdata('logged_in')){
        redirect('auth/signin');
    }

    $this->load->view('landing');
}
   public function register()
{
    $this->load->model('User_model');

    $name = $this->input->post('name');
    $email = $this->input->post('email');
    $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
 
    $check = $this->User_model->checkEmail($email);

    if($check){
        echo "Email already registered!";
    } else {

        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];

        $this->User_model->insertUser($data);

        echo "success";   
    }
}

    public function signin()
{
    $this->load->view('signin');
}

public function login()
{
    $this->load->model('User_model');

    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->User_model->login_check($email, $password);

    if($user)
    {
        $this->session->set_userdata([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'logged_in' => true
        ]);

        echo "success";
    }
    else
    {
        echo "Invalid Email or Password!";
    }
}

public function logout()
{
    $this->session->sess_destroy();
    redirect('auth/signin');
}
}