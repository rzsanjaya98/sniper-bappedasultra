<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_indikator_makro extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function cekData($provinsi_nasional, $tahun)
    {
        $sql = "
            SELECT * FROM data_grafik WHERE provinsi_nasional = '$provinsi_nasional' 
            AND tahun = '$tahun'
        ";
        return $query = $this->db->query($sql)->result();
    }

    public function cekDataKabKota($kabkota, $tahun)
    {
        $sql = "
            SELECT * FROM data_grafik_wilayah WHERE wilayah = '$kabkota' 
            AND tahun = '$tahun'
        ";
        return $query = $this->db->query($sql)->result();
    }

    public function inputData($data)
    {
        return $this->db->insert('data_grafik', $data);
    }

    public function inputDataKabKota($data)
    {
        return $this->db->insert('data_grafik_wilayah', $data);
    }

    public function updateData($data, $param)
    {
        return  $this->db->update('data_grafik', $data, $param);
    }

    public function updateDataKabKota($data, $param)
    {
        return  $this->db->update('data_grafik_wilayah', $data, $param);
    }

    public function deleteData($param)
    {
        return $this->db->delete("data_grafik", $param);
    }

    public function deleteDataKabKota($param)
    {
        return $this->db->delete("data_grafik_wilayah", $param);
    }

    public function getData()
    {
        $sql = "
            SELECT provinsi_nasional FROM data_grafik
            WHERE provinsi_nasional != 'indonesia'
            GROUP BY provinsi_nasional
        ";
        return $query = $this->db->query($sql)->result();
    }

    public function getDataIndonesia()
    {
        $sql = "
            SELECT provinsi_nasional FROM data_grafik
            WHERE provinsi_nasional = 'indonesia'
            GROUP BY provinsi_nasional
        ";
        return $query = $this->db->query($sql)->result();
    }

    public function getDataKabKota()
    {
        $sql = "
            SELECT wilayah FROM data_grafik_wilayah
            WHERE wilayah != 'indonesia' AND wilayah != 'sulawesi tenggara'
            GROUP BY wilayah
        ";
        return $query = $this->db->query($sql)->result();
    }

    public function getIndikatorMakro($provinsi_nasional, $tahun)
    {
        $sql = "
            SELECT * FROM data_grafik
        ";

        if ($provinsi_nasional != -1 && $tahun != -1) {
            $sql .= "
                WHERE provinsi_nasional = '$provinsi_nasional'
                AND tahun = '$tahun'
            ";
        }
        return $query = $this->db->query($sql)->result();
    }

    public function getIndikatorMakroKabKota($kabkota, $tahun)
    {
        $sql = "
            SELECT * FROM data_grafik_wilayah
        ";

        if ($kabkota != -1 && $tahun != -1) {
            $sql .= "
                WHERE wilayah = '$kabkota'
                AND tahun = '$tahun'
            ";
        }
        return $query = $this->db->query($sql)->result();
    }

    public function getIndikatorMakroIndonesia()
    {
        $sql = "
            SELECT * FROM data_grafik WHERE provinsi_nasional = 'indonesia'
        ";
        return $query = $this->db->query($sql)->result();
    }
}
