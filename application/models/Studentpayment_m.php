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
        $this->db->join("course", "course.co_id=class.co_id");
        $this->db->join("subject", "subject.su_id=class.su_id");
        $this->db->where("student_class_fee.st_class_fee_status", 1);
        $query = $this->db->get();
        return $query->result();
    }

    //---------------------------------------------------------------
    function checkad($st_id, $classfee_id)
    {
        $this->db->select("*");
        $this->db->from("student_payment");
        $this->db->join("student_class_fee", "student_class_fee.classfee_id=student_payment.fkstudentclassfee_id");
        $this->db->join("student", "student.student_id=student_class_fee.fkstudent_id");
        $this->db->join("class", "class.cl_id=student_class_fee.fkclass_id");
        $this->db->where("class_status", 1);
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
        $this->db->where("classfee_id", $classfee_id);
        $this->db->join("student", "student.student_id=student_class_fee.fkstudent_id");
        $this->db->join("student_payment", "student_payment.fkstudentclassfee_id=student_class_fee.classfee_id");
        $this->db->join("class", "class.cl_id=student_class_fee.fkclass_id");
        $this->db->order_by('p_id', 'desc');
        $this->db->limit('1');
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num == 0) {
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
        $fkclass_id = $this->input->post('fkclass_id');
        $std_payment = $this->input->post('total');
        $std_paid = $this->input->post('amountpay');
        $std_month = $this->input->post('month');
        $std_reason = $this->input->post('reason');
        $std_date = date('d-M-Y');
// for cheking if they have already a remaining balnce
        $this->db->select("*");
        $this->db->from("student_payment");
        $this->db->where('fkstudentclassfee_id', $fkclass_id);
        $this->db->order_by('p_id', 'desc');
        $this->db->limit('1');
        $query = $this->db->get();
        $result = $query->result();
        $num = $query->num_rows();
        if ($num > 0 && ($result[0]->std_month == $std_month)) {
            $std_remain = ($result[0]->std_remain) - ($std_paid);
            $inser_array = array(
                'fkstudentclassfee_id' => $fkclass_id,
                'std_payment' => $result[0]->std_remain,
                'std_paid' => $std_paid,
                'std_remain' => $std_remain,
                'std_month' => $std_month,
                'std_date' => $std_date,
                'std_year' => $this->input->post('year'),
                'std_reason' => $std_reason,
                'student_notification' => 1
            );

            $result_1 = $this->db->insert('student_payment', $inser_array);
        } else {
            $std_remain = $std_payment - ($std_paid);
            $inser_array = array(
                'fkstudentclassfee_id' => $fkclass_id,
                'std_payment' => $std_payment,
                'std_paid' => $std_paid,
                'std_remain' => $std_remain,
                'std_month' => $std_month,
                'std_date' => $std_date,
                'std_year' => $this->input->post('year'),
                'std_reason' => $std_reason,
                'student_notification' => 1
            );
            $result_1 = $this->db->insert('student_payment', $inser_array);
        }
        if ($result_1) {
            $data['arr'] = $inser_array;
            $data['result'] = 1;
            return $data;
        } else {
            return $data['result'] = 0;
        }
    }

    //----------------------------------------------------------------------------
    function classpaymentdetail($class_id, $std_id)
    {
        $this->db->select('*');
        $this->db->from('student_payment');
        $this->db->join('student_class_fee', 'student_class_fee.classfee_id=student_payment.fkstudentclassfee_id');
        $this->db->where('fkstudent_id', $std_id);
        $this->db->where('fkstudentclassfee_id', $class_id);
        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }

    //------------------------------------------------------------------------------
    function otherpaycheckad($std_id)
    {
        $this->db->select('*');
        $this->db->from('student_class_fee');
        $this->db->where('student_class_fee.fkstudent_id', $std_id);
        $this->db->join('student_other_payment', 'student_other_payment.fkstudent_id=student_class_fee.fkstudent_id');

        $query = $this->db->get();
        return $query->num_rows();
    }

    //------------------------------------------------------------------------------
    function otherpay($std_id)
    {
        $this->db->select('*');
        $this->db->from('student_class_fee');
        $this->db->where('student_class_fee.fkstudent_id', $std_id);
        $this->db->join('student_other_payment', 'student_other_payment.fkstudent_id=student_class_fee.fkstudent_id');
        $this->db->order_by("otherpay_id", "desc");
        $this->db->limit(1);
        $query = $this->db->get();
        $num = $query->num_rows();

        if ($num == 0) {
            $this->db->select('*');
            $this->db->from('student_class_fee');
            $this->db->where('fkstudent_id', $std_id);
            $query = $this->db->get();
        }
        return $query->result();

    }

    //-------------------------------------------------------------------------------
    function payotherfeepro($std_id)
    {
        // $fkstd_id               = $this->input->post('fkstd_id');
        if ($this->input->post('total_remain') != null) {
            $total_remain = $this->input->post('total_remain');
        } else {
            $total_remain = 0;
        }
        $total_amt = $this->input->post('total');
        $paid_amt = $this->input->post('amountpay');
        $reason = $this->input->post('reason');
        $total_remain = ($total_remain + $total_amt) - ($paid_amt);
        $otherfee_created_date = date('d-M-Y');
        $insert_array = array(
            'fkstudent_id' => $std_id,
            'total_amt' => $total_amt,
            'paid_amt' => $paid_amt,
            'otherfee_remain' => $total_remain,
            'amt_reason' => $reason,
            'other_month' => date("M"),
            'other_year' => date("Y"),
            'otherpay_created_date' => $otherfee_created_date,
        );
        $result = $this->db->insert('student_other_payment', $insert_array);
        if ($result) {
            $data['arr'] = $insert_array;
            $data['result'] = 1;
            return $data;
        } else {
            $data['result'] = 0;
            return $data;
        }
    }

    //---------------------------------------------------------------------
    function otherpaymentdetail($std_id)
    {
        $this->db->select("*");
        $this->db->from("student_other_payment");
        $this->db->join("student", "student.student_id=student_other_payment.fkstudent_id");
        $this->db->where("fkstudent_id", $std_id);
        $query = $this->db->get();
        return $query->result();

    }

