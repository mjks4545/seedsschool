<?php
class Academic extends CI_Controller{
    
    function index(){
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('academic/academic_home');
        $this->load->view('include/footer');

    }
    
}