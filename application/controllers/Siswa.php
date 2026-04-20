<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    public function kartu($id)
    {
        $data['siswa'] = $this->db->get_where('users', ['id' => $id])->row();

        if (!$data['siswa']) {
            show_404();
        }

        $this->load->view('siswa/kartu', $data);
    }
}