<?php
class Buku extends CI_Controller {

    public function __construct() {
        parent::__construct();
        cek_login();
    }

    public function index() {
        $data['buku'] = $this->db->get('buku')->result();
        $this->load->view('admin/buku/index', $data);
    }

    public function tambah() {
        if ($this->input->post()) {
            $this->db->insert('buku', $this->input->post());
            $_SESSION['success'] = 'Buku berhasil ditambahkan!';
            redirect('buku');
        }
        $this->load->view('admin/buku/tambah');
    }

    public function edit($id) {
        if ($this->input->post()) {
            $this->db->where('id', $id);
            $this->db->update('buku', $this->input->post());
            $_SESSION['success'] = 'Buku berhasil diperbarui!';
            redirect('buku');
        }

        $data['buku'] = $this->db->get_where('buku', ['id'=>$id])->row();
        $this->load->view('admin/buku/edit', $data);
    }

    public function hapus($id) {
        cek_admin();
        
        // Cek apakah buku sudah pernah dipinjam
        $detail = $this->db->get_where('detail_peminjaman', ['buku_id' => $id])->num_rows();
        
        if ($detail > 0) {
            // Jika sudah pernah dipinjam, jangan hapus
            $_SESSION['error'] = 'Buku tidak dapat dihapus karena sudah pernah dipinjam!';
            redirect('buku');
            return;
        }
        
        // Hapus buku
        $this->db->delete('buku', ['id' => $id]);
        $_SESSION['success'] = 'Buku berhasil dihapus!';
        redirect('buku');
    }
}