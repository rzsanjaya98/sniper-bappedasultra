<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Capaian_Kinerja_OPD extends Admin_Controller
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
        $this->load->model("m_capaian_kinerja");
        $this->load->model("m_instansi_opd");
    }

    public function index()
    {
        $data['page_name'] = "Capaian Kinerja OPD Sultra";
        $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
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

        if ($id_instansi_opd == null) {
            if ($this->session->userdata('user_level') == 3) {
                $data['jenis_urusan'] = $this->m_capaian_kinerja->getDataJenisUrusan($data_user['user'][0]->user_profile_id_opd);
                $data['bidang_urusan'] = $this->m_capaian_kinerja->getDataBidangUrusan($data_user['user'][0]->user_profile_id_opd);
                $data['program'] = $this->m_capaian_kinerja->getDataProgramOPD($data_user['user'][0]->user_profile_id_opd, 2022);
                // $data['kegiatan'] = $this->m_kegiatan->getDataKegiatanOPD($data_user['user'][0]->user_profile_id_opd);
                $data['kegiatan'] = $this->m_capaian_kinerja->getDataKegiatanOPD($data_user['user'][0]->user_profile_id_opd, 2022);
                $data['sub_kegiatan'] = $this->m_capaian_kinerja->getDataSubKegiatanOPD($data_user['user'][0]->user_profile_id_opd, 2022);
            }


            // $data['capaian_2020'] = $this->m_capaian->getDataPerTahun(2020);
            // $data['capaian_2021'] = $this->m_capaian->getDataPerTahun(2021);
            // $data['target_2021'] = $this->m_target->getDataPerTahun(2021);

            // echo json_encode($data['program']);

        } else {
            $data['jenis_urusan'] = $this->m_capaian_kinerja->getDataJenisUrusan($id_instansi_opd);
            $data['bidang_urusan'] = $this->m_capaian_kinerja->getDataBidangUrusan($id_instansi_opd);
            $data['program'] = $this->m_capaian_kinerja->getDataProgramOPD($id_instansi_opd, 2022);
            // $data['kegiatan'] = $this->m_kegiatan->getDataKegiatanOPD($data_user['user'][0]->user_profile_id_opd);
            $data['kegiatan'] = $this->m_capaian_kinerja->getDataKegiatanOPD($id_instansi_opd, 2022);
            $data['sub_kegiatan'] = $this->m_capaian_kinerja->getDataSubKegiatanOPD($id_instansi_opd, 2022);
            $data['instansi'] = $id_instansi_opd;
        }
        $this->load->view("templates/header", $data_user);
        $this->load->view("templates/sidebar");
        $this->load->view("view_admin/capaian_kinerja_opd/v_capaian_kinerja_opd1", $data);
        // $this->load->view("view_admin/capaian_kinerja_opd/v_pdf", $data);
        $this->load->view("templates/footer");
    }

    // public function export_pdf()
    // {

    //     // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
    //     $this->load->library('pdfgenerator');
    //     $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
    //     // title dari pdf
    //     // $this->data['title_pdf'] = 'Capaian Kinerja OPD';
    //     $data['page_name'] = "Capaian Kinerja OPD Sultra";

    //     if ($this->session->userdata('user_level') == 3) {
    //         $data['jenis_urusan'] = $this->m_capaian_kinerja->getDataJenisUrusan($data_user['user'][0]->user_profile_id_opd);
    //         $data['bidang_urusan'] = $this->m_capaian_kinerja->getDataBidangUrusan($data_user['user'][0]->user_profile_id_opd);
    //         $data['program'] = $this->m_program->getDataProgramOPD($data_user['user'][0]->user_profile_opd);
    //         // $data['kegiatan'] = $this->m_kegiatan->getDataKegiatanOPD($data_user['user'][0]->user_profile_id_opd);            
    //         $data['kegiatan'] = $this->m_capaian_kinerja->getDataKegiatanOPD($data_user['user'][0]->user_profile_id_opd, 2022);
    //         $data['sub_kegiatan'] = $this->m_capaian_kinerja->getDataSubKegiatanOPD($data_user['user'][0]->user_profile_id_opd, 2022);
    //     } else {
    //         $data['jenis_urusan'] = $this->m_jenis_urusan->getData();
    //         $data['bidang_urusan'] = $this->m_bidang_urusan->getData();
    //         $data['program'] = $this->m_program->getData();
    //     }

    //     // $data['jenis_urusan'] = $this->m_jenis_urusan->getData();
    //     // $data['bidang_urusan'] = $this->m_bidang_urusan->getData();
    //     // if($this->session->userdata('user_level') == 3){
    //     //     $data['program'] = $this->m_program->getDataProgramOPD($data_user['user'][0]->user_profile_opd);
    //     // }else{
    //     //     $data['program'] = $this->m_program->getData();
    //     // }
    //     // $data['kegiatan'] = $this->m_kegiatan->getDataAll();
    //     // $data['sub_kegiatan'] = $this->m_sub_kegiatan->getDataAll();
    //     // $data['capaian_2020'] = $this->m_capaian->getDataPerTahun(2020);
    //     // $data['capaian_2021'] = $this->m_capaian->getDataPerTahun(2021);
    //     // $data['target_2021'] = $this->m_target->getDataPerTahun(2021);
    //     // filename dari pdf ketika didownload
    //     $file_pdf = 'capaian_kinerja_opd';
    //     // setting paper
    //     $paper = 'A3';
    //     //orientasi paper potrait / landscape
    //     $orientation = "landscape";

    //     $html = $this->load->view('view_admin/capaian_kinerja_opd/v_pdf', $data, true);

    //     // run dompdf
    //     $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    // }

    public function export_excel($id_instansi_opd = null)
    {
        $data_user['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
        // $title = 'Hasil Evaluasi '.$data_user['user'][0]->user_profile_opd;
        $title = 'Hasil Evaluasi ';

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col_utama = [
            'font' => [
                'bold' => true,
                'size' => 12,
                'name'  => 'Arial'
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['argb' => '5bc0de']
            ],
            // 'font' => ['bold' => true], // Set font nya jadi bold
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];

        $style_col_kedua = [
            'font' => [
                'bold' => true,
                'size' => 8,
                'name'  => 'Arial',
                'color' => ['argb' => 'ffffff']
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['argb' => '343a40']
            ],
            // 'font' => ['bold' => true], // Set font nya jadi bold
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];

        $style_col = [
            'font' => [
                'bold' => true,
                'size' => 12,
                'name'  => 'Arial'
            ],
            // 'font' => ['bold' => true], // Set font nya jadi bold
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];

        $style_jenis_urusan = [
            'font' => [
                'bold' => true,
                'size' => 12,
                'name'  => 'Arial'
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['argb' => 'FFB9B9']
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];

        $style_bidang_urusan = [
            'font' => [
                'bold' => true,
                'size' => 11,
                'name'  => 'Arial'
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['argb' => 'FFDDD2']
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];

        $style_program = [
            'font' => [
                'bold' => true,
                'size' => 10,
                'name'  => 'Arial'
            ],
            // 'fill' => [
            //     'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
            //     'color' => ['argb' => 'DDEBF7']
            // ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];

        $style_kegiatan = [
            'font' => [
                'bold' => true,
                'size' => 9,
                'name'  => 'Arial'
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];

        $style_sub_kegiatan = [
            'font' => [
                'italic' => true,
                'size' => 8,
                'name'  => 'Arial'
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];

        $style_judul = [
            'font' => [
                'size' => 12,
                'name'  => 'Arial'
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ]
        ];
        $sheet->setCellValue('A1', "Evaluasi Hasil Pelaksanaan Perencanaan Pembangunan Daerah"); // Set kolom A1 dengan tulisan 
        $sheet->mergeCells('A1:AA1'); // Set Merge Cell pada kolom A1 sampai T1
        $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
        $sheet->setCellValue('A2', "Provinsi Sulawesi Tenggara Tahun 2022");
        $sheet->mergeCells('A2:AA2');
        $sheet->getStyle('A2')->getFont()->setBold(true);
        $sheet->getStyle('A1')->applyFromArray($style_judul); 
        $sheet->getStyle('A2')->applyFromArray($style_judul);

        $sheet->mergeCells('A4:E5');
        $sheet->setCellValue('A4', "Kode");
        $sheet->setCellValue('A6', "Jenis Urusan");
        $sheet->setCellValue('B6', "Bidang Urusan");
        $sheet->setCellValue('C6', "Program");
        $sheet->setCellValue('D6', "Kegiatan");
        $sheet->setCellValue('E6', "Sub Kegiatan");
        $sheet->mergeCells('F4:F6');
        $sheet->setCellValue('F4', "Jenis Urusan / Bidang Urusan / Program / Kegiatan / Sub Kegiatan");
        $sheet->mergeCells('G4:G6');
        $sheet->setCellValue('G4', "Indikator Kinerja Program (Outcome)/ Kegiatan (Output)/ Sub Kegiatan (Sub Output)");
        $sheet->mergeCells('H4:H6');
        $sheet->setCellValue('H4', "Satuan");
        $sheet->mergeCells('I4:J5');
        $sheet->setCellValue('I4', "Target Kinerja dan Anggaran RPJMD & Renstra PD Tahun 2023");
        $sheet->setCellValue('I6', "Kinerja");
        $sheet->setCellValue('J6', "Rp.");
        $sheet->mergeCells('K4:L5');
        $sheet->setCellValue('K4', "Capaian Kinerja dan Realisasi Anggaran s/d Tahun 2021");
        $sheet->setCellValue('K6', "Kinerja");
        $sheet->setCellValue('L6', "Rp.");
        $sheet->mergeCells('M4:N5');
        $sheet->setCellValue('M4', "Target Kinerja dan Anggaran Tahun 2022");
        $sheet->setCellValue('M6', "Kinerja");
        $sheet->setCellValue('N6', "Rp.");
        $sheet->mergeCells('O4:V4');
        $sheet->setCellValue('O4', "Capaian Kinerja dan Realisasi Anggaran Tahun 2022 (Triwulan)");
        $sheet->mergeCells('O5:P5');
        $sheet->setCellValue('O5', "Triwulan 1");
        $sheet->setCellValue('O6', "Kinerja");
        $sheet->setCellValue('P6', "Rp.");
        $sheet->mergeCells('Q5:R5');
        $sheet->setCellValue('Q5', "Triwulan 2");
        $sheet->setCellValue('Q6', "Kinerja");
        $sheet->setCellValue('R6', "Rp.");
        $sheet->mergeCells('S5:T5');
        $sheet->setCellValue('S5', "Triwulan 3");
        $sheet->setCellValue('S6', "Kinerja");
        $sheet->setCellValue('T6', "Rp.");
        $sheet->mergeCells('U5:V5');
        $sheet->setCellValue('U5', "Triwulan 4");
        $sheet->setCellValue('U6', "Kinerja");
        $sheet->setCellValue('V6', "Rp.");
        $sheet->mergeCells('W4:X5');
        $sheet->setCellValue('W4', "Capaian Kinerja dan Realisasi Anggaran Tahun 2022 (Total)");
        $sheet->setCellValue('W6', "Kinerja");
        $sheet->setCellValue('X6', "Rp.");
        $sheet->mergeCells('Y4:Z5');
        $sheet->setCellValue('Y4', "Capaian Kinerja dan Realisasi Anggaran s/d Tahun 2022");
        $sheet->setCellValue('Y6', "Kinerja");
        $sheet->setCellValue('Z6', "Rp.");
        $sheet->mergeCells('AA4:AB5');
        $sheet->setCellValue('AA4', "Tingkat Capaian Kinerja dan Realisasi Anggaran s/d Tahun 2022 (%)");
        $sheet->setCellValue('AA6', "Kinerja");
        $sheet->setCellValue('AB6', "Rp.");
        $sheet->mergeCells('AC4:AC6');
        $sheet->setCellValue('AC4', "OPD Penanggung Jawab");

        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $sheet->getStyle('A4:E5')->applyFromArray($style_col_utama);
        $sheet->getStyle('A6')->applyFromArray($style_col_utama);
        $sheet->getStyle('B6')->applyFromArray($style_col_utama);
        $sheet->getStyle('C6')->applyFromArray($style_col_utama);
        $sheet->getStyle('D6')->applyFromArray($style_col_utama);
        $sheet->getStyle('E6')->applyFromArray($style_col_utama);
        $sheet->getStyle('F4:F6')->applyFromArray($style_col_utama);
        $sheet->getStyle('G4:G6')->applyFromArray($style_col_utama);
        $sheet->getStyle('H4:H6')->applyFromArray($style_col_utama);
        $sheet->getStyle('I4:J5')->applyFromArray($style_col_utama);
        $sheet->getStyle('I6')->applyFromArray($style_col_utama);
        $sheet->getStyle('J6')->applyFromArray($style_col_utama);
        $sheet->getStyle('K4:L5')->applyFromArray($style_col_utama);
        $sheet->getStyle('K6')->applyFromArray($style_col_utama);
        $sheet->getStyle('L6')->applyFromArray($style_col_utama);
        $sheet->getStyle('M4:N5')->applyFromArray($style_col_utama);
        $sheet->getStyle('M6')->applyFromArray($style_col_utama);
        $sheet->getStyle('N6')->applyFromArray($style_col_utama);
        $sheet->getStyle('O4:V4')->applyFromArray($style_col_utama);
        $sheet->getStyle('O5:P5')->applyFromArray($style_col_utama);
        $sheet->getStyle('O6')->applyFromArray($style_col_utama);
        $sheet->getStyle('P6')->applyFromArray($style_col_utama);
        $sheet->getStyle('Q5:R5')->applyFromArray($style_col_utama);
        $sheet->getStyle('Q6')->applyFromArray($style_col_utama);
        $sheet->getStyle('R6')->applyFromArray($style_col_utama);
        $sheet->getStyle('S5:T5')->applyFromArray($style_col_utama);
        $sheet->getStyle('S6')->applyFromArray($style_col_utama);
        $sheet->getStyle('T6')->applyFromArray($style_col_utama);
        $sheet->getStyle('U5:V5')->applyFromArray($style_col_utama);
        $sheet->getStyle('U6')->applyFromArray($style_col_utama);
        $sheet->getStyle('V6')->applyFromArray($style_col_utama);
        $sheet->getStyle('W4:X5')->applyFromArray($style_col_utama);
        $sheet->getStyle('W6')->applyFromArray($style_col_utama);
        $sheet->getStyle('X6')->applyFromArray($style_col_utama);
        $sheet->getStyle('Y4:Z5')->applyFromArray($style_col_utama);
        $sheet->getStyle('Y6')->applyFromArray($style_col_utama);
        $sheet->getStyle('Z6')->applyFromArray($style_col_utama);
        $sheet->getStyle('AA4:AB5')->applyFromArray($style_col_utama);
        $sheet->getStyle('AA6')->applyFromArray($style_col_utama);
        $sheet->getStyle('AB6')->applyFromArray($style_col_utama);
        $sheet->getStyle('AC4:AC6')->applyFromArray($style_col_utama);

        $sheet->mergeCells('A7:E7');
        $sheet->setCellValue('A7', "1");
        $sheet->setCellValue('F7', "2");
        $sheet->setCellValue('G7', "3");
        $sheet->setCellValue('H7', "4");
        $sheet->mergeCells('I7:J5');
        $sheet->setCellValue('I7', "5");
        $sheet->mergeCells('K7:L7');
        $sheet->setCellValue('K7', "6");
        $sheet->mergeCells('M7:N7');
        $sheet->setCellValue('M7', "7");
        $sheet->mergeCells('O7:V7');
        $sheet->setCellValue('O7', "8");
        $sheet->mergeCells('W7:X7');
        $sheet->setCellValue('W7', "9");
        $sheet->mergeCells('Y7:Z7');
        $sheet->setCellValue('Y7', "10(6+9)");
        $sheet->mergeCells('AA7:AB7');
        $sheet->setCellValue('AA7', "11(10/5*100)");
        $sheet->setCellValue('AC7', "12");

        $sheet->getStyle('A7:AC7')->applyFromArray($style_col_kedua);


        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        // $siswa = $this->SiswaModel->view();
        // $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        // $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        // foreach ($siswa as $data) { // Lakukan looping pada variabel siswa
        //     $sheet->setCellValue('A' . $numrow, $no);
        //     $sheet->setCellValue('B' . $numrow, $data->nis);
        //     $sheet->setCellValue('C' . $numrow, $data->nama);
        //     $sheet->setCellValue('D' . $numrow, $data->jenis_kelamin);
        //     $sheet->setCellValue('E' . $numrow, $data->alamat);

        //     // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
        //     $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
        //     $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
        //     $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
        //     $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
        //     $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);

        //     $no++; // Tambah 1 setiap kali looping
        //     $numrow++; // Tambah 1 setiap kali looping
        // }

        if ($id_instansi_opd == null) {
            if ($this->session->userdata('user_level') == 3) {
                $data['jenis_urusan'] = $this->m_capaian_kinerja->getDataJenisUrusan($data_user['user'][0]->user_profile_id_opd);
                $data['bidang_urusan'] = $this->m_capaian_kinerja->getDataBidangUrusan($data_user['user'][0]->user_profile_id_opd);
                $data['program'] = $this->m_capaian_kinerja->getDataProgramOPD($data_user['user'][0]->user_profile_id_opd, 2022);
                // $data['kegiatan'] = $this->m_kegiatan->getDataKegiatanOPD($data_user['user'][0]->user_profile_id_opd);
                $data['kegiatan'] = $this->m_capaian_kinerja->getDataKegiatanOPD($data_user['user'][0]->user_profile_id_opd, 2022);
                $data['sub_kegiatan'] = $this->m_capaian_kinerja->getDataSubKegiatanOPD($data_user['user'][0]->user_profile_id_opd, 2022);
            }
        } else {
            $data['jenis_urusan'] = $this->m_capaian_kinerja->getDataJenisUrusan($id_instansi_opd);
            $data['bidang_urusan'] = $this->m_capaian_kinerja->getDataBidangUrusan($id_instansi_opd);
            $data['program'] = $this->m_capaian_kinerja->getDataProgramOPD($id_instansi_opd, 2022);
            $data['kegiatan'] = $this->m_capaian_kinerja->getDataKegiatanOPD($id_instansi_opd, 2022);
            $data['sub_kegiatan'] = $this->m_capaian_kinerja->getDataSubKegiatanOPD($id_instansi_opd, 2022);
        }

        $numrow = 8; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($data['jenis_urusan'] as $jenis_urusan) {
            $sheet->setCellValue('A' . $numrow, $jenis_urusan->id_jenis_urusan);
            $sheet->setCellValue('F' . $numrow, $jenis_urusan->jenis_urusan);

            $sheet->getStyle('A' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('B' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('C' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('D' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('E' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('F' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('G' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('H' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('I' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('J' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('K' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('L' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('M' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('N' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('O' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('P' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('Q' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('R' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('S' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('T' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('U' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('V' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('W' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('X' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('Y' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('Z' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('AA' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('AB' . $numrow)->applyFromArray($style_jenis_urusan);
            $sheet->getStyle('AC' . $numrow)->applyFromArray($style_jenis_urusan);
            $numrow++;

            foreach ($data['bidang_urusan'] as $bidang_urusan) {
                if ($bidang_urusan->id_jenis_urusan == $jenis_urusan->id_jenis_urusan) {
                    $sheet->setCellValue('A' . $numrow, $bidang_urusan->id_jenis_urusan);
                    $sheet->setCellValue('B' . $numrow, $bidang_urusan->id_bidang_urusan);
                    $sheet->setCellValue('F' . $numrow, $bidang_urusan->bidang_urusan);

                    $sheet->getStyle('A' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('B' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('C' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('D' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('E' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('F' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('G' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('H' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('I' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('J' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('K' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('L' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('M' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('N' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('O' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('P' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('Q' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('R' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('S' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('T' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('U' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('V' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('W' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('X' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('Y' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('Z' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('AA' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('AB' . $numrow)->applyFromArray($style_bidang_urusan);
                    $sheet->getStyle('AC' . $numrow)->applyFromArray($style_bidang_urusan);
                    $numrow++;

                    //program
                    foreach ($data['program'] as $program) {
                        $total_kinerja = 0;
                        $total_anggaran = 0;
                        if ($program->id_jenis_urusan == $jenis_urusan->id_jenis_urusan && $program->id_bidang_urusan == $bidang_urusan->id_bidang_urusan) {
                            $sheet->setCellValue('A' . $numrow, $program->id_jenis_urusan);
                            $sheet->setCellValue('B' . $numrow, $program->id_bidang_urusan);
                            $sheet->setCellValue('C' . $numrow, $program->id_program);
                            $sheet->setCellValue('F' . $numrow, $program->nama_program);
                            $sheet->setCellValue('G' . $numrow, $program->indikator_program);
                            $sheet->setCellValue('H' . $numrow, "Persen");
                            $sheet->setCellValue('I' . $numrow, 100);
                            $sheet->setCellValue('J' . $numrow, $program->ta_rpjmd);
                            //capaian kinerja dan realisasi anggaran tahun sebelumnya
                            if($program->ck2021 != NULL && $program->tk_rpjmd != NULL){
                                if($program->ck2021 != 0 && $program->tk_rpjmd != 0){
                                    $sheet->setCellValue('K' . $numrow, number_format(($program->ck2021/$program->tk_rpjmd)*100, 2));
                                }else{
                                    $sheet->setCellValue('K' . $numrow, number_format(0, 2));
                                }
                            }else{
                                $sheet->setCellValue('K' . $numrow, number_format(0, 2));
                            }

                            $sheet->setCellValue('L' . $numrow, $program->ca2021);
                            
                            if($program->tkk2022 != NULL && $program->tk_rpjmd != NULL){
                                if($program->tkk2022 != 0 && $program->tk_rpjmd != 0){
                                    $sheet->setCellValue('M' . $numrow, number_format(($program->tkk2022/$program->tk_rpjmd)*100, 2));
                                }else{
                                    $sheet->setCellValue('M' . $numrow, number_format(0, 2));
                                }
                            }else{
                                $sheet->setCellValue('M' . $numrow, number_format(0, 2));
                            }
                            
                            $sheet->setCellValue('N' . $numrow, $program->tka2022);
                            //capaian kinerja dan realisasi anggaran tw1
                            if($program->ckt12022 != NULL && $program->tk_rpjmd != NULL){
                                if($program->ckt12022 != 0 && $program->tk_rpjmd != 0){
                                    $sheet->setCellValue('O' . $numrow, number_format(($program->ckt12022/$program->tk_rpjmd)*100, 2));
                                    $total_kinerja = $total_kinerja + $program->ckt12022;
                                }else{
                                    $sheet->setCellValue('O' . $numrow, number_format(0, 2));
                                }
                            }else{
                                $sheet->setCellValue('O' . $numrow, number_format(0, 2));
                            }

                            if($program->cat12022 != NULL){
                                $sheet->setCellValue('P' . $numrow, $program->cat12022);
                                $total_anggaran = $total_anggaran + $program->cat12022;
                            }else{
                                $sheet->setCellValue('P' . $numrow, 0);
                            }
                            
                            //capaian kinerja dan realisasi anggaran tw2
                            if($program->ckt22022 != NULL && $program->tk_rpjmd != NULL){
                                if($program->ckt22022 != 0 && $program->tk_rpjmd != 0){
                                    $sheet->setCellValue('Q' . $numrow, number_format(($program->ckt22022/$program->tk_rpjmd)*100, 2));
                                    $total_kinerja = $total_kinerja + $program->ckt22022;
                                }else{
                                    $sheet->setCellValue('Q' . $numrow, number_format(0, 2));
                                }
                            }else{
                                $sheet->setCellValue('Q' . $numrow, number_format(0, 2));
                            }

                            if($program->cat22022 != NULL){
                                $sheet->setCellValue('R' . $numrow, $program->cat22022);
                                $total_anggaran = $total_anggaran + $program->cat22022;
                            }else{
                                $sheet->setCellValue('R' . $numrow, 0);
                            }
                            
                            //capaian kinerja dan realisasi anggaran tw3
                            if($program->ckt32022 != NULL && $program->tk_rpjmd != NULL){
                                if($program->ckt32022 != 0 && $program->tk_rpjmd != 0){
                                    $sheet->setCellValue('S' . $numrow, number_format(($program->ckt32022/$program->tk_rpjmd)*100, 2));
                                    $total_kinerja = $total_kinerja + $program->ckt32022;
                                }else{
                                    $sheet->setCellValue('S' . $numrow, number_format(0, 2));
                                }
                            }else{
                                $sheet->setCellValue('S' . $numrow, number_format(0, 2));
                            }

                            if($program->cat32022 != NULL){
                                $sheet->setCellValue('T' . $numrow, $program->cat32022);
                                $total_anggaran = $total_anggaran + $program->cat32022;
                            }else{
                                $sheet->setCellValue('T' . $numrow, 0);
                            }
                            
                            //capaian kinerja dan realisasi anggaran tw4
                            if($program->ckt42022 != NULL && $program->tk_rpjmd != NULL){
                                if($program->ckt42022 != 0 && $program->tk_rpjmd != 0){
                                    $sheet->setCellValue('U' . $numrow, number_format(($program->ckt42022/$program->tk_rpjmd)*100, 2));
                                    $total_kinerja = $total_kinerja + $program->ckt42022;
                                }else{
                                    $sheet->setCellValue('U' . $numrow, number_format(0, 2));
                                }
                            }else{
                                $sheet->setCellValue('U' . $numrow, number_format(0, 2));
                            }

                            if($program->cat42022 != NULL){
                                $sheet->setCellValue('V' . $numrow, $program->cat42022);
                                $total_anggaran = $total_anggaran + $program->cat42022;
                            }else{
                                $sheet->setCellValue('V' . $numrow, 0);
                            }

                             //capaian kinerja dan realisasi anggaran (total = tw1 + tw2 + tw3 + tw4)
                             if($program->tk_rpjmd != NULL){
                                if($program->tk_rpjmd != 0){
                                    $sheet->setCellValue('W' . $numrow, number_format(($total_kinerja/$program->tk_rpjmd)*100, 2));
                                }else{
                                    $sheet->setCellValue('W' . $numrow, number_format(0, 2));
                                }
                            }else{
                                $sheet->setCellValue('W' . $numrow, number_format(0, 2));
                            }

                            $sheet->setCellValue('X' . $numrow, $total_anggaran);
                            //capaian kinerja dan realisasi anggaran s/d tahun ini
                            $ckrak2022 = $total_kinerja + $program->ck2021;
                            
                            if($ckrak2022 != NULL && $program->tk_rpjmd != NULL){
                                if($ckrak2022 != 0 && $program->tk_rpjmd != 0){
                                    $sheet->setCellValue('Y' . $numrow, number_format(($ckrak2022/$program->tk_rpjmd)*100, 2));
                                }else{
                                    $sheet->setCellValue('Y' . $numrow, number_format(0, 2));
                                }
                            }else{
                                $sheet->setCellValue('Y' . $numrow, number_format(0, 2));
                            }

                            $ckraa2022 = $total_anggaran + $program->ca2021;
                            $sheet->setCellValue('Z' . $numrow, $ckraa2022);
                            //tingkat capaian kinerja dan realisasi anggaran s/d tahun ini
                            if ($ckrak2022 != NULL && $program->tk_rpjmd != NULL) {
                                if ($ckrak2022 != 0 && $program->tk_rpjmd != 0) {
                                    $sheet->setCellValue('AA' . $numrow, number_format(($ckrak2022 / $program->tk_rpjmd) * 100, 2));
                                }else{
                                    $sheet->setCellValue('AA' . $numrow, number_format(0, 2));
                                }
                            }else{
                                $sheet->setCellValue('AA' . $numrow, number_format(0, 2));
                            }

                            if ($ckraa2022 != NULL && $program->ta_rpjmd != NULL) {
                                if ($ckraa2022 != 0 && $program->ta_rpjmd != 0) {
                                    $sheet->setCellValue('AB' . $numrow, number_format(($ckraa2022 / $program->ta_rpjmd) * 100, 2));
                                }else{
                                    $sheet->setCellValue('AB' . $numrow, number_format(0, 2));
                                }
                            }else{
                                $sheet->setCellValue('AB' . $numrow, number_format(0, 2));
                            }
                            $sheet->setCellValue('AC' . $numrow, $program->opd_penanggung_jawab);

                            $sheet->getStyle('A' . $numrow)->applyFromArray($style_program);
                            $sheet->getStyle('B' . $numrow)->applyFromArray($style_program);
                            $sheet->getStyle('C' . $numrow)->applyFromArray($style_program);
                            $sheet->getStyle('D' . $numrow)->applyFromArray($style_program);
                            $sheet->getStyle('E' . $numrow)->applyFromArray($style_program);
                            $sheet->getStyle('F' . $numrow)->applyFromArray($style_program);
                            $sheet->getStyle('G' . $numrow)->applyFromArray($style_program);
                            $sheet->getStyle('H' . $numrow)->applyFromArray($style_program);
                            $sheet->getStyle('I' . $numrow)->applyFromArray($style_program);
                            $sheet->getStyle('J' . $numrow)->applyFromArray($style_program)->getNumberFormat()->setFormatCode('#,##0.00');
                            $sheet->getStyle('K' . $numrow)->applyFromArray($style_program);
                            $sheet->getStyle('L' . $numrow)->applyFromArray($style_program)->getNumberFormat()->setFormatCode('#,##0.00');
                            $sheet->getStyle('M' . $numrow)->applyFromArray($style_program);
                            $sheet->getStyle('N' . $numrow)->applyFromArray($style_program)->getNumberFormat()->setFormatCode('#,##0.00');
                            $sheet->getStyle('O' . $numrow)->applyFromArray($style_program);
                            $sheet->getStyle('P' . $numrow)->applyFromArray($style_program)->getNumberFormat()->setFormatCode('#,##0.00');
                            $sheet->getStyle('Q' . $numrow)->applyFromArray($style_program);
                            $sheet->getStyle('R' . $numrow)->applyFromArray($style_program)->getNumberFormat()->setFormatCode('#,##0.00');
                            $sheet->getStyle('S' . $numrow)->applyFromArray($style_program);
                            $sheet->getStyle('T' . $numrow)->applyFromArray($style_program)->getNumberFormat()->setFormatCode('#,##0.00');
                            $sheet->getStyle('U' . $numrow)->applyFromArray($style_program);
                            $sheet->getStyle('V' . $numrow)->applyFromArray($style_program)->getNumberFormat()->setFormatCode('#,##0.00');
                            $sheet->getStyle('W' . $numrow)->applyFromArray($style_program);
                            $sheet->getStyle('X' . $numrow)->applyFromArray($style_program)->getNumberFormat()->setFormatCode('#,##0.00');
                            $sheet->getStyle('Y' . $numrow)->applyFromArray($style_program);
                            $sheet->getStyle('Z' . $numrow)->applyFromArray($style_program)->getNumberFormat()->setFormatCode('#,##0.00');
                            if($ckrak2022 != NULL && $program->tk_rpjmd != NULL){
                                if($ckrak2022 != 0 && $program->tk_rpjmd != 0){
                                    if ((($ckrak2022 / $program->tk_rpjmd) * 100) >= 91 && (($ckrak2022 / $program->tk_rpjmd) * 100) <= 100) {
                                        $color = "0275d8";
                                    } else if ((($ckrak2022 / $program->tk_rpjmd) * 100) >= 76 && (($ckrak2022 / $program->tk_rpjmd) * 100) < 91) {
                                        $color = "5cb85c";
                                    } else if ((($ckrak2022 / $program->tk_rpjmd) * 100) >= 66 && (($ckrak2022 / $program->tk_rpjmd) * 100) < 76) {
                                        $color = "F7FF93";
                                    } else if ((($ckrak2022 / $program->tk_rpjmd) * 100) >= 51 && (($ckrak2022 / $program->tk_rpjmd) * 100) < 66) {
                                        $color = "f0ad4e";
                                    } else {
                                        $color = "d9534f";
                                    }
                                }else{
                                    $color = "d9534f";
                                }
                            }else{
                                $color = "d9534f";
                            }
                            $sheet->getStyle('AA' . $numrow)->applyFromArray($style_program);
                            $sheet->getStyle('AA' . $numrow)->applyFromArray(
                                array(
                                'fill' => [
                                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                                'color' => ['argb' => $color]
                                ])
                            );
                            if($ckraa2022 != NULL && $program->ta_rpjmd != NULL){
                                if($ckraa2022 != 0 && $program->ta_rpjmd != 0){
                                    if ((($ckraa2022 / $program->ta_rpjmd) * 100) >= 91 && (($ckraa2022 / $program->ta_rpjmd) * 100) <= 100) {
                                        $color = "0275d8";
                                    } else if ((($ckraa2022 / $program->ta_rpjmd) * 100) >= 76 && (($ckraa2022 / $program->ta_rpjmd) * 100) < 91) {
                                        $color = "5cb85c";
                                    } else if ((($ckraa2022 / $program->ta_rpjmd) * 100) >= 66 && (($ckraa2022 / $program->ta_rpjmd) * 100) < 76) {
                                        $color = "F7FF93";
                                    } else if ((($ckraa2022 / $program->ta_rpjmd) * 100) >= 51 && (($ckraa2022 / $program->ta_rpjmd) * 100) < 66) {
                                        $color = "f0ad4e";
                                    } else {
                                        $color = "d9534f";
                                    }
                                }else{
                                    $color = "d9534f";
                                }
                            }else{
                                $color = "d9534f";
                            }
                            $sheet->getStyle('AB' . $numrow)->applyFromArray($style_program);
                            $sheet->getStyle('AB' . $numrow)->applyFromArray(
                                array(
                                'fill' => [
                                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                                'color' => ['argb' => $color]
                                ])
                            );
                            $sheet->getStyle('AC' . $numrow)->applyFromArray($style_program);
                            $numrow++;

                            //kegiatan
                            foreach ($data['kegiatan'] as $kegiatan) {
                                $total_kinerja = 0;
                                $total_anggaran = 0;
                                if ($kegiatan->id_jenis_urusan == $jenis_urusan->id_jenis_urusan && $kegiatan->id_bidang_urusan == $bidang_urusan->id_bidang_urusan && $kegiatan->id_program == $program->id_program) {
                                    $sheet->setCellValue('A' . $numrow, $kegiatan->id_jenis_urusan);
                                    $sheet->setCellValue('B' . $numrow, $kegiatan->id_bidang_urusan);
                                    $sheet->setCellValue('C' . $numrow, $kegiatan->id_program);
                                    $sheet->setCellValue('D' . $numrow, $kegiatan->id_kegiatan);
                                    $sheet->setCellValue('F' . $numrow, $kegiatan->nama_kegiatan);
                                    $sheet->setCellValue('G' . $numrow, $kegiatan->indikator_kegiatan);
                                    $sheet->setCellValue('H' . $numrow, "Persen");
                                    $sheet->setCellValue('I' . $numrow, 100);
                                    $sheet->setCellValue('J' . $numrow, $kegiatan->ta_rpjmd);
                                    //capaian kinerja dan realisasi anggaran tahun sebelumnya
                                    if($kegiatan->ck2021 != NULL && $kegiatan->tk_rpjmd != NULL){
                                        if($kegiatan->ck2021 != 0 && $kegiatan->tk_rpjmd != 0){
                                            $sheet->setCellValue('K' . $numrow, number_format(($kegiatan->ck2021/$kegiatan->tk_rpjmd)*100, 2));
                                        }else{
                                            $sheet->setCellValue('K' . $numrow, number_format(0, 2));
                                        }
                                    }else{
                                        $sheet->setCellValue('K' . $numrow, number_format(0, 2));
                                    }

                                    $sheet->setCellValue('L' . $numrow, $kegiatan->ca2021);
                                    
                                    if($kegiatan->tkk2022 != NULL && $kegiatan->tk_rpjmd != NULL){
                                        if($kegiatan->tkk2022 != 0 && $kegiatan->tk_rpjmd != 0){
                                            $sheet->setCellValue('M' . $numrow, number_format(($kegiatan->tkk2022/$kegiatan->tk_rpjmd)*100, 2));
                                        }else{
                                            $sheet->setCellValue('M' . $numrow, number_format(0, 2));
                                        }
                                    }else{
                                        $sheet->setCellValue('M' . $numrow, number_format(0, 2));
                                    }

                                    $sheet->setCellValue('N' . $numrow, $kegiatan->tka2022);

                                    //capaian kinerja dan realisasi anggaran tw1
                                    if($kegiatan->ckt12022 != NULL && $kegiatan->tk_rpjmd != NULL){
                                        if($kegiatan->ckt12022 != 0 && $kegiatan->tk_rpjmd != 0){
                                            $sheet->setCellValue('O' . $numrow, number_format(($kegiatan->ckt12022/$kegiatan->tk_rpjmd)*100, 2));
                                            $total_kinerja = $total_kinerja + $kegiatan->ckt12022;
                                        }else{
                                            $sheet->setCellValue('O' . $numrow, number_format(0, 2));
                                        }
                                    }else{
                                        $sheet->setCellValue('O' . $numrow, number_format(0, 2));
                                    }

                                    if($kegiatan->cat12022 != NULL){
                                        $sheet->setCellValue('P' . $numrow, $kegiatan->cat12022);
                                        $total_anggaran = $total_anggaran + $kegiatan->cat12022;
                                    }else{
                                        $sheet->setCellValue('P' . $numrow, 0);
                                    }
                                    
                                    //capaian kinerja dan realisasi anggaran tw2
                                    if($kegiatan->ckt22022 != NULL && $kegiatan->tk_rpjmd != NULL){
                                        if($kegiatan->ckt22022 != 0 && $kegiatan->tk_rpjmd != 0){
                                            $sheet->setCellValue('Q' . $numrow, number_format(($kegiatan->ckt22022/$kegiatan->tk_rpjmd)*100, 2));
                                            $total_kinerja = $total_kinerja + $kegiatan->ckt22022;
                                        }else{
                                            $sheet->setCellValue('Q' . $numrow, number_format(0, 2));
                                        }
                                    }else{
                                        $sheet->setCellValue('Q' . $numrow, number_format(0, 2));
                                    }

                                    if($kegiatan->cat22022 != NULL){
                                        $sheet->setCellValue('R' . $numrow, $kegiatan->cat22022);
                                        $total_anggaran = $total_anggaran + $kegiatan->cat22022;
                                    }else{
                                        $sheet->setCellValue('R' . $numrow, 0);
                                    }
                                    
                                    //capaian kinerja dan realisasi anggaran tw3
                                    if($kegiatan->ckt32022 != NULL && $kegiatan->tk_rpjmd != NULL){
                                        if($kegiatan->ckt32022 != 0 && $kegiatan->tk_rpjmd != 0){
                                            $sheet->setCellValue('S' . $numrow, number_format(($kegiatan->ckt32022/$kegiatan->tk_rpjmd)*100, 2));
                                            $total_kinerja = $total_kinerja + $kegiatan->ckt32022;
                                        }else{
                                            $sheet->setCellValue('S' . $numrow, number_format(0, 2));
                                        }
                                    }else{
                                        $sheet->setCellValue('S' . $numrow, number_format(0, 2));
                                    }

                                    if($kegiatan->cat32022 != NULL){
                                        $sheet->setCellValue('T' . $numrow, $kegiatan->cat32022);
                                        $total_anggaran = $total_anggaran + $kegiatan->cat32022;
                                    }else{
                                        $sheet->setCellValue('T' . $numrow, 0);
                                    }
                                    
                                    //capaian kinerja dan realisasi anggaran tw4
                                    if($kegiatan->ckt42022 != NULL && $kegiatan->tk_rpjmd != NULL){
                                        if($kegiatan->ckt42022 != 0 && $kegiatan->tk_rpjmd != 0){
                                            $sheet->setCellValue('U' . $numrow, number_format(($kegiatan->ckt42022/$kegiatan->tk_rpjmd)*100, 2));
                                            $total_kinerja = $total_kinerja + $kegiatan->ckt42022;
                                        }else{
                                            $sheet->setCellValue('U' . $numrow, number_format(0, 2));
                                        }
                                    }else{
                                        $sheet->setCellValue('U' . $numrow, number_format(0, 2));
                                    }

                                    if($kegiatan->cat42022 != NULL){
                                        $sheet->setCellValue('V' . $numrow, $kegiatan->cat42022);
                                        $total_anggaran = $total_anggaran + $kegiatan->cat42022;
                                    }else{
                                        $sheet->setCellValue('V' . $numrow, 0);
                                    }
                                    
                                    //capaian kinerja dan realisasi anggaran (total = tw1 + tw2 + tw3 + tw4)
                                    if ($kegiatan->tk_rpjmd != NULL) {
                                        if ($kegiatan->tk_rpjmd != 0) {
                                            $sheet->setCellValue('W' . $numrow, number_format(($total_kinerja / $kegiatan->tk_rpjmd) * 100, 2));
                                        }else{
                                            $sheet->setCellValue('W' . $numrow, number_format(0, 2));
                                        }
                                    }else{
                                        $sheet->setCellValue('W' . $numrow, number_format(0, 2));
                                    }

                                    $sheet->setCellValue('X' . $numrow, $total_anggaran);

                                    //capaian kinerja dan realisasi anggaran s/d tahun ini
                                    $ckrak2022 = $total_kinerja + $kegiatan->ck2021;
                                    if ($ckrak2022 != NULL && $kegiatan->tk_rpjmd != NULL) {
                                        if ($ckrak2022 != 0 && $kegiatan->tk_rpjmd != 0) {
                                            $sheet->setCellValue('Y' . $numrow, number_format(($ckrak2022 / $kegiatan->tk_rpjmd) * 100, 2));
                                        }else{
                                            $sheet->setCellValue('Y' . $numrow, number_format(0, 2));
                                        }
                                    }else{
                                        $sheet->setCellValue('Y' . $numrow, number_format(0, 2));
                                    }

                                    $ckraa2022 = $total_anggaran + $kegiatan->ca2021;
                                    $sheet->setCellValue('Z' . $numrow, $ckraa2022);
                                    //tingkat capaian kinerja dan realisasi anggaran s/d tahun ini
                                    if ($ckrak2022 != NULL && $kegiatan->tk_rpjmd != NULL) {
                                        if ($ckrak2022 != 0 && $kegiatan->tk_rpjmd != 0) {
                                            $sheet->setCellValue('AA' . $numrow, number_format(($ckrak2022 / $kegiatan->tk_rpjmd) * 100, 2));
                                        }else{
                                            $sheet->setCellValue('AA' . $numrow, number_format(0, 2));
                                        }
                                    }else{
                                        $sheet->setCellValue('AA' . $numrow, number_format(0, 2));
                                    }

                                    if ($ckraa2022 != NULL && $kegiatan->ta_rpjmd != NULL) {
                                        if ($ckraa2022 != 0 && $kegiatan->ta_rpjmd != 0) {
                                            $sheet->setCellValue('AB' . $numrow, number_format(($ckraa2022 / $kegiatan->ta_rpjmd) * 100, 2));
                                        }else{
                                            $sheet->setCellValue('AB' . $numrow, number_format(0, 2));
                                        }
                                    }else{
                                        $sheet->setCellValue('AB' . $numrow, number_format(0, 2));
                                    }
                                    $sheet->setCellValue('AC' . $numrow, $program->opd_penanggung_jawab);

                                    $sheet->getStyle('A' . $numrow)->applyFromArray($style_kegiatan);
                                    $sheet->getStyle('B' . $numrow)->applyFromArray($style_kegiatan);
                                    $sheet->getStyle('C' . $numrow)->applyFromArray($style_kegiatan);
                                    $sheet->getStyle('D' . $numrow)->applyFromArray($style_kegiatan);
                                    $sheet->getStyle('E' . $numrow)->applyFromArray($style_kegiatan);
                                    $sheet->getStyle('F' . $numrow)->applyFromArray($style_kegiatan);
                                    $sheet->getStyle('G' . $numrow)->applyFromArray($style_kegiatan);
                                    $sheet->getStyle('H' . $numrow)->applyFromArray($style_kegiatan);
                                    $sheet->getStyle('I' . $numrow)->applyFromArray($style_kegiatan);
                                    $sheet->getStyle('J' . $numrow)->applyFromArray($style_kegiatan)->getNumberFormat()->setFormatCode('#,##0.00');
                                    $sheet->getStyle('K' . $numrow)->applyFromArray($style_kegiatan);
                                    $sheet->getStyle('L' . $numrow)->applyFromArray($style_kegiatan)->getNumberFormat()->setFormatCode('#,##0.00');
                                    $sheet->getStyle('M' . $numrow)->applyFromArray($style_kegiatan);
                                    $sheet->getStyle('N' . $numrow)->applyFromArray($style_kegiatan)->getNumberFormat()->setFormatCode('#,##0.00');
                                    $sheet->getStyle('O' . $numrow)->applyFromArray($style_kegiatan);
                                    $sheet->getStyle('P' . $numrow)->applyFromArray($style_kegiatan)->getNumberFormat()->setFormatCode('#,##0.00');
                                    $sheet->getStyle('Q' . $numrow)->applyFromArray($style_kegiatan);
                                    $sheet->getStyle('R' . $numrow)->applyFromArray($style_kegiatan)->getNumberFormat()->setFormatCode('#,##0.00');
                                    $sheet->getStyle('S' . $numrow)->applyFromArray($style_kegiatan);
                                    $sheet->getStyle('T' . $numrow)->applyFromArray($style_kegiatan)->getNumberFormat()->setFormatCode('#,##0.00');
                                    $sheet->getStyle('U' . $numrow)->applyFromArray($style_kegiatan);
                                    $sheet->getStyle('V' . $numrow)->applyFromArray($style_kegiatan)->getNumberFormat()->setFormatCode('#,##0.00');
                                    $sheet->getStyle('W' . $numrow)->applyFromArray($style_kegiatan);
                                    $sheet->getStyle('X' . $numrow)->applyFromArray($style_kegiatan)->getNumberFormat()->setFormatCode('#,##0.00');
                                    $sheet->getStyle('Y' . $numrow)->applyFromArray($style_kegiatan);
                                    $sheet->getStyle('Z' . $numrow)->applyFromArray($style_kegiatan)->getNumberFormat()->setFormatCode('#,##0.00');
                                    if($ckrak2022 != NULL && $kegiatan->tk_rpjmd != NULL){
                                        if($ckrak2022 != 0 && $kegiatan->tk_rpjmd != 0){
                                            if ((($ckrak2022 / $kegiatan->tk_rpjmd) * 100) >= 91 && (($ckrak2022 / $kegiatan->tk_rpjmd) * 100) <= 100) {
                                                $color = "0275d8";
                                            } else if ((($ckrak2022 / $kegiatan->tk_rpjmd) * 100) >= 76 && (($ckrak2022 / $kegiatan->tk_rpjmd) * 100) < 91) {
                                                $color = "5cb85c";
                                            } else if ((($ckrak2022 / $kegiatan->tk_rpjmd) * 100) >= 66 && (($ckrak2022 / $kegiatan->tk_rpjmd) * 100) < 76) {
                                                $color = "F7FF93";
                                            } else if ((($ckrak2022 / $kegiatan->tk_rpjmd) * 100) >= 51 && (($ckrak2022 / $kegiatan->tk_rpjmd) * 100) < 66) {
                                                $color = "f0ad4e";
                                            } else {
                                                $color = "d9534f";
                                            }
                                        }else{
                                            $color = "d9534f";
                                        }
                                    }else{
                                        $color = "d9534f";
                                    }
                                    $sheet->getStyle('AA' . $numrow)->applyFromArray($style_kegiatan);
                                    $sheet->getStyle('AA' . $numrow)->applyFromArray(
                                        array(
                                        'fill' => [
                                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                                        'color' => ['argb' => $color]
                                        ])
                                    );
                                    if($ckraa2022 != NULL && $kegiatan->ta_rpjmd != NULL){
                                        if($ckraa2022 != 0 && $kegiatan->ta_rpjmd != 0){
                                            if ((($ckraa2022 / $kegiatan->ta_rpjmd) * 100) >= 91 && (($ckraa2022 / $kegiatan->ta_rpjmd) * 100) <= 100) {
                                                $color = "0275d8";
                                            } else if ((($ckraa2022 / $kegiatan->ta_rpjmd) * 100) >= 76 && (($ckraa2022 / $kegiatan->ta_rpjmd) * 100) < 91) {
                                                $color = "5cb85c";
                                            } else if ((($ckraa2022 / $kegiatan->ta_rpjmd) * 100) >= 66 && (($ckraa2022 / $kegiatan->ta_rpjmd) * 100) < 76) {
                                                $color = "F7FF93";
                                            } else if ((($ckraa2022 / $kegiatan->ta_rpjmd) * 100) >= 51 && (($ckraa2022 / $kegiatan->ta_rpjmd) * 100) < 66) {
                                                $color = "f0ad4e";
                                            } else {
                                                $color = "d9534f";
                                            }
                                        }else{
                                            $color = "d9534f"; 
                                        }
                                    }else{
                                        $color = "d9534f"; 
                                    }
                                    $sheet->getStyle('AB' . $numrow)->applyFromArray($style_kegiatan);
                                    $sheet->getStyle('AB' . $numrow)->applyFromArray(
                                        array(
                                        'fill' => [
                                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                                        'color' => ['argb' => $color]
                                        ])
                                    );
                                    $sheet->getStyle('AC' . $numrow)->applyFromArray($style_kegiatan);
                                    $numrow++;

                                    //sub kegiatan
                                    foreach ($data['sub_kegiatan'] as $sub_kegiatan) {
                                        $total_kinerja = 0;
                                        $total_anggaran = 0;
                                        if ($sub_kegiatan->id_jenis_urusan == $jenis_urusan->id_jenis_urusan && $sub_kegiatan->id_bidang_urusan == $bidang_urusan->id_bidang_urusan && $sub_kegiatan->id_program == $program->id_program && $sub_kegiatan->id_kegiatan == $kegiatan->id_kegiatan) {
                                            $sheet->setCellValue('A' . $numrow, $sub_kegiatan->id_jenis_urusan);
                                            $sheet->setCellValue('B' . $numrow, $sub_kegiatan->id_bidang_urusan);
                                            $sheet->setCellValue('C' . $numrow, $sub_kegiatan->id_program);
                                            $sheet->setCellValue('D' . $numrow, $sub_kegiatan->id_kegiatan);
                                            $sheet->setCellValue('E' . $numrow, $sub_kegiatan->id_sub_kegiatan);
                                            $sheet->setCellValue('F' . $numrow, $sub_kegiatan->nama_sub_kegiatan);
                                            $sheet->setCellValue('G' . $numrow, $sub_kegiatan->indikator_sub_kegiatan);
                                            $sheet->setCellValue('H' . $numrow, $sub_kegiatan->satuan);
                                            $sheet->setCellValue('I' . $numrow, $sub_kegiatan->target_kinerja);
                                            $sheet->setCellValue('J' . $numrow, $sub_kegiatan->target_anggaran);
                                            //capaian kinerja dan realisasi anggaran tahun sebelumnya
                                            if($sub_kegiatan->ck2021 != NULL){
                                                $sheet->setCellValue('K' . $numrow, $sub_kegiatan->ck2021);
                                            }else{
                                                $sheet->setCellValue('K' . $numrow, 0);
                                            }
                                            if($sub_kegiatan->ck2021 != NULL){
                                                $sheet->setCellValue('L' . $numrow, $sub_kegiatan->ca2021);
                                            }else{
                                                $sheet->setCellValue('L' . $numrow, 0);
                                            }
                                            $sheet->setCellValue('M' . $numrow, $sub_kegiatan->tk2022);
                                            $sheet->setCellValue('N' . $numrow, $sub_kegiatan->tka2022);
                                            //capaian kinerja dan realisasi anggaran tw1
                                            if($sub_kegiatan->ckt12022 != NULL){
                                                $sheet->setCellValue('O' . $numrow, $sub_kegiatan->ckt12022);
                                                $total_kinerja = $total_kinerja + $sub_kegiatan->ckt12022;
                                            }else{
                                                $sheet->setCellValue('O' . $numrow, 0);
                                            }
                                            if($sub_kegiatan->cat12022 != NULL){
                                                $sheet->setCellValue('P' . $numrow, $sub_kegiatan->cat12022);
                                                $total_anggaran = $total_anggaran + $sub_kegiatan->cat12022;
                                            }else{
                                                $sheet->setCellValue('P' . $numrow, 0);
                                            }
                                            //capaian kinerja dan realisasi anggaran tw2
                                            if($sub_kegiatan->ckt22022 != NULL){
                                                $sheet->setCellValue('Q' . $numrow, $sub_kegiatan->ckt22022);
                                                $total_kinerja = $total_kinerja + $sub_kegiatan->ckt22022;
                                            }else{
                                                $sheet->setCellValue('Q' . $numrow, 0);
                                            }
                                            if($sub_kegiatan->cat22022 != NULL){
                                                $sheet->setCellValue('R' . $numrow, $sub_kegiatan->cat22022);
                                                $total_anggaran = $total_anggaran + $sub_kegiatan->cat22022;
                                            }else{
                                                $sheet->setCellValue('R' . $numrow, 0);
                                            }
                                            //capaian kinerja dan realisasi anggaran tw3
                                            if($sub_kegiatan->ckt32022 != NULL){
                                                $sheet->setCellValue('S' . $numrow, $sub_kegiatan->ckt32022);
                                                $total_kinerja = $total_kinerja + $sub_kegiatan->ckt32022;
                                            }else{
                                                $sheet->setCellValue('S' . $numrow, 0);
                                            }
                                            if($sub_kegiatan->cat32022 != NULL){
                                                $sheet->setCellValue('T' . $numrow, $sub_kegiatan->cat32022);
                                                $total_anggaran = $total_anggaran + $sub_kegiatan->cat32022;
                                            }else{
                                                $sheet->setCellValue('T' . $numrow, 0);
                                            }
                                            //capaian kinerja dan realisasi anggaran tw4
                                            if($sub_kegiatan->ckt42022 != NULL){
                                                $sheet->setCellValue('U' . $numrow, $sub_kegiatan->ckt42022);
                                                $total_kinerja = $total_kinerja + $sub_kegiatan->ckt42022;
                                            }else{
                                                $sheet->setCellValue('U' . $numrow, 0);
                                            }
                                            if($sub_kegiatan->cat42022 != NULL){
                                                $sheet->setCellValue('V' . $numrow, $sub_kegiatan->cat42022);
                                                $total_anggaran = $total_anggaran + $sub_kegiatan->cat42022;
                                            }else{
                                                $sheet->setCellValue('V' . $numrow, 0);
                                            }
                                            //capaian kinerja dan realisasi anggaran (total = tw1 + tw2 + tw3 + tw4)
                                            $sheet->setCellValue('W' . $numrow, $total_kinerja);
                                            $sheet->setCellValue('X' . $numrow, $total_anggaran);
                                            //capaian kinerja dan realisasi anggaran s/d tahun ini
                                            $ckrak2022 = $total_kinerja + $sub_kegiatan->ck2021;
                                            $sheet->setCellValue('Y' . $numrow, $ckrak2022);
                                            $ckraa2022 = $total_anggaran + $sub_kegiatan->ca2021;
                                            $sheet->setCellValue('Z' . $numrow, $ckraa2022);
                                            //tingkat capaian kinerja dan realisasi anggaran s/d tahun ini
                                            if($ckrak2022 != NULL && $sub_kegiatan->target_kinerja != NULL){
                                                if($ckrak2022 != 0 && $sub_kegiatan->target_kinerja != 0){
                                                    $sheet->setCellValue('AA' . $numrow, number_format(($ckrak2022/$sub_kegiatan->target_kinerja)*100, 2));
                                                }else{
                                                    $sheet->setCellValue('AA' . $numrow, number_format(0, 2));
                                                }
                                            }else{
                                                $sheet->setCellValue('AA' . $numrow, number_format(0, 2));
                                            }

                                            if ($ckraa2022 != NULL && $sub_kegiatan->target_anggaran != NULL) {
                                                if ($ckraa2022 != 0 && $sub_kegiatan->target_anggaran != 0) {
                                                    $sheet->setCellValue('AB' . $numrow, number_format(($ckraa2022 / $sub_kegiatan->target_anggaran) * 100, 2));
                                                }else{
                                                    $sheet->setCellValue('AB' . $numrow, number_format(0, 2));
                                                }
                                            }else{
                                                $sheet->setCellValue('AB' . $numrow, number_format(0, 2));
                                            }
                                            $sheet->setCellValue('AC' . $numrow, $program->opd_penanggung_jawab);

                                            $sheet->getStyle('A' . $numrow)->applyFromArray($style_sub_kegiatan);
                                            $sheet->getStyle('B' . $numrow)->applyFromArray($style_sub_kegiatan);
                                            $sheet->getStyle('C' . $numrow)->applyFromArray($style_sub_kegiatan);
                                            $sheet->getStyle('D' . $numrow)->applyFromArray($style_sub_kegiatan);
                                            $sheet->getStyle('E' . $numrow)->applyFromArray($style_sub_kegiatan);
                                            $sheet->getStyle('F' . $numrow)->applyFromArray($style_sub_kegiatan);
                                            $sheet->getStyle('G' . $numrow)->applyFromArray($style_sub_kegiatan);
                                            $sheet->getStyle('H' . $numrow)->applyFromArray($style_sub_kegiatan);
                                            $sheet->getStyle('I' . $numrow)->applyFromArray($style_sub_kegiatan);
                                            $sheet->getStyle('J' . $numrow)->applyFromArray($style_sub_kegiatan)->getNumberFormat()->setFormatCode('#,##0.00');
                                            $sheet->getStyle('K' . $numrow)->applyFromArray($style_sub_kegiatan);
                                            $sheet->getStyle('L' . $numrow)->applyFromArray($style_sub_kegiatan)->getNumberFormat()->setFormatCode('#,##0.00');
                                            $sheet->getStyle('M' . $numrow)->applyFromArray($style_sub_kegiatan);
                                            $sheet->getStyle('N' . $numrow)->applyFromArray($style_sub_kegiatan)->getNumberFormat()->setFormatCode('#,##0.00');
                                            $sheet->getStyle('O' . $numrow)->applyFromArray($style_sub_kegiatan);
                                            $sheet->getStyle('P' . $numrow)->applyFromArray($style_sub_kegiatan)->getNumberFormat()->setFormatCode('#,##0.00');
                                            $sheet->getStyle('Q' . $numrow)->applyFromArray($style_sub_kegiatan);
                                            $sheet->getStyle('R' . $numrow)->applyFromArray($style_sub_kegiatan)->getNumberFormat()->setFormatCode('#,##0.00');
                                            $sheet->getStyle('S' . $numrow)->applyFromArray($style_sub_kegiatan);
                                            $sheet->getStyle('T' . $numrow)->applyFromArray($style_sub_kegiatan)->getNumberFormat()->setFormatCode('#,##0.00');
                                            $sheet->getStyle('U' . $numrow)->applyFromArray($style_sub_kegiatan);
                                            $sheet->getStyle('V' . $numrow)->applyFromArray($style_sub_kegiatan)->getNumberFormat()->setFormatCode('#,##0.00');
                                            $sheet->getStyle('W' . $numrow)->applyFromArray($style_sub_kegiatan);
                                            $sheet->getStyle('X' . $numrow)->applyFromArray($style_sub_kegiatan)->getNumberFormat()->setFormatCode('#,##0.00');
                                            $sheet->getStyle('Y' . $numrow)->applyFromArray($style_sub_kegiatan);
                                            $sheet->getStyle('Z' . $numrow)->applyFromArray($style_sub_kegiatan)->getNumberFormat()->setFormatCode('#,##0.00');
                                            if($ckrak2022 != NULL && $sub_kegiatan->target_kinerja != NULL){
                                                if($ckrak2022 != 0 && $sub_kegiatan->target_kinerja != 0){
                                                    if ((($ckrak2022 / $sub_kegiatan->target_kinerja) * 100) >= 91 && (($ckrak2022 / $sub_kegiatan->target_kinerja) * 100) <= 100) {
                                                        $color = "0275d8";
                                                    } else if ((($ckrak2022 / $sub_kegiatan->target_kinerja) * 100) >= 76 && (($ckrak2022 / $sub_kegiatan->target_kinerja) * 100) < 91) {
                                                        $color = "5cb85c";
                                                    } else if ((($ckrak2022 / $sub_kegiatan->target_kinerja) * 100) >= 66 && (($ckrak2022 / $sub_kegiatan->target_kinerja) * 100) < 76) {
                                                        $color = "F7FF93";
                                                    } else if ((($ckrak2022 / $sub_kegiatan->target_kinerja) * 100) >= 51 && (($ckrak2022 / $sub_kegiatan->target_kinerja) * 100) < 66) {
                                                        $color = "f0ad4e";
                                                    } else {
                                                        $color = "d9534f";
                                                    }
                                                }else{
                                                    $color = "d9534f";
                                                }
                                            }else{
                                                $color = "d9534f";
                                            }
                                            $sheet->getStyle('AA' . $numrow)->applyFromArray($style_sub_kegiatan);
                                            $sheet->getStyle('AA' . $numrow)->applyFromArray(
                                                array(
                                                'fill' => [
                                                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                                                'color' => ['argb' => $color]
                                                ])
                                            );
                                            if($ckraa2022 != NULL && $sub_kegiatan->target_anggaran != NULL){
                                                if($ckraa2022 != 0 && $sub_kegiatan->target_anggaran != 0){
                                                    if ((($ckraa2022 / $sub_kegiatan->target_anggaran) * 100) >= 91 && (($ckraa2022 / $sub_kegiatan->target_anggaran) * 100) <= 100) {
                                                        $color = "0275d8";
                                                    } else if ((($ckraa2022 / $sub_kegiatan->target_anggaran) * 100) >= 76 && (($ckraa2022 / $sub_kegiatan->target_anggaran) * 100) < 91) {
                                                        $color = "5cb85c";
                                                    } else if ((($ckraa2022 / $sub_kegiatan->target_anggaran) * 100) >= 66 && (($ckraa2022 / $sub_kegiatan->target_anggaran) * 100) < 76) {
                                                        $color = "F7FF93";
                                                    } else if ((($ckraa2022 / $sub_kegiatan->target_anggaran) * 100) >= 51 && (($ckraa2022 / $sub_kegiatan->target_anggaran) * 100) < 66) {
                                                        $color = "f0ad4e";
                                                    } else {
                                                        $color = "d9534f";
                                                    }
                                                }else{
                                                    $color = "d9534f";
                                                }
                                            }else{
                                                $color = "d9534f";
                                            }
                                            $sheet->getStyle('AB' . $numrow)->applyFromArray($style_sub_kegiatan);
                                            $sheet->getStyle('AB' . $numrow)->applyFromArray(
                                                array(
                                                'fill' => [
                                                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                                                'color' => ['argb' => $color]
                                                ])
                                            );
                                            $sheet->getStyle('AC' . $numrow)->applyFromArray($style_sub_kegiatan);
                                            $numrow++;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        // // Set width kolom
        $sheet->getColumnDimension('A')->setWidth(12); // Set width kolom A
        $sheet->getColumnDimension('B')->setWidth(13);
        $sheet->getColumnDimension('C')->setWidth(8);
        $sheet->getColumnDimension('D')->setWidth(8);
        $sheet->getColumnDimension('E')->setWidth(12);
        $sheet->getColumnDimension('F')->setWidth(60);
        $sheet->getColumnDimension('G')->setWidth(77);
        $sheet->getColumnDimension('H')->setWidth(7);
        $sheet->getColumnDimension('I')->setWidth(7);
        $sheet->getColumnDimension('J')->setWidth(20);
        $sheet->getColumnDimension('K')->setWidth(7);
        $sheet->getColumnDimension('L')->setWidth(20);
        $sheet->getColumnDimension('M')->setWidth(7);
        $sheet->getColumnDimension('N')->setWidth(20);
        $sheet->getColumnDimension('O')->setWidth(7);
        $sheet->getColumnDimension('P')->setWidth(20);
        $sheet->getColumnDimension('Q')->setWidth(7);
        $sheet->getColumnDimension('R')->setWidth(20);
        $sheet->getColumnDimension('S')->setWidth(7);
        $sheet->getColumnDimension('T')->setWidth(20);
        $sheet->getColumnDimension('U')->setWidth(7);
        $sheet->getColumnDimension('V')->setWidth(20);
        $sheet->getColumnDimension('W')->setWidth(7);
        $sheet->getColumnDimension('X')->setWidth(20);
        $sheet->getColumnDimension('Y')->setWidth(7);
        $sheet->getColumnDimension('Z')->setWidth(20);
        $sheet->getColumnDimension('AA')->setWidth(7);
        $sheet->getColumnDimension('AB')->setWidth(7);
        $sheet->getColumnDimension('AC')->setWidth(25);

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $sheet->setTitle($title);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Evaluasi.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}
