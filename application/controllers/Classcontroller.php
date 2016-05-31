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
	    
	    $this->db->select('*');
	    $this->db->from('class');
	    $this->db->join('subject','subject.class_id = class.class_id');
	    $this->db->join('time','time.class_id = class.class_id');
	    $this->db->join('users','users.u_id = class.fk_teacher_id');
	    $query          = $this->db->get();
	    $result         = $query->result();
	    $result['data'] = $result[0];
	    
	    //$this->load->view('include/header');
	    //$this->load->view('include/sidebar');
	    $this->load->view('classes/view_class',$result);
	    //$this->load->view('include/footer');
	    
        }
    
    //--------------------------------------------------------------------------
   
}

