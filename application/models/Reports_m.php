<?php

class Reports_m extends CI_Model
{

    function dailyvisitors()
    {
    	$this->db->select('*');
    	$this->db->from('visitor');
    	$data = $this->db->where('date',date('d-M-Y'));
        $query = $this->db->get();
    	return $result= $query->result();
    }

    //------------------------------------------------------
    function dailystudents()
    {
  //echo       date('d-M-Y');die;
    	$this->db->select('*');
    	$this->db->from('student');
    	$this->db->where('student_created_date',date('d-M-Y'));

    	$query = $this->db->get();
    //  echo '<pre>';  print_r($query->result());
    	return $result= $query->result();
    }

    //------------------------------------------------------
    function weeklyvisitors()
    {
    	$this->db->select('*');
    	$this->db->from('visitor');	
    	$current_date = date('Y-m-d');
    	$interval =date('Y-m-d', strtotime('-7 days'));
      $query = $this->db->get();
      $result= $query->result();
      //echo '<pre>';print_r($result);die;
             foreach ($result as $row) {
        
           $date = date("Y-m-d",strtotime($row->date));
           //echo $date;die;
           if($date>$interval && $date<=$current_date){
           $array = array(
                    'id' =>$row->id , 
                    'name' =>$row->name , 
                    'contact' =>$row->contact, 
                    'reason' =>$row->reason, 
                    'address' =>$row->address, 
                    'relationship' =>$row->relationship, 
                    'note' =>$row->note, 
                    'date' =>$row->date, 
                    'time' =>$row->time, 
                    );
                $data[]=$array;
           }
          }
        return $data;

    }

    //------------------------------------------------------
    function weeklystudents()
    {
      $this->db->select('*');
        $this->db->from('student'); 
        $current_date = date('Y-m-d');
        $interval = date('Y-m-d', strtotime('-7 days') );
        $query = $this->db->get();
        $result= $query->result();
       // print_r($result);die;
       foreach ($result as $row) {
        
           $date = date("Y-m-d",strtotime($row->student_created_date));
           //echo $date;die;
           if($date>$interval && $date<=$current_date){
                $array = array(
                    'student_id' =>$row->student_id , 
                    'student_name' =>$row->student_name , 
                    'std_father_name' =>$row->std_father_name, 
                    'student_contact' =>$row->student_contact, 
                    'std_guardian_contact' =>$row->std_guardian_contact, 
                    'facebook_id' =>$row->facebook_id, 
                    'student_address' =>$row->student_address, 
                    'student_email' =>$row->student_email, 
                    'student_created_date' =>$row->student_created_date, 
                    'current_school'=>$row->current_school,
                    'student_contact'=>$row->student_contact
                    );
                $data[]=$array;

           }
         
        }

         return $data;
    }

    //------------------------------------------------------
    function monthlyvisitors()
    {
    	$this->db->select('*');
    	$this->db->from('visitor');	
    	$current_date = date('Y-m-d');
    	$interval = date('Y-m-d', strtotime('-30 days') );
    	$query = $this->db->get();
    	$result= $query->result();
       foreach ($result as $row) {
        
           $date = date("Y-m-d",strtotime($row->date));
           if($date>$interval && $date<=$current_date){
                $array = array(
                    'id' =>$row->id , 
                    'name' =>$row->name , 
                    'contact' =>$row->contact, 
                    'reason' =>$row->reason, 
                    'address' =>$row->address, 
                    'relationship' =>$row->relationship, 
                    'note' =>$row->note, 
                    'date' =>$row->date, 
                    'time' =>$row->time, 
                    );
                $data[]=$array;

           }
         
        }

 /*echo "<pre>";
 print_r($data);
 die();*/
    	 return $data;
    }

