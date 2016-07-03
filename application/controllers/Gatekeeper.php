<?php
class Gatekeeper extends CI_Controller{
    function index(){
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('gatekeeper/gatekeeper_home');
        $this->load->view('include/footer');

    }
}