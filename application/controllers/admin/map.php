<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends Admin_Controller {
  // class Home extends CI_Controller {

  public function __construct(){
      parent::__construct();
      // $this->output->enable_profiler(TRUE);
    // $this->load->model("m_login");
    // $this->load->model("m_register");
    // $this->load->model("m_admin");
    $this->load->model("m_user");

    // $this->load->model("m_log");
    $this->load->helper('array');
    $this->load->library("pagination");
  }

  public function index() 
  {
    // }else{
      $data['page_name'] = "MAP";
    //   $data['kategori'] = $this->m_kategori->getData();
      // $data['chart_name'] = "Data Prediksi Curah Hujan";
    
      $data['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
    //   $data['data_meteorologi_count'] = $this->m_data_meteorologi->count();

      $this->load->view("templates/header");
      $this->load->view("templates/sidebar");
      $this->load->view("view_admin/map/v_map",$data);
      // $this->load->view("_admin/_template/content",$data);
      $this->load->view("templates/footer");
    // }
  }
}