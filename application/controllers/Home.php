<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

function __construct()
	{
	parent::__construct();

	$this->load->model('insert_model');
	}

    public function index(){
	
		$data['role']= $this->insert_model->getRole();
        $this->load->view('include/header_login');
        $this->load->view('home/home_view',$data);
        $this->load->view('include/footer_login');
    } 
    function sData()
    {
    	 $this->input->post('role');
    }
    function formData()
	{
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		$role	  =  $this->input->post("role");
		$chk_account = $this->insert_model->chk_account($email,$password,$role);
	}
 function logout()
 {
  $this->session->sess_destroy();
  redirect('home');
 }

}