    //------------------------------------------------------
    function monthlystudents()
    {
    
        $this->db->select('*');
        $this->db->from('student'); 
        $current_date = date('Y-m-d');
        $interval = date('Y-m-d', strtotime('-1 month') );
        $query = $this->db->get();
        $result= $query->result();
       // print_r($result);die;
       foreach ($result as $row) {
        
           $date = date("Y-m-d",strtotime($row->student_created_date));
           //echo $date;die;
           if($date>$interval && $date<=$current_date){
                $array = array(
                    'student_id' =>$row->student_id , 
                    'student_name' =>$row->student_name , 
                    'std_father_name' =>$row->std_father_name, 
                    'student_contact' =>$row->student_contact, 
                    'std_guardian_contact' =>$row->std_guardian_contact, 
                    'facebook_id' =>$row->facebook_id, 
                    'student_address' =>$row->student_address, 
                    'student_email' =>$row->student_email, 
                    'student_created_date' =>$row->student_created_date, 
                    'current_school'=>$row->current_school,
                    'student_contact'=>$row->student_contact
                    );
                $data[]=$array;

           }
         
        }

         return $data;
    }

    function yearly_visitor_reports()
    {
            $this->db->select('*');
            $this->db->from('visitor'); 
            $current_date = date('Y-m-d');
            $interval = date('Y-m-d', strtotime('-1 years') );
            $query = $this->db->get();
            $result= $query->result();
           foreach ($result as $row) {
            
               $date = date("Y-m-d",strtotime($row->date));

               if($date>$interval && $date<=$current_date){
                    $array = array(
                        'id' =>$row->id , 
                        'name' =>$row->name , 
                        'contact' =>$row->contact, 
                        'reason' =>$row->reason, 
                        'address' =>$row->address, 
                        'relationship' =>$row->relationship, 
                        'note' =>$row->note, 
                        'date' =>$row->date, 
                        'time' =>$row->time, 
                        );
                    $data[]=$array;

               }
             
            }

             return $data;

    }

     function yearlystudents()
     {
        $this->db->select('*');
        $this->db->from('student'); 
        $current_date = date('Y-m-d');
        $interval = date('Y-m-d', strtotime('-1 years') );
        $query = $this->db->get();
        $result= $query->result();
       // print_r($result);die;
       foreach ($result as $row) {
        
           $date = date("Y-m-d",strtotime($row->student_created_date));
           //echo $date;die;
           if($date>$interval && $date<=$current_date){
                $array = array(
                    'student_id' =>$row->student_id , 
                    'student_name' =>$row->student_name , 
                    'std_father_name' =>$row->std_father_name, 
                    'student_contact' =>$row->student_contact, 
                    'std_guardian_contact' =>$row->std_guardian_contact, 
                    'facebook_id' =>$row->facebook_id, 
                    'student_address' =>$row->student_address, 
                    'student_email' =>$row->student_email, 
                    'student_created_date' =>$row->student_created_date, 
                    'current_school'=>$row->current_school,
                    'student_contact'=>$row->student_contact
                    );
                $data[]=$array;

           }
         
        }

         return $data;
    }
    

    function daily_finance_reports()
    {
        $this->db->select('*');
        $this->db->from('student_payment');
        $data = $this->db->where('std_date',date('d-M-Y'));
        $query = $this->db->get();
        return $result= $query->result();
    }

    function daily_finance_report()
    {
        $this->db->select('*');
        $this->db->from('student_other_payment');
        $data = $this->db->where('otherpay_created_date',date('d-M-Y'));
        $query = $this->db->get();
        return $result= $query->result();
    }

    function daily_expense_loss()
    {
        $this->db->select('*');
        $this->db->from('expense');
        $data = $this->db->where('expense_created_date',date('d-M-Y'));
        $query = $this->db->get();
        return $result= $query->result();
    }

    function daily_staff_loss()
    {
        $this->db->select('*');
        $this->db->from('staff_salaries');
        $this->db->where('staff_salaries.created_date',date('d-M-Y'));
        //$this->db->join('otherstaff',"otherstaff.id = staff_salaries.fkstaff_id");
        $query = $this->db->get();
        return $result= $query->result();
    }

function daily_teacher_staff_loss()
    {
        $this->db->select('*');
        $this->db->from('teacher_salaries');
        $this->db->where('created_date',date('d-M-Y'));
        $query = $this->db->get();
        return $result= $query->result();
    }

