<?php
class Peminjaman extends CI_Controller {

    public function __construct() {
        parent::__construct();
        cek_login();
    }

    public function index() {
        $this->db->join('users','users.id = peminjaman.user_id');
        
        // Handle pencarian
        if ($this->input->post('cari')) {
            $cari = $this->input->post('cari');
            $this->db->like('users.nama', $cari);
            $this->db->or_like('users.email', $cari);
            $data['cari'] = $cari;
        }
        
        // Handle filter status
        if ($this->input->post('status')) {
            $status = $this->input->post('status');
            $this->db->where('peminjaman.status', $status);
            $data['filter_status'] = $status;
        }
        
        $data['pinjam'] = $this->db->get('peminjaman')->result();
        $this->load->view('admin/peminjaman/index', $data);
    }

    public function pinjam() {
        if ($this->input->post()) {

            $data = [
                'user_id' => $this->session->userdata('id'),
                'tanggal_pinjam' => date('Y-m-d'),
                'tanggal_kembali' => $this->input->post('tanggal_kembali'),
                'status' => 'dipinjam'
            ];

            $this->db->insert('peminjaman', $data);
            $id = $this->db->insert_id();

            foreach ($this->input->post('buku_id') as $buku) {
                $this->db->insert('detail_peminjaman', [
                    'peminjaman_id' => $id,
                    'buku_id' => $buku,
                    'jumlah' => 1
                ]);
            }

            redirect('dashboard');
        }
    }
}