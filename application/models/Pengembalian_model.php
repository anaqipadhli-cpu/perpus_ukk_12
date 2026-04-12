<?php
class Pengembalian_model extends CI_Model {

    public function get_all() {
        $this->db->join('peminjaman','peminjaman.id = pengembalian.peminjaman_id');
        return $this->db->get('pengembalian')->result();
    }

    public function insert($data) {
        return $this->db->insert('pengembalian', $data);
    }

    public function get_by_id($id) {
        return $this->db->get_where('pengembalian',['id'=>$id])->row();
    }

    public function update_status($id, $status) {
        $this->db->where('id',$id);
        return $this->db->update('pengembalian',['status'=>$status]);
    }
}