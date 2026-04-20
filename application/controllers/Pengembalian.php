<?php
class Pengembalian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        cek_login();
    }

    public function index() {
        $data['pengembalian'] = $this->db->get('pengembalian')->result();
        $this->load->view('admin/pengembalian/index', $data);
    }

    public function kembalikan($id) {
        $data = [
            'peminjaman_id' => $id,
            'tanggal_kembali_real' => date('Y-m-d'),
            'status' => 'menunggu'
        ];

        $this->db->insert('pengembalian', $data);

        $this->db->where('id', $id);
        $this->db->update('peminjaman', ['status'=>'menunggu_konfirmasi']);
        $_SESSION['success'] = 'Buku berhasil dikembalikan! Menunggu konfirmasi admin.';
        redirect('dashboard');
    }

    public function konfirmasi($id) {
        cek_admin();

        $pengembalian = $this->db->get_where('pengembalian',['id'=>$id])->row();
        if (!$pengembalian) {
            $pengembalian = $this->db->get_where('pengembalian',['peminjaman_id'=>$id])->row();
        }

        if (!$pengembalian) {
            $_SESSION['error'] = 'Data pengembalian tidak ditemukan.';
            redirect('pengembalian');
        }

        $pinjam = $this->db->get_where('peminjaman',['id'=>$pengembalian->peminjaman_id])->row();
        if (!$pinjam) {
            $_SESSION['error'] = 'Data peminjaman tidak ditemukan.';
            redirect('pengembalian');
        }

        $telat = (strtotime($pengembalian->tanggal_kembali_real) - strtotime($pinjam->tanggal_kembali)) / 86400;

        if ($telat > 0) {
            $this->db->insert('denda', [
                'peminjaman_id' => $pinjam->id,
                'jumlah_denda' => $telat * 5000,
                'status' => 'belum_bayar'
            ]);
        }

        $this->db->where('id',$pengembalian->id);
        $this->db->update('pengembalian',['status'=>'dikonfirmasi']);

        $this->db->where('id',$pinjam->id);
        $this->db->update('peminjaman',['status'=>'dikembalikan']);
        $_SESSION['success'] = 'Pengembalian berhasil dikonfirmasi!';
        redirect('pengembalian');
    }
}
