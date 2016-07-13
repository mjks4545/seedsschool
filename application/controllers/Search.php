<?php
class Search extends CI_Controller{
    function __construct() {
        parent::__construct();
        $session = $this->session->userdata("session_data");
        $logged_in=$session['logged_in'];
        if($logged_in==0){
            redirect(site_url()."home/");
        }
    }
//-------------------------------------------------------------------
    public function index(){
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('search/index');
        $this->load->view('include/footer');
    }
//-----------------------------------------------------------------------------
    public function std_search()
    {
       $data['result'] = $this->student_m->std_search();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('search/index',$data);
        $this->load->view('include/footer');
    }
    public function visitor_search()
    {
        $data['visitor'] =  $this->visitor_m->visitor_search();
       // echo '<pre>';print_r($data);die;
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('search/index',$data);
        $this->load->view('include/footer');
    }

}