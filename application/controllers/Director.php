<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Director extends CI_Controller
{
    
    // ----------------------------------------------------------------------
    
    public function index()
    {   
        $data['notifications']                 = $this->student_m->get_notifications();
        $result                                = $this->Director_m->get_list_of_defaulters();
        $data['result']                        = $this->Director_m->get_list_of_defaulters_15( $result );
        $data['count']                         = count($result);
        $data['good_paying']                   = $this->Director_m->good_paying_customers();
        $data['below_avg_classes']             = $this->Director_m->below_avg_classes();
        $result                                = $this->Director_m->defaulters_subject_wise();
        $data['defaulters_subject_wise']       = $result['subject_vise'];
        $data['teacher_vise']                  = $result['teacher_vise'];
        $data['daily_attandance']              = $this->Director_m->get_daily_attandance();
        $data['weekly_attandance']             = $this->Director_m->get_weekly_attandance();
        $data['student_registration_weekly']   = $this->Director_m->get_daily_student_registration();
        $data['active_deactive_students']      = $this->Director_m->active_deactive_students();
        $result                                = $this->Director_m->list_of_defaulters_since();
        $data['list_of_defaulters_since']      = $this->Director_m->list_of_defaulters_since_12($result);
        $data['level_break_up']                = $this->Director_m->level_break_up();
        $data['break_even_money']              = $this->Director_m->break_even_money();
        $data['paid_unpaid_students']          = $this->Director_m->paid_unpaid_students();
        $data['institue_wise_break_up']        = $this->Director_m->institue_wise_break_up();
        
        $this->load->view('include/header_grapical', $data);
        $this->load->view('include/sidebar');
        $this->load->view('director/director_view');
        
    }

    //-------------------------------------------------------------
   
    public function director_1()
    {
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('academic/academic_home');
        $this->load->view('include/footer');
    }

    //-------------------------------------------------------------
            
    public function read_student_notifications(){

        $this->load->model('director_m');
        $result = $this->director_m->read_student_notifications();
        // echo '<pre>';
        // print_r($result);
        // die;
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('director/read_student_notifications', $result);
        $this->load->view('include/footer');

    }        

    //-------------------------------------------------------------

    public function read_payment_notifications(){



    }        

    //-------------------------------------------------------------

    
}