    //////////////////WEEKLY PROFIT LOSS//////////////////////

    function weekly_profit_reports()
    {
        $this->db->select('*');
        $this->db->from('student_payment'); 
        $current_date = date('Y-m-d');
        $interval =date('Y-m-d', strtotime('-7 days'));
         $query = $this->db->get();
        $data = $query->result();
        foreach ($data as $key ) {
        $date = date("Y-m-d",strtotime($key->std_date));
         if($date>$interval && $date<=$current_date)
          {
            $array = array(
                'std_reason'=>$key->std_reason,
                'std_paid'=>$key->std_paid,
                'std_date'=>$key->std_date
                );
            $dataa[] = $array;
          }

       }
       return $dataa;
    }

    function weekly_other_profit_reports()
    {
        $this->db->select('*');
        $this->db->from('student_other_payment'); 
        $current_date = date('Y-m-d');
        $interval =date('Y-m-d', strtotime('-7 days'));
         $query = $this->db->get();
        $data = $query->result();
        foreach ($data as $key ) {
        $date = date("Y-m-d",strtotime($key->otherpay_created_date));

         if($date>$interval && $date<=$current_date)
          {
            $array = array(
                'amt_reason'=>$key->amt_reason,
                'paid_amt'=>$key->paid_amt,
                'otherpay_created_date'=>$key->otherpay_created_date
                );
            $dataa[] = $array;
          }

       }

       return $dataa;
    }

    function weekly_expense_reports()
    {
        $this->db->select('*');
        $this->db->from('expense'); 
        $current_date = date('Y-m-d');
        $interval =date('Y-m-d', strtotime('-7 days'));
         $query = $this->db->get();
        $data = $query->result();
        foreach ($data as $key ) {
        $date = date("Y-m-d",strtotime($key->expense_created_date));

         if($date>$interval && $date<=$current_date)
          {
            $array = array(
                'expense_reason'=>$key->expense_reason,
                'expense_paid_amount'=>$key->expense_paid_amount,
                'expense_created_date'=>$key->expense_created_date
                );
            $dataa[] = $array;
          }

       }
      //echo '<pre>';print_r($dataa);die;
       return $dataa;
    }


   function weekly_staff_expense_reports()
    {
        $this->db->select('*');
        $this->db->from('staff_salaries'); 
        $current_date = date('Y-m-d');
        $interval =date('Y-m-d', strtotime('-7 days'));

        $query = $this->db->get();
        $data = $query->result();
        //echo '<pre>';print_r($data);die;
        foreach ($data as $key ) {
        $date = date("Y-m-d",strtotime($key->created_date));

         if($date>$interval && $date<=$current_date)
          {
            $this->db->select('*');
            $this->db->from('otherstaff');
            $this->db->where('id',$key->fkstaff_id);
            $query1 = $this->db->get();
            $data1 = $query1->result(); 

            $array = array(
                'name'=>$data1[0]->name,
                'paid_salary'=>$key->paid_salary,
                'created_date'=>$key->created_date
                );
            $dataa[] = $array;
          }

       }
     // echo '<pre>';print_r($dataa);die;
       return $dataa;
    }

    function weekly_teacher_expense_reports()
    {
        $this->db->select('*');
        $this->db->from('teacher_salaries'); 
        $current_date = date('Y-m-d');
        $interval =date('Y-m-d', strtotime('-7 days'));
         $query = $this->db->get();
        $data = $query->result();
        foreach ($data as $key ) {
        $date = date("Y-m-d",strtotime($key->created_date));

         if($date>$interval && $date<=$current_date)
          {
            $array = array(
                'paid_salary'=>$key->paid_salary,
                'amount_reason'=>$key->amount_reason,
                'created_date'=>$key->created_date
                );
            $dataa[] = $array;
          }

       }
      //echo '<pre>';print_r($dataa);die;
       return $dataa;
    }


