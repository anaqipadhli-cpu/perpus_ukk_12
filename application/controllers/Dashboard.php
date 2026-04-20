<?php
class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        cek_login();
    }

    public function index() {
        if ($this->session->userdata('role') == 'admin') {
            // Get statistics
            $data['total_buku'] = $this->db->get('buku')->num_rows();
            $data['total_anggota'] = $this->db->get('anggota')->num_rows();
            $data['total_peminjaman'] = $this->db->get('peminjaman')->num_rows();
            $data['peminjaman_aktif'] = $this->db->get_where('peminjaman', ['status' => 'dipinjam'])->num_rows();
            $data['peminjaman_kembali'] = $this->db->get_where('peminjaman', ['status' => 'dikembalikan'])->num_rows();
            $data['denda_belum_bayar'] = $this->db->get_where('denda', ['status' => 'belum_bayar'])->num_rows();
            $data['nama_admin'] = $this->session->userdata('nama');
            
            $this->load->view('admin/dashboard', $data);
        } else {
            $data['nama_user'] = $this->session->userdata('nama');
            $this->load->view('user/dashboard', $data);
        }
    }
}