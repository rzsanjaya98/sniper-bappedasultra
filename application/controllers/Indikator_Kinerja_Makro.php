<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Indikator_Kinerja_Makro extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("m_indikator_kinerja");
    }

    function index(){
        $data['page_name'] = "Indikator Kinerja Makro Regional Sulawesi";
        $data['pertumbuhan_ekonomi'] = $this->m_indikator_kinerja->getDataPertumbuhanEkonomi(2020);
        $data['gini_rasio'] = $this->m_indikator_kinerja->getDataGiniRasio(2020);
        $data['persentase_penduduk_miskin'] = $this->m_indikator_kinerja->getDataPersentasePendudukMiskin(2020);
        $data['indeks_pembangunan_manusia'] = $this->m_indikator_kinerja->getDataIndeksPembangunanManusia(2020);
        $data['tingkat_pengangguran_terbuka'] = $this->m_indikator_kinerja->getDataTingkatPengangguranTerbuka(2020);

        // $data['program_sultra'] = $this->m_program->getDataProgram($data['page_name']);
        // $data['program_sultra'] = $this->m_program->getDataProgram($data['page_name'])->count();
        $this->load->view("view_utama/templates/header");
        $this->load->view("view_utama/v_indikator_kinerja_makro", $data);
        $this->load->view("view_utama/templates/footer");
    }

    
}
