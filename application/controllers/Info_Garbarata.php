<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Info_Garbarata extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("m_info_garbarata");
    }

    function index(){
        $data['page_name'] = "Info Garbarata";

        $data['pertumbuhan_ekonomi'] = $this->m_info_garbarata->getDataPertumbuhanEkonomi(2020);
        $data['gini_rasio'] = $this->m_info_garbarata->getDataGiniRasio(2020);
        $data['persentase_penduduk_miskin'] = $this->m_info_garbarata->getDataPersentasePendudukMiskin(2020);
        $data['indeks_pembangunan_manusia'] = $this->m_info_garbarata->getDataIndeksPembangunanManusia(2020);
        $data['tingkat_pengangguran_terbuka'] = $this->m_info_garbarata->getDataTingkatPengangguranTerbuka(2020);
        // $data['program_sultra'] = $this->m_program->getDataProgram($data['page_name']);
        // $data['program_sultra'] = $this->m_program->getDataProgram($data['page_name'])->count();
        $this->load->view("view_utama/templates/header");
        $this->load->view("view_utama/v_info_garbarata", $data);
        $this->load->view("view_utama/templates/footer");
    }

    
}
