<?php
class Main_m extends CI_Model
{
    
    // -------------------------------------------------------------------------
    
    function loginpro(){
        $email =$this->input->post('email');
        $pwd = $this->input->post('password');
        $role = $this->input->post('role');
        //check in database
        $this->db->select('*');
        $this->db->where('email',$email);
        $this->db->where('pwd',$pwd);
        if($role=='admin'){
           $query = $this->db->get('admin');
        }
        $num = $query->num_rows();
        if($num>0){
        $result = $query->result();
        foreach($result as $row){
            if($row->status==0){
                return 0;
            }
            else
            {
                $session_data = array(
                    'email'=>$email,
                    'pwd'=>$pwd,
                    'role'=>$role,
                    'logged_in'=>1
                );
                $session = $this->session->set_userdata('session_data',$session_data);
               return 1;
            }
        }
        }else{
            return 2;
        }
    }
    
  // -------------------------------------------------------------------------

    
}