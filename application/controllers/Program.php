<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Program extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_program");
        $this->load->model("m_kegiatan");
        $this->load->model("m_sub_kegiatan");
        $this->load->model("m_capaian");
        $this->load->model("m_target");
    }

    function Sultra_Cerdas(){
        $data['page_name'] = "Sultra Cerdas";

        $data['program_sultra'] = $this->m_program->getDataProgram($data['page_name']);
        // $data['program_sultra'] = $this->m_program->getDataProgram($data['page_name'])->count();
        $this->load->view("view_utama/templates/header");
        $this->load->view("view_utama/v_program", $data);
        $this->load->view("view_utama/templates/footer");
    }

    public function Sultra_Sehat(){
        $data['page_name'] = "Sultra Sehat";

        $data['program_sultra'] = $this->m_program->getDataProgram($data['page_name']);
        // $data['program_sultra'] = $this->m_program->getDataProgram($data['page_name'])->count();
        $this->load->view("view_utama/templates/header");
        $this->load->view("view_utama/v_program", $data);
        $this->load->view("view_utama/templates/footer");
    }

    public function Sultra_Peduli_Kemiskinan(){
        $data['page_name'] = "Sultra Peduli Kemiskinan";

        $data['program_sultra'] = $this->m_program->getDataProgram($data['page_name']);
        // $data['program_sultra'] = $this->m_program->getDataProgram($data['page_name'])->count();
        $this->load->view("view_utama/templates/header");
        $this->load->view("view_utama/v_program", $data);
        $this->load->view("view_utama/templates/footer");
    }

    public function Sultra_Beriman_Dan_Berbudaya(){
        $data['page_name'] = "Sultra Beriman dan Berbudaya";

        $data['program_sultra'] = $this->m_program->getDataProgram($data['page_name']);
        // $data['program_sultra'] = $this->m_program->getDataProgram($data['page_name'])->count();
        $this->load->view("view_utama/templates/header");
        $this->load->view("view_utama/v_program", $data);
        $this->load->view("view_utama/templates/footer");
    }

    public function Sultra_Produktif(){
        $data['page_name'] = "Sultra Produktif";

        $data['program_sultra'] = $this->m_program->getDataProgram($data['page_name']);
        // $data['program_sultra'] = $this->m_program->getDataProgram($data['page_name'])->count();
        $this->load->view("view_utama/templates/header");
        $this->load->view("view_utama/v_program", $data);
        $this->load->view("view_utama/templates/footer");
    }
    
    public function Kegiatan($id_opd = null, $id_jenis_urusan = null, $id_bidang_urusan = null, $id_program = null){

        $data['program'] = $this->m_program->getData($id_jenis_urusan, $id_bidang_urusan, $id_program);
        $data['kegiatan'] = $this->m_kegiatan->getData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program);
        $data['sub_kegiatan'] = $this->m_sub_kegiatan->getDataSubKegiatanOPD($id_jenis_urusan, $id_bidang_urusan, $id_program, $id_opd, 2022);
        // $data['capaian_2020'] = $this->m_capaian->getDataPerTahun(2020);
        // $data['capaian_2021'] = $this->m_capaian->getDataPerTahun(2021);
        // $data['target_2021'] = $this->m_target->getDataPerTahun(2021);

        $data['page_name'] = $data['program'][0]->nama_program;

        // echo json_encode($data['sub_kegiatan']);
        $this->load->view("view_utama/templates/header");
        $this->load->view("view_utama/v_kegiatan", $data);
        $this->load->view("view_utama/templates/footer");
    }

    
}
