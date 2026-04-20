<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_model extends CI_Model {

    public function get_all()
    {
        return $this->db->get('anggota')->result();
    }

    // hapus data
    public function delete($id)
    {
        return $this->db->delete('anggota', ['id' => $id]);
    }
}