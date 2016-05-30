<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AttendanceController extends CI_Controller {
    
    public function find_teacher(){
              
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('attendance/find_teacher');
        $this->load->view('include/footer');
    }
    
    //--------------------------------------------------------------------------
    
    public function find_teacher_after_post(){
        
        $teacher_id = $this->input->post('find_teacher');
        
        $this->db->select('*');
        $this->db->from('teachers');
        $this->db->where('teachers.t_id',$teacher_id);
        
        $query               = $this->db->get();
        $result              = $query->result();
        $result['result']    = $result[0];
        
//        echo '<pre>';
//        print_r($result);
//        die();
        if( empty($result['result'])){
            redirect( site_url() . 'attendancecontroller/find_teacher');
        }else{
            redirect( site_url() . 'attendancecontroller/teacher_classes',$result);
        }

    }
    
    //--------------------------------------------------------------------------
    
    public function teacher_classes(){
        
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('attendance/teacher_classes');
        $this->load->view('include/footer');
    }
}

