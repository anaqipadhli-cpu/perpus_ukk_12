<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        cek_login();
        $this->load->model('Laporan_model');
    }

    public function index(){
        $data['harian'] = $this->Laporan_model->laporan_harian();
        $data['mingguan'] = $this->Laporan_model->laporan_mingguan();
        $data['bulanan'] = $this->Laporan_model->laporan_bulanan();
        $data['tahunan'] = $this->Laporan_model->laporan_tahunan();

        $this->load->view('laporan_view', $data);
    }

    public function pdf(){
        $data['harian'] = $this->Laporan_model->laporan_harian();
        $data['mingguan'] = $this->Laporan_model->laporan_mingguan();
        $data['bulanan'] = $this->Laporan_model->laporan_bulanan();
        $data['tahunan'] = $this->Laporan_model->laporan_tahunan();

        $this->load->view('laporan_pdf', $data);
    }

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        cek_login();
        $this->load->model('Peminjaman_model');
    }

    public function index() {

        $tanggal_awal  = $this->input->post('tanggal_awal');
        $tanggal_akhir = $this->input->post('tanggal_akhir');

        $data['laporan'] = $this->Peminjaman_model->get_laporan($tanggal_awal, $tanggal_akhir);

        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;

        $this->load->view('admin/laporan/index', $data);
    }

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        cek_login();
        $this->load->model('Peminjaman_model');
    }

    public function index() {

        $tgl_awal  = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');

        $data['laporan'] = $this->Peminjaman_model->get_laporan($tgl_awal, $tgl_akhir);

        $data['tgl_awal'] = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;

        $this->load->view('admin/laporan/index', $data);
    }

    public function cetak() {

        $tgl_awal  = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');

        $data['laporan'] = $this->Peminjaman_model->get_laporan($tgl_awal, $tgl_akhir);

        $this->load->view('admin/laporan/cetak', $data);
    }
}