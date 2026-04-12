<?php
class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        cek_login();
        $this->load->model('Buku_model');
        $this->load->model('Peminjaman_model');
    }

    // Halaman daftar buku untuk dipinjam
    public function buku() {
        $data['buku'] = $this->Buku_model->get_all();
        $this->load->view('user/buku', $data);
    }

    // Halaman riwayat peminjaman user
    public function riwayat() {
        $user_id = $this->session->userdata('id');
        $data['riwayat'] = $this->Peminjaman_model->get_by_user($user_id);
        $this->load->view('user/riwayat', $data);
    }
}
