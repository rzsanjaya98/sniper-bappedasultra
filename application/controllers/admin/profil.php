<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends Admin_Controller
{
  // class Home extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    // $this->output->enable_profiler(TRUE);
    // $this->load->model("m_login");
    $this->load->model("m_register");
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
    $data['page_name'] = "Profil";
    // $kategori = $this->m_kategori->getData();
    // $data['chart_name'] = "Data Prediksi Curah Hujan";

    $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));

    // $data['sultra_cerdas_count'] = count($this->m_program->getDataProgram('Sultra Cerdas'));

    // $arrayData = [];
    // foreach ($kategori as $k) {
    //   $arrayIsi = [
    //     'nama_kategori' => $k->nama_kategori,
    //     'count' => count($this->m_program->getDataProgram($k->nama_kategori)),
    //   ];

    //   array_push($arrayData, $arrayIsi);
    // }

    // $data['kategori'] = $arrayData;

    // echo json_encode($arrayData);
    $this->load->view("templates/header", $data_user);
    $this->load->view("templates/sidebar");
    $this->load->view("view_admin/profil/v_profil", $data);
    // $this->load->view("_admin/_template/content",$data);
    $this->load->view("templates/footer");
    // }
  }

  public function update_profil()
  {
    $data['page_name'] = "Edit Profil";
    $this->load->helper('form');
    $this->load->library('form_validation');
    // $result = $this->m_register->getData();
    $config = array(
      array(
        'field' => 'user_profile_fullname',
        'label' => 'Full Name',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'nama harus di isi'
        ),
      ),
      array(
        'field' => 'user_profile_email',
        'label' => 'Email',
        'rules' => 'required',
        'errors' => array(
          'required' => 'email harus di isi',
        ),
      ),
      // array(
      //   'field' => 'user_username',
      //   'label' => 'Username',
      //   'rules' => 'required',
      //   'errors' => array(
      //     'required' => 'username harus harus di isi',
      //   ),
      // ),
      array(
        'field' => 'user_password',
        'label' => 'Password',
        'rules' => 'min_length[5]',
        'errors' => array(
          'min_length' => 'password minimal 5 karakter',
        ),
      ),
    );

    $this->form_validation->set_rules($config);

    if ($this->form_validation->run() === true) {
      // if (strpos($this->input->post('user_username'), " ")) {
      //   $this->session->set_flashdata('register', 'username tidak boleh mengandung spasi');
      //   redirect(site_url('/admin/akun/update_akun'));
      // }
      $dataProfile['user_profile_fullname'] = $this->input->post('user_profile_fullname');
      $dataProfile['user_profile_email'] = $this->input->post('user_profile_email');
      $dataUser['user_username'] = str_ireplace(" ", "", $this->input->post('user_username'));
      if ($this->input->post('user_password') != "") {
        $dataUser['user_password'] = md5($this->input->post('user_password'));
      }
      $dataUser['user_level'] = $this->input->post('user_level');
      $dataUser['user_status'] = $this->input->post('user_status');
      $data_param['user_id'] = $this->input->post('user_id');
      $resultUser = $this->m_register->updateUser($dataUser, $data_param);
      $resultProfile = $this->m_register->updateProfile($dataProfile, $data_param);
      if (!empty($resultUser) && !empty($resultProfile)) {
        $this->session->set_flashdata('info', array(
          'from' => 1,
          'message' => 'Update berhasil'
        ));
        // $log['log_message'] = "true";
        // $this->m_log->inserLog( $log );
        redirect(site_url('admin/profil'));
      } else {
        $this->session->set_flashdata('info', array(
          'from' => 0,
          'message' =>  'terjadi kesalahan saat mengirim data'
        ));
        redirect(site_url('admin/profil'));
      }
    } else {
      $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
      $data['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
      $this->load->view("templates/header", $data_user);
      $this->load->view("templates/sidebar");
      $this->load->view("view_admin/profil/v_update_profil", $data);
      // $this->load->view("_admin/_template/content",$data);
      $this->load->view("templates/footer");
    }
  }
}
