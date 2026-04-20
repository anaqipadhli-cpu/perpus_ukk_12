<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        cek_login();
        $this->load->model('Buku_model');     
        $this->load->model('Peminjaman_model');
    }

    // ================= DAFTAR BUKU =================
    public function buku() {
        $data['buku'] = $this->Buku_model->get_all();
        $this->load->view('user/buku', $data);
    }

    // ================= RIWAYAT PEMINJAMAN + FILTER =================
    public function riwayat() {

        $user_id = $this->session->userdata('id');

        if (!$user_id) {
            redirect('auth');
        }

        // ambil input filter
        $cari    = $this->input->post('cari', TRUE);
        $status  = $this->input->post('status', TRUE);
        $tanggal = $this->input->post('tanggal', TRUE);

        // pakai function filter (yang sudah kita buat di model)
        $data['riwayat'] = $this->Peminjaman_model->get_riwayat_filter($user_id, $cari, $status, $tanggal);

        // kirim ke view
        $data['cari'] = $cari;
        $data['status'] = $status;
        $data['tanggal'] = $tanggal;

        $this->load->view('user/riwayat', $data);
    }

    // ================= PROFIL USER =================
    public function profile() {
        $user_id = $this->session->userdata('id');
        
        $this->db->select('users.*, anggota.alamat, anggota.no_hp');
        $this->db->from('users');
        $this->db->join('anggota', 'anggota.user_id = users.id', 'left');
        $this->db->where('users.id', $user_id);
        $data['user'] = $this->db->get()->row();

        $this->load->view('user/profile', $data);
    }
}