<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Program_Sultra extends Admin_Controller
{
  // class Home extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    // $this->output->enable_profiler(TRUE);
    // $this->load->model("m_login");
    $this->load->model("m_target");
    $this->load->model("m_capaian");
    $this->load->model("m_bidang_urusan");
    $this->load->model("m_jenis_urusan");
    $this->load->model("m_kegiatan");
    $this->load->model("m_sub_kegiatan");
    $this->load->model("m_user");
    $this->load->model("m_instansi_opd");
    $this->load->model("m_kategori");
    $this->load->model("m_program");
    $this->load->helper('url');
    $this->load->library("pagination");
  }

  public function index()
  {
    $data['page_name'] = "Program Sultra";

    // $data['user'] = $this->m_user->getUser($this->session->userdata('user_id'));


    // $config['base_url'] = site_url('admin/program_sultra/index/'); //site url
    // $config['total_rows'] = $this->m_program->count('program'); //total row
    // $config['per_page'] = 15;  //show record per halaman
    // $config['uri_segment'] = 4;  // uri parameter
    // $choice = $config["total_rows"] / $config["per_page"];
    // $config['num_links'] = floor($choice);

    // //   // Membuat Style pagination untuk BootStrap v4
    // $config['first_link']       = 'First';
    // $config['last_link']        = 'Last';
    // $config['next_link']        = 'Next';
    // $config['prev_link']        = 'Prev';
    // $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
    // $config['full_tag_close']   = '</ul></nav></div>';
    // $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
    // $config['num_tag_close']    = '</span></li>';
    // $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
    // $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
    // $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
    // $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
    // $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
    // $config['prev_tagl_close']  = '</span>Next</li>';
    // $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
    // $config['first_tagl_close'] = '</span></li>';
    // $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
    // $config['last_tagl_close']  = '</span></li>';

    // $this->pagination->initialize($config);
    // $data['page'] = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;

    // $data['program_sultra'] = $this->m_program->getDataLimit($config["per_page"], $data['page'])->result();
    // $data['pagination'] = $this->pagination->create_links();

    // echo $config["num_links"];
    $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
    // echo json_encode($data_user['user'][0]->user_profile_opd);
    if ($this->session->userdata('user_level') == 3) {
      $data['program_sultra'] = $this->m_program->getDataProgramOPD($data_user['user'][0]->user_profile_opd);
    } else {
      $data['program_sultra'] = $this->m_program->getData();
    }

    $data['jenis_urusan'] = $this->m_jenis_urusan->getData();
    $data['bidang_urusan'] = $this->m_bidang_urusan->getData();
    // echo json_encode($data['jenis_urusan']);
    // echo $this->session->userdata('user_profile_opd');

    $this->load->view("templates/header", $data_user);
    $this->load->view("templates/sidebar");
    $this->load->view("view_admin/program_sultra/v_program_sultra", $data);
    $this->load->view("templates/footer");
  }

  public function input_program()
  {
    // $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
    $data['page_name'] = "Input Program";
    $this->load->helper('form');
    $this->load->library('form_validation');
    $config = array(
      array(
        'field' => 'jenis_urusan',
        'label' => 'Jenis Urusan',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'jenis urusan harus di isi'
        ),
      ),
      array(
        'field' => 'bidang_urusan',
        'label' => 'Bidang Urusan',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'bidang urusan harus di isi'
        ),
      ),
      array(
        'field' => 'kode_program',
        'label' => 'Kode Program',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'kode program harus di isi'
        ),
      ),
      array(
        'field' => 'nama_program',
        'label' => 'Nama Program',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'nama program harus di isi'
        ),
      ),
      array(
        'field' => 'indikator_program',
        'label' => 'Indikator Program',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'indikator program harus di isi'
        ),
      ),
      array(
        'field' => 'kategori',
        'label' => 'Kategori',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'kategori harus di pilih'
        ),
      ),
      array(
        'field' => 'opd',
        'label' => 'OPD',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'OPD harus di pilih'
        ),
      ),

    );

    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() == true) {
      $id_jenis_urusan = $this->input->post('jenis_urusan');
      $id_bidang_urusan = $this->input->post('bidang_urusan');
      $id_program = $this->input->post('kode_program');
      $id_opd = $this->input->post('opd');
      $cek = $this->m_program->cekData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program);
      if (!empty($cek)) {
        $this->session->set_flashdata('info', array(
          'from' => 0,
          'message' =>  'Program sudah ada'
        ));
        redirect(site_url('admin/program_sultra/input_program'));
      } else {
        $dataEdit['id_jenis_urusan'] = $this->input->post('jenis_urusan');
        $dataEdit['id_bidang_urusan'] = $this->input->post('bidang_urusan');
        $dataEdit['id_program'] = $this->input->post('kode_program');
        $dataEdit['nama_program'] = $this->input->post('nama_program');
        // if ($this->session->userdata('user_level') == 3) {
        //   $dataEdit['opd_penanggung_jawab'] = $data_user['user'][0]->user_profile_opd;
        // } else {
        //   $dataEdit['opd_penanggung_jawab'] = $this->input->post('opd');
        // }
        $dataEdit['id_opd'] = $this->input->post('opd');
        $instansi_opd = $this->m_instansi_opd->getData($this->input->post('opd'));
        $dataEdit['opd_penanggung_jawab'] = $instansi_opd[0]->nama_instansi_opd;
        $dataEdit['indikator_program'] = $this->input->post('indikator_program');
        $dataEdit['kategori'] = $this->input->post('kategori');
        $result = $this->m_program->inputData($dataEdit);
        if (!empty($result)) {
          $this->session->set_flashdata('info', array(
            'from' => 1,
            'message' =>  'data berhasil ditambah'
          ));
          redirect(site_url('admin/program_sultra'));
        } else {
          $this->session->set_flashdata('info', array(
            'from' => 0,
            'message' =>  'terjadi kesalahan saat mengirim data'
          ));
          redirect(site_url('admin/program_sultra'));
        }
      }
    } else {
      $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
      $data['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
      $data['kategori'] = $this->m_kategori->getData();
      $data['jenis_urusan'] = $this->m_jenis_urusan->getData();
      $data['bidang_urusan'] = $this->m_bidang_urusan->getData();
      $data['instansi_opd'] = $this->m_instansi_opd->getInstansi();

      $this->load->view("templates/header", $data_user);
      $this->load->view("templates/sidebar");
      $this->load->view("view_admin/program_sultra/v_input_program_sultra", $data);
      $this->load->view("templates/footer");
    }
  }

  public function getBidangUrusan()
  {
    // $data_id = $this->input->post('id');
    $data_id =  $this->uri->segment(4);
    $data = $this->m_bidang_urusan->getData($data_id);
    // $this->output->set_output(json_encode($data));
    echo json_encode($data);
  }

  public function update_program($id_opd = null, $id_jenis_urusan = null, $id_bidang_urusan = null, $id_program = null)
  {
    // $id_jenis_urusan =  $this->uri->segment(4);
    // $id_program =  $this->uri->segment(5);
    $data['page_name'] = "Edit Program";
    $this->load->helper('form');
    $this->load->library('form_validation');
    $config = array(
      array(
        'field' => 'nama_program',
        'label' => 'Nama Program',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'nama program harus di isi'
        ),
      ),
      array(
        'field' => 'indikator_program',
        'label' => 'Indikator Program',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'indikator program harus di isi'
        ),
      ),
      array(
        'field' => 'kategori',
        'label' => 'Kategori',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'kategori harus di pilih'
        ),
      ),
      array(
        'field' => 'opd',
        'label' => 'OPD',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'OPD harus di pilih'
        ),
      ),

    );

    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() == true) {
      // echo '1';
      // $dataEdit['kode_program'] = $this->input->post('kode_program');
      $dataEdit['nama_program'] = $this->input->post('nama_program');
      $dataEdit['indikator_program'] = $this->input->post('indikator_program');
      
      // $dataEdit1['id_opd'] = $this->input->post('opd');
      $instansi_opd = $this->m_instansi_opd->getData($this->input->post('opd'));
      $dataEdit['opd_penanggung_jawab'] = $instansi_opd[0]->nama_instansi_opd;
      $dataEdit['kategori'] = $this->input->post('kategori');

      $data_param['id_jenis_urusan'] = $this->input->post('id_jenis_urusan');
      $data_param['id_bidang_urusan'] = $this->input->post('id_bidang_urusan');
      $data_param['id_program'] = $this->input->post('kode_program');
      $data_param['id_opd'] = $this->input->post('opd');
      // echo json_encode($data_param);
      $result = $this->m_program->updateData($dataEdit, $data_param);
      // $kegiatan = $this->m_kegiatan->updateData($dataEdit1, $data_param);
      // $sub = $this->m_sub_kegiatan->updateData($dataEdit1, $data_param);
      if (!empty($result)) {
        $this->session->set_flashdata('info', array(
          'from' => 1,
          'message' =>  'data berhasil diupdate'
        ));
        redirect(site_url('admin/program_sultra'));
        return;
      }
      $this->session->set_flashdata('info', array(
        'from' => 0,
        'message' =>  'terjadi kesalahan saat mengirim data'
      ));
      redirect(site_url('admin/program_sultra'));
    } else {
      if ($id_opd == null && $id_jenis_urusan == null && $id_bidang_urusan == null && $id_program == null) redirect(site_url('admin/program_sultra'));

      $data['program_sultra'] = $this->m_program->getData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program);
      $data['instansi_opd'] = $this->m_instansi_opd->getData();
      // echo json_encode($data['program_sultra']);
      $data['bidang_urusan'] = $this->m_bidang_urusan->getData();
      $data['kategori'] = $this->m_kategori->getData();
      $data['jenis_urusan'] = $this->m_jenis_urusan->getData();
      $data['id_jenis_urusan'] = $id_jenis_urusan;
      $data['id_bidang_urusan'] = $id_bidang_urusan;
      $data['id_program'] = $id_program;
      $data['id_opd'] = $id_opd;
      $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
      $data['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
      $this->load->view("templates/header", $data_user);
      $this->load->view("templates/sidebar");
      $this->load->view("view_admin/program_sultra/v_update_program_sultra", $data);
      $this->load->view("templates/footer");
    }
  }

  public function delete_program($id_opd = null, $id_jenis_urusan = null, $id_bidang_urusan = null, $id_program = null)
  {
    if ($id_opd == null && $id_jenis_urusan == null && $id_bidang_urusan == null && $id_program == null) redirect(site_url('admin/program_sultra'));

    $data_param['id_jenis_urusan'] = $id_jenis_urusan;
    $data_param['id_bidang_urusan'] = $id_bidang_urusan;
    $data_param['id_program'] = $id_program;
    $data_param['id_opd'] = $id_opd;

    if ($this->m_program->deleteData($data_param)) {
      $this->session->set_flashdata('info', array(
        'from' => 1,
        'message' =>  'data berhasil dihapus'
      ));
      redirect(site_url('admin/program_sultra'));
      return;
    }
    $this->session->set_flashdata('info', array(
      'from' => 0,
      'message' =>  'terjadi kesalahan saat mengirim data'
    ));
    redirect(site_url('admin/program_sultra'));
  }

  function kegiatan($id_opd = null, $id_jenis_urusan = null, $id_bidang_urusan = null, $id_program = null)
  {
    $data['program'] = $this->m_program->getData($id_opd , $id_jenis_urusan, $id_bidang_urusan, $id_program);
    $data['id_jenis_urusan'] = $id_jenis_urusan;
    $data['id_bidang_urusan'] = $id_bidang_urusan;
    $data['id_program'] = $id_program;
    $data['id_opd'] = $id_opd;
    $data['kegiatan'] = $this->m_kegiatan->getData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program);
    // echo json_encode($data['program']);

    $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
    $data['page_name'] = $data['program'][0]->nama_program;
    $data['page_name_top'] = $data['program'][0]->kategori;
    $this->load->view("templates/header", $data_user);
    $this->load->view("templates/sidebar");
    $this->load->view("view_admin/kegiatan/v_kegiatan", $data);
    $this->load->view("templates/footer");
  }

  public function input_kegiatan($id_opd = null, $id_jenis_urusan = null, $id_bidang_urusan = null, $id_program = null)
  {
    $data['page_name'] = "Input Kegiatan";
    $this->load->helper('form');
    $this->load->library('form_validation');
    $config = array(
      array(
        'field' => 'nama_kegiatan',
        'label' => 'Nama Kegiatan',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'nama Kegiatan harus di isi'
        ),
      ),
      array(
        'field' => 'kode_kegiatan',
        'label' => 'Kode Kegiatan',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'kode kegiatan harus di isi'
        ),
      ),
      array(
        'field' => 'indikator_kegiatan',
        'label' => 'Indikator Kegiatan',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'indikator kegiatan harus di isi'
        ),
      )

    );

    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() == true) {
      // $program = $this->m_program->getData($id_jenis_urusan, $id_bidang_urusan, $id_program);
      // $data['opd_penanggung_jawab'] = $program[0]->opd_penanggung_jawab;
      $id_jenis_urusan = $this->input->post('id_jenis_urusan');
      $id_bidang_urusan = $this->input->post('id_bidang_urusan');
      $id_program = $this->input->post('id_program');
      $id_opd = $this->input->post('id_opd');
      $id_kegiatan = $this->input->post('kode_kegiatan');
      $cek = $this->m_kegiatan->cekData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program, $id_kegiatan);
      if (!empty($cek)) {
        $this->session->set_flashdata('info', array(
          'from' => 0,
          'message' =>  'kegiatan sudah ada'
        ));
        redirect(site_url('admin/program_sultra/input_kegiatan/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program);
      } else {
        $dataEdit['nama_kegiatan'] = $this->input->post('nama_kegiatan');
        $dataEdit['id_jenis_urusan'] = $this->input->post('id_jenis_urusan');
        $dataEdit['id_bidang_urusan'] = $this->input->post('id_bidang_urusan');
        $dataEdit['id_program'] = $this->input->post('id_program');
        $dataEdit['id_opd'] = $this->input->post('id_opd');
        $dataEdit['id_kegiatan'] = $this->input->post('kode_kegiatan');
        $dataEdit['indikator_kegiatan'] = $this->input->post('indikator_kegiatan');
        // $dataEdit['opd_penanggung_jawab'] = $program[0]->opd_penanggung_jawab;
        $result = $this->m_kegiatan->inputData($dataEdit);
        if (!empty($result)) {
          $this->session->set_flashdata('info', array(
            'from' => 1,
            'message' =>  'data berhasil ditambah'
          ));
          redirect(site_url('admin/program_sultra/kegiatan/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program);
        } else {
          $this->session->set_flashdata('info', array(
            'from' => 0,
            'message' =>  'terjadi kesalahan saat mengirim data'
          ));
          redirect(site_url('admin/program_sultra/kegiatan/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program);
        }
      }
    } else {
      $data['id_jenis_urusan'] = $id_jenis_urusan;
      $data['id_bidang_urusan'] = $id_bidang_urusan;
      $data['id_program'] = $id_program;
      $data['id_opd'] = $id_opd;
      $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
      $data['kegiatan'] = $this->m_kegiatan->getData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program);
      // $data['kategori'] = $this->m_kategori->getData();
      $this->load->view("templates/header", $data_user);
      $this->load->view("templates/sidebar");
      $this->load->view("view_admin/kegiatan/v_input_kegiatan", $data);
      $this->load->view("templates/footer");
    }
  }

  public function update_kegiatan($id_opd = null, $id_jenis_urusan = null, $id_bidang_urusan = null, $id_program = null, $id_kegiatan = null)
  {
    $data['page_name'] = "Edit Kegiatan";
    $this->load->helper('form');
    $this->load->library('form_validation');
    $config = array(
      array(
        'field' => 'nama_kegiatan',
        'label' => 'Nama Kegiatan',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'nama program harus di isi'
        ),
      ),
      array(
        'field' => 'indikator_kegiatan',
        'label' => 'Indikator Kegiatan',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'indikator kegiatan harus di isi'
        ),
      )

    );

    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() == true) {
      $dataEdit['nama_kegiatan'] = $this->input->post('nama_kegiatan');
      $dataEdit['indikator_kegiatan'] = $this->input->post('indikator_kegiatan');

      $data_param['id_jenis_urusan'] = $this->input->post('id_jenis_urusan');
      $data_param['id_bidang_urusan'] = $this->input->post('id_bidang_urusan');
      $data_param['id_program'] = $this->input->post('id_program');
      $data_param['id_opd'] = $this->input->post('id_opd');
      $data_param['id_kegiatan'] = $this->input->post('kode_kegiatan');
      // echo json_encode($data_param);
      $result = $this->m_kegiatan->updateData($dataEdit, $data_param);
      if (!empty($result)) {
        $this->session->set_flashdata('info', array(
          'from' => 1,
          'message' =>  'data berhasil diupdate'
        ));
        redirect(site_url('admin/program_sultra/kegiatan/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program);
      } else {
        $this->session->set_flashdata('info', array(
          'from' => 0,
          'message' =>  'terjadi kesalahan saat mengirim data'
        ));
        redirect(site_url('admin/program_sultra/kegiatan/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program);
      }
    } else {
      if ($id_opd == null && $id_jenis_urusan == null && $id_bidang_urusan == null && $id_program == null &&  $id_kegiatan == null) redirect(site_url('admin/program_sultra/kegiatan/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program);

      $data['kegiatan'] = $this->m_kegiatan->getData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program, $id_kegiatan);
      $data['id_jenis_urusan'] = $id_jenis_urusan;
      $data['id_bidang_urusan'] = $id_bidang_urusan;
      $data['id_program'] = $id_program;
      $data['id_opd'] = $id_opd;
      $data['id_kegiatan'] = $id_kegiatan;
      $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
      $this->load->view("templates/header", $data_user);
      $this->load->view("templates/sidebar");
      $this->load->view("view_admin/kegiatan/v_update_kegiatan", $data);
      $this->load->view("templates/footer");
    }
  }

  public function delete_kegiatan($id_opd = null, $id_jenis_urusan = null, $id_bidang_urusan = null, $id_program = null, $id_kegiatan = null)
  {
    if ($id_opd == null && $id_jenis_urusan == null && $id_bidang_urusan == null && $id_program == null &&  $id_kegiatan == null) redirect(site_url('admin/program_sultra/kegiatan/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program);

    $data_param['id_jenis_urusan'] = $id_jenis_urusan;
    $data_param['id_bidang_urusan'] = $id_bidang_urusan;
    $data_param['id_program'] = $id_program;
    $data_param['id_opd'] = $id_opd;
    $data_param['id_kegiatan'] = $id_kegiatan;

    if ($this->m_kegiatan->deleteData($data_param)) {
      $this->session->set_flashdata('info', array(
        'from' => 1,
        'message' =>  'data berhasil dihapus'
      ));
      redirect(site_url('admin/program_sultra/kegiatan/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program);
      return;
    }
    $this->session->set_flashdata('info', array(
      'from' => 0,
      'message' =>  'terjadi kesalahan saat mengirim data'
    ));
    redirect(site_url('admin/program_sultra/kegiatan/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program);
  }

  public function sub_kegiatan($id_opd = null, $id_jenis_urusan = null, $id_bidang_urusan = null, $id_program = null, $id_kegiatan = null)
  {
    $data['kegiatan'] = $this->m_kegiatan->getData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program, $id_kegiatan);
    $data['id_jenis_urusan'] = $id_jenis_urusan;
    $data['id_bidang_urusan'] = $id_bidang_urusan;
    $data['id_program'] = $id_program;
    $data['id_kegiatan'] = $id_kegiatan;
    $data['id_opd'] = $id_opd;
    $data['sub_kegiatan'] = $this->m_sub_kegiatan->getData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program, $id_kegiatan);
    // echo json_encode($data['program']);
    $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
    $data['page_name'] = $data['kegiatan'][0]->nama_kegiatan;
    // $data['page_name_top'] = $data['program'][0]->kategori;
    $this->load->view("templates/header",  $data_user);
    $this->load->view("templates/sidebar");
    $this->load->view("view_admin/sub_kegiatan/v_sub_kegiatan", $data);
    $this->load->view("templates/footer");
  }

  public function input_sub_kegiatan($id_opd = null, $id_jenis_urusan = null, $id_bidang_urusan = null, $id_program = null, $id_kegiatan = null)
  {
    $data['page_name'] = "Input Sub Kegiatan";
    $this->load->helper('form');
    $this->load->library('form_validation');
    $config = array(
      array(
        'field' => 'kode_sub_kegiatan',
        'label' => 'Kode Sub Kegiatan',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'Kode Sub Kegiatan harus di isi'
        ),
      ),
      array(
        'field' => 'nama_sub_kegiatan',
        'label' => 'Nama Sub Kegiatan',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'Nama Sub Kegiatan harus di isi'
        ),
      ),
      array(
        'field' => 'indikator_sub_kegiatan',
        'label' => 'Indikator Sub Kegiatan',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'Indikator Sub Kegiatan harus di isi'
        ),
      ),
      array(
        'field' => 'satuan',
        'label' => 'Satuan',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'satuan harus dipilih'
        ),
      ),
      // array(
      //   'field' => 'target_kinerja',
      //   'label' => 'Target Kinerja',
      //   'rules' =>  'trim|required',
      //   'errors' => array(
      //     'required' => 'Target Kinerja harus di isi'
      //   ),
      // ),
      // array(
      //   'field' => 'target_anggaran',
      //   'label' => 'Target Anggaran',
      //   'rules' =>  'trim|required',
      //   'errors' => array(
      //     'required' => 'Target Anggaran harus di isi'
      //   ),
      // ),
      // array(
      //   'field' => 'opd',
      //   'label' => 'OPD Penanggung Jawab',
      //   'rules' =>  'trim|required',
      //   'errors' => array(
      //     'required' => 'OPD Penanggung Jawab harus di pilih'
      //   ),
      // ),

    );

    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() == true) {
      $id_jenis_urusan = $this->input->post('id_jenis_urusan');
      $id_bidang_urusan = $this->input->post('id_bidang_urusan');
      $id_program = $this->input->post('id_program');
      $id_kegiatan = $this->input->post('id_kegiatan');
      $id_sub_kegiatan = $this->input->post('kode_sub_kegiatan');
      $id_opd = $this->input->post('id_opd');
      $cek = $this->m_sub_kegiatan->cekData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program, $id_kegiatan, $id_sub_kegiatan);
      if (!empty($cek)) {
        $this->session->set_flashdata('info', array(
          'from' => 0,
          'message' =>  'kode sub kegiatan sudah ada'
        ));
        redirect(site_url('admin/program_sultra/input_sub_kegiatan/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan);
      } else {
        $dataEdit['id_jenis_urusan'] = $this->input->post('id_jenis_urusan');
        $dataEdit['id_bidang_urusan'] = $this->input->post('id_bidang_urusan');
        $dataEdit['id_program'] = $this->input->post('id_program');
        $dataEdit['id_opd'] = $this->input->post('id_opd');
        $dataEdit['id_kegiatan'] = $this->input->post('id_kegiatan');
        $dataEdit['id_sub_kegiatan'] = $this->input->post('kode_sub_kegiatan');
        $dataEdit['nama_sub_kegiatan'] = $this->input->post('nama_sub_kegiatan');
        $dataEdit['indikator_sub_kegiatan'] = $this->input->post('indikator_sub_kegiatan');
        $dataEdit['satuan'] = $this->input->post('satuan');
        // $dataEdit['target_kinerja'] = $this->input->post('target_kinerja');
        // $dataEdit['target_anggaran'] = $this->input->post('target_anggaran');
        // $dataEdit['opd_penanggung_jawab'] = $this->input->post('opd');
        $result = $this->m_sub_kegiatan->inputData($dataEdit);
        if (!empty($result)) {
          $this->session->set_flashdata('info', array(
            'from' => 1,
            'message' =>  'data berhasil ditambah'
          ));
          redirect(site_url('admin/program_sultra/sub_kegiatan/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan);
        } else {
          $this->session->set_flashdata('info', array(
            'from' => 0,
            'message' =>  'terjadi kesalahan saat mengirim data'
          ));
          redirect(site_url('admin/program_sultra/kegiatan/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan);
        }
      }
    } else {
      $data['id_jenis_urusan'] = $id_jenis_urusan;
      $data['id_bidang_urusan'] = $id_bidang_urusan;
      $data['id_program'] = $id_program;
      $data['id_kegiatan'] = $id_kegiatan;
      $data['id_opd'] = $id_opd;
      $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
      // $data['instansi_opd'] = $this->m_instansi_opd->getData();
      // $data['kategori'] = $this->m_kategori->getData();
      $this->load->view("templates/header", $data_user);
      $this->load->view("templates/sidebar");
      $this->load->view("view_admin/sub_kegiatan/v_input_sub_kegiatan", $data);
      $this->load->view("templates/footer");
    }
  }

  public function update_sub_kegiatan($id_opd = null, $id_jenis_urusan = null, $id_bidang_urusan = null, $id_program = null, $id_kegiatan = null, $id_sub_kegiatan = null)
  {
    $data['page_name'] = "Edit Sub Kegiatan";
    $this->load->helper('form');
    $this->load->library('form_validation');
    $config = array(
      array(
        'field' => 'kode_sub_kegiatan',
        'label' => 'Kode Sub Kegiatan',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'Kode Sub Kegiatan harus di isi'
        ),
      ),
      array(
        'field' => 'nama_sub_kegiatan',
        'label' => 'Nama Sub Kegiatan',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'Nama Sub Kegiatan harus di isi'
        ),
      ),
      array(
        'field' => 'indikator_sub_kegiatan',
        'label' => 'Indikator Sub Kegiatan',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'Indikator Sub Kegiatan harus di isi'
        ),
      ),
      array(
        'field' => 'satuan',
        'label' => 'Satuan',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'satuan harus dipilih'
        ),
      ),
      // array(
      //   'field' => 'target_kinerja',
      //   'label' => 'Target Kinerja',
      //   'rules' =>  'trim|required',
      //   'errors' => array(
      //     'required' => 'Target Kinerja harus di isi'
      //   ),
      // ),
      // array(
      //   'field' => 'target_anggaran',
      //   'label' => 'Target Anggaran',
      //   'rules' =>  'trim|required',
      //   'errors' => array(
      //     'required' => 'Target Anggaran harus di isi'
      //   ),
      // ),
      // array(
      //   'field' => 'opd',
      //   'label' => 'OPD Penanggung Jawab',
      //   'rules' =>  'trim|required',
      //   'errors' => array(
      //     'required' => 'OPD Penanggung Jawab harus di pilih'
      //   ),
      // ),

    );

    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() == true) {
      $dataEdit['nama_sub_kegiatan'] = $this->input->post('nama_sub_kegiatan');
      $dataEdit['indikator_sub_kegiatan'] = $this->input->post('indikator_sub_kegiatan');
      $dataEdit['satuan'] = $this->input->post('satuan');
      // $dataEdit['target_kinerja'] = $this->input->post('target_kinerja');
      // $dataEdit['target_anggaran'] = $this->input->post('target_anggaran');
      // $dataEdit['opd_penanggung_jawab'] = $this->input->post('opd');

      $data_param['id_jenis_urusan'] = $this->input->post('id_jenis_urusan');
      $data_param['id_bidang_urusan'] = $this->input->post('id_bidang_urusan');
      $data_param['id_program'] = $this->input->post('id_program');
      $data_param['id_opd'] = $this->input->post('id_opd');
      $data_param['id_kegiatan'] = $this->input->post('id_kegiatan');
      $data_param['id_sub_kegiatan'] = $this->input->post('kode_sub_kegiatan');
      // echo json_encode($data_param);
      $result = $this->m_sub_kegiatan->updateData($dataEdit, $data_param);
      if (!empty($result)) {
        $this->session->set_flashdata('info', array(
          'from' => 1,
          'message' =>  'data berhasil diupdate'
        ));
        redirect(site_url('admin/program_sultra/sub_kegiatan/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan);
      } else {
        $this->session->set_flashdata('info', array(
          'from' => 0,
          'message' =>  'terjadi kesalahan saat mengirim data'
        ));
        redirect(site_url('admin/program_sultra/sub_kegiatan/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan);
      }
    } else {
      if ($id_opd == null && $id_jenis_urusan == null && $id_bidang_urusan == null && $id_program == null &&  $id_kegiatan == null &&  $id_sub_kegiatan == null) redirect(site_url('admin/program_sultra/sub_kegiatan/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan);

      $data['sub_kegiatan'] = $this->m_sub_kegiatan->getData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program, $id_kegiatan, $id_sub_kegiatan);
      $data['id_jenis_urusan'] = $id_jenis_urusan;
      $data['id_bidang_urusan'] = $id_bidang_urusan;
      $data['id_program'] = $id_program;
      $data['id_kegiatan'] = $id_kegiatan;
      $data['id_sub_kegiatan'] = $id_sub_kegiatan;
      $data['id_opd'] = $id_opd;
      // $data['instansi_opd'] = $this->m_instansi_opd->getData();
      $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
      $this->load->view("templates/header", $data_user);
      $this->load->view("templates/sidebar");
      $this->load->view("view_admin/sub_kegiatan/v_update_sub_kegiatan", $data);
      $this->load->view("templates/footer");
    }
  }

  public function delete_sub_kegiatan($id_opd = null, $id_jenis_urusan = null, $id_bidang_urusan = null, $id_program = null, $id_kegiatan = null, $id_sub_kegiatan = null)
  {
    if ($id_opd == null && $id_jenis_urusan == null && $id_bidang_urusan == null && $id_program == null &&  $id_kegiatan == null && $id_sub_kegiatan == null) redirect(site_url('admin/program_sultra/sub_kegiatan/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan);

    $data_param['id_jenis_urusan'] = $id_jenis_urusan;
    $data_param['id_bidang_urusan'] = $id_bidang_urusan;
    $data_param['id_program'] = $id_program;
    $data_param['id_opd'] = $id_opd;
    $data_param['id_kegiatan'] = $id_kegiatan;
    $data_param['id_sub_kegiatan'] = $id_sub_kegiatan;

    if ($this->m_sub_kegiatan->deleteData($data_param)) {
      $this->session->set_flashdata('info', array(
        'from' => 1,
        'message' =>  'data berhasil dihapus'
      ));
      redirect(site_url('admin/program_sultra/sub_kegiatan/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan);
      return;
    }
    $this->session->set_flashdata('info', array(
      'from' => 0,
      'message' =>  'terjadi kesalahan saat mengirim data'
    ));
    redirect(site_url('admin/program_sultra/sub_kegiatan/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan);
  }

  public function capaian($id_opd = null, $id_jenis_urusan = null, $id_bidang_urusan = null, $id_program = null, $id_kegiatan = null, $id_sub_kegiatan = null)
  {
    $data['sub_kegiatan'] = $this->m_sub_kegiatan->getData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program, $id_kegiatan, $id_sub_kegiatan);
    $data['id_jenis_urusan'] = $id_jenis_urusan;
    $data['id_bidang_urusan'] = $id_bidang_urusan;
    $data['id_program'] = $id_program;
    $data['id_kegiatan'] = $id_kegiatan;
    $data['id_sub_kegiatan'] = $id_sub_kegiatan;
    $data['id_opd'] = $id_opd;
    $data['capaian'] = $this->m_capaian->getData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program, $id_kegiatan, $id_sub_kegiatan, -1, -1);
    // echo json_encode($data['program']);
    $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
    $data['page_name'] = $data['sub_kegiatan'][0]->nama_sub_kegiatan;
    // $data['page_name_top'] = $data['program'][0]->kategori;
    $this->load->view("templates/header", $data_user);
    $this->load->view("templates/sidebar");
    $this->load->view("view_admin/capaian/v_capaian", $data);
    $this->load->view("templates/footer");
  }

  public function input_capaian($id_opd = null, $id_jenis_urusan = null, $id_bidang_urusan = null, $id_program = null, $id_kegiatan = null, $id_sub_kegiatan = null)
  {
    $data['page_name'] = "Input Capaian";
    $this->load->helper('form');
    $this->load->library('form_validation');
    $config = array(
      array(
        'field' => 'capaian_kinerja',
        'label' => 'Kinerja',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'Kinerja harus di isi'
        ),
      ),
      array(
        'field' => 'capaian_anggaran',
        'label' => 'Anggaran',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'Anggaran harus di isi'
        ),
      ),
      array(
        'field' => 'capaian_periode',
        'label' => 'Periode',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'Periode harus dipilih'
        ),
      ),
      array(
        'field' => 'capaian_tahun',
        'label' => 'Tahun',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'Tahun harus dipilih'
        ),
      ),

    );

    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() == true) {
      $id_jenis_urusan = $this->input->post('id_jenis_urusan');
      $id_bidang_urusan = $this->input->post('id_bidang_urusan');
      $id_program = $this->input->post('id_program');
      $id_kegiatan = $this->input->post('id_kegiatan');
      $id_sub_kegiatan = $this->input->post('id_sub_kegiatan');
      $id_opd = $this->input->post('id_opd');
      $capaian_periode = $this->input->post('capaian_periode');
      $capaian_tahun = $this->input->post('capaian_tahun');

      $cek = $this->m_capaian->cekData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program, $id_kegiatan, $id_sub_kegiatan, $capaian_periode, $capaian_tahun);
      if (!empty($cek)) {
        $this->session->set_flashdata('info', array(
          'from' => 0,
          'message' =>  'anda sudah menginput capaian pada periode dan tahun tersebut'
        ));
        redirect(site_url('admin/program_sultra/input_capaian/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan . '/' . $id_sub_kegiatan);
      } else {
        $dataEdit['id_jenis_urusan'] = $this->input->post('id_jenis_urusan');
        $dataEdit['id_bidang_urusan'] = $this->input->post('id_bidang_urusan');
        $dataEdit['id_program'] = $this->input->post('id_program');
        $dataEdit['id_kegiatan'] = $this->input->post('id_kegiatan');
        $dataEdit['id_sub_kegiatan'] = $this->input->post('id_sub_kegiatan');
        $dataEdit['id_opd'] = $this->input->post('id_opd');
        $dataEdit['capaian_kinerja'] = $this->input->post('capaian_kinerja');
        $dataEdit['capaian_anggaran'] = $this->input->post('capaian_anggaran');
        $dataEdit['capaian_periode'] = $this->input->post('capaian_periode');
        $dataEdit['capaian_tahun'] = $this->input->post('capaian_tahun');
        $result = $this->m_capaian->inputData($dataEdit);
        if (!empty($result)) {
          $this->session->set_flashdata('info', array(
            'from' => 1,
            'message' =>  'data berhasil ditambah'
          ));
          redirect(site_url('admin/program_sultra/capaian/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan . '/' . $id_sub_kegiatan);
        } else {
          $this->session->set_flashdata('info', array(
            'from' => 0,
            'message' =>  'terjadi kesalahan saat mengirim data'
          ));
          redirect(site_url('admin/program_sultra/capaian/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan . '/' . $id_sub_kegiatan);
        }
      }
    } else {
      $data['id_jenis_urusan'] = $id_jenis_urusan;
      $data['id_bidang_urusan'] = $id_bidang_urusan;
      $data['id_program'] = $id_program;
      $data['id_kegiatan'] = $id_kegiatan;
      $data['id_sub_kegiatan'] = $id_sub_kegiatan;
      $data['id_opd'] = $id_opd;
      $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
      // $data['instansi_opd'] = $this->m_instansi_opd->getData();
      // $data['kategori'] = $this->m_kategori->getData();
      $this->load->view("templates/header", $data_user);
      $this->load->view("templates/sidebar");
      $this->load->view("view_admin/capaian/v_input_capaian", $data);
      $this->load->view("templates/footer");
    }
  }

  public function update_capaian($id_opd = null, $id_jenis_urusan = null, $id_bidang_urusan = null, $id_program = null, $id_kegiatan = null, $id_sub_kegiatan = null, $capaian_periode = null, $capaian_tahun = null)
  {
    $data['page_name'] = "Edit Capaian";
    $this->load->helper('form');
    $this->load->library('form_validation');
    $config = array(
      array(
        'field' => 'capaian_kinerja',
        'label' => 'Kinerja',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'Kinerja harus di isi'
        ),
      ),
      array(
        'field' => 'capaian_anggaran',
        'label' => 'Anggaran',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'Anggaran harus di isi'
        ),
      ),

    );

    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() == true) {
      $dataEdit['capaian_kinerja'] = $this->input->post('capaian_kinerja');
      $dataEdit['capaian_anggaran'] = $this->input->post('capaian_anggaran');

      $data_param['id_jenis_urusan'] = $this->input->post('id_jenis_urusan');
      $data_param['id_bidang_urusan'] = $this->input->post('id_bidang_urusan');
      $data_param['id_program'] = $this->input->post('id_program');
      $data_param['id_kegiatan'] = $this->input->post('id_kegiatan');
      $data_param['id_sub_kegiatan'] = $this->input->post('id_sub_kegiatan');
      $data_param['id_opd'] = $this->input->post('id_opd');
      $data_param['capaian_periode'] = $this->input->post('capaian_periode');
      $data_param['capaian_tahun'] = $this->input->post('capaian_tahun');
      // echo json_encode($data_param);
      $result = $this->m_capaian->updateData($dataEdit, $data_param);
      if (!empty($result)) {
        $this->session->set_flashdata('info', array(
          'from' => 1,
          'message' =>  'data berhasil diupdate'
        ));
        redirect(site_url('admin/program_sultra/capaian/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan . '/' . $id_sub_kegiatan);
      } else {
        $this->session->set_flashdata('info', array(
          'from' => 0,
          'message' =>  'terjadi kesalahan saat mengirim data'
        ));
        redirect(site_url('admin/program_sultra/capaian/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan . '/' . $id_sub_kegiatan);
      }
    } else {
      if ($id_opd == null && $id_jenis_urusan == null && $id_bidang_urusan == null && $id_program == null && $id_kegiatan == null && $id_sub_kegiatan == null && $capaian_periode == null && $capaian_tahun == null) redirect(site_url('admin/program_sultra/capaian/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan . '/' . $id_sub_kegiatan);

      $data['capaian'] = $this->m_capaian->getData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program, $id_kegiatan, $id_sub_kegiatan, $capaian_periode, $capaian_tahun);
      $data['id_jenis_urusan'] = $id_jenis_urusan;
      $data['id_bidang_urusan'] = $id_bidang_urusan;
      $data['id_program'] = $id_program;
      $data['id_kegiatan'] = $id_kegiatan;
      $data['id_sub_kegiatan'] = $id_sub_kegiatan;
      $data['id_opd'] = $id_opd;
      $data['capaian_periode'] = $capaian_periode;
      $data['capaian_tahun'] = $capaian_tahun;
      // $data['instansi_opd'] = $this->m_instansi_opd->getData();
      $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
      $this->load->view("templates/header", $data_user);
      $this->load->view("templates/sidebar");
      $this->load->view("view_admin/capaian/v_update_capaian", $data);
      $this->load->view("templates/footer");
    }
  }

  public function delete_capaian($id_opd = null, $id_jenis_urusan = null, $id_bidang_urusan = null, $id_program = null, $id_kegiatan = null, $id_sub_kegiatan = null, $capaian_periode = null, $capaian_tahun = null)
  {
    if ($id_opd == null && $id_jenis_urusan == null && $id_bidang_urusan == null && $id_program == null &&  $id_kegiatan == null && $id_sub_kegiatan == null && $capaian_periode == null && $capaian_tahun == null) redirect(site_url('admin/program_sultra/capaian/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan . '/' . $id_sub_kegiatan);

    $data_param['id_jenis_urusan'] = $id_jenis_urusan;
    $data_param['id_bidang_urusan'] = $id_bidang_urusan;
    $data_param['id_program'] = $id_program;
    $data_param['id_kegiatan'] = $id_kegiatan;
    $data_param['id_sub_kegiatan'] = $id_sub_kegiatan;
    $data_param['id_opd'] = $id_opd;
    $data_param['capaian_periode'] = $capaian_periode;
    $data_param['capaian_tahun'] = $capaian_tahun;

    if ($this->m_capaian->deleteData($data_param)) {
      $this->session->set_flashdata('info', array(
        'from' => 1,
        'message' =>  'data berhasil dihapus'
      ));
      redirect(site_url('admin/program_sultra/capaian/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan . '/' . $id_sub_kegiatan);
      return;
    }
    $this->session->set_flashdata('info', array(
      'from' => 0,
      'message' =>  'terjadi kesalahan saat mengirim data'
    ));
    redirect(site_url('admin/program_sultra/capaian/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan . '/' . $id_sub_kegiatan);
  }

  public function target($id_opd = null, $id_jenis_urusan = null, $id_bidang_urusan = null, $id_program = null, $id_kegiatan = null, $id_sub_kegiatan = null)
  {
    $data['sub_kegiatan'] = $this->m_sub_kegiatan->getData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program, $id_kegiatan, $id_sub_kegiatan);
    // $data['sub_kegiatan'] = $this->m_sub_kegiatan->getData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program, $id_kegiatan, $id_sub_kegiatan);
    $data['id_jenis_urusan'] = $id_jenis_urusan;
    $data['id_bidang_urusan'] = $id_bidang_urusan;
    $data['id_program'] = $id_program;
    $data['id_kegiatan'] = $id_kegiatan;
    $data['id_sub_kegiatan'] = $id_sub_kegiatan;
    $data['id_opd'] = $id_opd;
    $data['target'] = $this->m_target->getData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program, $id_kegiatan, $id_sub_kegiatan, -1);
    // echo json_encode($data['program']);
    $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
    $data['page_name'] = $data['sub_kegiatan'][0]->nama_sub_kegiatan;
    // $data['page_name'] = $data['sub_kegiatan'][0]->nama_sub_kegiatan;
    // $data['page_name_top'] = $data['program'][0]->kategori;
    $this->load->view("templates/header", $data_user);
    $this->load->view("templates/sidebar");
    $this->load->view("view_admin/target/v_target", $data);
    $this->load->view("templates/footer");
  }

  public function input_target($id_opd = null, $id_jenis_urusan = null, $id_bidang_urusan = null, $id_program = null, $id_kegiatan = null, $id_sub_kegiatan = null)
  {
    $data['page_name'] = "Input Target";
    $this->load->helper('form');
    $this->load->library('form_validation');
    $config = array(
      array(
        'field' => 'target_kinerja',
        'label' => 'Kinerja',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'Kinerja harus di isi'
        ),
      ),
      array(
        'field' => 'target_anggaran',
        'label' => 'Anggaran',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'Anggaran harus di isi'
        ),
      ),
      array(
        'field' => 'target_tahun',
        'label' => 'Tahun',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'Tahun harus dipilih'
        ),
      ),

    );

    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() == true) {
      $id_jenis_urusan = $this->input->post('id_jenis_urusan');
      $id_bidang_urusan = $this->input->post('id_bidang_urusan');
      $id_program = $this->input->post('id_program');
      $id_kegiatan = $this->input->post('id_kegiatan');
      $id_sub_kegiatan = $this->input->post('id_sub_kegiatan');
      $id_opd = $this->input->post('id_opd');
      $target_tahun = $this->input->post('target_tahun');

      $cek = $this->m_target->cekData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program, $id_kegiatan, $id_sub_kegiatan, $target_tahun);
      if (!empty($cek)) {
        $this->session->set_flashdata('info', array(
          'from' => 0,
          'message' =>  'anda sudah menginput target pada tahun tersebut'
        ));
        redirect(site_url('admin/program_sultra/input_target/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan . '/' . $id_sub_kegiatan);
      } else {
        $dataEdit['id_jenis_urusan'] = $this->input->post('id_jenis_urusan');
        $dataEdit['id_bidang_urusan'] = $this->input->post('id_bidang_urusan');
        $dataEdit['id_program'] = $this->input->post('id_program');
        $dataEdit['id_kegiatan'] = $this->input->post('id_kegiatan');
        $dataEdit['id_sub_kegiatan'] = $this->input->post('id_sub_kegiatan');
        $dataEdit['id_opd'] = $this->input->post('id_opd');
        $dataEdit['target_kinerja'] = $this->input->post('target_kinerja');
        $dataEdit['target_anggaran'] = $this->input->post('target_anggaran');
        $dataEdit['target_tahun'] = $this->input->post('target_tahun');

        $target = $this->m_target->getDataTarget($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program, $id_kegiatan, $id_sub_kegiatan, -1);
        $dataUpdate['target_kinerja'] = $this->input->post('target_kinerja') + $target[0]->jumlah_kinerja;
        $dataUpdate['target_anggaran'] = $this->input->post('target_anggaran') + $target[0]->jumlah_anggaran;
        $data_param['id_jenis_urusan'] = $this->input->post('id_jenis_urusan');
        $data_param['id_bidang_urusan'] = $this->input->post('id_bidang_urusan');
        $data_param['id_program'] = $this->input->post('id_program');
        $data_param['id_opd'] = $this->input->post('id_opd');
        $data_param['id_kegiatan'] = $this->input->post('id_kegiatan');
        $data_param['id_sub_kegiatan'] = $this->input->post('id_sub_kegiatan');

        $resultUpdate = $this->m_sub_kegiatan->updateData($dataUpdate, $data_param);

        $result = $this->m_target->inputData($dataEdit);
        if (!empty($result) && !empty($resultUpdate)) {
          $this->session->set_flashdata('info', array(
            'from' => 1,
            'message' =>  'data berhasil ditambah'
          ));
          redirect(site_url('admin/program_sultra/target/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan . '/' . $id_sub_kegiatan);
        } else {
          $this->session->set_flashdata('info', array(
            'from' => 0,
            'message' =>  'terjadi kesalahan saat mengirim data'
          ));
          redirect(site_url('admin/program_sultra/target/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan . '/' . $id_sub_kegiatan);
        }
      }
    } else {
      $data['id_jenis_urusan'] = $id_jenis_urusan;
      $data['id_bidang_urusan'] = $id_bidang_urusan;
      $data['id_program'] = $id_program;
      $data['id_kegiatan'] = $id_kegiatan;
      $data['id_sub_kegiatan'] = $id_sub_kegiatan;
      $data['id_opd'] = $id_opd;
      $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));

      // $target = $this->m_target->getDataTarget($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program, $id_kegiatan, $id_sub_kegiatan);
      // echo $target[0]->jumlah_kinerja;
      // $data['instansi_opd'] = $this->m_instansi_opd->getData();
      // $data['kategori'] = $this->m_kategori->getData();
      $this->load->view("templates/header", $data_user);
      $this->load->view("templates/sidebar");
      $this->load->view("view_admin/target/v_input_target", $data);
      $this->load->view("templates/footer");
    }
  }

  public function update_target($id_opd = null, $id_jenis_urusan = null, $id_bidang_urusan = null, $id_program = null, $id_kegiatan = null, $id_sub_kegiatan = null, $target_tahun = null)
  {
    $data['page_name'] = "Edit Target";
    $this->load->helper('form');
    $this->load->library('form_validation');
    $config = array(
      array(
        'field' => 'target_kinerja',
        'label' => 'Kinerja',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'Kinerja harus di isi'
        ),
      ),
      array(
        'field' => 'target_anggaran',
        'label' => 'Anggaran',
        'rules' =>  'trim|required',
        'errors' => array(
          'required' => 'Anggaran harus di isi'
        ),
      ),

    );

    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() == true) {
      $dataEdit['target_kinerja'] = $this->input->post('target_kinerja');
      $dataEdit['target_anggaran'] = $this->input->post('target_anggaran');

      $data_param['id_jenis_urusan'] = $this->input->post('id_jenis_urusan');
      $data_param['id_bidang_urusan'] = $this->input->post('id_bidang_urusan');
      $data_param['id_program'] = $this->input->post('id_program');
      $data_param['id_kegiatan'] = $this->input->post('id_kegiatan');
      $data_param['id_sub_kegiatan'] = $this->input->post('id_sub_kegiatan');
      $data_param['id_opd'] = $this->input->post('id_opd');
      $data_param['target_tahun'] = $this->input->post('target_tahun');

      $target = $this->m_target->getDataTarget($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program, $id_kegiatan, $id_sub_kegiatan, $target_tahun);
      $dataUpdate['target_kinerja'] = $this->input->post('target_kinerja') + $target[0]->jumlah_kinerja;
      $dataUpdate['target_anggaran'] = $this->input->post('target_anggaran') + $target[0]->jumlah_anggaran;
      $data_parameter['id_jenis_urusan'] = $this->input->post('id_jenis_urusan');
      $data_parameter['id_bidang_urusan'] = $this->input->post('id_bidang_urusan');
      $data_parameter['id_program'] = $this->input->post('id_program');
      $data_parameter['id_kegiatan'] = $this->input->post('id_kegiatan');
      $data_parameter['id_sub_kegiatan'] = $this->input->post('id_sub_kegiatan');
      $data_parameter['id_opd'] = $this->input->post('id_opd');

      $resultUpdate = $this->m_sub_kegiatan->updateData($dataUpdate, $data_parameter);
      // echo json_encode($data_param);
      $result = $this->m_target->updateData($dataEdit, $data_param);
      if (!empty($result) && !empty($resultUpdate)) {
        $this->session->set_flashdata('info', array(
          'from' => 1,
          'message' =>  'data berhasil diupdate'
        ));
        redirect(site_url('admin/program_sultra/target/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan . '/' . $id_sub_kegiatan);
      } else {
        $this->session->set_flashdata('info', array(
          'from' => 0,
          'message' =>  'terjadi kesalahan saat mengirim data'
        ));
        redirect(site_url('admin/program_sultra/target/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan . '/' . $id_sub_kegiatan);
      }
    } else {
      if ($id_opd == null && $id_jenis_urusan == null && $id_bidang_urusan == null && $id_program == null &&  $id_kegiatan == null &&  $id_sub_kegiatan == null &&  $target_tahun == null) redirect(site_url('admin/program_sultra/capaian/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan . '/' . $id_sub_kegiatan);

      $data['target'] = $this->m_target->getData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program, $id_kegiatan, $id_sub_kegiatan, $target_tahun);
      $data['id_jenis_urusan'] = $id_jenis_urusan;
      $data['id_bidang_urusan'] = $id_bidang_urusan;
      $data['id_program'] = $id_program;
      $data['id_kegiatan'] = $id_kegiatan;
      $data['id_sub_kegiatan'] = $id_sub_kegiatan;
      $data['id_opd'] = $id_opd;
      $data['target_tahun'] = $target_tahun;
      // $data['instansi_opd'] = $this->m_instansi_opd->getData();
      $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
      $this->load->view("templates/header", $data_user);
      $this->load->view("templates/sidebar");
      $this->load->view("view_admin/target/v_update_target", $data);
      $this->load->view("templates/footer");
    }
  }

  public function delete_target($id_opd = null, $id_jenis_urusan = null, $id_bidang_urusan = null, $id_program = null, $id_kegiatan = null, $id_sub_kegiatan = null, $target_tahun = null)
  {
    if ($id_opd == null && $id_jenis_urusan == null && $id_bidang_urusan == null && $id_program == null &&  $id_kegiatan == null && $id_sub_kegiatan == null && $target_tahun == null) redirect(site_url('admin/program_sultra/capaian/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan . '/' . $id_sub_kegiatan);

    $data_param['id_jenis_urusan'] = $id_jenis_urusan;
    $data_param['id_bidang_urusan'] = $id_bidang_urusan;
    $data_param['id_program'] = $id_program;
    $data_param['id_kegiatan'] = $id_kegiatan;
    $data_param['id_sub_kegiatan'] = $id_sub_kegiatan;
    $data_param['id_opd'] = $id_opd;
    $data_param['target_tahun'] = $target_tahun;

    $target = $this->m_target->getDataTarget($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program, $id_kegiatan, $id_sub_kegiatan, $target_tahun);
    $dataUpdate['target_kinerja'] = $target[0]->jumlah_kinerja;
    $dataUpdate['target_anggaran'] = $target[0]->jumlah_anggaran;
    $data_parameter['id_jenis_urusan'] = $id_jenis_urusan;
    $data_parameter['id_bidang_urusan'] = $id_bidang_urusan;
    $data_parameter['id_program'] = $id_program;
    $data_parameter['id_kegiatan'] = $id_kegiatan;
    $data_parameter['id_sub_kegiatan'] = $id_sub_kegiatan;
    $data_parameter['id_opd'] = $id_opd;

    $resultUpdate = $this->m_sub_kegiatan->updateData($dataUpdate, $data_parameter);

    $result = $this->m_target->deleteData($data_param);
    if (!empty($result) && !empty($resultUpdate)) {
      $this->session->set_flashdata('info', array(
        'from' => 1,
        'message' =>  'data berhasil dihapus'
      ));
      redirect(site_url('admin/program_sultra/target/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan . '/' . $id_sub_kegiatan);
      return;
    }
    $this->session->set_flashdata('info', array(
      'from' => 0,
      'message' =>  'terjadi kesalahan saat mengirim data'
    ));
    redirect(site_url('admin/program_sultra/target/') . $id_opd . '/' . $id_jenis_urusan . '/' . $id_bidang_urusan . '/' . $id_program . '/' . $id_kegiatan . '/' . $id_sub_kegiatan);
  }
}