//-----------------------------------------------------------------------
    function monthlyfee()
    {
        $year = date("Y");
        $cmonth = date("m");
        for ($i = 1; $i <= $cmonth; $i++) {
            $paid = 0;
            $unpaid = 0;
            $month = date('M', strtotime("01-" . $i . "-2001"));
            $this->db->select('*');
            $this->db->from('student_payment');
            $this->db->where("std_year", $year);
            $this->db->where("std_month", $month);
            $query = $this->db->get();
            $result = $query->result();
            foreach ($result as $row) {
                $paid = $paid + $row->std_paid;
                $unpaid = $unpaid + $row->std_remain;
            }
            $data["paid"][] = $paid;
            $data["unpaid"][] = $unpaid;
        }
        return $data;
    }

//-----------------------------------------------------------------------
    function yearlyfee()
    {
        $year = date("Y") - 9;
        $cyear = date("Y");
        for ($i = $year; $i <= $cyear; $i++) {
            $paid = 0;
            $unpaid = 0;
            $this->db->select('*');
            $this->db->from('student_payment');
            $this->db->where("std_year", $i);
            $query = $this->db->get();
            $result = $query->result();
            foreach ($result as $row) {
                $paid = $paid + $row->std_paid;
                $unpaid = $unpaid + $row->std_remain;
            }
            $data["paid"][] = $paid;
            $data["unpaid"][] = $unpaid;
        }
        return $data;
    }

//-----------------------------------------------------------------------
    function otherpermonthfee()
    {
        $year = date("Y");
        $cmonth = date("m");
        for ($i = 1; $i <= $cmonth; $i++) {
            $paid = 0;
            $unpaid = 0;
            $month = date('M', strtotime("01-" . $i . "-2001"));
            $this->db->select('*');
            $this->db->from('student_other_payment');
            $this->db->where("other_year", $year);
            $this->db->where("other_month", $month);
            $query = $this->db->get();
            $result = $query->result();
            foreach ($result as $row) {
                $paid = $paid + $row->paid_amt;
                $unpaid = $unpaid + $row->otherfee_remain;
            }
            $data["paid"][] = $paid;
            $data["unpaid"][] = $unpaid;
        }
        return $data;
    }

    //-----------------------------------------------------------------------
    function yearlyotherfee()
    {
        $year = date("Y") - 9;
        $cyear = date("Y");
        for ($i = $year; $i <= $cyear; $i++) {
            $paid = 0;
            $unpaid = 0;
            $this->db->select('*');
            $this->db->from('student_other_payment');
            $this->db->where("other_year", $i);
            $query = $this->db->get();
            $result = $query->result();
            foreach ($result as $row) {
                $paid = $paid + $row->paid_amt;
                $unpaid = $unpaid + $row->otherfee_remain;
            }
            $data["paid"][] = $paid;
            $data["unpaid"][] = $unpaid;
        }
        return $data;
    }

