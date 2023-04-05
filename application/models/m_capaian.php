<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_capaian extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function inputData($data)
    {
        return $this->db->insert('capaian_kinerja_anggaran', $data);
    }

    public function cekData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program, $id_kegiatan, $id_sub_kegiatan, $capaian_periode, $capaian_tahun)
    {
        $sql = "
            SELECT * FROM capaian_kinerja_anggaran WHERE id_jenis_urusan = '$id_jenis_urusan' 
            AND id_bidang_urusan = '$id_bidang_urusan' 
            AND id_program = '$id_program' 
            AND id_kegiatan = '$id_kegiatan' 
            AND id_sub_kegiatan = '$id_sub_kegiatan'
            AND id_opd = '$id_opd' 
            AND capaian_periode = '$capaian_periode'
            AND capaian_tahun = '$capaian_tahun'
        ";
        return $query = $this->db->query($sql)->result();
    }

    public function getData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program, $id_kegiatan, $id_sub_kegiatan, $periode, $tahun)
    {
        $sql = "
            SELECT * FROM capaian_kinerja_anggaran 
            WHERE id_jenis_urusan = '$id_jenis_urusan' 
            AND id_bidang_urusan = '$id_bidang_urusan' 
            AND id_program = '$id_program' 
            AND id_kegiatan = '$id_kegiatan' 
            AND id_sub_kegiatan = '$id_sub_kegiatan'
            AND id_opd = '$id_opd'
        ";
        if ($tahun != -1 && $periode != -1) {
            $sql .= "
                AND capaian_periode = '$periode'
                AND capaian_tahun = '$tahun'
            ";
        }else{
            $sql .= "
                ORDER BY capaian_tahun, capaian_periode DESC
            ";
        }
        return $query = $this->db->query($sql)->result();
    }

    public function getDataPerTahun($tahun)
    {
        $sql = "
            SELECT * FROM capaian_kinerja_anggaran 
            WHERE capaian_tahun = '$tahun'
        ";
        return $query = $this->db->query($sql)->result();
    }

    public function updateData($data, $param)
    {
        return  $this->db->update('capaian_kinerja_anggaran', $data, $param);
    }

    public function deleteData($param)
    {
        return $this->db->delete("capaian_kinerja_anggaran", $param);
    }

    public function count()
    {
        return $this->db->count_all("program");
    }
}
