<?php

class Subject extends CI_Controller{
    function __construct() {
        parent::__construct();
        $session = $this->session->userdata("session_data");
        $logged_in=$session['logged_in'];
        if($logged_in==0){
            redirect(site_url()."home/");
        }
    }
//-------------------------------------------------------------------
	// -------------------------------------------------------------------------

	function index(){

		$data['result'] = $this->subject_m->get();
		$this->load->view('include/header');
		$this->load->view('include/sidebar');
		$this->load->view('subject/subject_view',$data);
		$this->load->view('include/footer');

	}

	// -------------------------------------------------------------------------

	function add(){

		$this->load->view('include/header');
		$this->load->view('include/sidebar');
		$this->load->view('subject/add');
		$this->load->view('include/footer');

	}

	// -------------------------------------------------------------------------

	function insert(){

		$result = $this->subject_m->insert();
		if ($result == 1) {
			$this->session->set_flashdata('msg', 'Sucessfully Added');
			$this->session->set_flashdata('type', 'success');
			redirect("subject/");
		}
		if ($result == 0) {
			$this->session->set_flashdata('msg', 'There is Some Error');
			$this->session->set_flashdata('type', 'danger');
			redirect("subject/add");
		}
		if ($result == 2) {
			$this->session->set_flashdata('msg', 'Subject Already Exists');
			$this->session->set_flashdata('type', 'warning');
			redirect("subject/add");
		}

	}

	// -------------------------------------------------------------------------

	function edit( $id = null ){

		$result['data'] = $this->subject_m->get($id);
		$this->load->view('include/header');
		$this->load->view('include/sidebar');
		$this->load->view('subject/edit',$result);
		$this->load->view('include/footer');

	}

	// -------------------------------------------------------------------------

	function update( $id = null ){

		$result = $this->subject_m->update( $id );
		if ($result == 1) {
			$this->session->set_flashdata('msg', 'Sucessfully Updated');
			$this->session->set_flashdata('type', 'success');
			redirect("subject/");
		}
		if ($result == 0) {
			$this->session->set_flashdata('msg', 'There is Some Error');
			$this->session->set_flashdata('type', 'error');
			redirect("subject/edit" . '/'. $id);
		}

	}

	// -------------------------------------------------------------------------

	function delete( $id = null ){

		$result = $this->subject_m->delete( $id );
		if ($result == 1) {
			$this->session->set_flashdata('msg', 'Sucessfully Deleted');
			$this->session->set_flashdata('type', 'success');
			redirect( "subject/" );
		}
		if ($result == 0) {
			$this->session->set_flashdata('msg', 'There is Some Error');
			$this->session->set_flashdata('type', 'error');
			redirect( "subject/" );
		}

	}

	// -------------------------------------------------------------------------



}