<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jenis_urusan extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }


    public function getData( $data_id = -1 )
    {
        $sql = "
            SELECT * FROM jenis_urusan ORDER BY id_jenis_urusan
        ";
        if( $data_id != -1 ){
            $sql .= "
                where id_jenis_urusan = '$data_id'
            ";  
        }
        return $query = $this->db->query($sql)->result();
    }

}
