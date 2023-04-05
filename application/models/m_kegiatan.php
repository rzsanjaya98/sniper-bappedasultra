<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kegiatan extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function inputData($data)
    {
        return $this->db->insert('kegiatan', $data);
    }

    public function cekData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program, $id_kegiatan)
    {
        $sql = "
            SELECT * FROM kegiatan WHERE id_opd = '$id_opd' AND id_jenis_urusan = '$id_jenis_urusan' AND id_bidang_urusan = '$id_bidang_urusan' AND id_program = '$id_program' AND id_kegiatan = '$id_kegiatan'
        ";
        return $query = $this->db->query($sql)->result();
    }

    public function getData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program, $id_kegiatan = -1)
    {
        $sql = "
            SELECT * FROM kegiatan WHERE id_opd = '$id_opd' AND id_jenis_urusan = '$id_jenis_urusan' AND id_bidang_urusan = '$id_bidang_urusan' AND id_program = '$id_program'
        ";
        if ($id_kegiatan != -1) {
            $sql .= "
                AND id_kegiatan = '$id_kegiatan'
            ";
        } else {
            $sql .= "
                ORDER BY id_kegiatan ASC
            ";
        }
        return $query = $this->db->query($sql)->result();
    }

    public function getDataKegiatanOPD($id_opd)
    {
        $sql = "
            SELECT * FROM kegiatan WHERE id_opd = '$id_opd'
        ";
        return $query = $this->db->query($sql)->result();
    }


    public function updateData($data, $param)
    {
        return  $this->db->update('kegiatan', $data, $param);
    }

    public function deleteData($param)
    {
        return $this->db->delete("kegiatan", $param);
    }

    public function count()
    {
        return $this->db->count_all("program");
    }
}
