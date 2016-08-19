<?php

class Visitor extends CI_Controller
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
//-------------------------------------------------------------
    function index()
    {
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['visitors'] = $this->visitor_m->viewvisitors();
        $this->load->view('visitor/visitor_home',$data);
        $this->load->view('include/footer');
    }

    //-------------------------------------------------------------
    function addvisitor()
    {
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('visitor/addvisitor');
        $this->load->view('include/footer');

    }

    //-------------------------------------------------------------
    function visitoraddpro()
    {
        $session = $this->session->userdata('session_data');
        $role = $session['role']; 

        $result = $this->visitor_m->addvisitorpro();

        if ($result == 1) {
            $this->session->set_flashdata('msg', 'Sucessfully Added');
            $this->session->set_flashdata('type', 'success');
            if($role=="admin"){
            redirect("visitor/viewvisitors");
            }else if($role=="gatekeeper")
            {
                redirect("gatekeeper/index");
            }
            else if($role=="receptionist")
            {
                redirect("reception/index");
            }
        }
        if ($result == 0) {
            $this->session->set_flashdata('msg', 'There is Some Error');
            $this->session->set_flashdata('type', 'error');
            redirect("visitor/addvisitor");
        }
    }
   //--------------------------------------------------------------------
   function viewvisitors()
   {
       $this->load->view('include/header');
       $this->load->view('include/sidebar');
       $data['visitors'] = $this->visitor_m->viewvisitors();
       $this->load->view('visitor/view_visitor',$data);
       $this->load->view('include/footer');


   }
   //--------------------------------------------------------------------
    function viewvisitordetail()
    {
        $id = $this->uri->segment(3);
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['visitor'] = $this->visitor_m->view_visitor_detail($id);
        $this->visitor_m->status($id);
        $this->load->view('visitor/view_visitor_detail',$data);
        $this->load->view('include/footer');

    }
   //--------------------------------------------------------------------
    function deletevisitor(){

        $id = $this->uri->segment(3);
        $result = $this->visitor_m->delete_visitor($id);
        if($result == 1){
            $this->session->set_flashdata('msg', 'Sucessfully Deleted');
            $this->session->set_flashdata('type', 'success');
            redirect("visitor/viewvisitors");
        }
        if($result == 0){
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("visitor/viewvisitors");
        }

    }
   //--------------------------------------------------------------------
    function totalvisitorrecord(){
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['total_visitors'] = $this->visitor_m->total_visitors();
        $data['unviewed_visitors'] = $this->visitor_m->unviewed_visitors();
        $data['viewed_visitors'] = $this->visitor_m->viewed_visitors();
        $this->load->view('visitor/total_visitor_record',$data);
        $this->load->view('include/footer');
    }
   //--------------------------------------------------------------------
    function addcommentpro($v_id){

        $result  = $this->visitor_m->addcommentpro($v_id);
        if($result == 1){
            $this->session->set_flashdata('msg', 'Sucessfully Commented');
            $this->session->set_flashdata('type', 'success');
            redirect("visitor/viewvisitordetail/".$v_id);
        }
        if($result == 0){
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("visitor/viewvisitordetail/".$v_id);
        }
    }
 //-----------------------------------------------------------------------
 function visitorhistory($vcnic)
 {
        $data['v_history'] = $this->visitor_m->visitorhistory($vcnic);
     $this->load->view('include/header');
     $this->load->view('include/sidebar');
     $this->load->view("visitor/visitorhistory",$data);
     $this->load->view('include/footer');


 }
 //------------------------------------------------------------------------
}


?>