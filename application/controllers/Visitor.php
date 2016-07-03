<?php

class Visitor extends CI_Controller
{
//-------------------------------------------------------------
    function index()
    {
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('visitor/visitor_home');
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
        $result = $this->visitor_m->addvisitorpro();
        if ($result == 1) {
            $this->session->set_flashdata('msg', 'Sucessfully Added');
            $this->session->set_flashdata('type', 'success');
            redirect("visitor/viewvisitors");
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
}


?>