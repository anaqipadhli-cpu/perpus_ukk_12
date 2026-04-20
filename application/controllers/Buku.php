<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url', 'form'));
    }

    public function index()
    {
        $keyword = $this->input->get('keyword');

        if (!empty($keyword)) {
            $this->db->like('judul', $keyword);
        }

        $query = $this->db->get('buku');
        $data['buku'] = $query ? $query->result() : array();

        $this->load->view('admin/buku/index', $data);
    }

    private function _do_upload()
    {
        $config['upload_path']          = './assets/uploads/covers/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048; // 2MB
        $config['file_name']            = 'cover_'.time();

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('cover')) {
            return null;
        }
        return $this->upload->data('file_name');
    }

    public function tambah()
    {
        if ($this->input->post()) {
            $data = [
                'judul'    => $this->input->post('judul'),
                'penulis'  => $this->input->post('penulis'),
                'penerbit' => $this->input->post('penerbit'),
                'tahun'    => $this->input->post('tahun'),
                'stok'     => $this->input->post('stok'),
            ];

            $cover = $this->_do_upload();
            if ($cover) {
                $data['cover'] = $cover;
            }

            $this->db->insert('buku', $data);
            redirect('buku');
        }

        $this->load->view('admin/buku/tambah');
    }

    public function edit($id)
    {
        $this->db->where('id', $id);
        $buku = $this->db->get('buku')->row();

        if ($this->input->post()) {
            $data = [
                'judul'    => $this->input->post('judul'),
                'penulis'  => $this->input->post('penulis'),
                'penerbit' => $this->input->post('penerbit'),
                'tahun'    => $this->input->post('tahun'),
                'stok'     => $this->input->post('stok'),
            ];

            $cover = $this->_do_upload();
            if ($cover) {
                // Delete old cover
                if ($buku->cover && file_exists('./assets/uploads/covers/'.$buku->cover)) {
                    unlink('./assets/uploads/covers/'.$buku->cover);
                }
                $data['cover'] = $cover;
            }

            $this->db->where('id', $id);
            $this->db->update('buku', $data);
            redirect('buku');
        }

        $data['buku'] = $buku;
        $this->load->view('admin/buku/edit', $data);
    }

    public function hapus($id)
    {
        $buku = $this->db->get_where('buku', ['id' => $id])->row();
        if ($buku && $buku->cover && file_exists('./assets/uploads/covers/'.$buku->cover)) {
            unlink('./assets/uploads/covers/'.$buku->cover);
        }
        
        $this->db->where('id', $id);
        $this->db->delete('buku');

        redirect('buku');
    }

}