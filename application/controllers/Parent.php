<?php
class Parent extends CI_Controller{
    // function __construct() {
    //     parent::__construct();
    //     $session = $this->session->userdata("session_data");
    //     $logged_in=$session['logged_in'];
    //     if($logged_in==0){
    //         redirect(site_url()."home/");
    //     }
    // }
//-------------------------------------------------------------------
    function index(){
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/studentdetails');
        $this->load->view('include/footer');

    }
}