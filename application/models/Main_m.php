<?php
class Main_m extends CI_Model
{
   

   function get_admin_data($id)
   {
    $this->db->where('id',$id);
    $qry = $this->db->get('admin');
    return $qry->result();
   } 
//---------------------------------------------------------------------
   function change_admin_password()
   {
        $id = $this->input->post('pass_id');
        $data = array(
            'pwd'=>$this->input->post('password')
            );        
        $this->db->where('id',$id);
        $this->db->update('admin',$data);
   }
   
    // -------------------------------------------------------------------------
    
    function loginpro(){
        $email =$this->input->post('email');
        $pwd = $this->input->post('password');
        $role = $this->input->post('role');
//        echo $role;die;
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
        else if($role=='student')
        {
            $this->db->where('student_email',$email);
            $this->db->where('student_pwd',$pwd);
            $query = $this->db->get("student");
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
// for student--------------------------------
            if($role=="student"){
                if($row->student_status==0){
                    return 0;
                }

                else
                {
                    $session_data = array(
                        'email'=>$email,
                        'password'=>$pwd,
                        'role'=>$role,
                        'id'=>$row->student_id,
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

    //---------------------------------------------------------
    function add_auto_montly_fee()
    {

        $this->db->select("*");
        $this->db->from("student_class_fee");
        $this->db->where("st_class_fee_status","1");
        $query = $this->db->get();
        $result = $query->result();
        foreach($result as $row){
            $scf_id=$row->classfee_id;
            $scf_tobepay=$row->to_be_pay;
            $c_month = date("m");
            $this->db->select("*");
            $this->db->from("student_payment");
            $this->db->where("fkstudentclassfee_id",$scf_id);
            $this->db->order_by("p_id","desc");
            $this->db->limit("1");
            $query1 = $this->db->get();
            if($query1->num_rows()>0) {
                $remain = 0;
                $fee = $query1->result();
                foreach ($fee as $f) {
                    $paid_month = date("m", strtotime($f->std_month));
                    $paid_year = $f->std_year;
                    $already_remain = $f->std_remain;
                    if(($paid_month!=$c_month && $paid_year==date("Y")) || ($paid_month=$c_month && $paid_year!=date("Y"))){
                        $arry = array(
                            "fkstudentclassfee_id" => $scf_id,
                            "std_payment" => $scf_tobepay,
                            "std_paid" => 0,
                            "std_remain" => ($already_remain)+($scf_tobepay),
                            "std_month" => date("M"),
                            "std_date" => date("d-M-Y"),
                            'std_year'=>date("Y"),
                            "std_reason" =>"Monthly Fee"
                        );
                        $this->db->insert("student_payment",$arry);
                    }
                }
            }/*end of if*/
            else{
                $arry = array(
                    "fkstudentclassfee_id" => $scf_id,
                    "std_payment" => $scf_tobepay,
                    "std_paid" => 0,
                    "std_remain" => $scf_tobepay,
                    "std_month" => date("M"),
                    "std_date" => date("d-M-Y"),
                    'std_year'=>date("Y"),
                    "std_reason" =>"Monthly Fee"
                );
                $this->db->insert("student_payment",$arry);
            }
        }/*end of main foreach*/
    }
    
}