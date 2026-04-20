<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Denda extends CI_Controller {

    public function __construct() {
        parent::__construct();
        cek_login();
    }

    public function index() {

        $cari    = $this->input->post('cari', TRUE);
        $status  = $this->input->post('status', TRUE);
        $tanggal = $this->input->post('tanggal', TRUE);

        $this->db->select('denda.*, users.nama, buku.judul, peminjaman.tanggal_kembali');
        $this->db->from('denda');
        $this->db->join('peminjaman','peminjaman.id = denda.peminjaman_id');
        $this->db->join('users','users.id = peminjaman.user_id');
        $this->db->join('detail_peminjaman','detail_peminjaman.peminjaman_id = peminjaman.id');
        $this->db->join('buku','buku.id = detail_peminjaman.buku_id');

        // 🔍 PENCARIAN
        if (!empty($cari)) {
            $this->db->group_start();
            $this->db->like('users.nama', $cari);
            $this->db->or_like('buku.judul', $cari);
            $this->db->group_end();
        }

        // 🔽 FILTER STATUS
        if (!empty($status)) {
            $this->db->where('denda.status', $status);
        }

        // 📅 FILTER TANGGAL
        if (!empty($tanggal)) {
            $this->db->where('peminjaman.tanggal_kembali', $tanggal);
        }

        $data['denda'] = $this->db->get()->result();

        $data['cari'] = $cari;
        $data['status'] = $status;
        $data['tanggal'] = $tanggal;

        $this->load->view('admin/denda/index', $data);
    }

    public function bayar($id) {
        $this->db->where('id', $id);
        $this->db->update('denda', ['status' => 'lunas']);

        $this->session->set_flashdata('success', 'Denda berhasil dibayar!');
        redirect('denda');
    }

}