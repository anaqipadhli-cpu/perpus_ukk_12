<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

    public function get_all()
    {
        return $this->db->get('buku')->result();
    }

    public function filter_buku($keyword)
    {
        $this->db->like('judul_buku',$keyword);
        $this->db->or_like('penulis',$keyword);

        return $this->db->get('buku')->result();
    }

}