<?php

class Studentpayment_m extends CI_Model
{

    function viewstd()
    {
        $this->db->select("*");
        $this->db->from("student_class_fee");
//        $this->db->where("st_class_fee_status",1);
        $this->db->group_by("fkstudent_id");
        $this->db->join("student", "student.student_id=student_class_fee.fkstudent_id");
        $this->db->where("student_status", 1);
        $query = $this->db->get();
        return $query->result();
    }

    //---------------------------------------------------------------
    function studentclass($st_id)
    {
        $this->db->select("*");
        $this->db->from("student_class_fee");
        $this->db->where("fkstudent_id", $st_id);
        $this->db->join("student", "student.student_id=student_class_fee.fkstudent_id");
        $this->db->join("class", "class.cl_id=student_class_fee.fkclass_id");
        $this->db->join("subject", "subject.su_id=class.su_id");
        $query = $this->db->get();
        return $query->result();
    }

    //---------------------------------------------------------------
    function checkad($st_id,$classfee_id)
    {
        $this->db->select("*");
        $this->db->from("student_payment");
        $this->db->join("student_class_fee", "student_class_fee.classfee_id=student_payment.fkstudentclassfee_id");
        $this->db->join("student", "student.student_id=student_class_fee.fkstudent_id");
        $this->db->join("class", "class.cl_id=student_class_fee.fkclass_id");
        $this->db->where("class_status",1);
        $this->db->where("fkstudent_id", $st_id);
        $this->db->where("fkstudentclassfee_id", $classfee_id);
        $query = $this->db->get();
        return $query->num_rows();
    }
    //---------------------------------------------------------------
    function paynow($classfee_id)
    {
        $this->db->select("*");
        $this->db->from("student_class_fee");
        $this->db->where("classfee_id",$classfee_id);
        $this->db->join("student", "student.student_id=student_class_fee.fkstudent_id");
        $this->db->join("student_payment", "student_payment.fkstudentclassfee_id=student_class_fee.classfee_id");
        $this->db->join("class", "class.cl_id=student_class_fee.fkclass_id");
        $this->db->order_by('p_id','desc');
        $this->db->limit('1');
        $query = $this->db->get();
        $num = $query->num_rows();
        if($num==0){
            $this->db->select("*");
            $this->db->from("student_class_fee");
            $this->db->where("classfee_id", $classfee_id);
            $this->db->join("student", "student.student_id=student_class_fee.fkstudent_id");
            $this->db->join("class", "class.cl_id=student_class_fee.fkclass_id");
            $query = $this->db->get();
        }
        return $query->result();
    }
    //---------------------------------------------------------------
    function paymonthlyfeepro()
    {
        $fkclass_id=$this->input->post('fkclass_id');
        $std_payment=$this->input->post('total');
        $std_paid=$this->input->post('amountpay');
        $std_month=$this->input->post('month');
        $std_reason=$this->input->post('reason');
        $std_date=date('d-M-Y');
// for cheking if they have already a remaining balnce
        $this->db->select("*");
        $this->db->from("student_payment");
        $this->db->where('fkstudentclassfee_id',$fkclass_id);
        $this->db->order_by('p_id','desc');
        $this->db->limit('1');
        $query=$this->db->get();
        $result=$query->result();
        $num = $query->num_rows();
        if($num>0 && ($result[0]->std_month==$std_month)) {
            $std_remain = ($result[0]->std_remain) - ($std_paid);
            $inser_array = array(
                'fkstudentclassfee_id' => $fkclass_id,
                'std_payment' => $result[0]->std_remain,
                'std_paid' => $std_paid,
                'std_remain' => $std_remain,
                'std_month' => $std_month,
                'std_date' => $std_date,
                'std_reason' => $std_reason,
            );

            $result_1 = $this->db->insert('student_payment', $inser_array);
        }
        else{
            $std_remain = $std_payment - ($std_paid);
            $inser_array = array(
                'fkstudentclassfee_id' => $fkclass_id,
                'std_payment' => $std_payment,
                'std_paid' => $std_paid,
                'std_remain' => $std_remain,
                'std_month' => $std_month,
                'std_date' => $std_date,
                'std_reason' => $std_reason,
            );
            $result_1 = $this->db->insert('student_payment', $inser_array);
        }
        if ($result_1){
            return $result_1;
        }else{
            return 0;
        }
    }
    //----------------------------------------------------------------------------
    function classpaymentdetail($class_id,$std_id){
        $this->db->select('*');
        $this->db->from('student_payment');
        $this->db->join('student_class_fee','student_class_fee.classfee_id=student_payment.fkstudentclassfee_id');
        $this->db->where('fkstudent_id',$std_id);
        $this->db->where('fkstudentclassfee_id',$class_id);
        $query=$this->db->get();
        $result=$query->result();
        if ($result){
            return $result;
        }else{
            return 0;
        }
    }

    //------------------------------------------------------------------------------
    function otherpaycheckad($std_id){
        $this->db->select('*');
        $this->db->from('student_class_fee');
        $this->db->where('student_class_fee.fkstudent_id',$std_id);
        $this->db->join('student_other_payment','student_other_payment.fkstudent_id=student_class_fee.fkstudent_id');

        $query=$this->db->get();
        return $query->num_rows();
    }
    //------------------------------------------------------------------------------
    function otherpay($std_id){
        $this->db->select('*');
        $this->db->from('student_class_fee');
        $this->db->where('student_class_fee.fkstudent_id',$std_id);
        $this->db->join('student_other_payment','student_other_payment.fkstudent_id=student_class_fee.fkstudent_id');
        $this->db->order_by("otherpay_id","desc");
        $this->db->limit(1);
        $query=$this->db->get();
        $num=$query->num_rows();

        if ($num == 0) {
            $this->db->select('*');
            $this->db->from('student_class_fee');
            $this->db->where('fkstudent_id',$std_id);
            $query=$this->db->get();
        }
        return $query->result();

    }
    
    //-------------------------------------------------------------------------------
    function payotherfeepro($std_id){
        // $fkstd_id               = $this->input->post('fkstd_id');
        if($this->input->post('total_remain')!=null){
            $total_remain = $this->input->post('total_remain');
        }
        else{
                $total_remain = 0;
            }
        $total_amt              = $this->input->post('total');
        $paid_amt               = $this->input->post('amountpay');
        $reason                 = $this->input->post('reason');
        $total_remain = ($total_remain+$total_amt)-($paid_amt);
        $otherfee_created_date  =date('d-M-Y');
        $insert_array=array(
          'fkstudent_id'            =>$std_id,
          'total_amt'               =>$total_amt,
          'paid_amt'                =>$paid_amt,
          'otherfee_remain'            =>$total_remain,
          'amt_reason'              =>$reason,
          'otherpay_created_date'   =>$otherfee_created_date,
        );
        $result = $this->db->insert('student_other_payment',$insert_array);
        if($result){
            return $result;
        }else{
            return 0;
        }
    }

}