<?php

class Reports_m extends CI_Model
{

    function dailyvisitors()
    {
      if ($this->input->post('dailyDate')) {
        $originalDate = $this->input->post('dailyDate');
        $newDate = date("d-M-Y", strtotime($originalDate));
        $this->db->select('*');
        $this->db->from('visitor');
        $data = $this->db->where('date',$newDate);
        $query = $this->db->get();
        return $result= $query->result();

      } else {
        $this->db->select('*');
        $this->db->from('visitor');
        $data = $this->db->where('date',date('d-M-Y'));
        $query = $this->db->get();
        return $result= $query->result();
      }
      	
    }

    //------------------------------------------------------
    function dailystudents()
    {
      if ($this->input->post('dailyDate')) {

        $originalDate = $this->input->post('dailyDate');
        $newDate = date("d-M-Y", strtotime($originalDate));

        //echo date('d-M-Y');die;
        $this->db->select('*');
        $this->db->from('student');
        $this->db->where('student_created_date',$newDate);

        $query = $this->db->get();
        return $result= $query->result();
      } 
      else 
      {
        $this->db->select('*');
        $this->db->from('student');
        $this->db->where('student_created_date',date('d-M-Y'));

        $query = $this->db->get();
        return $result= $query->result();
      }
      
    }
     //------------------------------------------------------
    function  tec_wise_std()
    {
      if ($this->input->post('dailyDate')) {
        $dateDaily = $this->input->post('dailyDate');
  //echo       date('d-M-Y');die;
        $this->db->select('*');
        $this->db->from('student');
        $this->db->where('student_created_date',$dateDaily);
        $this->db->join('teacher','teacher.id=student.fkteacher_id');
        $this->db->order_by('teacher.id','asc');
        $query = $this->db->get();
    //  echo '<pre>';  print_r($query->result());
        return $result= $query->result();
      } 
      else
       {
        $this->db->select('*');
        $this->db->from('student');
        $this->db->where('student_created_date',date('d-M-Y'));
        $this->db->join('teacher','teacher.id=student.fkteacher_id');
        $this->db->order_by('teacher.id','asc');
        $query = $this->db->get();
    //  echo '<pre>';  print_r($query->result());
        return $result= $query->result();
      }
      
  //echo       date('d-M-Y');die;
        
    }

    //------------------------------------------------------

    function daily_balance_process()
    {
      $name = $this->input->post('stname');
      $fname = $this->input->post('fstname');
      $npaid = $this->input->post('unpaid');
      $fdate = $this->input->post('fromDate');
      $tdate = $this->input->post('toDate');

      $fnewDate = date("d-M-Y", strtotime($fdate));
      $tnewDate = date("d-M-Y", strtotime($tdate));

      if ($npaid == 1) {
        
        $this->db->where('std_date >=', $fnewDate);
        $this->db->where('std_date <=', $tnewDate);

        $this->db->select('*');
        $this->db->from('student_payment');
        $this->db->join('student', 'student.student_id = student_payment.fkstudentclassfee_id'); 
        $query = $this->db->get();

        return $query->result();  

      }
      else {



        $this->db->where('otherpay_created_date >=', $fnewDate);
        $this->db->where('otherpay_created_date <=', $tnewDate);

        $this->db->select('*');
        $this->db->from('student_other_payment');
        $this->db->join('student', 'student.student_id = student_other_payment.fkstudent_id'); 
        $query = $this->db->get();

        return $query->result();
        
      }
      
      

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

                 $date = date("Y-m-d", strtotime($row->date));
                 //echo $date;die;
                 if ($date > $interval && $date <= $current_date) {
                     $array = array(
                         'id' => $row->id,
                         'name' => $row->name,
                         'contact' => $row->contact,
                         'reason' => $row->reason,
                         'address' => $row->address,
                         'relationship' => $row->relationship,
                         'note' => $row->note,
                         'date' => $row->date,
                         'time' => $row->time,
                     );
                     $data[] = $array;
                 }
             }
                 if(isset($data)){
                     return $data;
                 }


        else{
            return 0;
        }

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

        if(isset($data)){
            return $data;
        }


