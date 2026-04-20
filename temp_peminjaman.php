<?php
class Peminjaman extends CI_Controller {

    public function __construct() {
        parent::__construct();
        cek_login();
    }

    public function index() {
        $this->db->select('peminjaman.*, users.nama, users.email');
        $this->db->from('peminjaman');
        $this->db->join('users','users.id = peminjaman.user_id');
        
        // Handle pencarian
        if ($this->input->post('cari')) {
            $cari = trim($this->input->post('cari'));
            if ($cari !== '') {
                $this->db->group_start();
                $this->db->like('users.nama', $cari);
                $this->db->or_like('users.email', $cari);
                $this->db->group_end();
                $data['cari'] = $cari;
            }
        }
        
        // Handle filter status
        if ($this->input->post('status')) {
            $status = $this->input->post('status');
            if ($status !== '') {
                $this->db->where('peminjaman.status', $status);
                $data['filter_status'] = $status;
            }
        }
        
        $data['pinjam'] = $this->db->get()->result();
        $this->load->view('admin/peminjaman/index', $data);
    }

    public function pinjam() {
        if ($this->input->post()) {

            $buku_ids = $this->input->post('buku_id');
            if (empty($buku_ids) || !is_array($buku_ids)) {
                $_SESSION['error'] = 'Pilih minimal satu buku untuk dipinjam.';
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

            redirect('dashboard');
        }
    }

    public function pinjam_single($buku_id) {
        // Check if book exists and has stock
        $buku = $this->db->get_where('buku', ['id' => $buku_id])->row();
        if (!$buku) {
            $_SESSION['error'] = 'Buku tidak ditemukan.';
            redirect('user/buku');
        }

        if ($buku->stok <= 0) {
            $_SESSION['error'] = 'Buku tidak tersedia (stok kosong).';
            redirect('user/buku');
        }

        // Check if user already has this book borrowed
        $user_id = $this->session->userdata('id');
        $existing = $this->db->query("
            SELECT p.id FROM peminjaman p 
            JOIN detail_peminjaman dp ON dp.peminjaman_id = p.id 
            WHERE p.user_id = ? AND dp.buku_id = ? AND p.status IN ('dipinjam', 'menunggu_konfirmasi')
        ", [$user_id, $buku_id])->row();

        if ($existing) {
            $_SESSION['error'] = 'Anda sudah meminjam buku ini.';
            redirect('user/buku');
        }

        // Create new loan
        $data = [
            'user_id' => $user_id,
            'tanggal_pinjam' => date('Y-m-d'),
            'tanggal_kembali' => date('Y-m-d', strtotime('+7 days')), // Default 7 days
            'status' => 'dipinjam'
        ];

        $this->db->insert('peminjaman', $data);
        $peminjaman_id = $this->db->insert_id();

        // Add book detail
        $this->db->insert('detail_peminjaman', [
            'peminjaman_id' => $peminjaman_id,
            'buku_id' => $buku_id,
            'jumlah' => 1
        ]);

        $_SESSION['success'] = 'Buku berhasil dipinjam!';
        redirect('user/buku');
    }
}
