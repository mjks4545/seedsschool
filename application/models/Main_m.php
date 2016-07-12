<?php

class Main_m extends CI_Model
{

    // -------------------------------------------------------------------------

    function loginpro()
    {
        $email = $this->input->post('email');
        $pwd = $this->input->post('password');
        $role = $this->input->post('role');
        //check in database
        $this->db->select('*');
        $this->db->where('email', $email);
        $this->db->where('pwd', $pwd);
        if ($role == 'admin') {
            $query = $this->db->get('admin');
        }
        $num = $query->num_rows();
        if ($num > 0) {
            $result = $query->result();
            foreach ($result as $row) {
                if ($row->status == 0) {
                    return 0;
                } else {
                    $session_data = array(
                        'email' => $email,
                        'pwd' => $pwd,
                        'role' => $role,
                        'logged_in' => 1
                    );
                    $session = $this->session->set_userdata('session_data', $session_data);
                    return 1;
                }
            }
        } else {
            return 2;
        }
    }

    // -------------------------------------------------------------------------
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
                   $already_remain = $f->std_remain;
                   if($paid_month!=$c_month){
                      $arry = array(
                       "fkstudentclassfee_id" => $scf_id,
                       "std_payment" => $scf_tobepay,
                       "std_paid" => 0,
                       "std_remain" => ($already_remain)+($scf_tobepay),
                       "std_month" => date("M"),
                       "std_date" => date("d-M-Y"),
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
                   "std_reason" =>"Monthly Fee"
               );
               $this->db->insert("student_payment",$arry);
           }
       }/*end of main foreach*/
    }

}