    /////////// MONTHLY REPORTS START/////////////////

    function monthly_profit_reports()
    {
        $this->db->select('*');
        $this->db->from('student_payment'); 
        $current_date = date('Y-m-d');
        $interval =date('Y-m-d', strtotime('-30 days'));
         $query = $this->db->get();
        $data = $query->result();
        foreach ($data as $key ) {
        $date = date("Y-m-d",strtotime($key->std_date));
         if($date>$interval && $date<=$current_date)
          {
            $array = array(
                'std_reason'=>$key->std_reason,
                'std_paid'=>$key->std_paid,
                'std_date'=>$key->std_date
                );
            $dataa[] = $array;
          }

       }
       return $dataa;
    }

    function monthly_other_profit_reports()
    {
        $this->db->select('*');
        $this->db->from('student_other_payment'); 
        $current_date = date('Y-m-d');
        $interval =date('Y-m-d', strtotime('-30 days'));
         $query = $this->db->get();
        $data = $query->result();
        foreach ($data as $key ) {
        $date = date("Y-m-d",strtotime($key->otherpay_created_date));

         if($date>$interval && $date<=$current_date)
          {
            $array = array(
                'amt_reason'=>$key->amt_reason,
                'paid_amt'=>$key->paid_amt,
                'otherpay_created_date'=>$key->otherpay_created_date
                );
            $dataa[] = $array;
          }

       }

       return $dataa;
    }

 function monthly_expense_reports()
    {
        $this->db->select('*');
        $this->db->from('expense'); 
        $current_date = date('Y-m-d');
        $interval =date('Y-m-d', strtotime('-30 days'));
         $query = $this->db->get();
        $data = $query->result();
        foreach ($data as $key ) {
        $date = date("Y-m-d",strtotime($key->expense_created_date));

         if($date>$interval && $date<=$current_date)
          {
            $array = array(
                'expense_reason'=>$key->expense_reason,
                'expense_paid_amount'=>$key->expense_paid_amount,
                'expense_created_date'=>$key->expense_created_date
                );
            $dataa[] = $array;
          }

       }
      //echo '<pre>';print_r($dataa);die;
       return $dataa;
    }


function monthly_staff_expense_reports()
    {
        $this->db->select('*');
        $this->db->from('staff_salaries'); 
        $current_date = date('Y-m-d');
        $interval =date('Y-m-d', strtotime('-1 month'));
    
        $query = $this->db->get();
        $data = $query->result();
        //echo '<pre>';print_r($data);die;
        foreach ($data as $key ) {
        $date = date("Y-m-d",strtotime($key->created_date));

         if($date>$interval && $date<=$current_date)
          {
            $this->db->select('*');
            $this->db->from('otherstaff');
            $this->db->where('id',$key->fkstaff_id);
            $query1 = $this->db->get();
            $data1 = $query1->result(); 

            $array = array(
                'name'=>$data1[0]->name,
                'paid_salary'=>$key->paid_salary,
                'created_date'=>$key->created_date
                );
            $dataa[] = $array;
          }

       }
     //echo '<pre>';print_r($dataa);die;
       return $dataa;
    } 

function monthly_teacher_expense_reports()
    {
        $this->db->select('*');
        $this->db->from('teacher_salaries'); 
        $current_date = date('Y-m-d');
        $interval =date('Y-m-d', strtotime('-1 month'));

         $query = $this->db->get();
        $data = $query->result();
        foreach ($data as $key ) {
        $date = date("Y-m-d",strtotime($key->created_date));

         if($date>$interval && $date<=$current_date)
          {
            $array = array(
                'paid_salary'=>$key->paid_salary,
                'amount_reason'=>$key->amount_reason,
                'created_date'=>$key->created_date
                );
            $dataa[] = $array;
          }

       }
      //echo '<pre>';print_r($dataa);die;
       return $dataa;
    }   

