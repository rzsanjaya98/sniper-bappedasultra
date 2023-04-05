<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_target extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function inputData($data)
    {
        return $this->db->insert('target_kinerja_anggaran', $data);
    }

    public function cekData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program, $id_kegiatan, $id_sub_kegiatan, $target_tahun)
    {
        $sql = "
            SELECT * FROM target_kinerja_anggaran WHERE id_jenis_urusan = '$id_jenis_urusan' 
            AND id_bidang_urusan = '$id_bidang_urusan' 
            AND id_program = '$id_program' 
            AND id_kegiatan = '$id_kegiatan' 
            AND id_sub_kegiatan = '$id_sub_kegiatan'
            AND id_opd = '$id_opd'
            AND target_tahun = '$target_tahun'
        ";
        return $query = $this->db->query($sql)->result();
    }

    public function getData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program, $id_kegiatan, $id_sub_kegiatan, $tahun)
    {
        $sql = "
            SELECT * FROM target_kinerja_anggaran 
            WHERE id_jenis_urusan = '$id_jenis_urusan' 
            AND id_bidang_urusan = '$id_bidang_urusan' 
            AND id_program = '$id_program' 
            AND id_kegiatan = '$id_kegiatan' 
            AND id_sub_kegiatan = '$id_sub_kegiatan'
            AND id_opd = '$id_opd'
        ";
        if ($tahun != -1) {
            $sql .= "
                AND target_tahun = '$tahun'
            ";
        }else{
            $sql .= "
                ORDER BY target_tahun DESC
            ";
        }
        return $query = $this->db->query($sql)->result();
    }

    public function getDataTarget($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program, $id_kegiatan, $id_sub_kegiatan, $tahun)
    {
        $sql = "
            SELECT SUM(target_anggaran) as jumlah_anggaran, 
            SUM(target_kinerja) as jumlah_kinerja 
            FROM target_kinerja_anggaran
            WHERE id_jenis_urusan = '$id_jenis_urusan' 
            AND id_bidang_urusan = '$id_bidang_urusan' 
            AND id_program = '$id_program' 
            AND id_kegiatan = '$id_kegiatan' 
            AND id_sub_kegiatan = '$id_sub_kegiatan'
            AND id_opd = '$id_opd'   
        ";
        if ($tahun != -1) {
            $sql .= "
                AND target_tahun != '$tahun'
            ";
        }
        return $query = $this->db->query($sql)->result();
    }

    public function getDataPerTahun($tahun)
    {
        $sql = "
            SELECT * FROM target_kinerja_anggaran 
            WHERE target_tahun = '$tahun'
            ";

        return $query = $this->db->query($sql)->result();
    }

    public function updateData($data, $param)
    {
        return  $this->db->update('target_kinerja_anggaran', $data, $param);
    }

    public function deleteData($param)
    {
        return $this->db->delete("target_kinerja_anggaran", $param);
    }

    // public function count()
    // {
    //     return $this->db->count_all("program");
    // }

}
