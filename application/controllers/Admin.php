<?php

class Admin extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $session = $this->session->userdata("session_data");
        $logged_in=$session['logged_in'];
        if($logged_in==0){
            redirect(site_url()."home/");
        }
    }
    function index()
    {
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('admin/admin_home');
        $this->load->view('include/footer');

    }

    //-------------------------------------------------------------
    function invoice()
    {
        $this->load->view('include/header_login');
        //$this->load->view('include/sidebar');
        $this->load->view('invoice/invoice');
//        $this->load->view('include/footer');
    }

    //----------------------------------------------------------
    function add_auto_montly_fee()
    {
        $this->main_m->add_auto_montly_fee();
    }
}