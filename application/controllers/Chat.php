<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Chat_model');

        if(!$this->session->userdata('logged_in')){
            redirect('auth/signin');
        }
    }

    public function index()
    {
        $this->load->view('chat');
    }

    public function send()
    {
        $data = [
            'user_id' => $this->session->userdata('user_id'),
            'message' => $this->input->post('message')
        ];

        $this->Chat_model->insertMessage($data);
    }

    public function fetch()
    {
        $messages = $this->Chat_model->getMessages();
        echo json_encode($messages);
    }
}