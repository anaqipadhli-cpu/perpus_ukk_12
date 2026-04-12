<?php
class Anggota extends CI_Controller {

    public function __construct() {
        parent::__construct();
        cek_login();
        cek_admin();
    }

    public function index() {
        $this->db->join('users','users.id = anggota.user_id');
        
        // Handle pencarian/filter
        if ($this->input->post('cari')) {
            $cari = $this->input->post('cari');
            $this->db->like('users.nama', $cari);
            $this->db->or_like('users.email', $cari);
            $data['cari'] = $cari;
        }
        
        $data['anggota'] = $this->db->get('anggota')->result();
        $this->load->view('admin/anggota/index', $data);
    }

    public function tambah() {
        if ($this->input->post()) {

            $user = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'role' => 'user'
            ];
            $this->db->insert('users', $user);
            $user_id = $this->db->insert_id();

            $anggota = [
                'user_id' => $user_id,
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp')
            ];
            $this->db->insert('anggota', $anggota);
            $_SESSION['success'] = 'Anggota berhasil ditambahkan!';
            redirect('anggota');
        }

        $this->load->view('admin/anggota/tambah');
    }

    public function hapus($id) {
        // Cek apakah anggota pernah meminjam
        $anggota = $this->db->get_where('anggota', ['id' => $id])->row();
        $pinjam = $this->db->get_where('peminjaman', ['user_id' => $anggota->user_id])->num_rows();
        
        if ($pinjam > 0) {
            $_SESSION['error'] = 'Anggota tidak dapat dihapus karena masih memiliki riwayat peminjaman!';
            redirect('anggota');
            return;
        }
        
        // Hapus user terlebih dahulu
        $this->db->delete('users', ['id' => $anggota->user_id]);
        // Lalu hapus anggota
        $this->db->delete('anggota', ['id' => $id]);
        $_SESSION['success'] = 'Anggota berhasil dihapus!';
        redirect('anggota');
    }
}