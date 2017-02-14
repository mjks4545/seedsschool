<?php

class Academic extends CI_Controller{
    
    // --------------------------------------------------
    
    function __construct() {
        parent::__construct();
        $session = $this->session->userdata("session_data");
        $logged_in=$session['logged_in'];
        if($logged_in==0){
            redirect(site_url()."home/");
        }
    }
    
    // -----------------------------------------------------
    
    function index(){
        
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('academic/academic_home');
        $this->load->view('include/footer');

    }
    
    // -------------------------------------------------------

    function get_notification(){

        return $this->student_m->get_notifications;

    }

    // -------------------------------------------------------
}