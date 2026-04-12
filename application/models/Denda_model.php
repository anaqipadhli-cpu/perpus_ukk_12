<?php
class Denda_model extends CI_Model {

    public function get_all() {
        $this->db->join('peminjaman','peminjaman.id = denda.peminjaman_id');
        return $this->db->get('denda')->result();
    }

    public function get_by_user($user_id) {
        $this->db->join('peminjaman','peminjaman.id = denda.peminjaman_id');
        $this->db->where('peminjaman.user_id',$user_id);
        return $this->db->get('denda')->result();
    }

    public function insert($data) {
        return $this->db->insert('denda',$data);
    }

    public function update_status($id,$status) {
        $this->db->where('id',$id);
        return $this->db->update('denda',['status'=>$status]);
    }
}