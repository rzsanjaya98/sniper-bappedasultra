<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Agenda_Perencanaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("m_indikator_kinerja");
    }

    function index(){
        $data['page_name'] = "Agenda Perencanaan";
        $this->load->view("view_utama/templates/header");
        $this->load->view("view_utama/v_agenda_perencanaan", $data);
        $this->load->view("view_utama/templates/footer");
    }

    
}
