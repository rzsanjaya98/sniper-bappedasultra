<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_info_garbarata extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }


    public function getDataPertumbuhanEkonomi( $tahun )
    {
        $sql = "
            SELECT wilayah, data_pertumbuhan_ekonomi FROM data_grafik_wilayah WHERE tahun = $tahun
        ";
        return $query = $this->db->query($sql)->result();
    }

    public function getDataGiniRasio( $tahun )
    {
        $sql = "
            SELECT wilayah, data_gini_rasio FROM data_grafik_wilayah WHERE tahun = $tahun
        ";
        return $query = $this->db->query($sql)->result();
    }

    public function getDataPersentasePendudukMiskin( $tahun )
    {
        $sql = "
            SELECT wilayah, data_persentase_penduduk_miskin FROM data_grafik_wilayah WHERE tahun = $tahun
        ";
        return $query = $this->db->query($sql)->result();
    }

    public function getDataIndeksPembangunanManusia( $tahun )
    {
        $sql = "
            SELECT wilayah, data_indeks_pembangunan_manusia FROM data_grafik_wilayah WHERE tahun = $tahun
        ";
        return $query = $this->db->query($sql)->result();
    }

    public function getDataTingkatPengangguranTerbuka( $tahun )
    {
        $sql = "
            SELECT wilayah, data_tingkat_pengangguran_terbuka FROM data_grafik_wilayah WHERE tahun = $tahun
        ";
        return $query = $this->db->query($sql)->result();
    }

}
