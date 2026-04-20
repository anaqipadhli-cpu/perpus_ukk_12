<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_model extends CI_Model {

    public function get_all() {
        $this->db->join('users', 'users.id = peminjaman.user_id');
        return $this->db->get('peminjaman')->result();
    }

    public function get_all_with_details() {
    return $this->db->query("
        SELECT peminjaman.*, users.nama, users.email, 
        GROUP_CONCAT(buku.judul SEPARATOR ', ') as buku_judul,
        IFNULL(MAX(denda.jumlah_denda), 0) as denda,
        IFNULL(MAX(denda.status), '-') as status_denda
        FROM peminjaman
        JOIN users ON users.id = peminjaman.user_id
        LEFT JOIN detail_peminjaman ON detail_peminjaman.peminjaman_id = peminjaman.id
        LEFT JOIN buku ON buku.id = detail_peminjaman.buku_id
        LEFT JOIN denda ON denda.peminjaman_id = peminjaman.id
        GROUP BY peminjaman.id
        ORDER BY peminjaman.tanggal_pinjam DESC
    ")->result();
}

    public function get_by_user($user_id) {
        return $this->db->get_where('peminjaman', ['user_id'=>$user_id])->result();
    }

    public function get_by_user_with_details($user_id) {
        $this->db->select('peminjaman.*, GROUP_CONCAT(DISTINCT buku.judul SEPARATOR ", ") as buku_judul');
        $this->db->from('peminjaman');
        $this->db->join('detail_peminjaman', 'detail_peminjaman.peminjaman_id = peminjaman.id', 'left');
        $this->db->join('buku', 'buku.id = detail_peminjaman.buku_id', 'left');
        $this->db->where('peminjaman.user_id', $user_id);
        $this->db->group_by('peminjaman.id');

        $peminjaman = $this->db->get()->result();

        foreach ($peminjaman as $p) {
            $denda = $this->db->get_where('denda', ['peminjaman_id' => $p->id])->row();
            $p->denda = $denda ? $denda->jumlah_denda : 0;
        }

        usort($peminjaman, function($a, $b) {
            return strtotime($b->tanggal_pinjam) - strtotime($a->tanggal_pinjam);
        });

        return $peminjaman;
    }

    public function insert($data) {
        $this->db->insert('peminjaman', $data);
        return $this->db->insert_id();
    }

    public function insert_detail($data) {
        return $this->db->insert('detail_peminjaman', $data);
    }

    public function get_detail_peminjaman($peminjaman_id) {
        $this->db->join('buku','buku.id = detail_peminjaman.buku_id');
        return $this->db->get_where('detail_peminjaman', ['peminjaman_id'=>$peminjaman_id])->result();
    }

    public function update_status($id, $status) {
        $this->db->where('id',$id);
        return $this->db->update('peminjaman',['status'=>$status]);
    }

    public function get_detail($id) {
        return $this->db
            ->select('peminjaman.*, users.nama, users.email, buku.judul, buku.penulis, buku.penerbit')
            ->from('peminjaman')
            ->join('users', 'users.id = peminjaman.user_id')
            ->join('detail_peminjaman', 'detail_peminjaman.peminjaman_id = peminjaman.id')
            ->join('buku', 'buku.id = detail_peminjaman.buku_id')
            ->where('peminjaman.id', $id)
            ->get()
            ->row();
    }

    public function get_riwayat_filter($user_id, $cari = null, $status = null, $tanggal = null)
    {
        $this->db->select('peminjaman.*, GROUP_CONCAT(buku.judul SEPARATOR ", ") as buku_judul');
        $this->db->from('peminjaman');
        $this->db->join('detail_peminjaman', 'detail_peminjaman.peminjaman_id = peminjaman.id', 'left');
        $this->db->join('buku', 'buku.id = detail_peminjaman.buku_id', 'left');

        $this->db->where('peminjaman.user_id', $user_id);

        if (!empty($cari)) {
            $this->db->like('buku.judul', $cari);
        }

        if (!empty($status)) {
            $this->db->where('peminjaman.status', $status);
        }

        if (!empty($tanggal)) {
            $this->db->where('peminjaman.tanggal_pinjam', $tanggal);
        }

        $this->db->group_by('peminjaman.id');
        $this->db->order_by('peminjaman.tanggal_pinjam', 'DESC');

        return $this->db->get()->result();
    }

}