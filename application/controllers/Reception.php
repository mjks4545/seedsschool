<?php
class Reception extends CI_Controller{
    function index(){
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('reception/reception_home');
        $this->load->view('include/footer');

    }
}