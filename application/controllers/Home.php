<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index(){
	
        $this->load->view('include/header_login');
        $this->load->view('home/home_view');
        $this->load->view('include/footer_login');
	
    } 
}