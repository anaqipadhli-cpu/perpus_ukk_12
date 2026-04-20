<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    // Dashboard + data anggota
    public function index()
    {
        $keyword = $this->input->get('keyword');

        $this->db->select('anggota.*, users.nama, users.email');
        $this->db->from('anggota');
        $this->db->join('users', 'users.id = anggota.user_id');

        if($keyword){
            $this->db->group_start();
            $this->db->like('users.nama', $keyword);
            $this->db->or_like('users.email', $keyword);
            $this->db->group_end();
        }

        $data['anggota'] = $this->db->get()->result();

        // Statistics for view (optional, if used)
        $data['total_anggota'] = $this->db->count_all('anggota');
        $data['total_buku'] = $this->db->count_all('buku');

        $this->load->view('admin/anggota/index', $data);
    }

    // Tambah
    public function tambah()
    {
        if ($this->input->post()) {
            // 1. Insert into users table
            $user_data = array(
                'nama'     => $this->input->post('nama'),
                'email'    => $this->input->post('email'),
                'password' => password_hash('123456', PASSWORD_DEFAULT), // Default password
                'role'     => 'user'
            );

            $this->db->insert('users', $user_data);
            $user_id = $this->db->insert_id();

            // 2. Insert into anggota table
            $anggota_data = array(
                'user_id' => $user_id,
                'alamat'  => $this->input->post('alamat'),
                'no_hp'   => $this->input->post('no_hp')
            );

            $this->db->insert('anggota', $anggota_data);
            redirect('anggota');
        }

        $this->load->view('admin/anggota/tambah');
    }

    // Edit
    public function edit($id)
    {
        // Get current anggota and user data
        $this->db->select('anggota.*, users.nama, users.email');
        $this->db->from('anggota');
        $this->db->join('users', 'users.id = anggota.user_id');
        $this->db->where('anggota.id', $id);
        $curr_data = $this->db->get()->row();

        if (!$curr_data) {
            redirect('anggota');
        }

        if ($this->input->post()) {
            // 1. Update users table
            $user_data = array(
                'nama'  => $this->input->post('nama'),
                'email' => $this->input->post('email')
            );
            $this->db->where('id', $curr_data->user_id);
            $this->db->update('users', $user_data);

            // 2. Update anggota table
            $anggota_data = array(
                'alamat' => $this->input->post('alamat'),
                'no_hp'  => $this->input->post('no_hp')
            );
            $this->db->where('id', $id);
            $this->db->update('anggota', $anggota_data);

            redirect('anggota');
        }

        $data['anggota'] = $curr_data;
        $this->load->view('admin/anggota/edit', $data);
    }

    // Hapus
    public function hapus($id)
    {
        // Get user_id first
        $anggota = $this->db->get_where('anggota', ['id' => $id])->row();
        
        if ($anggota) {
            $user_id = $anggota->user_id;

            // Delete from anggota
            $this->db->where('id', $id);
            $this->db->delete('anggota');

            // Delete from users
            $this->db->where('id', $user_id);
            $this->db->delete('users');
        }

        redirect('anggota');
    }

}