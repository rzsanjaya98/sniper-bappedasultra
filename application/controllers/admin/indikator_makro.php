<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Indikator_Makro extends Admin_Controller
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
        $this->load->model("m_indikator_makro");
    }

    public function index()
    {
        $data['page_name'] = "Indikator Makro";
        $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
        $data['provinsi'] = $this->m_indikator_makro->getData();
        $data['nasional'] = $this->m_indikator_makro->getDataIndonesia();
        $data['kabkota'] = $this->m_indikator_makro->getDataKabKota();
        $data['data_indikator'] = $this->m_indikator_makro->getIndikatorMakro(-1, -1);
        $data['data_indikator_indonesia'] = $this->m_indikator_makro->getIndikatorMakroIndonesia();
        $data['data_indikator_kabkota'] = $this->m_indikator_makro->getIndikatorMakroKabKota(-1, -1);

        // echo json_encode($data['data_indikator']);
        $this->load->view("templates/header", $data_user);
        $this->load->view("templates/sidebar");
        $this->load->view("view_admin/indikator_makro/v_indikator_makro", $data);
        // $this->load->view("view_admin/capaian_kinerja_opd/v_pdf", $data);
        $this->load->view("templates/footer");
    }

    public function input_data_makro_regional()
    {
        $data['page_name'] = "Input Data Makro Regional Sulawesi";
        $this->load->helper('form');
        $this->load->library('form_validation');
        $config = array(
            array(
                'field' => 'provinsi_nasional',
                'label' => 'Provinsi / Nasional',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Provinsi/Nasional harus dipilih'
                ),
            ),
            array(
                'field' => 'tahun',
                'label' => 'Tahun',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Tahun harus dipilih'
                ),
            ),
            array(
                'field' => 'pertumbuhan_ekonomi',
                'label' => 'Pertumbuhan Ekonomi',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Pertumbuhan Ekonomi harus di isi'
                ),
            ),
            array(
                'field' => 'gini_rasio',
                'label' => 'Gini Rasio',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Gini Rasio harus di isi'
                ),
            ),
            array(
                'field' => 'persentase_penduduk_miskin',
                'label' => 'Persentase Penduduk Miskin',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Persentase Penduduk Miskin harus di isi'
                ),
            ),
            array(
                'field' => 'indeks_pembangunan_manusia',
                'label' => 'Indeks Pembangunan Manusia',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Indeks Pembangunan Manusia harus di isi'
                ),
            ),
            array(
                'field' => 'tingkat_pengangguran_terbuka',
                'label' => 'Tingkat Pengagguran Terbuka',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Tingkat Pengagguran Terbuka harus di isi'
                ),
            )
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == true) {
            $provinsi_nasional = $this->input->post('provinsi_nasional');
            $tahun = $this->input->post('tahun');
            $cek = $this->m_indikator_makro->cekData($provinsi_nasional, $tahun);
            if (!empty($cek)) {
                $this->session->set_flashdata('info', array(
                    'from' => 0,
                    'message' =>  'anda sudah menginput data pada tahun tersebut'
                ));
                redirect(site_url('admin/indikator_makro/input_data_makro_regional/'));
            } else {
                $dataEdit['provinsi_nasional'] = $this->input->post('provinsi_nasional');
                $dataEdit['tahun'] = $this->input->post('tahun');
                $dataEdit['data_pertumbuhan_ekonomi'] = $this->input->post('pertumbuhan_ekonomi');
                $dataEdit['data_gini_rasio'] = $this->input->post('gini_rasio');
                $dataEdit['data_persentase_penduduk_miskin'] = $this->input->post('persentase_penduduk_miskin');
                $dataEdit['data_indeks_pembangunan_manusia'] = $this->input->post('indeks_pembangunan_manusia');
                $dataEdit['data_tingkat_pengangguran_terbuka'] = $this->input->post('tingkat_pengangguran_terbuka');
                $result = $this->m_indikator_makro->inputData($dataEdit);
                if (!empty($result)) {
                    $this->session->set_flashdata('info', array(
                        'from' => 1,
                        'message' =>  'data berhasil ditambah'
                    ));
                    redirect(site_url('admin/indikator_makro'));
                } else {
                    $this->session->set_flashdata('info', array(
                        'from' => 0,
                        'message' =>  'terjadi kesalahan saat mengirim data'
                    ));
                    redirect(site_url('admin/indikator_makro'));
                }
            }
        } else {

            $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
            $data['provinsi'] = $this->m_indikator_makro->getData(-1, -1);
            $this->load->view("templates/header", $data_user);
            $this->load->view("templates/sidebar");
            $this->load->view("view_admin/indikator_makro/v_input_indikator_makro", $data);
            $this->load->view("templates/footer");
        }
    }

    public function update_data_makro_regional($provinsi_nasional, $tahun)
    {
        $data['page_name'] = "Edit Data Makro Regional Sulawesi";
        $this->load->helper('form');
        $this->load->library('form_validation');
        $config = array(
            array(
                'field' => 'provinsi_nasional',
                'label' => 'Provinsi / Nasional',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Provinsi/Nasional harus dipilih'
                ),
            ),
            array(
                'field' => 'tahun',
                'label' => 'Tahun',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Tahun harus dipilih'
                ),
            ),
            array(
                'field' => 'pertumbuhan_ekonomi',
                'label' => 'Pertumbuhan Ekonomi',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Pertumbuhan Ekonomi harus di isi'
                ),
            ),
            array(
                'field' => 'gini_rasio',
                'label' => 'Gini Rasio',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Gini Rasio harus di isi'
                ),
            ),
            array(
                'field' => 'persentase_penduduk_miskin',
                'label' => 'Persentase Penduduk Miskin',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Persentase Penduduk Miskin harus di isi'
                ),
            ),
            array(
                'field' => 'indeks_pembangunan_manusia',
                'label' => 'Indeks Pembangunan Manusia',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Indeks Pembangunan Manusia harus di isi'
                ),
            ),
            array(
                'field' => 'tingkat_pengangguran_terbuka',
                'label' => 'Tingkat Pengagguran Terbuka',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Tingkat Pengagguran Terbuka harus di isi'
                ),
            )
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == true) {
            $dataParam['provinsi_nasional'] = $this->input->post('provinsi_nasional');
            $dataParam['tahun'] = $this->input->post('tahun');
            $dataEdit['data_pertumbuhan_ekonomi'] = $this->input->post('pertumbuhan_ekonomi');
            $dataEdit['data_gini_rasio'] = $this->input->post('gini_rasio');
            $dataEdit['data_persentase_penduduk_miskin'] = $this->input->post('persentase_penduduk_miskin');
            $dataEdit['data_indeks_pembangunan_manusia'] = $this->input->post('indeks_pembangunan_manusia');
            $dataEdit['data_tingkat_pengangguran_terbuka'] = $this->input->post('tingkat_pengangguran_terbuka');
            $result = $this->m_indikator_makro->updateData($dataEdit, $dataParam);
            if (!empty($result)) {
                $this->session->set_flashdata('info', array(
                    'from' => 1,
                    'message' =>  'data berhasil diupdate'
                ));
                redirect(site_url('admin/indikator_makro'));
            } else {
                $this->session->set_flashdata('info', array(
                    'from' => 0,
                    'message' =>  'terjadi kesalahan saat mengirim data'
                ));
                redirect(site_url('admin/indikator_makro'));
            }
        } else {
            if ($provinsi_nasional == null && $tahun == null) redirect(site_url('admin/indikator_makro/'));

            $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
            $data['provinsi'] = $this->m_indikator_makro->getData();
            $data['indikator_makro'] = $this->m_indikator_makro->getIndikatorMakro(urldecode($provinsi_nasional), $tahun);
            $data['provinsi_nasional'] = urldecode($provinsi_nasional);
            $data['tahun'] = $tahun;
            // echo json_encode($data['indikator_makro']);
            // echo $provinsi_nasional;
            $this->load->view("templates/header", $data_user);
            $this->load->view("templates/sidebar");
            $this->load->view("view_admin/indikator_makro/v_update_indikator_makro", $data);
            $this->load->view("templates/footer");
        }
    }

    public function delete_data_makro_regional($provinsi_nasional, $tahun)
    {
        if ($provinsi_nasional == null && $tahun == null) redirect(site_url('admin/indikator_makro/'));

        $dataParam['provinsi_nasional'] = urldecode($provinsi_nasional);
        $dataParam['tahun'] = $tahun;
        if ($result = $this->m_indikator_makro->deleteData($dataParam)) {
            $this->session->set_flashdata('info', array(
                'from' => 1,
                'message' =>  'data berhasil dihapus'
            ));
            redirect(site_url('admin/indikator_makro'));
        } else {
            $this->session->set_flashdata('info', array(
                'from' => 0,
                'message' =>  'terjadi kesalahan saat mengirim data'
            ));
            redirect(site_url('admin/indikator_makro'));
        }
    }

    public function input_data_makro_kab_kota()
    {
        $data['page_name'] = "Input Data Makro Kab/Kota";
        $this->load->helper('form');
        $this->load->library('form_validation');
        $config = array(
            array(
                'field' => 'kab_kota',
                'label' => 'Kab / Kota',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Kab/Kota harus dipilih'
                ),
            ),
            array(
                'field' => 'tahun',
                'label' => 'Tahun',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Tahun harus dipilih'
                ),
            ),
            array(
                'field' => 'pertumbuhan_ekonomi',
                'label' => 'Pertumbuhan Ekonomi',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Pertumbuhan Ekonomi harus di isi'
                ),
            ),
            array(
                'field' => 'gini_rasio',
                'label' => 'Gini Rasio',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Gini Rasio harus di isi'
                ),
            ),
            array(
                'field' => 'persentase_penduduk_miskin',
                'label' => 'Persentase Penduduk Miskin',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Persentase Penduduk Miskin harus di isi'
                ),
            ),
            array(
                'field' => 'indeks_pembangunan_manusia',
                'label' => 'Indeks Pembangunan Manusia',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Indeks Pembangunan Manusia harus di isi'
                ),
            ),
            array(
                'field' => 'tingkat_pengangguran_terbuka',
                'label' => 'Tingkat Pengagguran Terbuka',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Tingkat Pengagguran Terbuka harus di isi'
                ),
            )
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == true) {
            $kabkota = $this->input->post('kab_kota');
            $tahun = $this->input->post('tahun');
            $cek = $this->m_indikator_makro->cekDataKabKota($kabkota, $tahun);
            if (!empty($cek)) {
                $this->session->set_flashdata('info', array(
                    'from' => 0,
                    'message' =>  'anda sudah menginput data pada tahun tersebut'
                ));
                redirect(site_url('admin/indikator_makro/input_data_makro_kab_kota/'));
            } else {
                $dataEdit['wilayah'] = $this->input->post('kab_kota');
                $dataEdit['tahun'] = $this->input->post('tahun');
                $dataEdit['data_pertumbuhan_ekonomi'] = $this->input->post('pertumbuhan_ekonomi');
                $dataEdit['data_gini_rasio'] = $this->input->post('gini_rasio');
                $dataEdit['data_persentase_penduduk_miskin'] = $this->input->post('persentase_penduduk_miskin');
                $dataEdit['data_indeks_pembangunan_manusia'] = $this->input->post('indeks_pembangunan_manusia');
                $dataEdit['data_tingkat_pengangguran_terbuka'] = $this->input->post('tingkat_pengangguran_terbuka');
                $result = $this->m_indikator_makro->inputDataKabKota($dataEdit);
                if (!empty($result)) {
                    $this->session->set_flashdata('info', array(
                        'from' => 1,
                        'message' =>  'data berhasil ditambah'
                    ));
                    redirect(site_url('admin/indikator_makro'));
                } else {
                    $this->session->set_flashdata('info', array(
                        'from' => 0,
                        'message' =>  'terjadi kesalahan saat mengirim data'
                    ));
                    redirect(site_url('admin/indikator_makro'));
                }
            }
        } else {

            $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
            $data['kabkota'] = $this->m_indikator_makro->getDataKabKota();
            $this->load->view("templates/header", $data_user);
            $this->load->view("templates/sidebar");
            $this->load->view("view_admin/indikator_makro/v_input_indikator_makro_kab_kota", $data);
            $this->load->view("templates/footer");
        }
    }

    public function update_data_makro_kab_kota($wilayah, $tahun)
    {
        $data['page_name'] = "Edit Data Makro Kab/Kota";
        $this->load->helper('form');
        $this->load->library('form_validation');
        $config = array(
            array(
                'field' => 'kab_kota',
                'label' => 'Kab / Kota',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Kab/Kota harus dipilih'
                ),
            ),
            array(
                'field' => 'tahun',
                'label' => 'Tahun',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Tahun harus dipilih'
                ),
            ),
            array(
                'field' => 'pertumbuhan_ekonomi',
                'label' => 'Pertumbuhan Ekonomi',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Pertumbuhan Ekonomi harus di isi'
                ),
            ),
            array(
                'field' => 'gini_rasio',
                'label' => 'Gini Rasio',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Gini Rasio harus di isi'
                ),
            ),
            array(
                'field' => 'persentase_penduduk_miskin',
                'label' => 'Persentase Penduduk Miskin',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Persentase Penduduk Miskin harus di isi'
                ),
            ),
            array(
                'field' => 'indeks_pembangunan_manusia',
                'label' => 'Indeks Pembangunan Manusia',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Indeks Pembangunan Manusia harus di isi'
                ),
            ),
            array(
                'field' => 'tingkat_pengangguran_terbuka',
                'label' => 'Tingkat Pengagguran Terbuka',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Tingkat Pengagguran Terbuka harus di isi'
                ),
            )
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == true) {
            $dataParam['wilayah'] = $this->input->post('kab_kota');
            $dataParam['tahun'] = $this->input->post('tahun');
            $dataEdit['data_pertumbuhan_ekonomi'] = $this->input->post('pertumbuhan_ekonomi');
            $dataEdit['data_gini_rasio'] = $this->input->post('gini_rasio');
            $dataEdit['data_persentase_penduduk_miskin'] = $this->input->post('persentase_penduduk_miskin');
            $dataEdit['data_indeks_pembangunan_manusia'] = $this->input->post('indeks_pembangunan_manusia');
            $dataEdit['data_tingkat_pengangguran_terbuka'] = $this->input->post('tingkat_pengangguran_terbuka');
            $result = $this->m_indikator_makro->updateDataKabKota($dataEdit, $dataParam);
            if (!empty($result)) {
                $this->session->set_flashdata('info', array(
                    'from' => 1,
                    'message' =>  'data berhasil diupdate'
                ));
                redirect(site_url('admin/indikator_makro'));
            } else {
                $this->session->set_flashdata('info', array(
                    'from' => 0,
                    'message' =>  'terjadi kesalahan saat mengirim data'
                ));
                redirect(site_url('admin/indikator_makro'));
            }
        } else {
            if ($wilayah == null && $tahun == null) redirect(site_url('admin/indikator_makro/'));

            $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
            $data['kabkota'] = $this->m_indikator_makro->getDataKabKota();
            $data['indikator_makro'] = $this->m_indikator_makro->getIndikatorMakroKabKota(urldecode($wilayah), $tahun);
            $data['wilayah'] = urldecode($wilayah);
            $data['tahun'] = $tahun;
            // echo json_encode($data['indikator_makro']);
            // echo $provinsi_nasional;
            $this->load->view("templates/header", $data_user);
            $this->load->view("templates/sidebar");
            $this->load->view("view_admin/indikator_makro/v_update_indikator_makro_kab_kota", $data);
            $this->load->view("templates/footer");
        }
    }

    public function delete_data_makro_kab_kota($wilayah, $tahun)
    {
        if ($wilayah == null && $tahun == null) redirect(site_url('admin/indikator_makro/'));

        $dataParam['wilayah'] = urldecode($wilayah);
        $dataParam['tahun'] = $tahun;
        if ($result = $this->m_indikator_makro->deleteDataKabKota($dataParam)) {
            $this->session->set_flashdata('info', array(
                'from' => 1,
                'message' =>  'data berhasil dihapus'
            ));
            redirect(site_url('admin/indikator_makro'));
        } else {
            $this->session->set_flashdata('info', array(
                'from' => 0,
                'message' =>  'terjadi kesalahan saat mengirim data'
            ));
            redirect(site_url('admin/indikator_makro'));
        }
    }

}
