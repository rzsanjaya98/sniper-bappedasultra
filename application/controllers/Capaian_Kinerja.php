<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Capaian_Kinerja extends CI_Controller
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
        $this->load->model("m_capaian_kinerja");
        $this->load->model("m_instansi_opd");
    }

    function index()
    {
        $data['page_name'] = "Capaian Kinerja OPD Sultra";
        // $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
        $data['instansi_opd'] = $this->m_instansi_opd->getInstansi();
        $data['jenis_urusan'] = "";
        $data['bidang_urusan'] = "";
        $data['program'] = "";
        $data['kegiatan'] = "";
        $data['sub_kegiatan'] = "";
        $data['instansi'] = "";
        $id_instansi_opd = $this->input->post('opd');
        // echo json_encode($data_user['user'][0]->user_profile_opd);


        // $data['jenis_urusan'] = $this->m_jenis_urusan->getData();
        // $data['bidang_urusan'] = $this->m_bidang_urusan->getData();

        if ($id_instansi_opd != null) {
            $data['jenis_urusan'] = $this->m_capaian_kinerja->getDataJenisUrusan($id_instansi_opd);
            $data['bidang_urusan'] = $this->m_capaian_kinerja->getDataBidangUrusan($id_instansi_opd);
            $data['program'] = $this->m_capaian_kinerja->getDataProgramOPD($id_instansi_opd, 2022);
            // $data['kegiatan'] = $this->m_kegiatan->getDataKegiatanOPD($data_user['user'][0]->user_profile_id_opd);
            $data['kegiatan'] = $this->m_capaian_kinerja->getDataKegiatanOPD($id_instansi_opd, 2022);
            $data['sub_kegiatan'] = $this->m_capaian_kinerja->getDataSubKegiatanOPD($id_instansi_opd, 2022);
            $data['instansi'] = $id_instansi_opd;
        }

        // $this->load->view("view_utama/templates/header");
        $this->load->view("view_utama/v_capaian_kinerja2", $data);
        // $this->load->view("view_utama/templates/footer");
    }
}
