<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_instansi_opd extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function inputData($data)
    {
        return $this->db->insert('instansi_opd', $data);
    }
    
    public function getData( $data_id = -1 )
    {
        $sql = "
            SELECT * FROM instansi_opd
        ";
        if( $data_id != -1 ){
            $sql .= "
                where id_instansi_opd = '$data_id'
            ";  
        }
        $sql .= "ORDER BY nama_instansi_opd ASC";
        return $query = $this->db->query($sql)->result();
    }

    public function getInstansi( $data_id = -1 )
    {
        $sql = "
            SELECT * FROM instansi_opd ORDER BY nama_instansi_opd ASC
        ";
        if( $data_id != -1 ){
            $sql .= "
                where id_instansi_opd = '$data_id'
            ";  
        }
        return $query = $this->db->query($sql)->result();
    }

    public function updateData( $instansi_opd, $instansi_opd_param )
    {
        return  $this->db->update('instansi_opd', $instansi_opd, $instansi_opd_param);
    }

    public function deleteData( $data_meteorologi_param )
    {
        return $this->db->delete( "instansi_opd" , $data_meteorologi_param);
    }

}
