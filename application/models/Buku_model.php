<?php
class Buku_model extends CI_Model {

    public function get_all() {
        return $this->db->get('buku')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('buku', ['id'=>$id])->row();
    }

    public function insert($data) {
        return $this->db->insert('buku', $data);
    }

    public function update($id, $data) {
        $this->db->where('id',$id);
        return $this->db->update('buku', $data);
    }

    public function delete($id) {
        return $this->db->delete('buku', ['id'=>$id]);
    }

    public function update_stok($id, $jumlah) {
        $this->db->set('stok', 'stok-'.$jumlah, FALSE);
        $this->db->where('id',$id);
        return $this->db->update('buku');
    }

    public function tambah_stok($id, $jumlah) {
        $this->db->set('stok', 'stok+'.$jumlah, FALSE);
        $this->db->where('id',$id);
        return $this->db->update('buku');
    }
}