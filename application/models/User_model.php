<?php
class User_model extends CI_Model {

    public function get_by_id($id) {
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    public function get_all() {
        return $this->db->get('users')->result();
    }
}