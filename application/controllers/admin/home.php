<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends Admin_Controller
{
  // class Home extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    // $this->output->enable_profiler(TRUE);
    // $this->load->model("m_login");
    // $this->load->model("m_register");
    $this->load->model("m_program");
    $this->load->model("m_user");
    $this->load->model("m_kategori");
    $this->load->helper('array');
    $this->load->library("pagination");
  }

  public function index()
  {
    // if($this->session->userdata('user_id') == NULL)
    // {
    //     redirect('' . base_url());
    // }else{
    $data['page_name'] = "Beranda";
    $kategori = $this->m_kategori->getData();
    // $data['chart_name'] = "Data Prediksi Curah Hujan";

    $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));

    $data['sultra_cerdas_count'] = count($this->m_program->getDataProgram('Sultra Cerdas'));

    $arrayData = [];
    foreach ($kategori as $k) {
      $arrayIsi = [
        'nama_kategori' => $k->nama_kategori,
        'count' => count($this->m_program->getDataProgram($k->nama_kategori)),
      ];

      array_push($arrayData, $arrayIsi);
    }

    $data['kategori'] = $arrayData;

    // echo json_encode($arrayData);
    $this->load->view("templates/header", $data_user);
    $this->load->view("templates/sidebar");
    $this->load->view("view_admin/v_beranda", $data);
    // $this->load->view("_admin/_template/content",$data);
    $this->load->view("templates/footer");
    // }
  }
}
