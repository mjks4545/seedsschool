<?php
class Events extends CI_Controller{
    
    // -------------------------------------------------------------------------
    
    function __construct() {
        parent::__construct();
        $session = $this->session->userdata("session_data");
        $logged_in=$session['logged_in'];
        if($logged_in==0){
            redirect(site_url()."home/");
        }
    }
    
    // -------------------------------------------------------------------------
    
    function index(){
	
	$result['data'] = $this->events_m->get();
	$this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('events/events_view',$result);
        $this->load->view('include/footer');
	
    }
    
    // -------------------------------------------------------------------------
    
    function insert(){
	
	$this->events_m->insert();
	redirect('events/');
	
    }
    
    // -------------------------------------------------------------------------
    
}