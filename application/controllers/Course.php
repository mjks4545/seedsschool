<?php

class Course extends CI_Controller{
    function __construct() {
        parent::__construct();
        $session = $this->session->userdata("session_data");
        $logged_in=$session['logged_in'];
        if($logged_in==0){
            redirect(site_url()."home/");
        }
    }
  //------------------------------------
    function viewcourses(){
        $result['result'] = $this->course_m->view_courses();
//        echo '<pre>';print_r($result);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('course/view_courses',$result);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function addcourseview(){
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('course/addcourse');
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function addcoursepro(){
        $result = $this->course_m->addcoursepro();
        if($result == 1){
            $this->session->set_flashdata('msg', 'Sucessfully Added');
            $this->session->set_flashdata('type', 'success');
            redirect("course/viewcourses");
        }
        if($result == 0){
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("course/viewcourses");
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function updatecourse(){
        $id = $this->uri->segment(3);
        $result['result'] = $this->course_m->updatecourse($id);
//        echo '<pre>';print_r($result);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('course/update_course',$result);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function updatecoursepro(){
        $id = $this->uri->segment(3);
        $result = $this->course_m->updatecoursepro($id);
        if($result == 1){
            $this->session->set_flashdata('msg', 'Sucessfully Update');
            $this->session->set_flashdata('type', 'success');
            redirect("course/viewcourses");
        }
        if($result == 0){
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("course/viewcourses");
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function deletecourse(){
        $id = $this->uri->segment(3);
        $result = $this->course_m->deletecourse($id);
        if($result == 1){
            $this->session->set_flashdata('msg', 'Sucessfully Deleted');
            $this->session->set_flashdata('type', 'success');
            redirect("course/viewcourses");
        }
        if($result == 0){
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("course/viewcourses");
        }
    }

    //------------------------------------------------------------------------------------------------------------------
}