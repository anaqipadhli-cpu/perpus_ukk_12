<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

    public function __construct() {
        parent::__construct();
        cek_login();
        $this->load->model('Peminjaman_model');
    }

    public function index() {

        $cari    = $this->input->post('cari', TRUE);
        $status  = $this->input->post('status', TRUE);
        $tanggal = $this->input->post('tanggal', TRUE);

        // 🔥 CEK FUNCTION ADA ATAU TIDAK
        if (method_exists($this->Peminjaman_model, 'get_filter')) {
            $data['pinjam'] = $this->Peminjaman_model->get_filter($cari, $status, $tanggal);
        } else {
            // fallback biar ga error
            $data['pinjam'] = $this->Peminjaman_model->get_all_with_details();
        }

        $data['cari'] = $cari;
        $data['filter_status'] = $status;
        $data['tanggal'] = $tanggal;

        $this->load->view('admin/peminjaman/index', $data);
    }

    // ================= PINJAM MULTI =================
    public function pinjam() {

        if (!$this->input->post()) {
            redirect('user/buku');
        }

        $buku_ids = $this->input->post('buku_id');

        if (empty($buku_ids)) {
            $this->session->set_flashdata('error', 'Pilih minimal satu buku!');
            redirect('user/buku');
        }

        $data = [
            'user_id' => $this->session->userdata('id'),
            'tanggal_pinjam' => date('Y-m-d'),
            'tanggal_kembali' => $this->input->post('tanggal_kembali'),
            'status' => 'dipinjam'
        ];

        $this->db->insert('peminjaman', $data);
        $id = $this->db->insert_id();

        foreach ($buku_ids as $buku) {
            $this->db->insert('detail_peminjaman', [
                'peminjaman_id' => $id,
                'buku_id' => $buku,
                'jumlah' => 1
            ]);
        }

        $this->session->set_flashdata('success', 'Berhasil meminjam buku');
        redirect('dashboard');
    }

    // ================= PINJAM SINGLE =================
    public function pinjam_single($buku_id) {

        $buku = $this->db->get_where('buku', ['id' => $buku_id])->row();

        if (!$buku) {
            $this->session->set_flashdata('error', 'Buku tidak ditemukan');
            redirect('user/buku');
        }

        if ($buku->stok <= 0) {
            $this->session->set_flashdata('error', 'Stok buku habis');
            redirect('user/buku');
        }

        $user_id = $this->session->userdata('id');

        $cek = $this->db->query("
            SELECT p.id FROM peminjaman p
            JOIN detail_peminjaman dp ON dp.peminjaman_id = p.id
            WHERE p.user_id = ? 
            AND dp.buku_id = ? 
            AND p.status = 'dipinjam'
        ", [$user_id, $buku_id])->row();

        if ($cek) {
            $this->session->set_flashdata('error', 'Sudah meminjam buku ini');
            redirect('user/buku');
        }

        $data = [
            'user_id' => $user_id,
            'tanggal_pinjam' => date('Y-m-d'),
            'tanggal_kembali' => date('Y-m-d', strtotime('+7 days')),
            'status' => 'dipinjam'
        ];

        $this->db->insert('peminjaman', $data);
        $id = $this->db->insert_id();

        $this->db->insert('detail_peminjaman', [
            'peminjaman_id' => $id,
            'buku_id' => $buku_id,
            'jumlah' => 1
        ]);

        $this->session->set_flashdata('success', 'Berhasil meminjam buku');
        redirect('user/buku');
    }
}