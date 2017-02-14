<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Examination extends CI_Controller {
    
    //--------------------------------------------------------------------------
	
	function index(){
		//-----------------------------------------------------------------
 
         $t_id = $this->session->userdata['session_data']['id'];
          $role = $this->session->userdata['session_data']['role'];
            
          $data['result'] = $this->teacher_m->get_classes($t_id, $role);

          // echo "<pre>";print_r($data);die;
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('examination/v_exam_home', $data);
        $this->load->view('include/footer');
 
        }
	
    //--------------------------------------------------------------------------
	
	function make_result(){
	    
	     $co_id = $this->uri->segment('4');
	     $cl_id = $this->uri->segment('3');
	     $session_data = $this->session->userdata('session_data');
	      $t_id = $session_data["id"];
          $role = $session_data["role"];
          // echo '<pre>';
          // print_r( $session_data );
          // die( '$co_id = ' . $co_id . '$cl_id = ' . $cl_id . '$t_id = ' . $t_id  . '$role = ' . $role );
          $data['result'] = $this->Examination_m->get_student($t_id,$role,$co_id,$cl_id);
          if($data['result'] == 0){
          	$this->session->set_flashdata('msg','This class have no Student');
          	$this->session->set_flashdata('type','info');
          	redirect('examination');
          }
	   // echo '<pre>'; print_r($data);die;
	    $this->load->view('include/header');
	    $this->load->view('include/sidebar');
	    $this->load->view('examination/v_exam_add', $data);
	    $this->load->view('include/footer');
        }
         //--------------------------------------------------------------------------
	
	function submit_result(){
     	  
     	  $cl_id = $this->uri->segment('4');
     	  $co_id = $this->uri->segment('3');
     	   //echo $cl_id; echo $co_id;die;
	      $t_id = $this->session->userdata['session_data']['id'];
          $role = $this->session->userdata['session_data']['role'];
          
          $this->Examination_m->insert_result($cl_id,$co_id,$t_id,$role);

           redirect('examination/view_result/'.$cl_id);
        }
         //--------------------------------------------------------------------------
	
		function view_result()
		{
	      
			 $cl_id = $this->uri->segment('3');
     	 // $co_id = $this->uri->segment('4');
	      
          $data['result'] = $this->Examination_m->view_result($cl_id);
          if($data['result'] == 0){
          	$this->session->set_flashdata('msg','This class have no Student');
          	$this->session->set_flashdata('type','info');
          	redirect('examination');
          }
	   // echo '<pre>'; print_r($data);die;
	    $this->load->view('include/header');
	    $this->load->view('include/sidebar');
	    $this->load->view('examination/v_exam_result', $data);
	    $this->load->view('include/footer');
	    
        }

    //--------------------------------------------------------------------------
	 function result_for_student()
		{
	      
			 $student_id = $this->uri->segment('3');
			 $cl_id = $this->uri->segment('4');
     	 	 $co_id = $this->uri->segment('5');
	      
          $data['result'] = $this->Examination_m->result_for_student($student_id,$cl_id,$co_id);
          if($data['result'] == 0){
          	$this->session->set_userdata('student_message','This class have no Student');
          	redirect('examination');
          }
	   // echo '<pre>'; print_r($data);die;
	    $this->load->view('include/header');
	    $this->load->view('include/sidebar');
	    $this->load->view('examination/v_student_result', $data);
	    $this->load->view('include/footer');
	    
        }
          //--------------------------------------------------------------------------
}

