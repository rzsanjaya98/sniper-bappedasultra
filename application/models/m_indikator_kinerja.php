<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_indikator_kinerja extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }


    public function getDataPertumbuhanEkonomi( $tahun )
    {
        $sql = "
            SELECT provinsi_nasional, data_pertumbuhan_ekonomi FROM data_grafik WHERE tahun = $tahun
        ";
        return $query = $this->db->query($sql)->result();
    }

    public function getDataGiniRasio( $tahun )
    {
        $sql = "
            SELECT provinsi_nasional, data_gini_rasio FROM data_grafik WHERE tahun = $tahun
        ";
        return $query = $this->db->query($sql)->result();
    }

    public function getDataPersentasePendudukMiskin( $tahun )
    {
        $sql = "
            SELECT provinsi_nasional, data_persentase_penduduk_miskin FROM data_grafik WHERE tahun = $tahun
        ";
        return $query = $this->db->query($sql)->result();
    }

    public function getDataIndeksPembangunanManusia( $tahun )
    {
        $sql = "
            SELECT provinsi_nasional, data_indeks_pembangunan_manusia FROM data_grafik WHERE tahun = $tahun
        ";
        return $query = $this->db->query($sql)->result();
    }

    public function getDataTingkatPengangguranTerbuka( $tahun )
    {
        $sql = "
            SELECT provinsi_nasional, data_tingkat_pengangguran_terbuka FROM data_grafik WHERE tahun = $tahun
        ";
        return $query = $this->db->query($sql)->result();
    }

}
