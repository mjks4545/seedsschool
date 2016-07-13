<?php

class Teacher extends CI_Controller
{
    function index()
    {
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('teacher/teacher_home');
        $this->load->view('include/footer');

    }

    //--------------------------------------------------------------------------
    function addTeacher()
    {
        $result['result'] = $this->subject_m->get();
//     echo '<pre>';print_r($result);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('teacher/addteacher', $result);
        $this->load->view('include/footer');

    }

    //--------------------------------------------------------------------------
    function teacheraddpro()
    {
        $result = $this->teacher_m->addteacherpro();
        if ($result == 1) {
            $this->session->set_flashdata('msg', 'Sucessfully Added');
            $this->session->set_flashdata('type', 'success');
            redirect("teacher/");
        }
        if ($result == 0) {
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("teacher/addteacher");
        }
    }

    //--------------------------------------------------------------------------
    function viewteacher()
    {
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['teachers'] = $this->teacher_m->viewteachers();
        $this->load->view('teacher/view_teacher', $data);
        $this->load->view('include/footer');
    }

    //--------------------------------------------------------------------------
    function viewteacherdetails()
    {
        $id = $this->uri->segment(3);
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['teachers'] = $this->teacher_m->view_teacherdetails($id);
        $data['academic'] = $this->teacher_m->academicinfo_teacher($id);
        $data['subject'] = $this->teacher_m->teacher_subject($id);
        //    echo '<pre>';print_r($data);die();
        $this->load->view('teacher/view_teacherdetails', $data);
        $this->load->view('include/footer');
    }

    //--------------------------------------------------------------------------
    function deleteteacher()
    {

        $id = $this->uri->segment(3);
        $result = $this->teacher_m->delete_teacher($id);
        if ($result == 1) {
            $this->session->set_flashdata('msg', 'Sucessfully Deleted');
            $this->session->set_flashdata('type', 'success');
            redirect("teacher/viewteacher");
        }
        if ($result == 0) {
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("teacher/viewteacher");
        }

    }

    //--------------------------------------------------------------------------
    function updateteacher()
    {
        $id = $this->uri->segment(3);
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['subject'] = $this->subject_m->get();
        $data['teachers'] = $this->teacher_m->update_teacher($id);
//       echo '<pre>';print_r($data);die();
        $this->load->view('teacher/update_teacher', $data);
        $this->load->view('include/footer');
    }

    //-------------------------------------------------------------------------
    function status()
    {
        $status = $this->uri->segment(3);
        $id = $this->uri->segment(4);
        $result=$this->teacher_m->status($status,$id);
        if($result==1){
            $this->session->set_flashdata('msg', 'Sucessfully Updated');
            $this->session->set_flashdata('type', 'success');
            redirect("teacher/viewteacher");
        }
        if($result==0){
            $this->session->set_flashdata('msg', 'There Some Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("teacher/viewteacher");
        }
    }

    //--------------------------------------------------------------------------
    function updateteacherpro()
    {
        $id = $this->uri->segment(3);
        $result = $this->teacher_m->updateteacherpro($id);
        if ($result == 1) {
            $this->session->set_flashdata('msg', 'Sucessfully Updated');
            $this->session->set_flashdata('type', 'success');
            redirect("teacher/viewteacherdetails/" . $id);
        }
        if ($result == 0) {
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("teacher/updateteacher/" . $id);
        }
    }

    function add_class()
    {
        $data['id'] = $this->uri->segment(3);
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['subjects'] = $this->subject_m->allsub();
        $this->load->view('teacher/add_class', $data);
        $this->load->view('include/footer');

    }

    //---------------------------------------------------------------
    function teacheraddclasspro()
    {
        $t_id = $this->uri->segment(3);
        $result = $this->teacher_m->teachersubjectaddpro($t_id);
        if ($result == 1) {
            $this->session->set_flashdata('msg', 'Sucessfully Inserted');
            $this->session->set_flashdata('type', 'success');
            redirect("teacher/viewteacherdetails/" . $t_id);
        }
        if ($result == 0) {
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("teacher/add_class/" . $t_id);
        }
        if ($result == 2) {
            $this->session->set_flashdata('msg', 'This Teacher Already have that Class');
            $this->session->set_flashdata('type', 'info');
            redirect("teacher/add_class/" . $t_id);
        }


    }

    //---------------------------------------------------------------
    function teachernewattendance()
    {
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['result'] = $this->teacher_m->active_teacher();
        $this->load->view('teacher/teachernewatten', $data);
        $this->load->view('include/footer');
    }

    //---------------------------------------------------------------
    function teachernewattendancepro()
    {
        $result = $this->teacher_m->teachernewattendancepro();
        if ($result == 1) {
            $this->session->set_flashdata('msg', 'Sucessfully Done');
            $this->session->set_flashdata('type', 'success');
            redirect("teacher/todayattendance");
        }
        if ($result == 0) {
            $this->session->set_flashdata('msg', 'There is Some Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("teacher/teachernewattendance");
        }
        if ($result == 2) {
            $this->session->set_flashdata('msg', 'Attendance already Taken');
            $this->session->set_flashdata('type', 'info');
            redirect("teacher/todayattendance");
        }

    }

    //---------------------------------------------------------------
    function todayattendance()
    {
        $data['attend'] = $this->teacher_m->todayattendance();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('teacher/todayattendance', $data);
        $this->load->view('include/footer');

    }

    //---------------------------------------------------------------
    function teacher_attendance_detail()
    {
        $data['teacher'] = $this->teacher_m->teacher_attendance_detail();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('teacher/teacher_attendance_detail', $data);
        $this->load->view('include/footer');
    }

    //---------------------------------------------------------------
    function teacherattendancedetailview()
    {
        $t_id = $this->uri->segment(3);
        $data['result'] = $this->teacher_m->teacher_attendance_detailview($t_id);
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('teacher/teacher_attendance_detailview', $data);
        $this->load->view('include/footer');
    }
    //---------------------------------------------------------------
    function paymentdetails(){
        $t_id = $this->uri->segment(3);
        $data['result'] = $this->teacher_m->teacher_paymentdetail($t_id);
        $data['id']=$t_id;
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('teacher/teacher_paymentdetails', $data);
        $this->load->view('include/footer');

    }
    //---------------------------------------------------------------
    function paysalary(){
        $id = $this->uri->segment(3);
        $data['result'] = $this->teacher_m->paysalary($id);
//        echo '<pre>';print_r($data);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('teacher/paysalary', $data);
        $this->load->view('include/footer');
    }
    //---------------------------------------------------------------
    function salarypaymentpro(){
        $teacher_id=$this->input->post("teacher_id");
        $data = $this->teacher_m->salarypaymentpro($teacher_id);
        $this->session->set_userdata("payment",$data);
             //echo '<pre>';print_r($data);die();

        if ($data['result'] == 1) {
//            $this->session->set_flashdata('msg', 'Sucessfully Added');
//            $this->session->set_flashdata('type', 'success');
            redirect("teacher/paymentslip/");
//            echo $id;
        }
        if ($data['result'] == 0) {
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("teacher/paymentdetails/" . $teacher_id);

        }
    }
    //----------------------------------------------------------------
    function paymentslip(){
        $paymentdetail = $this->session->userdata("payment");
         $t_id=$paymentdetail['arr']['fkteacher_id'];
        $data['teacher'] = $this->teacher_m->view_teacherdetails($t_id);
        $data['paymentdetail'] = $paymentdetail;

       // echo '<pre>';print_r($data);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('teacher/paymentslip', $data);
        $this->load->view('include/footer');


    }

    //---------------------------------------------------------------


}