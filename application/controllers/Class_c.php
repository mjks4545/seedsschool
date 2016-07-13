<?php

class Class_c extends CI_Controller{
    function __construct() {
        parent::__construct();
        $session = $this->session->userdata("session_data");
        $logged_in=$session['logged_in'];
        if($logged_in==0){
            redirect(site_url()."home/");
        }
    }
    
    // -------------------------------------------------------------------------
    
    function index( $id = null ){
	
	$data['result'] = $this->class_m->get( $id );
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('class/class_view',$data);
        $this->load->view('include/footer');

    }
    
    // -----------------------------------------------------------------------------------------------------------------
	function updateclasspro(){
		$id     = $this->uri->segment(3);
		$result = $this->class_m->updateclasspro($id);
		if($result == 1){
			$this->session->set_flashdata('msg', 'Sucessfully Updated');
			$this->session->set_flashdata('type', 'success');
			redirect("class_c/");
		}
		if($result == 0){
			$this->session->set_flashdata('msg', 'Error');
			$this->session->set_flashdata('type', 'danger');
			redirect("class_c/");
		}
	}

	//------------------------------------------------------------------------------------------------------------------
    
    function get_subject(){
	
	$this->output->set_content_type('application_json');
        $this->output->set_output(json_encode([
            'result'  => 1,
            'success' => 'The Student has been successfully Added',
	    'data'    => $this->subject_m->get()
        ]));
	return FALSE;
	
    }
    
    // -------------------------------------------------------------------------
    
    function get_teacher( $id = null ){
	
	$this->output->set_content_type('application_json');
        $this->output->set_output(json_encode([
            'result'  => 1,
            'success' => 'The Student has been successfully Added',
	    'data'    => $this->teacher_m->get_teacher( $id )
        ]));
	return FALSE;
	
    }
    
    // -------------------------------------------------------------------------
    
    function add(){
		$data['course'] = $this->class_m->get_course();
		$data['result'] = $this->subject_m->get();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('class/add',$data);
        $this->load->view('include/footer');

    }
    
    // -------------------------------------------------------------------------
    
    function insert(){
	
	$result = $this->class_m->insert();
	if ($result == 1) {
	     $this->session->set_flashdata('msg', 'Sucessfully Added');
	     $this->session->set_flashdata('type', 'success');
	     redirect("class_c/");
	 }
	 if ($result == 0) {
	     $this->session->set_flashdata('msg', 'There is Some Error');
	     $this->session->set_flashdata('type', 'error');
	     redirect("class_c/add");
	 }

    }
    
    // -------------------------------------------------------------------------
    function update( $id = null, $value = null ){
	
	$result = $this->class_m->update( $id, $value );
	if ($result == 1) {
	     $this->session->set_flashdata('msg', 'Status Successfully Changed');
	     $this->session->set_flashdata('type', 'success');
	     redirect( "class_c/" );
	 }
	 if ($result == 0) {
	     $this->session->set_flashdata('msg', 'There is Some Error');
	     $this->session->set_flashdata('type', 'error');
	     redirect( "class_c/" );
	 }
	 
    }

    // -----------------------------------------------------------------------------------------------------------------
	function updateclass(){
		$id                = $this->uri->segment(3);
		$result['teacher'] = $this->class_m->get_teachers();
		$result['subject'] = $this->class_m->get_subjects();
		$result['course']  = $this->course_m->view_courses();
		$result['class']   = $this->class_m->updateclass($id);

		$this->load->view('include/header');
		$this->load->view('include/sidebar');
		$this->load->view('class/update_class',$result);
		$this->load->view('include/footer');
	}

	//------------------------------------------------------------------------------------------------------------------



}