    ///////////////////// END OF MONTHLY REPORTS////////////////////

    //////////////// START YEARLY REPORTS////////////////////////

function yearly_profit_reports()
    {
        $this->db->select('*');
        $this->db->from('student_payment'); 
        $current_date = date('Y-m-d');
        $interval =date('Y-m-d', strtotime('-1 years'));
         $query = $this->db->get();
        $data = $query->result();
        foreach ($data as $key ) {
        $date = date("Y-m-d",strtotime($key->std_date));
         if($date>$interval && $date<=$current_date)
          {
            $array = array(
                'std_reason'=>$key->std_reason,
                'std_paid'=>$key->std_paid,
                'std_date'=>$key->std_date
                );
            $dataa[] = $array;
          }

       }
       return $dataa;
    }

 function yearly_other_profit_reports()
    {
        $this->db->select('*');
        $this->db->from('student_other_payment'); 
        $current_date = date('Y-m-d');
        $interval =date('Y-m-d', strtotime('-1 years'));
         $query = $this->db->get();
        $data = $query->result();
        foreach ($data as $key ) {
        $date = date("Y-m-d",strtotime($key->otherpay_created_date));

         if($date>$interval && $date<=$current_date)
          {
            $array = array(
                'amt_reason'=>$key->amt_reason,
                'paid_amt'=>$key->paid_amt,
                'otherpay_created_date'=>$key->otherpay_created_date
                );
            $dataa[] = $array;
          }

       }

       return $dataa;
    }

  function yearly_expense_reports()
    {
        $this->db->select('*');
        $this->db->from('expense'); 
        $current_date = date('Y-m-d');
        $interval =date('Y-m-d', strtotime('-1 years'));
         $query = $this->db->get();
        $data = $query->result();
        foreach ($data as $key ) {
        $date = date("Y-m-d",strtotime($key->expense_created_date));

         if($date>$interval && $date<=$current_date)
          {
            $array = array(
                'expense_reason'=>$key->expense_reason,
                'expense_paid_amount'=>$key->expense_paid_amount,
                'expense_created_date'=>$key->expense_created_date
                );
            $dataa[] = $array;
          }

       }
      //echo '<pre>';print_r($dataa);die;
       return $dataa;
    }   

function yearly_staff_expense_reports()
    {
        $this->db->select('*');
        $this->db->from('staff_salaries'); 
        $current_date = date('Y-m-d');
        $interval =date('Y-m-d', strtotime('-1 years'));
    
        $query = $this->db->get();
        $data = $query->result();
        //echo '<pre>';print_r($data);die;
        foreach ($data as $key ) {
        $date = date("Y-m-d",strtotime($key->created_date));

         if($date>$interval && $date<=$current_date)
          {
            $this->db->select('*');
            $this->db->from('otherstaff');
            $this->db->where('id',$key->fkstaff_id);
            $query1 = $this->db->get();
            $data1 = $query1->result(); 

            $array = array(
                'name'=>$data1[0]->name,
                'paid_salary'=>$key->paid_salary,
                'created_date'=>$key->created_date
                );
            $dataa[] = $array;
          }

       }
     //echo '<pre>';print_r($dataa);die;
       return $dataa;
    }

function yearly_teacher_expense_reports()
    {
        $this->db->select('*');
        $this->db->from('teacher_salaries'); 
        $current_date = date('Y-m-d');
        $interval =date('Y-m-d', strtotime('-1 years'));

         $query = $this->db->get();
        $data = $query->result();
        foreach ($data as $key ) {
        $date = date("Y-m-d",strtotime($key->created_date));

         if($date>$interval && $date<=$current_date)
          {
            $array = array(
                'paid_salary'=>$key->paid_salary,
                'amount_reason'=>$key->amount_reason,
                'created_date'=>$key->created_date
                );
            $dataa[] = $array;
          }

       }
      //echo '<pre>';print_r($dataa);die;
       return $dataa;
    }            

}