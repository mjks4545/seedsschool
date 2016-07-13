<?php

class Expenses extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $session = $this->session->userdata("session_data");
        $logged_in=$session['logged_in'];
        if($logged_in==0){
            redirect(site_url()."home/");
        }
    }
//-------------------------------------------------------------------
    function index(){

    	$this->load->view('include/header');
    	$this->load->view('include/sidebar');
    	$this->load->view('expenses/expense_home');
    	$this->load->view('include/footer');
    }

    //---------------------------------------------------
    function addexpenses(){

    	$this->load->view('include/header');
    	$this->load->view('include/sidebar');
    	$this->load->view('expenses/add_expenses');
    	$this->load->view('include/footer');
    }

    //---------------------------------------------------
    function addexpensespro(){
    	$data = $this->expenses_m->addexpensespro();
    	if ($data) {
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');

    		redirect(site_url().'expenses/');
    	}else{
            $this->session->set_flashdata('msg', 'Sucessfully Added');
            $this->session->set_flashdata('type', 'success');
           redirect(site_url().'expenses/');
    	}
    }

    //---------------------------------------------------
    function viewexpenses(){
    	$data['result'] = $this->expenses_m->viewexpenses();

    	$this->load->view('include/header');
    	$this->load->view('include/sidebar');
    	$this->load->view('expenses/view_expenses',$data);
    	$this->load->view('include/footer');
    }

    function search_expenses()
    {
        $data['result']= $this->expenses_m->expenses_search();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('expenses/search_expenses',$data);
        $this->load->view('include/footer');
    }
}