<?php
class Main_m extends CI_Model
{
    
    // -------------------------------------------------------------------------
    
    function loginpro(){
        $email =$this->input->post('email');
        $pwd = $this->input->post('password');
        $role = $this->input->post('role');
        //echo $role;die;
        //check in database
        $this->db->select('*');
        
        if($role=='admin'){
           $this->db->where('email',$email);
           $this->db->where('pwd',$pwd); 
           $query = $this->db->get('admin');
        }
        else if($role=='teacher')
        {
            $this->db->where('email',$email);
            $this->db->where('password',$pwd); 
            $query = $this->db->get('teacher');
        }
        else if($role =="gatekeeper")
        {
            $this->db->where('email',$email);
            $this->db->where('password',$pwd); 
            $query = $this->db->get('otherstaff');
        }
        else if($role="receptionist")
        {
            $this->db->where('email',$email);
            $this->db->where('password',$pwd);
            $this->db->where('type',$role); 
            $query = $this->db->get('otherstaff');            
        }
        $num = $query->num_rows();
       
        if($num>0){
        $result = $query->result();
        foreach($result as $row){
          if($role=="admin"){  
                if($row->status==0){
                    return 0;
            }
            else
            {
                $session_data = array(
                    'email'=>$email,
                    'pwd'=>$pwd,
                    'role'=>$role,
                    'id'=>$row->id,
                    'logged_in'=>1
                );
                $session = $this->session->set_userdata('session_data',$session_data);
               return 1;
            }
        }

// for teacher--------------------------------
        if($role=="teacher"){  
                if($row->t_status==0){
                    return 0;
                    }

            else
            {
                $session_data = array(
                    'email'=>$email,
                    'password'=>$pwd,
                    'role'=>$role,
                    'id'=>$row->id,
                    'logged_in'=>1
                );
                $session = $this->session->set_userdata('session_data',$session_data);
               return 1;
            }
        }
/////  FOR GATE KEEPER////////////////////
                if($role=="gatekeeper"){  
                if($row->st_status==0){
                    return 0;
                    }

            else
            {
                $session_data = array(
                    'email'=>$email,
                    'password'=>$pwd,
                    'role'=>$role,
                    'id'=>$row->id,
                    'logged_in'=>1
                );
                $session = $this->session->set_userdata('session_data',$session_data);
               return 1;
            }
        }
////// FOR RECEPTIONIST ////////////
                  if($role=="receptionist"){  
                if($row->st_status==0){
                    return 0;
                    }

            else
            {
                $session_data = array(
                    'email'=>$email,
                    'password'=>$pwd,
                    'role'=>$role,
                    'id'=>$row->id,
                    'logged_in'=>1
                );
                $session = $this->session->set_userdata('session_data',$session_data);
               return 1;
            }
        }
 /////////////////////////             

        }
        }else{
            return 2;
        }
    }
    
  // -------------------------------------------------------------------------

    
}