//-----------------------------------------------------------------------
    function monthlyteacherpaid()
    {
        $year = date("Y");
        $cmonth = date("m");
        for ($i = 1; $i <= $cmonth; $i++) {
            $paid = 0;
            $unpaid = 0;
            $month = date('m', strtotime("01-" . $i . "-2001"));
            $this->db->select('*');
            $this->db->from('teacher_salaries');
            $this->db->where("salary_year", $year);
            $this->db->where("paid_month", $month);
            $query = $this->db->get();
            $result = $query->result();
            foreach ($result as $row) {
                $paid = $paid + $row->paid_salary;
            }
            $data[] = $paid;
        }
        return $data;
    }

//-----------------------------------------------------------------------
    function monthlyotherstaffpaid()
    {
        $year = date("Y");
        $cmonth = date("m");
        for ($i = 1; $i <= $cmonth; $i++) {
            $paid = 0;
            $unpaid = 0;
            $month = date('m', strtotime("01-" . $i . "-2001"));
            $this->db->select('*');
            $this->db->from('staff_salaries');
            $this->db->where("paid_year", $year);
            $this->db->where("paid_month", $month);
            $query = $this->db->get();
            $result = $query->result();
            foreach ($result as $row) {
                $paid = $paid + $row->paid_salary;
            }
            $data[] = $paid;
        }
        return $data;
    }

//-----------------------------------------------------------------------
    function monthlyexpense()
    {
        $year = date("Y");
        $cmonth = date("m");
        for ($i = 1; $i <= $cmonth; $i++) {
            $paid = 0;
            $unpaid = 0;
            $month = date('M', strtotime("01-" . $i . "-2001"));
            $this->db->select('*');
            $this->db->from('expense');
            $this->db->where("expense_year", $year);
            $this->db->where("expense_month", $month);
            $query = $this->db->get();
            $result = $query->result();
            foreach ($result as $row) {
                $paid = $paid + $row->expense_paid_amount;
            }
            $data[] = $paid;
        }
        return $data;
    }

//-----------------------------------------------------------------------
    function monthlyreport()
    {
        /********* for total monthly income *********************************/
        $data['fee'] = $this->monthlyfee();
        $data['otherfee'] = $this->otherpermonthfee();
        $fee['monthlyfee'] = $data['fee']['paid'];
        $fee['monthlyotherfee'] = $data['otherfee']['paid'];
        /* for add values of two arrays */
        $data['monthly_income'] = array_map(function () {
            return array_sum(func_get_args());
        }, $fee['monthlyfee'], $fee['monthlyotherfee']);

        /********* for total monthly expenses *********************************/
        $expense['t_paid'] = $this->monthlyteacherpaid();
        $expense['otherstaff_paid'] = $this->monthlyotherstaffpaid();
        $expense['expense_paid'] = $this->monthlyexpense();
        $data['monthly_expense'] = array_map(function () {
            return array_sum(func_get_args());
        }, $expense['t_paid'], $expense['otherstaff_paid'], $expense['expense_paid']);
        return $data;
    }

//-----------------------------------------------------------------------
    function yearteacherpaid()
    {
        $year = date("Y") - 9;
        $cyear = date("Y");
        for ($i = $year; $i <= $cyear; $i++) {
            $paid = 0;
            $this->db->select('*');
            $this->db->from('teacher_salaries');
            $this->db->where("salary_year", $i);
            $query = $this->db->get();
            $result = $query->result();
            foreach ($result as $row) {
                $paid = $paid + $row->paid_salary;
            }
            $data["paid"][] = $paid;
        }
        return $data;
    }
//-----------------------------------------------------------------------
    function yearotherpaid()
    {
        $year = date("Y") - 9;
        $cyear = date("Y");
        for ($i = $year; $i <= $cyear; $i++) {
            $paid = 0;
            $this->db->select('*');
            $this->db->from('staff_salaries');
            $this->db->where("paid_year", $i);
            $query = $this->db->get();
            $result = $query->result();
            foreach ($result as $row) {
                $paid = $paid + $row->paid_salary;
            }
            $data["paid"][] = $paid;
        }
        return $data;
    }
//-----------------------------------------------------------------------
    function yearexpense()
    {
        $year = date("Y") - 9;
        $cyear = date("Y");
        for ($i = $year; $i <= $cyear; $i++) {
            $paid = 0;
            $this->db->select('*');
            $this->db->from('expense');
            $this->db->where("expense_year", $i);
            $query = $this->db->get();
            $result = $query->result();
            foreach ($result as $row) {
                $paid = $paid + $row->expense_paid_amount;
            }
            $data["paid"][] = $paid;
        }
        return $data;
    }
