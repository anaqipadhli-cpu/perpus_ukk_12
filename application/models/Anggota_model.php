<?php
class Anggota_model extends CI_Model {

    public function get_all() {
        $this->db->join('users','users.id = anggota.user_id');
        return $this->db->get('anggota')->result();
    }

    public function insert($data) {
        return $this->db->insert('anggota', $data);
    }

    public function get_by_id($id) {
        return $this->db->get_where('anggota', ['id'=>$id])->row();
    }

    public function delete($id) {
        return $this->db->delete('anggota', ['id'=>$id]);
    }
}