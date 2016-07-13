<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AttendanceController extends CI_Controller {
    function __construct() {
        parent::__construct();
        $session = $this->session->userdata("session_data");
        $logged_in=$session['logged_in'];
        if($logged_in==0){
            redirect(site_url()."home/");
        }
    }
    
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

    public function get_students()
    {
        $clas = $this->input->post("C");
        $sql = $this->db->query("SELECT name  , s_id FROM students INNER JOIN users ON students.fkuser_id = users.u_id WHERE students.ClassNo = ".$clas);
        foreach ($sql->result() as $key) {
            echo '<option value="'.$key->s_id.'">'.$key->name.'</option>';
        }
    }

    public function get_student_att()
    {
        //$clas = $this->input->post('C');
        $std = $this->input->post('S');
        $date = $this->input->post('D');
        if ($date != "") {
        $sql = $this->db->query("SELECT name , Attendance , Att_Date FROM students s INNER JOIN users u On s.fkuser_id = u.u_id INNER JOIN std_att sa ON s.s_id = sa.Std_Id WHERE sa.Std_Id = ".$std." AND sa.Att_Date = '".$date."'");
        }
        else
        {
        $sql = $this->db->query("SELECT name , Attendance , Att_Date FROM students s INNER JOIN users u On s.fkuser_id = u.u_id INNER JOIN std_att sa ON s.s_id = sa.Std_Id WHERE sa.Std_Id = ".$std);
        }
        $data = array('Att'=>$sql);
        echo $this->load->view('students/student_attendance_record' , $data , TRUE);
   }

    function attendence()
    {
 
        $rollno = $this->input->post('RollNo');
        $attendence = $this->input->post('atte');
        $ClassNo = $this->input->post('ClassNo');
        $date = date("Y-m-d");
        $data = array(
            'Std_Id'=>$rollno,
            'Att_Date'=>$date,
            'Attendance'=>$attendence,
            'ClassNo'=>$ClassNo
            );
        $this->load->model('insert_model');
        echo $this->insert_model->insertAtt($data);

    }
  function showAllAtt()
    {
        $id = $this->uri->segment(3);
        $this->load->model('insert_model');
        $data['Attendance'] = $this->insert_model->GetAllAtt($id);
          $this->load->view('include/header');
           $this->load->view('include/sidebar');
        $this->load->view('attendance/showAllAtt',$data);
        $this->load->view('include/footer');

    }  

 function seeDailyAtt()
 {
    $id = $this->uri->segment(3);
    $date = date('Y-m-d');
    $this->load->model('insert_model');
    $data['attendance']  = $this->insert_model->getTodayAtt($date,$id);
     $this->load->view('include/header');
     $this->load->view('include/sidebar');
   $this->load->view('attendance/todayAtt',$data);
      $this->load->view('include/footer');

 }    
}


