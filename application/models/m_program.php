<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_program extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function inputData($data)
    {
        return $this->db->insert('program', $data);
    }

    // public function importData($data)
    // {
    //     return $this->db->insert_batch('data_meteorologi', $data);
    // }

    public function cekData($id_opd, $id_jenis_urusan, $id_bidang_urusan, $id_program){
        $sql = "
            SELECT * FROM program WHERE id_opd = '$id_opd' AND id_jenis_urusan = '$id_jenis_urusan' AND id_bidang_urusan = '$id_bidang_urusan' AND id_program = '$id_program'
        ";
        return $query = $this->db->query($sql)->result();
    }

    public function getData( $id_opd = -1, $id_jenis_urusan = -1, $id_bidang_urusan = -1, $id_program = -1 )
    {
        $sql = "
            SELECT * FROM program
        ";
        if( $id_jenis_urusan != -1 && $id_bidang_urusan != -1 && $id_program != -1){
            $sql .= "
                where id_opd = '$id_opd' AND id_jenis_urusan = '$id_jenis_urusan' AND id_bidang_urusan = '$id_bidang_urusan' AND id_program = '$id_program' ORDER BY id_jenis_urusan
            ";  
        }else{
            $sql .= "ORDER BY id_jenis_urusan, id_bidang_urusan, id_program";
        }
        return $query = $this->db->query($sql)->result();
    }

    // public function getDataNamaOPD( $id_jenis_urusan = -1, $id_bidang_urusan = -1, $id_program = -1 )
    // {
    //     $sql = "
    //         SELECT opd_penanggung_jawab FROM program
    //     ";
    //     if( $id_jenis_urusan != -1 && $id_bidang_urusan != -1 && $id_program != -1){
    //         $sql .= "
    //             where id_jenis_urusan = '$id_jenis_urusan' AND id_bidang_urusan = '$id_bidang_urusan' AND id_program = '$id_program' 
    //         ";  
    //     }
    //     return $query = $this->db->query($sql)->result();
    // }

    public function getDataProgramOPD( $opd )
    {
        $sql = "
            SELECT * FROM program WHERE opd_penanggung_jawab = '$opd' ORDER BY id_jenis_urusan, id_bidang_urusan, id_program
        ";
        return $query = $this->db->query($sql)->result();
    }

    // public function getDataJenisUrusan( $opd )
    // {
    //     $sql = "
    //         SELECT DISTINCT jenis_urusan FROM program WHERE opd_penanggung_jawab = '$opd'
    //     ";
    //     return $query = $this->db->query($sql)->result();
    // }

    public function getDataProgram( $kategori = "" )
    {
        $sql = "
            SELECT * FROM program WHERE kategori = '$kategori'
        ";
        return $query = $this->db->query($sql)->result();
    }

    public function getDataLimit($limit = null, $start = null)
    {
        $this->db->select('*');
        $this->db->from('program');
        // $this->db->order_by('id_program', 'asc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }


    public function updateData( $data, $param )
    {
        // $this->db->where('id_jenis_urusan', $id_jenis_urusan);
        return $this->db->update('program', $data, $param);
    }

    public function deleteData( $param )
    {
        return $this->db->delete( "program" , $param);
    }

    public function count()
    {
        // $this->db->where('status','Runing');
        return $this->db->count_all("program");
    }

    // public function clear()
    // {
    //     return $query = $this->db->query( " TRUNCATE data_meteorologi " );
    // }
}
