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
    
    public function view_visitor(){
        
        $this->db->select('*');
        $this->db->from('visitors');
        $this->db->join('users','users.u_id = visitors.fkuser_id');
        $this->db->join('countries','countries.id = users.fkcountry_id');
        $this->db->join('states','states.id = users.fkstate_id');
        $this->db->join('cities','cities.id = users.fkcity_id');
        
        $query            = $this->db->get();
        $result['result'] = $query->result();
        
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('visitor/view_visitor',$result);
        $this->load->view('include/footer');
    }

    //--------------------------------------------------------------------------
    
    public function edit_visitor( $v_id = null, $u_id = null ){
        
        $this->db->select('*');
        $this->db->from('visitors');
        $this->db->join('users','users.u_id = visitors.fkuser_id');
        $this->db->join('countries','countries.id = users.fkcountry_id');
        $this->db->join('states','states.id = users.fkstate_id');
        $this->db->join('cities','cities.id = users.fkcity_id');
        $this->db->where('visitors.v_id',$v_id);
        $this->db->where('visitors.fkuser_id',$u_id);
        
        $query            = $this->db->get();
        $result           = $query->result();
        $result['result'] = $result[0];
        
//        echo '<pre>';
//        print_r($result);
//        die();
        
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('visitor/edit_visitor',$result);
        $this->load->view('include/footer');
    }
    
    //--------------------------------------------------------------------------
    
    public function create_visitor_after_post(){
        
        $name           = $this->input->post('name');
        $father_name    = $this->input->post('father_name');
        $purpose        = $this->input->post('purpose');
        $contact        = $this->input->post('contact');
        $country        = $this->input->post('country');
        $province       = $this->input->post('province');
        $city           = $this->input->post('city');
        $address        = $this->input->post('address');
        $note           = $this->input->post('note');
        $created_at     = mdate("%y-%m-%d");
        
        $insert_users_table = $this->db->insert('users',
        [
            'name'           => $name,
            'father_name'    => $father_name,
            'contact'        => $contact,
            'fkcountry_id'   => $country,
            'fkstate_id'     => $province,
            'fkcity_id'      => $city,
            'created_at'     => $created_at
        ]);
        $user_id = $this->db->insert_id();
        
        $insert_visitors_table = $this->db->insert('visitors',
        [
            'fkuser_id'      => $user_id,
            'address'        => $address,
            'purpose'        => $purpose,
            'note'           => $note,
            'created_at'     => $created_at
        ]);
        
        redirect(site_url() . 'visitorcontroller/view_visitor');
                
    }
    
    //--------------------------------------------------------------------------
    
    public function update_visitor_after_post( $v_id = null , $u_id = null){
        

        if($v_id == null || $u_id == null){
            redirect(site_url() . 'visitorcontroller/edit_visitor');
        }else{
        $name           = $this->input->post('name');
        $father_name    = $this->input->post('father_name');
        $purpose        = $this->input->post('purpose');
        $contact        = $this->input->post('contact');
        $country        = $this->input->post('country');
        $province       = $this->input->post('province');
        $city           = $this->input->post('city');
        $address        = $this->input->post('address');
        $note           = $this->input->post('note');
        $updated_at     = mdate("%y-%m-%d");
       
         $update_users_table = $this->db->update('users',
            [
                'name'           => $name,
                'father_name'    => $father_name,
                'contact'        => $contact,
                'fkcountry_id'   => $country,
                'fkstate_id'     => $province,
                'fkcity_id'      => $city,
                'updated_at'     => $updated_at
            ],['u_id'            => $u_id]
        );
        
        $update_visitors_table = $this->db->update('visitors',
            [
                'address'        => $address,
                'purpose'        => $purpose,
                'note'           => $note,
                'updated_at'     => $updated_at
            ],['v_id'            => $v_id]
        );
    }
    redirect(site_url() . 'visitorcontroller/view_visitor');
  }
  
  //----------------------------------------------------------------------------
  
  public function delete_visitor($v_id = null , $u_id = null)
    {
        $this->db->delete('visitors',['v_id' => $v_id]);
        $this->db->delete('users',['u_id' => $u_id]);

        redirect(site_url() . 'visitorcontroller/view_visitor');
    }
    
    //--------------------------------------------------------------------------
   
}

