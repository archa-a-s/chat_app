<?php
class Chat_model extends CI_Model {

    public function insertMessage($data)
    {
        return $this->db->insert('messages', $data);
    }

    public function getMessages()
    {
        $this->db->select('messages.*, users.name');
        $this->db->from('messages');
        $this->db->join('users', 'users.id = messages.user_id');
        $this->db->order_by('messages.id', 'ASC');
        return $this->db->get()->result();
    }
}