<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {

        $this->load->view('include/header_login');
        $this->load->view('home_view');
        $this->load->view('include/footer_login');
    }

//-------------------------------------------------------------
    function loginpro()
    {
        $role = $this->input->post('role');
        $result = $this->main_m->loginpro();
//        echo $result;die;
        if($result==0)
        {
            $this->session->set_flashdata('error','Incorrect Email or Password or Role');
             redirect('home/index');
        }
        if($result==1){

            $this->session->set_flashdata('msg','Welcome Director Dashboard');
            $this->session->set_flashdata('type','success');
            if($role =='admin')
            {
            $this->session->set_flashdata('msg','Welcome Director Dashboard');
            $this->session->set_flashdata('type','success');                
            redirect("graphical/index");
            } 
            else if($role =='teacher')
            {
                $this->session->set_flashdata('msg','Welcome to Teacher Dashboard');
                $this->session->set_flashdata('type','success');
                redirect('admin/');
            }
            else if($role =='student')
            {
                $this->session->set_flashdata('msg','Welcome to student Dashboard');
                $this->session->set_flashdata('type','success');
                $session = $this->session->userdata('session_data');
                $id= $session['id'];
                redirect('student/studentdetails/'.$id);
            }
            else if($role == 'gatekeeper')
            {
                $this->session->set_flashdata('msg','Welcome to Gatekeeper Dashboard');
                $this->session->set_flashdata('type','success');
                redirect('gatekeeper/index');
            }
            else if($role=='receptionist')
            {
                $this->session->set_flashdata('msg','Welcome to Receptionist Dashboard');
                $this->session->set_flashdata('type','success');
                redirect('reception/index');
            }            

        }
        if($result==2){
            $this->session->set_flashdata('error','Incorrect Email or Password or Role');
             redirect('home/index');
        }
    }

    function logout()
    {
        $this->session->sess_destroy(); 
        redirect();
    }
}