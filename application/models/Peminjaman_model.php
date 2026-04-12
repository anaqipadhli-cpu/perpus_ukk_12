<?php
class Peminjaman_model extends CI_Model {

    public function get_all() {
        $this->db->join('users','users.id = peminjaman.user_id');
        return $this->db->get('peminjaman')->result();
    }

    public function get_by_user($user_id) {
        return $this->db->get_where('peminjaman', ['user_id'=>$user_id])->result();
    }

    public function insert($data) {
        $this->db->insert('peminjaman', $data);
        return $this->db->insert_id();
    }

    public function insert_detail($data) {
        return $this->db->insert('detail_peminjaman', $data);
    }

    public function get_detail($peminjaman_id) {
        $this->db->join('buku','buku.id = detail_peminjaman.buku_id');
        return $this->db->get_where('detail_peminjaman', ['peminjaman_id'=>$peminjaman_id])->result();
    }

    public function update_status($id, $status) {
        $this->db->where('id',$id);
        return $this->db->update('peminjaman',['status'=>$status]);
    }
}