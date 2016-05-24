<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VisitorController extends CI_Controller {
    
    public function fetch_country( $id = null ){

            $this->db->where( 'country_id' , $id );
            $query = $this->db->get( 'states' );
            $this->output->set_content_type('application_json');
            $this->output->set_output( json_encode([
                'result'   => 1,
                'success'  => 'The record is being sucess full inserted',
                'data'     => $query->result(),
                'role'     => 0

            ]) );
            return false;
        }
      
    // -------------------------------------------------------------------------
    
    public function fetch_city( $id = null ){
	
	$this->db->where( 'state_id' , $id );
	$query = $this->db->get( 'cities' );
	$this->output->set_content_type('application_json');
	$this->output->set_output( json_encode([
	    'result'   => 1,
	    'success'  => 'The record is being sucess full inserted',
	    'data'     => $query->result(),
	    'role'   => 1
	]) );
	return false;
    }
    
    //--------------------------------------------------------------------------
    
    public function add_visitor(){
        
        $query            = $this->db->get('countries');
        $result['result'] = $query->result();

        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('visitor/add_visitor',$result);
        $this->load->view('include/footer');
    }
    
    //--------------------------------------------------------------------------
    
    public function create_visitor_after_post(){
        
        $name           = $this->input->post('name');
        $father_name    = $this->input->post('father_name');
        $purpose        = $this->input->post('purpose');
        $contact        = $this->input->post('contact');
        $address        = $this->input->post('address');
        
        
        
    }
}


