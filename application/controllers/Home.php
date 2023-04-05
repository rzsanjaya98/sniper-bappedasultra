<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->load->view("view_utama/templates/header");
        $this->load->view("view_utama/v_utama");
        $this->load->view("view_utama/templates/footer");
    }
}
