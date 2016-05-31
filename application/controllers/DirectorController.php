<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DirectorController extends CI_Controller {
	function __construct()
		{
		parent::__construct();
		$this->load->model('insert_model');
	 if(!$this->session->userdata('email')){
	   redirect('home');
	  }
		}

    public function index(){
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('director/director_index');
        $this->load->view('include/footer');
    } 

}