        else{
            return 0;
        }
    }

    //------------------------------------------------------
    function monthlyvisitors()
    {
      if ($this->input->post('months') && $this->input->post('years')) {
          $months = $this->input->post('months');
          $year = $this->input->post('years');

          $this->db->where('v_month', $months);
          $this->db->where('v_year', $year);

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
        if(isset($data)){
            return $data;
        }


        else{
            return 0;
        }

        }else{

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
        if(isset($data)){
            return $data;
        }


        else{
            return 0;
        }
        }

    	
    }
    //------------------------------------------------------
    function monthly_teacherwisestudent()
    {
      if ($this->input->post('months') && $this->input->post('years')) {
        $months = $this->input->post('months');
        $years = $this->input->post('years');

        //student_created_date
        $newDate = date("d-M-Y", strtotime($months));

        $this->db->where('student_created_date', $newDate);

        $this->db->select('*');
        $this->db->from('student'); 
        $current_date = date('Y-m-d');
        $interval = date('Y-m-d', strtotime('-1 month') );
         $this->db->join('teacher','teacher.id=student.fkteacher_id');
        $this->db->order_by('teacher.id','asc');
        $query = $this->db->get();
        $result= $query->result();
       // print_r($result);die;
       
        return $result;
      } 
      else {
        $this->db->select('*');
        $this->db->from('student'); 
        $current_date = date('Y-m-d');
        $interval = date('Y-m-d', strtotime('-1 month') );
         $this->db->join('teacher','teacher.id=student.fkteacher_id');
        $this->db->order_by('teacher.id','asc');
        $query = $this->db->get();
        $result= $query->result();
       // print_r($result);die;
       
        return $result;
      }
      
        
    }
     //------------------------------------------------------
    function yearly_teacherwisestudent()
    {
        if ($this->input->post('years')) {
        $years = $this->input->post('years');

        //student_created_date
        $newDate = date("Y", strtotime($years));

        $this->db->where('student_created_date', $newDate);

        $this->db->select('*');
        $this->db->from('student'); 
        $current_date = date('Y-m-d');
        $interval = date('Y-m-d', strtotime('-1 yeats') );
         $this->db->join('teacher','teacher.id=student.fkteacher_id');
        $this->db->order_by('teacher.id','asc');
        $query = $this->db->get();
        $result= $query->result();
       // print_r($result);die;
       
        return $result;
      }
      else
      {
        $this->db->select('*');
        $this->db->from('student'); 
        $current_date = date('Y-m-d');
        $interval = date('Y-m-d', strtotime('-1 yeats') );
         $this->db->join('teacher','teacher.id=student.fkteacher_id');
        $this->db->order_by('teacher.id','asc');
        $query = $this->db->get();
        $result= $query->result();
       // print_r($result);die;
       
        return $result;
      }
    }

    //------------------------------------------------------
    function monthlystudents()
    {
      if ($this->input->post('months') && $this->input->post('years')) {
         $months = $this->input->post('months');
        $year = $this->input->post('years');

        $this->db->where('student_month', $months);
        $this->db->where('student_year', $year);


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

        if(isset($data)){
            return $data;
        }


        else{
            return 0;
        }
      } else {
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

        if(isset($data)){
            return $data;
        }


        else{
            return 0;
        }
      }
      
       
        
    }

    function yearly_visitor_reports()
    {
        if ($this->input->post('years')) {
          $yearly = $this->input->post('years');
          $this->db->where('v_year', $yearly);

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

        if(isset($data)){
            return $data;
        }


        else{
            return 0;
        }

         }
         else{
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

        if(isset($data)){
            return $data;
        }


        else{
            return 0;
        }

         } 
            

    }

     function yearlystudents()
     {
        if ($this->input->post('years')) {
          $yearly = $this->input->post('years');
          $this->db->where('student_year', $yearly);

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

         if(isset($data)){
             return $data;
         }


         else{
             return 0;
         }
        } else {
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

         if(isset($data)){
             return $data;
         }


         else{
             return 0;
         }
        }
        
        
    }
    

    function fee_daily_finance()
    {
        $this->db->select('*');
        $this->db->from('student_payment');
        $this->db->where('std_month',date("M"));
        $this->db->where('std_year',date("Y"));
        $query = $this->db->get();
        return $result= $query->result();
    }

    function otherfee_daily_finance()
    {
        $this->db->select('*');
        $this->db->from('student_other_payment');
        $this->db->where('other_month',date("M"));
        $this->db->where('other_year',date("Y"));
        $query = $this->db->get();
        return $result= $query->result();
    }

    function daily_expense()
    {
        $this->db->select('*');
        $this->db->from('expense');
        $this->db->where('expense_month',date("M"));
        $this->db->where('expense_year',date("Y"));
        $query = $this->db->get();
        $result= $query->result();
        $expense_array = [];
        foreach( $result as $expense ){
            $expense_array[$expense->expense_reason][] = $expense;
        }
        // echo '<pre>';
        // print_r($expense_array);
        // die;
        return $expense_array;
    }

    function daily_staff()
    {
        $this->db->select('*');
        $this->db->from('staff_salaries');
        $this->db->where('paid_month',date("m"));
        $this->db->where('paid_year',date("Y"));
        $query = $this->db->get();
        return $result= $query->result();
    }

