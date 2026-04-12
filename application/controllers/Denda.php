<?php
class Denda extends CI_Controller {

    public function __construct() {
        parent::__construct();
        cek_login();
    }

    public function index() {
        $this->db->join('peminjaman','peminjaman.id = denda.peminjaman_id');
        $data['denda'] = $this->db->get('denda')->result();
        $this->load->view('admin/denda/index',$data);
    }

    public function bayar($id) {
        $this->db->where('id',$id);
        $this->db->update('denda',['status'=>'sudah_bayar']);
        $_SESSION['success'] = 'Denda berhasil dibayar!';
        redirect('denda');
    }
}