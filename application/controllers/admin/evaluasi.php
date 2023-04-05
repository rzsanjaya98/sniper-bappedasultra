<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Evaluasi extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("m_jenis_urusan");
        $this->load->model("m_bidang_urusan");
        $this->load->model("m_program");
        $this->load->model("m_kegiatan");
        $this->load->model("m_sub_kegiatan");
        $this->load->model("m_capaian");
        $this->load->model("m_target");
        $this->load->model("m_user");
    }

    public function index(){
        $data['page_name'] = "Evaluasi";
        $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
        if($this->session->userdata('user_level') == 3){
            $data['program'] = $this->m_program->getDataProgramOPD($data_user['user'][0]->user_profile_opd);
        }else{
            $data['program'] = $this->m_program->getData();
        }
        $data['kegiatan'] = $this->m_kegiatan->getDataAll();
        $data['sub_kegiatan'] = $this->m_sub_kegiatan->getDataAll();
        // $data['capaian_2020'] = $this->m_capaian->getDataPerTahun(2020);
        // $data['capaian_2021'] = $this->m_capaian->getDataPerTahun(2021);
        // $data['target_2021'] = $this->m_target->getDataPerTahun(2021);

        $this->load->view("templates/header", $data_user);
        $this->load->view("templates/sidebar");
        $this->load->view("view_admin/evaluasi/v_evaluasi", $data);
        // $this->load->view("view_admin/capaian_kinerja_opd/v_pdf", $data);
        $this->load->view("templates/footer");
    }
    
}
