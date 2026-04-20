<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->database();
		$data['buku'] = $this->db->limit(6)->get('buku')->result();
		$this->load->view('landing', $data);
	}
}
