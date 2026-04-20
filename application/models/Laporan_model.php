<?php
class Laporan_model extends CI_Model {

    // HARIAN
    public function laporan_harian(){
        $this->db->where('DATE(tanggal)', date('Y-m-d'));
        return $this->db->get('peminjaman')->result();
    }

    // MINGGUAN
    public function laporan_mingguan(){
        $this->db->where('YEARWEEK(tanggal, 1) = YEARWEEK(CURDATE(), 1)');
        return $this->db->get('peminjaman')->result();
    }

    // BULANAN
    public function laporan_bulanan(){
        $this->db->where('MONTH(tanggal)', date('m'));
        $this->db->where('YEAR(tanggal)', date('Y'));
        return $this->db->get('peminjaman')->result();
    }

    // TAHUNAN
    public function laporan_tahunan(){
        $this->db->where('YEAR(tanggal)', date('Y'));
        return $this->db->get('peminjaman')->result();
    }
}