<?php

class Studentattendance extends CI_Controller
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
    function  allcourse()
    {
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['result'] = $this->student_attendance_m->allcourse();
//        echo "<pre>";print_r($data); die();
        $this->load->view('student/student_attendance/all_course', $data);
        $this->load->view('include/footer');
    }

    //---------------------------------------------------------------
    function allclass()
    {
        $session = $this->session->userdata('session_data');
        $role = $session['role'];
        $co_id = $this->uri->segment(3);
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        if($role=='admin' || $role=="receptionist"){
        $data['result'] = $this->student_attendance_m->allclass($co_id);
        }else if($role=='teacher'){
        $data['result'] = $this->student_attendance_m->allclass_t($co_id);
        }
//        echo "<pre>";print_r($data); die();
        $this->load->view('student/student_attendance/all_class', $data);
        $this->load->view('include/footer');
    }

    //---------------------------------------------------------------
    function takeattendace()
    {
        $cl_id = $this->uri->segment(3);
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['result'] = $this->student_attendance_m->takeattendance($cl_id);
//        echo "<pre>";print_r($data); die();
        $this->load->view('student/student_attendance/takeattendance', $data);
        $this->load->view('include/footer');

    }

    //------------------------------------------------------------------
    function takeattendacepro()
    {
        $result = $this->student_attendance_m->teacher_attandance();
        $co_id = $this->uri->segment(3);
        $cls_id = $this->uri->segment(4);
        $result = $this->student_attendance_m->takeattendancepro($co_id, $cls_id);
        //echo $result;
        if ($result == 1) {
            $this->session->set_flashdata('msg', 'Sucessfully Added');
            $this->session->set_flashdata('type', 'success');
            redirect(site_url() . 'studentattendance/allclass/' . $co_id);
        }
        if ($result == 0) {
            $this->session->set_flashdata('msg', 'There is Some Error');
            $this->session->set_flashdata('type', 'danger');
            redirect(site_url() . 'studentattendance/takeattendace/' . $cls_id . '/' . $co_id);
        }
        if ($result == 2) {
            $this->session->set_flashdata('msg', 'Attendance Already Taken!');
            $this->session->set_flashdata("type", 'info');
            redirect(site_url() . 'studentattendance/allclass/' . $co_id);
        }
    }

    //---------------------------------------------------------------
    function todayattendance()
    {
        $cl_id = $this->uri->segment(3);
        $co_id = $this->uri->segment(4);
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['result'] = $this->student_attendance_m->todayattendance($cl_id, $co_id);
//        echo "<pre>";print_r($data); die();
        $this->load->view('student/student_attendance/today_attendance', $data);
        $this->load->view('include/footer');
    }

    //---------------------------------------------------------------
    function classattendance()
    {
        $cl_id = $this->uri->segment(3);
        $co_id = $this->uri->segment(4);
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['co_id'] = $co_id;
        $data['result'] = $this->student_attendance_m->classattendance($cl_id, $co_id);
//        echo "<pre>";print_r($data); die();
        $this->load->view('student/student_attendance/class_attendance', $data);
        $this->load->view('include/footer');
    }

    //---------------------------------------------------------------
    function attendancedetail()
    {
        $st_id = $this->uri->segment(3);
        $cl_id = $this->uri->segment(4);
        $co_id = $this->uri->segment(5);
        $data['result']=$this->student_attendance_m->attendancedetail($st_id,$cl_id,$co_id);
//        echo "<pre>";print_r($data); die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['co_id']=$co_id;
        $data['cl_id']=$cl_id;
        $this->load->view('student/student_attendance/attendance_detail', $data);
        $this->load->view('include/footer');
    }
    //---------------------------------------------------------------
}