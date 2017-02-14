<?php

class Teacher extends CI_Controller
{
    
    //---------------------------------------------------------------
    
    function __construct() {
        parent::__construct();
        $session = $this->session->userdata("session_data");
        $logged_in=$session['logged_in'];
        if($logged_in==0){
            redirect(site_url()."home/");
        }
    }
    
    //-------------------------------------------------------------------
    
    function index()
    {
        $data['teachers'] = $this->teacher_m->viewteachers();
        // echo '<pre>';
        // print_r($data);
        // die;
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('teacher/teacher_home',$data);
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
        $data['result'] = $this->teacher_m->teacher_paymentdetail($id);
        $this->load->view('teacher/view_teacherdetails', $data);
        $this->load->view('include/footer');
    }
    
    //---------------------------------------------------------------
    
    function deleteSubjectTeacher()
    {
        $subID = $this->uri->segment(3);
        $teaID = $this->uri->segment(4);
        $this->teacher_m->deleteSubjectTeacher($subID, $teaID);
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
    
    //---------------------------------------------------------------    
    
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
        $cl_id = $this->uri->segment(4);
        $data['result'] = $this->teacher_m->teacher_attendance_detailview($t_id,$cl_id);
//        echo "<pre>";print_r($data); die;
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
        //echo '<pre>';print_r($data);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('teacher/paysalary', $data);
        $this->load->view('include/footer');
    }
    
    //---------------------------------------------------------------
    
    function salarypaymentpro(){
        $teacher_id=$this->input->post("teacher_id");
        $data['teacher'] = $this->teacher_m->view_teacherdetails($teacher_id);
        $data['paymentdetail'] = $this->teacher_m->salarypaymentpro($teacher_id);
        /*echo "<pre>";
        print_r($result);
        die;*/
        if ($data['paymentdetail']['result'] == 1) {
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
           //   echo "<pre>";print_r($data); die();

            $this->load->view('teacher/paymentslip',$data);
            $this->load->view('include/footer');
//            echo $id;
        }
        if ($data['paymentdetail'] == 0) {
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("teacher/paymentdetails/" . $teacher_id);

        }
    }
    
    //---------------------------------------------------------------
    
    function teacherclasses($t_id)
    {
        $data['class']=$this->teacher_m->teacherclasses($t_id);
//        echo "<pre>";print_r($data);die;
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('teacher/teacherclasses', $data);
        $this->load->view('include/footer');
    }
    
    //---------------------------------------------------------------

    function change_teacher_password()
    {
        $id = $this->input->post('pass_id');

        $data = $this->teacher_m->change_teacher_password();
        redirect('teacher/viewteacherdetails/'.$id);
    }
    
    //----------------------------------------------------------------

    function get_all_classes()
    {
         $t_id = $this->session->userdata['session_data']['id'];
          $role = $this->session->userdata['session_data']['role'];
            
          $data['result'] = $this->teacher_m->get_classes($t_id, $role);

          // echo "<pre>";print_r($data);die;
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('teacher/v_allclasses', $data);
        $this->load->view('include/footer');
    }
    
    //----------------------------------------------------------------

    function syllabus($class_id)
    {
         
           
          $data['syllabus'] = $this->teacher_m->get_syllabus($class_id);

           //echo "<pre>";print_r($data['syllabus']);die;
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('teacher/v_classsyllabus', $data);
        $this->load->view('include/footer');
    }
    
    //----------------------------------------------------------------

    function add_syllabus()
    {
         
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('teacher/v_addsyllabus', $data);
        $this->load->view('include/footer');
    }
    
    //----------------------------------------------------------------

    function insert_syllabus()
    {
         $t_id = $this->session->userdata['session_data']['id'];
         // $role = $this->session->userdata['session_data']['role'];
          $cl_id=$this->uri->segment(3);
        
        $data = array(
                        'syllabus_title'       => $this->input->post('syllabus_title') , 
                        'syllabus_description' => $this->input->post('syllabus_description'),
                        'fkclass_id'           => $cl_id,
                        'sys_date'             => date('d-M-Y')  
                     );
            $this->teacher_m->insert_syllabus($data);

        $t_id = $this->session->userdata['session_data']['id'];
        $role = $this->session->userdata['session_data']['role'];
            
        $data['result'] = $this->teacher_m->get_classes($t_id, $role);
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('teacher/v_allclasses', $data);
        $this->load->view('include/footer');
         
    }
    
    //-----------------------------------------------------------------

