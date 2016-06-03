<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classcontroller extends CI_Controller {
    
    //--------------------------------------------------------------------------
	
	function index(){

        }
	
    //--------------------------------------------------------------------------
	
	function add_class(){
	    
	    $this->db->select('*');
	    $this->db->from('teachers');
	    $this->db->join('users','users.u_id = teachers.fkuser_id');
	    $query = $this->db->get();
	    $result['data'] = $query->result();
	    
	    $this->load->view('include/header');
	    $this->load->view('include/sidebar');
	    $this->load->view('classes/class_add',$result);
	    $this->load->view('include/footer');
        }

	
    //--------------------------------------------------------------------------
	
	function add_class_after_post(){
	    
	    $class_name    = $this->input->post('name');
	    $subject_name  = $this->input->post('subject');
	    $time          = $this->input->post('time');
	    $teacher_id    = $this->input->post('teacher');
	    $created_date  = mdate("%y-%m-%d");
	    
	    $insert_class_table = $this->db->insert('class',
		[
		    'class_name'        => $class_name,
		    'fk_teacher_id'     => $teacher_id,
		    'date_added'        => $created_date

		]);
	    
	    $insert_id = $this->db->insert_id();
	    
	    $insert_subject_table = $this->db->insert('subject',
		[
		    'subject_name'      => $subject_name,
		    'class_id'          => $insert_id,
		    'date_added'        => $created_date
		    
		]);
	    
	    $insert_subject_table = $this->db->insert('time',
		[
		    'time'              => $time,
		    'class_id'          => $insert_id,
		    'date_added'        => $created_date
		    
		]);
		redirect( site_url() . '/classcontroller/view_class' );
        }
    
    //--------------------------------------------------------------------------
	
	function view_class(){
	  
	  	$sql = $this->db->query("SELECT DISTINCT ClassNo FROM students ORDER BY s_id ASC");
	  	//echo '<pre>';print_r($sql);die;
	  	$students = $this->db->query("SELECT name , s_id FROM students s INNER JOIN users u ON s.fkuser_id = u.u_id");
	    $result = array('classes' => $sql , 'students' => $students);
	   // echo '<pre>';print_r($result);die;
	    $this->load->view('include/header');
	    $this->load->view('include/sidebar');
	    $this->load->view('classes/view_class',$result);
	    $this->load->view('include/footer');
	    
        }

        public function get_students()
        {
        	 $date = date("Y/m/d");
       $this->load->model('insert_model');
      	$student['view'] = $this->insert_model->getAtt($date);
        	//echo '<pre>';print_r($student);die;
        	//echo '<pre>';print_r($data);die;
        	$Id = $this->input->post("Id");
        	//echo $Id;die;
        	
        	//$sql2 = $this->db->query("SELECT * FROM std_att WHERE std_att.Att_Date = '2016/06/01' ");
/*      		echo '<pre>';
        	print_r($sql2);
        	echo '</pre>';die();*/
        	$sql = $this->db->query("SELECT * FROM students INNER JOIN users ON students.fkuser_id = users.u_id 
						WHERE students.ClassNo = ".$Id);
        	$data = array('Present' => $sql, 'students' => $student['view']);
        	echo $this->load->view("students/show_student_classes",$data , TRUE);
        }



    
    //--------------------------------------------------------------------------
   /*  public function get_students()
        {
        	$this->load->model('insert_model');
        	$student['view'] = $this->insert_model->getDailyAtt();
        	//echo '<pre>';print_r($data);die;
        	$Id = $this->input->post("Id");
        	//echo $Id;die;
        	$sql = $this->db->query("SELECT * FROM students INNER JOIN users ON students.fkuser_id = users.u_id 
					   INNER JOIN std_att ON students.s_id = std_att.Std_Id WHERE Att_Date = '".date('Y/m/d')."' AND std_att.ClassNo = ".$Id);
        	$sql1 = $this->db->query("SELECT * FROM students INNER JOIN users ON students.fkuser_id = users.u_id LEFT JOIN std_att ON students.s_id = std_att.Std_Id WHERE Attendance IS NULL AND students.ClassNo = ".$Id);
        	$student = array('Present' => $sql , 'Absent' => $sql1);
        	
        	echo $this->load->view("students/show_student_classes",$student , TRUE);
        }*/
}

