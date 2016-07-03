<?php
class Admin extends CI_Controller{

    function index(){
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('admin/admin_home');
        $this->load->view('include/footer');

    }
  //-------------------------------------------------------------
    function invoice(){
        $this->load->view('include/header_login');
        //$this->load->view('include/sidebar');
        $this->load->view('invoice/invoice');
//        $this->load->view('include/footer');
    }
}