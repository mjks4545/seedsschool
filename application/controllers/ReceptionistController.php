<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function __construct()
		{
		parent::__construct();
		$this->load->model('insert_model');
	 if(!$this->session->userdata('email')){
	   redirect('home');
	  }
		}
class ReceptionistController extends CI_Controller {

      public function index(){
       
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('receptionist/reception_index');
        $this->load->view('include/footer');
    }
}