    public function take_teacher_attendance(){
         $t_id = $this->session->userdata['session_data']['id'];
          $role = $this->session->userdata['session_data']['role'];
            
          $data['result'] = $this->teacher_m->get_classes($t_id, $role);

          // echo "<pre>";print_r($data);die;
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('teacher/v_take_attendance', $data);
        $this->load->view('include/footer');


    }
    
    //---------------------------------------------------------------
    
    function take_attendace()
    {

        $cl_id = $this->uri->segment(3);
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['result'] = $this->teacher_m->take_student_attendance($cl_id);
       // echo "<pre>";print_r($data); die();
        $this->load->view('teacher/student_attendance', $data);
        $this->load->view('include/footer');

    }
    
    //---------------------------------------------------------------
    
    function  submit_student_attendance()
    {
       
        // echo '<pre>';
        // print_r( $_POST );
        // die;
        // print_r($date);die;
       $result = $this->student_attendance_m->teacher_attandance();
       // print_r($result);die;
        $co_id = $this->uri->segment(3);
        $cls_id = $this->uri->segment(4);
        $result = $this->student_attendance_m->takeattendancepro($co_id, $cls_id);
        // print_r($result);die;
        if ($result == 1) {
            // echo '1';die;
            $this->session->set_flashdata('msg', 'Sucessfully Added');
            $this->session->set_flashdata('type', 'success');
            redirect(site_url() . 'teacher/take_teacher_attendance/' . $co_id);
        }
        if ($result == 0) {
            // echo '2';die;
            $this->session->set_flashdata('msg', 'There is Some Error');
            $this->session->set_flashdata('type', 'danger');
            redirect(site_url() . 'teacher/take_attendance/' . $cls_id . '/' . $co_id);
        }
        if ($result == 2) {
            // echo '3';die;
            $this->session->set_flashdata('msg', 'Attendance Already Taken!');
            $this->session->set_flashdata("type", 'info');
            redirect(site_url() . 'teacher/take_teacher_attendance/' . $co_id);
        }

    }
    
    //---------------------------------------------------------------
    
    function view_student_attendance()
    {
        $cl_id = $this->uri->segment(3);
         $t_id = $this->session->userdata['session_data']['id'];

        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['result'] = $this->teacher_m->view_student_attendance($cl_id, $t_id);
       //echo "<pre>";print_r($data); die();
        $this->load->view('teacher/view_student_attendance', $data);
        $this->load->view('include/footer');

    }
    
    //---------------------------------------------------------------
    
    function search_student_attendance()
    {
        // print_r( $_POST );die();
        $t_id = $this->session->userdata['session_data']['id'];
        $cl_id = $this->input->post('cl_id');
        $date = $this->input->post('date');
        $new_date = date('d-M-Y',strtotime($date));
        
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['result'] = $this->teacher_m->search_student_attendance($cl_id, $t_id, $new_date);
       //echo "<pre>";print_r($data); die();
        $this->load->view('teacher/view_student_attendance', $data);
        $this->load->view('include/footer');

    }

    // -----------------------------------------------------------------
    
    public function editSubjectTeacher( $teacher_subject_id, $teacher_id ){

        $data['result'] = $this->teacher_m->editSubjectTeacher( $teacher_subject_id, $teacher_id );
        $data['subjects'] = $this->subject_m->allsub(); 
        // echo '<pre>';
        // print_r( $data );
        // die;
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('teacher/edit_teacher_subject', $data);
        $this->load->view('include/footer');

    }

    // -----------------------------------------------------------------

    public function editSubjectTeacherpro()
    {
        $tea_id = $this->uri->segment(3);
        $sub_id = $this->uri->segment(4);
        $this->teacher_m->editSubjectTeacherpro($tea_id, $sub_id);
    }
    
    // ------------------------------------------------------------------
    
    public function teacher_payments(){
        
        // echo '<pre>';
        // print_r( $_POST );
        // die;
        $result = $this->teacher_m->teacher_payments();
        if( $result ){
            echo 'successfully done';
        }else{
            echo 'there was some problem';
        }
        redirect( site_url() . 'teacher/paymentslip' );
    }
    // ------------------------------------------------------------------

    public function paymentslip(){

        $result           = $this->session->userdata('student');
        $data['result']   = $this->teacher_m->paymentslip($result);
        // echo '<pre>';
        // print_r($data);
        // die;
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('teacher/paymentslip',$data);
        $this->load->view('include/footer');

    } 

    // ------------------------------------------------------------------
    
    public function get_teacher_futherdetails( $id ){
       
        $result['teachers'] = $this->teacher_m->get_teacher_futherdetails( $id );
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('teacher/teacher_payment_student_detailed',$result);
        $this->load->view('include/footer');
        
    }
    
    // ------------------------------------------------------------------

}