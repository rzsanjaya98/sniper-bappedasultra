<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends Admin_Controller
{
    // class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->output->enable_profiler(TRUE);
        // $this->load->model("m_login");
        // $this->load->model("m_register");
        $this->load->model("m_instansi_opd");
        $this->load->model("m_user");
        $this->load->model("m_register");
        // $this->load->model("m_log");
        $this->load->helper('array');
        $this->load->library("pagination");
    }

    public function index()
    {
        // if($this->session->userdata('user_id') == NULL)
        // {
        //     redirect('' . base_url());
        // }else{
        $data['page_name'] = "Akun";
        //   $data['kategori'] = $this->m_kategori->getData();
        // $data['chart_name'] = "Data Prediksi Curah Hujan";

        $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
        $data['data_user'] = $this->m_user->getDataUser($this->session->userdata('user_id'));
        //   $data['data_meteorologi_count'] = $this->m_data_meteorologi->count();
        // $data['grafik'] = json_encode($this->m_fuzzy->getDataPrediksi());
        // $data['rmse'] = $this->rmse();
        // $data['mae'] = $this->mae();
        // $data['mape'] = $this->mape();
        // $data['data_uji'] = $this->m_user->getUser( $this->session->userdata('user_id') );
        //   $this->load->view("_user/_template/header1");
        // //   $this->load->view("_user/_template/sidebar_menu");
        //       $this->load->view("_user/_template/content",$data);
        //   $this->load->view("_user/_template/footer");  
        $this->load->view("templates/header", $data_user);
        $this->load->view("templates/sidebar");
        $this->load->view("view_admin/akun/v_akun", $data);
        // $this->load->view("_admin/_template/content",$data);
        $this->load->view("templates/footer");
        // }
    }

    public function register()
    {
        $data['page_name'] = "Register";
        $this->load->helper('form');
        $this->load->library('form_validation');
        $result = $this->m_register->getData();
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
            array(
                'field' => 'user_username',
                'label' => 'Username',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'username harus harus di isi',
                ),
            ),
            array(
                'field' => 'user_password',
                'label' => 'Password',
                'rules' => 'required|min_length[5]',
                'errors' => array(
                    'required' => 'password harus di isi',
                    'min_length' => 'password minimal 5 karakter'
                ),
            ),
        );

        $this->form_validation->set_rules($config);
        // $log['log_datetime'] = date("Y-m-d H:i:s");
        // $log['log_message'] = "a person REGISTER in system ; result =>";
        if ($this->form_validation->run() === true) {
            if (strpos($this->input->post('user_username'), " ")) {
                $this->session->set_flashdata('register', 'username tidak boleh mengandung spasi');
                redirect(site_url('/admin/akun/register'));
            }
            $dataProfile['user_profile_fullname'] = $this->input->post('user_profile_fullname');
            $dataProfile['user_profile_email'] = $this->input->post('user_profile_email');
            if ($this->input->post('user_profile_opd') == NULL) {
                $dataProfile['user_profile_opd'] = " ";
                $dataProfile['user_profile_id_opd'] = " ";
            } else {
                $dataProfile['user_profile_id_opd'] = $this->input->post('user_profile_opd');
                $instansi_opd = $this->m_instansi_opd->getData($this->input->post('user_profile_opd'));
                $dataProfile['user_profile_opd'] = $instansi_opd[0]->nama_instansi_opd;
            }
            $dataUser['user_username'] = str_ireplace(" ", "", $this->input->post('user_username'));
            $dataUser['user_password'] = md5($this->input->post('user_password'));
            $dataUser['user_level'] = $this->input->post('user_level');
            $result = $this->m_register->register($dataUser, $dataProfile);
            if ($result['status']) {
                $this->session->set_flashdata('info', array(
                    'from' => 1,
                    'message' => 'registrasi berhasil'
                ));
                // $log['log_message'] .= "true";
                // $this->m_log->inserLog( $log );
                redirect(site_url('admin/akun'));
            } else {
                $this->session->set_flashdata('register', $result['message']);
                // $log['log_message'] .= "false; ".$result['message'];
                // $this->m_log->inserLog( $log );
                redirect(site_url('admin/akun/register'));
            }
        } else {
            $data['positions'] = $result[0];
            $data['groups'] = $result[1];
            // $log['log_message'] .= "false";
            // $this->m_log->inserLog( $log );
            $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
            $data['instansi_opd'] = $this->m_instansi_opd->getData();
            $this->load->view("templates/header", $data_user);
            $this->load->view("templates/sidebar");
            $this->load->view("view_admin/akun/v_register", $data);
            $this->load->view("templates/footer");
        }
    }

    public function update_akun($data_id = null)
    {
        $data['page_name'] = "Edit Akun";
        $this->load->helper('form');
        $this->load->library('form_validation');
        $result = $this->m_register->getData();
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
            array(
                'field' => 'user_username',
                'label' => 'Username',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'username harus harus di isi',
                ),
            ),
            array(
                'field' => 'user_profile_opd',
                'label' => 'OPD Penanggung Jawab',
                'rules' =>  'trim|required',
                'errors' => array(
                    'required' => 'OPD Penanggung Jawab harus di pilih'
                ),
            ),
            // array(
            //     'field' => 'user_password',
            //     'label' => 'Password',
            //     'rules' => 'required|min_length[5]',
            //     'errors' => array(
            //         'required' => 'password harus di isi',
            //         'min_length' => 'password minimal 5 karakter'
            //     ),
            // ),
        );

        $this->form_validation->set_rules($config);
        // $log['log_datetime'] = date("Y-m-d H:i:s");
        // $log['log_message'] = "a person REGISTER in system ; result =>";
        if ($this->form_validation->run() === true) {
            if (strpos($this->input->post('user_username'), " ")) {
                $this->session->set_flashdata('register', 'username tidak boleh mengandung spasi');
                redirect(site_url('/admin/akun/update_akun'));
            }
            $dataProfile['user_profile_fullname'] = $this->input->post('user_profile_fullname');
            $dataProfile['user_profile_email'] = $this->input->post('user_profile_email');
            $dataProfile['user_profile_id_opd'] = $this->input->post('user_profile_opd');
            $instansi_opd = $this->m_instansi_opd->getData($this->input->post('user_profile_opd'));
            $dataProfile['user_profile_opd'] = $instansi_opd[0]->nama_instansi_opd;
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
                redirect(site_url('admin/akun'));
            } else {
                $this->session->set_flashdata('info', array(
                    'from' => 0,
                    'message' =>  'terjadi kesalahan saat mengirim data'
                ));
                redirect(site_url('admin/akun'));
            }
        } else {
            $data['positions'] = $result[0];
            $data['groups'] = $result[1];
            $data['user'] = $this->m_user->getUser($data_id);
            $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
            $data['instansi_opd'] = $this->m_instansi_opd->getData();
            // $log['log_message'] .= "false";
            // $this->m_log->inserLog( $log );
            $this->load->view("templates/header", $data_user);
            $this->load->view("templates/sidebar");
            $this->load->view("view_admin/akun/v_update_akun", $data);
            $this->load->view("templates/footer");
        }
    }

    public function delete_akun($data_id = null)
    {
        if ($data_id == null) redirect(site_url('admin/akun'));

        $data_param['user_id'] = $data_id;
        $resultUser = $this->m_register->deleteUser($data_param);
        $resultProfile = $this->m_register->deleteProfile($data_param);
        if (!empty($resultUser) && !empty($resultProfile)) {
            $this->session->set_flashdata('info', array(
                'from' => 1,
                'message' =>  'data berhasil dihapus'
            ));
            redirect(site_url('admin/akun'));
            return;
        }
        $this->session->set_flashdata('info', array(
            'from' => 0,
            'message' =>  'terjadi kesalahan saat mengirim data'
        ));
        redirect(site_url('admin/akun'));
    }
}