//-----------------------------------------------------------------------
    function yearlyreport()
    {
        $fee['fee'] = $this->yearlyfee();
        $other['otherfee'] = $this->yearlyotherfee();
        $fee['fee'] = $fee['fee']['paid'];
        $other['other'] = $other['otherfee']['paid'];
    /* for add values of income arrays */
        $data['yearly_income'] = array_map(function () {
            return array_sum(func_get_args());
        }, $fee['fee'], $other['other']);
    /* for  yearly expenses *********************/
        $expense['t_paid'] = $this->yearteacherpaid();
        $expense['t_paid'] = $expense['t_paid']['paid'];
        $expense['otherstaff_paid'] = $this->yearotherpaid();
        $expense['otherstaff_paid'] = $expense['otherstaff_paid']['paid'];
        $expense['expense'] = $this->yearexpense();
        $expense['expense'] = $expense['expense']['paid'];


        /* for add expenses arry */
        $data['yearly_expense'] = array_map(function () {
            return array_sum(func_get_args());
        }, $expense['t_paid'],$expense['otherstaff_paid'],$expense['expense']);


        return $data;
    }
    
    //-----------------------------------------------------------------------

    public function student_payments( $id ){

        $this->db->order_by('p_id', 'desc');
        $this->db->where( 'fkstudentclassfee_id', $id);
        return $this->db->get('student_payment')->result();

    }

    // ----------------------------------------------------------------------

    public function get_other_payments( $student_id ){

        $this->db->where( 'fkstudent_id', $student_id);
        $this->db->order_by('otherpay_id', 'desc');
        $query  = $this->db->get('student_other_payment');
        $result = $query->result();
        return $result[0];
        
    }

    // ------------------------------------------------------------------------

    public function pay_fee(){
        
        $date  = date("d-M-Y");
        $month = date('M');
        $year  = date("Y");
        $session_data = [];
        // echo '<pre>';
        // print_r($_POST);
        // die;
        foreach( $_POST['student'] as $student ){
            
            if(isset( $student['neglect_percentage'] )){
                $student['neglect_percentage'] = 1;
            }else{
                $student['neglect_percentage'] = 0;
            }
            
            $data = [
                'fkstudentclassfee_id'          =>       $student['std_cls_fee_id'],
                'std_payment'                   =>       $student['student_fee'],
                'std_paid'                      =>       $student['student_paid_fee'],
                'std_remain'                    =>       $student['student_remaning_fee'],
                'std_discount'                  =>       $student['discount'],
                'std_reason_dis'                =>       $student['reason'],
                'std_reason'                    =>       'Monthly Fee',
                'std_month'                     =>       $month,
                'std_year'                      =>       $year,
                'std_date'                      =>       $date,
                'neglect_teacher_percentage'    =>       $student['neglect_percentage'],
                'f_starting_date'               =>       $student['starting_date']
            ];

            if( $student['student_paid_fee'] != 0 ){
                $this->db->insert( 'student_payment', $data );
                $payment_id = $this->db->insert_id();
                $result = $this->student_m->insert_notification('Montly Fee Has been Paid', 'Montly Fee Paid', 'student_payment', $payment_id, 'p_id');    
                $student_id = $student['student_id'];
                $data['subject_name'] =  $student['subject_name'];
                $session_data[] = $data;
            }else{
                $student_id = $student['student_id'];
            }

        }

        $this->session->set_userdata("paymentdetail", $session_data);
        $this->session->set_userdata("student_id", $student_id);

        
        if( isset( $_POST['admission_fee_due'] ) ){
            
            $admission_data = [

               'fkstudent_id'          => $student_id,
               'total_amt'             => $this->input->post( 'admission_fee_due' ),
               'paid_amt'              => $this->input->post( 'admission_fee_paid' ),
               'otherfee_remain'       => $this->input->post( 'admission_fee_balance' ),
               'other_discount'        => $this->input->post( 'admission_fee_paid_discount' ),
               'other_reason'          => $this->input->post( 'admission_fee_paid_reason' ),
               'amt_reason'            => 'Admission Fee',
               'other_month'           => $month,
               'other_year'            => $year,
               'otherpay_created_date' => $date

            ];

            $this->db->insert( 'student_other_payment', $admission_data );
            $trf_id = $this->db->insert_id();
            $result = $this->student_m->insert_notification('TRF Has been Paid', 'TRF Paid', 'student_other_payment', $trf_id, 'otherpay_id');
            $this->session->set_userdata("otherpayments", $admission_data);
        }

    }

    // ------------------------------------------------------------------------

    public function get_student_data( $student_id ){

        $this->db->where('student_id', $student_id);
        $query = $this->db->get('student')->result();
        return $query[0];

    }

    // ------------------------------------------------------------------------

}