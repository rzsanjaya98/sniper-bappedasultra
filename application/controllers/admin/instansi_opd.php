<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Instansi_OPD extends Admin_Controller
{
        // class Home extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                // $this->output->enable_profiler(TRUE);
                // $this->load->model("m_login");
                // $this->load->model("m_register");
                // $this->load->model("m_admin");
                // $this->load->model("m_fuzzy");
                $this->load->model("m_user");
                $this->load->model("m_instansi_opd");
                $this->load->helper('array');
                $this->load->library("pagination");
        }

        public function index()
        {
                $data['page_name'] = "Instansi/OPD";

                $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
                $data['instansi_opd'] = $this->m_instansi_opd->getData();
                $this->load->view("templates/header", $data_user);
                $this->load->view("templates/sidebar");
                $this->load->view("view_admin/instansi_opd/v_instansi_opd", $data);
                $this->load->view("templates/footer");
                // }
        }

        public function input_instansi_opd()
        {
                $data['page_name'] = "Input Data Instansi/OPD";
                $this->load->helper('form');
                $this->load->library('form_validation');
                $config = array(
                        array(
                                'field' => 'nama_instansi_opd',
                                'label' => 'Nama Instansi/OPD',
                                'rules' =>  'trim|required',
                                'errors' => array(
                                        'required' => 'nama harus di isi'
                                ),
                        )
                        //   array(
                        //           'field' => 'data_temperatur',
                        //           'label' => 'Temperatur',   
                        //           'rules' => 'required|numeric',
                        //           'errors' => array(  
                        //                   'required' => 'Temperatur harus di isi',
                        //                   'numeric' => 'Pengisian hanya menggunakan angka'
                        //           ),
                        //   ),
                        //   array(
                        //           'field' => 'data_kelembapan',
                        //           'label' => 'Kelembapan',   
                        //           'rules' => 'required|numeric',
                        //           'errors' => array(  
                        //                   'required' => 'Kelembapan harus di isi',
                        //                   'numeric' => 'Pengisian hanya menggunakan angka'
                        //           ),
                        //   ),
                        //   array(
                        //           'field' => 'data_lama_penyinaran_matahari',
                        //           'label' => 'Lama Penyinaran Matahari',   
                        //           'rules' => 'required|numeric',
                        //           'errors' => array(  
                        //                   'required' => 'Lama Penyinaran Matahari harus di isi',
                        //                   'numeric' => 'Pengisian hanya menggunakan angka'
                        //           ),
                        //   ),
                        //   array(
                        //           'field' => 'data_kecepatan_angin',
                        //           'label' => 'Kecepatan Angin',   
                        //           'rules' => 'required|numeric',
                        //           'errors' => array(  
                        //                   'required' => 'Kecepatan Angin harus di isi',
                        //                   'numeric' => 'Pengisian hanya menggunakan angka'
                        //           ),
                        //   ),
                        //   // array(
                        //   //         'field' => 'data_tekanan_udara',
                        //   //         'label' => 'Tekanan Udara',   
                        //   //         'rules' => 'required|numeric',
                        //   //         'errors' => array(  
                        //   //                 'required' => 'Tekanan Udara harus di isi',
                        //   //                 'numeric' => 'Pengisian hanya menggunakan angka'
                        //   //         ),
                        //   // ),
                        //   array(
                        //           'field' => 'data_curah_hujan',
                        //           'label' => 'Curah Hujan',   
                        //           'rules' => 'required|numeric',
                        //           'errors' => array(  
                        //                   'required' => 'Curah Hujan harus di isi',
                        //                   'numeric' => 'Pengisian hanya menggunakan angka'
                        //           ),
                        //   )
                );

                $this->form_validation->set_rules($config);
                if ($this->form_validation->run() == true) {
                        $dataEdit['nama_instansi_opd'] = $this->input->post('nama_instansi_opd');
                        //       $dataEdit['data_temperatur'] = $this->input->post('data_temperatur');
                        //       $dataEdit['data_kelembapan'] = $this->input->post('data_kelembapan');
                        //       $dataEdit['data_lama_penyinaran_matahari'] = $this->input->post('data_lama_penyinaran_matahari');
                        //       $dataEdit['data_kecepatan_angin'] = $this->input->post('data_kecepatan_angin');
                        // $dataEdit['data_tekanan_udara'] = $this->input->post('data_tekanan_udara');
                        //       $dataEdit['data_curah_hujan'] = $this->input->post('data_curah_hujan')s;
                        $result = $this->m_instansi_opd->inputData($dataEdit);
                        if (!empty($result)) {
                                $this->session->set_flashdata('info', array(
                                        'from' => 1,
                                        'message' =>  'data berhasil ditambah'
                                ));
                                redirect(site_url('admin/instansi_opd'));
                        } else {
                                $this->session->set_flashdata('info', array(
                                        'from' => 0,
                                        'message' =>  'terjadi kesalahan saat mengirim data'
                                ));
                                redirect(site_url('admin/instansi_opd'));
                        }
                } else {
                        $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
                        $this->load->view("templates/header", $data_user);
                        $this->load->view("templates/sidebar");
                        $this->load->view("view_admin/instansi_opd/v_input_instansi_opd", $data);
                        $this->load->view("templates/footer");
                }
        }

        public function update_instansi_opd($data_id = null)
        {
                $data['page_name'] = "Edit Nama Instansi/OPD";
                $this->load->helper('form');
                $this->load->library('form_validation');
                $config = array(
                        array(
                                'field' => 'nama_instansi_opd',
                                'label' => 'Nama Instansi/OPD',
                                'rules' =>  'trim|required',
                                'errors' => array(
                                        'required' => 'nama harus di isi'
                                ),
                        )
                        //   array(
                        //           'field' => 'data_temperatur',
                        //           'label' => 'Temperatur',   
                        //           'rules' => 'required|numeric',
                        //           'errors' => array(  
                        //                   'required' => 'Temperatur harus di isi',
                        //                   'numeric' => 'Pengisian hanya menggunakan angka'
                        //           ),
                        //   ),
                        //   array(
                        //           'field' => 'data_kelembapan',
                        //           'label' => 'Kelembapan',   
                        //           'rules' => 'required|numeric',
                        //           'errors' => array(  
                        //                   'required' => 'Kelembapan harus di isi',
                        //                   'numeric' => 'Pengisian hanya menggunakan angka'
                        //           ),
                        //   ),
                        //   array(
                        //           'field' => 'data_lama_penyinaran_matahari',
                        //           'label' => 'Lama Penyinaran Matahari',   
                        //           'rules' => 'required|numeric',
                        //           'errors' => array(  
                        //                   'required' => 'Lama Penyinaran Matahari harus di isi',
                        //                   'numeric' => 'Pengisian hanya menggunakan angka'
                        //           ),
                        //   ),
                        //   array(
                        //           'field' => 'data_kecepatan_angin',
                        //           'label' => 'Kecepatan Angin',   
                        //           'rules' => 'required|numeric',
                        //           'errors' => array(  
                        //                   'required' => 'Kecepatan Angin harus di isi',
                        //                   'numeric' => 'Pengisian hanya menggunakan angka'
                        //           ),
                        //   ),
                        //   // array(
                        //   //         'field' => 'data_tekanan_udara',
                        //   //         'label' => 'Tekanan Udara',   
                        //   //         'rules' => 'required|numeric',
                        //   //         'errors' => array(  
                        //   //                 'required' => 'Tekanan Udara harus di isi',
                        //   //                 'numeric' => 'Pengisian hanya menggunakan angka'
                        //   //         ),
                        //   // ),
                        //   array(
                        //           'field' => 'data_curah_hujan',
                        //           'label' => 'Curah Hujan',   
                        //           'rules' => 'required|numeric',
                        //           'errors' => array(  
                        //                   'required' => 'Curah Hujan harus di isi',
                        //                   'numeric' => 'Pengisian hanya menggunakan angka'
                        //           ),
                        //   )
                );

                $this->form_validation->set_rules($config);
                if ($this->form_validation->run() == true) {
                        $dataEdit['nama_instansi_opd'] = $this->input->post('nama_instansi_opd');
                        //       $dataEdit['data_temperatur'] = $this->input->post('data_temperatur');
                        //       $dataEdit['data_kelembapan'] = $this->input->post('data_kelembapan');
                        //       $dataEdit['data_lama_penyinaran_matahari'] = $this->input->post('data_lama_penyinaran_matahari');
                        //       $dataEdit['data_kecepatan_angin'] = $this->input->post('data_kecepatan_angin');
                        // $dataEdit['data_tekanan_udara'] = $this->input->post('data_tekanan_udara');
                        //       $dataEdit['data_curah_hujan'] = $this->input->post('data_curah_hujan');
                        $data_param['id_instansi_opd'] = $this->input->post('id_instansi_opd');
                        $result = $this->m_instansi_opd->updateData($dataEdit, $data_param);
                        if (!empty($result)) {
                                $this->session->set_flashdata('info', array(
                                        'from' => 1,
                                        'message' =>  'data berhasil diedit'
                                ));
                                redirect(site_url('admin/instansi_opd'));
                        } else {
                                $this->session->set_flashdata('info', array(
                                        'from' => 0,
                                        'message' =>  'terjadi kesalahan saat mengirim data'
                                ));
                                redirect(site_url('admin/instansi_opd'));
                        }
                } else {
                        if ($data_id == null) redirect(site_url('admin/instansi_opd'));

                        $data['instansi_opd'] = $this->m_instansi_opd->getData($data_id);
                        $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
                        $this->load->view("templates/header", $data_user);
                        $this->load->view("templates/sidebar");
                        $this->load->view("view_admin/instansi_opd/v_update_instansi_opd", $data);
                        $this->load->view("templates/footer");
                }
        }

        public function delete_instansi_opd($data_id = null)
        {
                if ($data_id == null) redirect(site_url('admin/instansi_opd'));

                $data_param['id_instansi_opd'] = $data_id;
                if ($this->m_instansi_opd->deleteData($data_param)) {
                        $this->session->set_flashdata('info', array(
                                'from' => 1,
                                'message' =>  'data berhasil dihapus'
                        ));
                        redirect(site_url('admin/instansi_opd'));
                        return;
                }
                $this->session->set_flashdata('info', array(
                        'from' => 0,
                        'message' =>  'terjadi kesalahan saat mengirim data'
                ));
                redirect(site_url('admin/instansi_opd'));
        }
}