function daily_teacher()
    {
        $this->db->select('*');
        $this->db->from('teacher_salaries');
        $this->db->where('paid_month',date("m"));
        $this->db->where('salary_year',date("Y"));
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
        if(isset($dataa)){
            return $dataa;
        }


        else{
            return 0;
        }

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

        if(isset($dataa)){
            return $dataa;
        }


        else{
            return 0;
        }
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
        if(isset($dataa)){
            return $dataa;
        }


        else{
            return 0;
        }
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
        if(isset($dataa)){
            return $dataa;
        }


        else{
            return 0;
        }
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
        if(isset($dataa)){
            return $dataa;
        }


        else{
            return 0;
        }
    }


    /////////// MONTHLY REPORTS START/////////////////

    function monthly_profit_reports()
    {
        $year = date("Y");
        $this->db->select('*');
        $this->db->from('student_payment');
        $this->db->where("std_year",$year);
        $query = $this->db->get();
        $mpr = $query->result();

        if(isset($mpr)){
            return $mpr;
        }


        else{
            return 0;
        }
    }

    function monthly_other_profit_reports()
    {
        $year = date("Y");
        $this->db->select('*');
        $this->db->from('student_other_payment');
        $this->db->where("other_year",$year);
        $query = $this->db->get();
        $mpr = $query->result();

        if(isset($mpr)){
            return $mpr;
        }
        else{
            return 0;
        }
    }

 function monthly_expense_reports()
    {
        $this->db->select('*');
        $this->db->from('expense'); 
        $year = date('Y');
        $this->db->where("expense_year",$year);
        $query = $this->db->get();
        $mer = $query->result();

        if(isset($mer)){
            return $mer;
        }
        else{
            return 0;
        }
    }

//-------------------------------------------------------------------------
function monthly_staff_expense_reports()
    {
        $this->db->select('*');
        $this->db->from('staff_salaries');
        $year = date('Y');
        $this->db->where("paid_year",$year);
        $query = $this->db->get();
        $msr = $query->result();

        if(isset($msr)){
            return $msr;
        }
        else{
            return 0;
        }
    } 
//----------------------------------------------------------------
function monthly_teacher_expense_reports()
    {
        $this->db->select('*');
        $this->db->from('teacher_salaries');
        $year = date('Y');
        $this->db->where("salary_year",$year);
        $query = $this->db->get();
        $mtr = $query->result();
        if(isset($mtr)){
            return $mtr;
        }
        else{
            return 0;
        }
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
        if(isset($dataa)){
            return $dataa;
        }


        else{
            return 0;
        }
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

        if(isset($dataa)){
            return $dataa;
        }


        else{
            return 0;
        }
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
        if(isset($dataa)){
            return $dataa;
        }
        else{
            return 0;
        }
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
        if(isset($dataa)){
            return $dataa;
        }


        else{
            return 0;
        }
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
        if(isset($dataa)){
            return $dataa;
        }


        else{
            return 0;
        }
    }

    // --------------------------------------------------------------------------
    
    public function Students_reports(){

      return $this->db->get('teacher')->result();

    } 

    // ------------------------------------------------------------------------------

    public function student_sub_classes(){

      $subject_id = $this->input->post('adv_reg_no');
      $course_id  = $this->input->post('adv_name');
      $teacher_id = $this->input->post('adv_mobile_no');
      $from       = $this->input->post('from');
      $to         = $this->input->post('to');
      // $fee_type   = $this->input->post('fee_search');
      // print_r( $_POST );die;
      $this->db->select('*');
      $this->db->from('class');
      $this->db->join('course', 'course.co_id = class.co_id');
      $this->db->join('teacher', 'teacher.id = class.t_id');
      $this->db->join('subject', 'subject.su_id = class.su_id');
      $this->db->join('student_class_fee', 'student_class_fee.fkclass_id = class.cl_id');
      $this->db->join('student', 'student.student_id = student_class_fee.fkstudent_id');
      $this->db->where('student_class_fee.st_class_fee_status',1);

      if( !empty( $subject_id ) ){
        $this->db->where('class.su_id', $subject_id);
      }

      if( !empty( $course_id ) ){
        $this->db->where('class.co_id', $course_id);
      }

      if( !empty( $teacher_id ) ){
        $this->db->where('class.t_id', $teacher_id);
      }
      
      if( !empty( $from ) ){
        $from = date('d-M-Y', strtotime($from));
        $this->db->where('student.student_created_date >=', $from);
      }
      
      if( !empty( $to ) ){
        $to = date('d-M-Y', strtotime( $to ));
        $this->db->where('student.student_created_date <=', $to);
      }  
      $result = $this->db->get()->result();
      // echo '<pre>';
      // print_r( $result );
      // die;
      $result_array = [];
      foreach( $result as $student ){

        if( !array_key_exists( $student->student_id, $result_array ) ){
          $result_array[$student->student_id] = $student;
        }else{
          $result_array[$student->student_id]->su_name = $result_array[$student->student_id]->su_name .','. $student->su_name;          
        }

      }
      return $result_array;
      
    }

    // --------------------------------------------------------------------------
    
    public function Students_reports_subjects(){

      return $this->db->get('subject')->result();

    }

    // ----------------------------------------------------------------------------

    public function Students_reports_levels(){

      return $this->db->get('course')->result();

    }

    // --------------------------------------------------------------------------------

    public function balance_result(){

      $subject_id = $this->input->post('adv_reg_no');
      $course_id  = $this->input->post('adv_name');
      $teacher_id = $this->input->post('adv_mobile_no');
      $fee_type   = $this->input->post('fee_search');
//       print_r( $_POST );die;
      $this->db->select('*');
      $this->db->from('class');
      $this->db->join('course', 'course.co_id = class.co_id');
      $this->db->join('teacher', 'teacher.id = class.t_id');
      $this->db->join('subject', 'subject.su_id = class.su_id');
      $this->db->join('student_class_fee', 'student_class_fee.fkclass_id = class.cl_id');
      $this->db->join('student', 'student.student_id = student_class_fee.fkstudent_id');
      if( $fee_type == 'left'){
        $this->db->where('student_class_fee.class_left', '1');
      }else{
        $this->db->where('student_class_fee.class_left !=', '1');
      }
      

      if( !empty( $subject_id ) ){
        $this->db->where('class.su_id', $subject_id);
      }

      if( !empty( $course_id ) ){
        $this->db->where('class.co_id', $course_id);
      }

      if( !empty( $teacher_id ) ){
        $this->db->where('class.t_id', $teacher_id);
      }  
      $result = $this->db->get()->result();
      
      if( $fee_type != null ){
        if( $fee_type == 'admission_fee' ){
          $admission_fee['status'] = 'admission_fee';
          foreach( $result as $student ){
              if( !isset( $admission_fee[$student->student_id] ) ){
                  $this->db->order_by('otherpay_id','desc');
                  $this->db->limit(1);
                  $this->db->where('fkstudent_id',$student->student_id);
                  $query = $this->db->get('student_other_payment');
                  $payment_details = $query->result();
                  if( $payment_details[0]->otherfee_remain > 0 ){
                    $admission_fee[$student->student_id] = $student;
                    $admission_fee[$student->student_id]->remaning_fee = $payment_details[0]->otherfee_remain;
                  }
              }
          }
          return $admission_fee;
        }elseif( $fee_type == 'monthly_fee' || $fee_type == 'left' ){
          $montly_fee = [];
          $montly_fee['status'] = 'montly_fee';
          foreach( $result as $student ){
              if( !isset( $montly_fee[$student->student_id] ) ){
                $this->db->order_by('p_id','desc');
                $this->db->limit(1);
                $this->db->where('fkstudentclassfee_id',$student->classfee_id);
                $query = $this->db->get('student_payment');
                $payment_details = $query->result();
//                print_r($payment_details);die;
                if( $payment_details == null ){
                    if( !key_exists($student->student_id, $montly_fee) ){
                        $montly_fee[$student->student_id] = $student;
                        $montly_fee[$student->student_id]->remaning_fee  = $student->to_be_pay;
                    }else{
                        $montly_fee[$student->student_id]->remaning_fee += $student->to_be_pay; 
                    }
                }else{
                  if( $payment_details[0]->std_remain > 0 ){
                    if( !key_exists($student->student_id, $montly_fee) ){  
                        $montly_fee[$student->student_id] = $student;
                        $montly_fee[$student->student_id]->remaning_fee  = $payment_details[0]->std_remain;
                    }else{
                        $montly_fee[$student->student_id]->remaning_fee += $payment_details[0]->std_remain; 
                    }
                  }
                }
              }
          }
          return $montly_fee;
        } else if ( $fee_type == 'trf_discounts' ){
            
            $admission_fee['status'] = 'trf_discounts';
            foreach( $result as $student ){
                if( !isset( $admission_fee[$student->student_id] ) ){
                    $this->db->order_by('otherpay_id','desc');
                    $this->db->limit(1);
                    $this->db->where('fkstudent_id',$student->student_id);
                    $query = $this->db->get('student_other_payment');
                    $payment_details = $query->result();
                    if( $payment_details[0]->other_discount > 0 ){
                      $admission_fee[$student->student_id] = $student;
                      $admission_fee[$student->student_id]->discount = $payment_details[0]->other_discount;
                      $admission_fee[$student->student_id]->reason   = $payment_details[0]->other_reason;
                    }
                }
            }
            return $admission_fee;
            
        } else if ( $fee_type == 'monthly_discounts' ){
            $montly_fee = [];
            $montly_fee['status'] = 'monthly_discounts';
//            echo '<pre>';
            foreach( $result as $student ){
              if( !isset( $montly_fee[$student->student_id] ) ){
                $this->db->order_by('p_id','desc');
                $this->db->limit(1);
                $this->db->where('fkstudentclassfee_id',$student->classfee_id);
                $query = $this->db->get('student_payment');
                $payment_details = $query->result();
                if( !empty( $payment_details ) ){
                    if( $payment_details[0]->std_discount > 0 ){
                        if( !key_exists($student->student_id, $montly_fee) ){  
                            $montly_fee[$student->student_id] = $student;
                            $montly_fee[$student->student_id]->montly_fee_discount  = $payment_details[0]->std_discount;
                            $montly_fee[$student->student_id]->reason               = $payment_details[0]->std_reason_dis;
                        }else{
                            $montly_fee[$student->student_id]->montly_fee_discount += $payment_details[0]->std_discount;
                            $montly_fee[$student->student_id]->reason               = $payment_details[0]->std_reason_dis; 
                        }
                    }
                }
            }
            
                    }
            return $montly_fee;
//            echo '<pre>';
//            print_r($montly_fee);
//            die;
        }
      }
//      return $result = $this->db->get()->result();  
    }
    
    // -------------------------------------------------------------------------
    public function paid_students(){
        
      $subject_id = $this->input->post('adv_reg_no');
      $course_id  = $this->input->post('adv_name');
      $teacher_id = $this->input->post('adv_mobile_no');
      $fee_type   = $this->input->post('fee_search');
      //print_r( $_POST );die;
      $this->db->select('*');
      $this->db->from('class');
      $this->db->join('course', 'course.co_id = class.co_id');
      $this->db->join('teacher', 'teacher.id = class.t_id');
      $this->db->join('subject', 'subject.su_id = class.su_id');
      $this->db->join('student_class_fee', 'student_class_fee.fkclass_id = class.cl_id');
      $this->db->join('student', 'student.student_id = student_class_fee.fkstudent_id');
      

      if( !empty( $subject_id ) ){
        $this->db->where('class.su_id', $subject_id);
      }

      if( !empty( $course_id ) ){
        $this->db->where('class.co_id', $course_id);
      }

      if( !empty( $teacher_id ) ){
        $this->db->where('class.t_id', $teacher_id);
      }
      
      $result = $this->db->get()->result();
      return $result;
      
    }
    
    // -------------------------------------------------------------------------

    public function paid_students_pro( $data ){

      $student_payments = [];
      $from = $this->input->post('from');
      $to   = $this->input->post('to');
//      print_r( $_POST );die;
      foreach( $data as $elements ){
        
        $this->db->select('*');
        $this->db->from('student_payment');
        $this->db->join('teacher_subject', "teacher_subject.t_id='$elements->id' AND teacher_subject.sub_id='$elements->su_id'");
        $this->db->where( 'student_payment.fkstudentclassfee_id', $elements->classfee_id );
        if( !empty( $from ) ){
            $from = date('d-M-Y', strtotime($from));
            $this->db->where('student_payment.std_date >=', $from);
        }  
        if( !empty( $to ) ){
            $to   = date('d-M-Y', strtotime($to));
            $this->db->where('student_payment.std_date <=', $to);
        }   
        $query  = $this->db->get();
        $result = $query->result();
        // echo '<pre>';print_r( $result );die;
        foreach( $result as $payment ){
          if( $payment->std_paid > 0 ){
            if( !array_key_exists($elements->student_id, $student_payments) ){
              $student_payments[$elements->student_id]['name']         = $elements->student_name;
              $student_payments[$elements->student_id]['f_name']       = $elements->std_father_name;
              $student_payments[$elements->student_id]['amount']       = $payment->std_paid;
              $comission                                               = '0.' . $payment->comission;
              $student_payments[$elements->student_id]['seeds_share']  = $payment->std_paid * $comission;
            }else{
              $student_payments[$elements->student_id]['amount']      += $payment->std_paid;
              $comission                                               = '0.' . $payment->comission;
              $student_payments[$elements->student_id]['seeds_share'] += $payment->std_paid * $comission;
            }
          }
        }

      }
      return $student_payments;
    }

    // ---------------------------------------------------------------------------
    public function paid_trf_reports($array){

      $array_trf = [];
      foreach( $array as $student_id => $student ){
        
        $this->db->where('fkstudent_id', $student_id);
        $query  = $this->db->get('student_other_payment');
        $result = $query->result();
        foreach( $result as $trf ){
          if( $trf->paid_amt > 0 ){
            if( !array_key_exists($student_id, $array_trf) ){
              $array_trf[$student_id]          = $student;
              $array_trf[$student_id]['trf']   = $trf->paid_amt;
            }else{
              $array_trf[$student_id]['trf']  += $trf->paid_amt;
            }
          }
        }
      }
      return $array_trf;
    }
    // ---------------------------------------------------------------------------

    function get_all_teachers(){
        
        $teacher = $this->input->post('adv_mobile_no');
        if( !empty( $teacher ) ){
            $this->db->where( 'id', $teacher );  
        }
        $query  = $this->db->get('teacher');
        $result = $query->result();
        return $result;

    }

    // ----------------------------------------------------------------------------

    function get_all_teachers_payments( $data ){
     
      $from  = $this->input->post('from');
      $to    = $this->input->post('to'); 
//      $this->db->where('', );  
      $array = [];
      foreach( $data as $element ){

        if( !empty( $from ) ){
            $from = date('d-M-Y', strtotime($from));
            $this->db->where('created_date >=', $from);
        }
        if( !empty( $to ) ){
            $to = date('d-M-Y', strtotime($to));
            $this->db->where('created_date <=', $to);
        }            
                   $this->db->where('fkteacher_id', $element->id);
        $query  =  $this->db->get('teacher_salaries');
        $result =  $query->result();
        
        if( !empty( $result ) ){
          foreach($result as $payment){
            if( $payment->paid_salary > 0 ){
              if( !array_key_exists( $element->id, $array) ){
                $array[$element->id]               = $element;
                $array[$element->id]->paid_salary  = $payment->paid_salary;
              }else{
                $array[$element->id]->paid_salary += $payment->paid_salary;
              }
            }
          }        
        }         
      }
      
      return $array;
    }

    // ----------------------------------------------------------------------------
    
    public function get_sum_montly_fee(){
        
        $from = $this->input->post('from');
        $to   = $this->input->post('to');

        $this->db->select('*');
        $this->db->from('class');
        $this->db->join('course', 'course.co_id = class.co_id');
        $this->db->join('teacher', 'teacher.id = class.t_id');
        $this->db->join('subject', 'subject.su_id = class.su_id');
        $this->db->join('student_class_fee', 'student_class_fee.fkclass_id = class.cl_id');
        $this->db->join('student', 'student.student_id = student_class_fee.fkstudent_id');
        $data = $this->db->get()->result();
        $student_payments = [];
        foreach( $data as $elements ){

            if( !empty( $from ) ){
              $from = date('d-M-Y', strtotime( $from ));
              $this->db->where( 'std_date >=', $from );
            }
            if( !empty( $to ) ){
              $to = date('d-M-Y', strtotime( $to ));
              $this->db->where( 'std_date <=', $to );
            }
                      $this->db->where( 'fkstudentclassfee_id', $elements->classfee_id );
            $query  = $this->db->get('student_payment');
            $result = $query->result();
            foreach( $result as $payment ){
                if( $payment->std_paid > 0 ){
                  if( !array_key_exists($elements->student_id, $student_payments) ){
                    $student_payments[$elements->student_id]['name']    = $elements->student_name;
                    $student_payments[$elements->student_id]['f_name']  = $elements->std_father_name;
                    $student_payments[$elements->student_id]['amount']  = $payment->std_paid;
                  }else{
                    $student_payments[$elements->student_id]['amount'] += $payment->std_paid;
                  }
                }
              }
        }
        $sum = 0;
        foreach ($student_payments as $item) {
            $sum += $item['amount'];
        }
        return $sum;
        
    }
    
    // -----------------------------------------------------------------------------
    
    public function get_sum_trf() {

        $from = $this->input->post('from');
        $to   = $this->input->post('to');
        $this->db->select_sum('paid_amt');
        $this->db->from('student_other_payment');
        if( !empty( $from ) ){
          $from = date('d-M-Y', strtotime( $from ));
          $this->db->where( 'otherpay_created_date >=', $from );
        }
        if( !empty( $to ) ){
          $to = date('d-M-Y', strtotime( $to ));
          $this->db->where( 'otherpay_created_date <=', $to );
        }
        $query = $this->db->get();
        return $query->row()->paid_amt;

    }
    
    // -----------------------------------------------------------------------------
    
    public function get_sum_expense() {
        $from = $this->input->post('from');
        $to   = $this->input->post('to');
        $this->db->select_sum('expense_paid_amount');
        $this->db->from('expense');
        if( !empty( $from ) ){
          $from = date('d-M-Y', strtotime( $from ));
          $this->db->where( 'expense_created_date >=', $from );
        }
        if( !empty( $to ) ){
          $to = date('d-M-Y', strtotime( $to ));
          $this->db->where( 'expense_created_date <=', $to );
        }
        $query = $this->db->get();
        return $query->row()->expense_paid_amount;
    }
    
    // -----------------------------------------------------------------------------    
    
    public function get_sum_salaries() {
        $from = $this->input->post('from');
        $to   = $this->input->post('to');
        $this->db->select_sum('paid_salary');
        $this->db->from('teacher_salaries');
        if( !empty( $from ) ){
          $from = date('d-M-Y', strtotime( $from ));
          $this->db->where( 'created_date >=', $from );
        }
        if( !empty( $to ) ){
          $to = date('d-M-Y', strtotime( $to ));
          $this->db->where( 'created_date <=', $to );
        }
        $query = $this->db->get();
        return $query->row()->paid_salary;
        
    }
    
    // -----------------------------------------------------------------------------
	
	public function seeds_share(){

            $teacher_id = $this->input->post( 'adv_mobile_no' );
            $from       = $this->input->post( 'from' );
            $to         = $this->input->post( 'to' );
            
            $this->db->select('*');
            $this->db->from('teacher_salaries');
            $this->db->join( 'teacher', 'teacher_salaries.fkteacher_id=teacher.id');
            if( !empty( $teacher_id ) ){
                $this->db->where( 'teacher_salaries.fkteacher_id', $teacher_id );
            }
            if( !empty( $from ) ){
                $from = date('d-M-Y', strtotime( $from ));
                $this->db->where( 'teacher_salaries.created_date >=', $from );
            }
            if( !empty( $to ) ){
                $to = date('d-M-Y', strtotime( $to ));
                $this->db->where( 'teacher_salaries.created_date <=', $to );
            }
            $query = $this->db->get();
            return $query->result();
           
	}
	
	// -----------------------------------------------------------------------------
        
        public function get_seeds_share_payment_details( $data ){
            
            $array = [];
            foreach( $data as $teacher_payment ){
                
                $this->db->select_sum('std_paid');
                $this->db->from('student_payment');
                $this->db->where('student_payment.teacher_salary_id', $teacher_payment->sa_id);
                $query = $this->db->get();
                $array[$teacher_payment->sa_id]            = $teacher_payment;
                $array[$teacher_payment->sa_id]->payments  = $query->row()->std_paid;
            }
            
            return $array;
            
        }
        
	// -----------------------------------------------------------------------------
}