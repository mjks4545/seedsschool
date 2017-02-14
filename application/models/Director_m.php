<?php

class Director_m extends CI_Model
{
    
    // ---------------------------------------------------------------------
    
    public function get_list_of_defaulters(){
        
        $this->db->select('*');
        $this->db->from('class');
        $this->db->join('course', 'course.co_id = class.co_id');
        $this->db->join('teacher', 'teacher.id = class.t_id');
        $this->db->join('subject', 'subject.su_id = class.su_id');
        $this->db->join('student_class_fee', 'student_class_fee.fkclass_id = class.cl_id');
        $this->db->join('student', 'student.student_id = student_class_fee.fkstudent_id');
        $result = $this->db->get()->result();
        $montly_fee = [];
        foreach( $result as $student ){
            if( !isset( $montly_fee[$student->student_id] ) ){
              $this->db->order_by('p_id','desc');
              $this->db->limit(1);
              $this->db->where('fkstudentclassfee_id',$student->classfee_id);
              $query = $this->db->get('student_payment');
              $payment_details = $query->result();
              if( $payment_details == null ){
                  if( !key_exists($student->student_id, $montly_fee) ){
                      $montly_fee[$student->student_id]['student_name']  = $student->student_name;
                      $montly_fee[$student->student_id]['remaning_fee']  = $student->to_be_pay;
                  }else{
                      $montly_fee[$student->student_id]['remaning_fee'] += $student->to_be_pay; 
                  }
              }else{
                if( $payment_details[0]->std_remain > 0 ){
                  if( !key_exists($student->student_id, $montly_fee) ){  
                      $montly_fee[$student->student_id]['student_name'] = $student->student_name;
                      $montly_fee[$student->student_id]['remaning_fee']  = $payment_details[0]->std_remain;
                  }else{
                      $montly_fee[$student->student_id]['remaning_fee'] += $payment_details[0]->std_remain; 
                  }
                }
              }
            }
        }
        return $montly_fee;
    }
    
    // ----------------------------------------------------------------------
        
        function sortByWeight($a, $b)
        {
                $a = $a['remaning_fee'];
                $b = $b['remaning_fee'];

                if ($a == $b)
                {
                        return 0;
                }

                return ($a < $b) ? -1 : 1;
        }
        
        public function get_list_of_defaulters_15( $data ){
            
            usort($data, array( $this, 'sortByWeight') );
            $var = count($data);
            $array = [];
            
            for( $i = 1; $i <= 15; $i++ ){
                $var--;
                $array[] = $data[$var];
            }
            return $array;

        }
        
    // ----------------------------------------------------------------------
        function sortByPaidAmount($a, $b)
        {
                $a = $a['amount'];
                $b = $b['amount'];

                if ($a == $b)
                {
                        return 0;
                }

                return ($a < $b) ? -1 : 1;
        }
        
        public function good_paying_customers(){
            
            $this->db->select('*');
            $this->db->from('class');
            $this->db->join('course', 'course.co_id = class.co_id');
            $this->db->join('teacher', 'teacher.id = class.t_id');
            $this->db->join('subject', 'subject.su_id = class.su_id');
            $this->db->join('student_class_fee', 'student_class_fee.fkclass_id = class.cl_id');
            $this->db->join('student', 'student.student_id = student_class_fee.fkstudent_id');
            $result = $this->db->get()->result();
            $student_payments = [];
            foreach( $result as $elements ){
                $this->db->select('*');
                $this->db->from('student_payment');
                $this->db->join('teacher_subject', "teacher_subject.t_id='$elements->id' AND teacher_subject.sub_id='$elements->su_id'");
                $this->db->where( 'student_payment.fkstudentclassfee_id', $elements->classfee_id );
                $query  = $this->db->get();
                $result = $query->result();
                foreach( $result as $payment ){
                  if( $payment->std_paid > 0 ){
                    if( !array_key_exists( $elements->student_id, $student_payments ) ){
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
                usort($student_payments, array( $this, 'sortByPaidAmount') );
                $var = count($student_payments);
                $array = [];

                for( $i = 1; $i <= 15; $i++ ){
                    $var--;
                    $array[] = $student_payments[$var];
                }
                return $array;
        }
    // ----------------------------------------------------------------------
    
        public function below_avg_classes(){
            
            $this->db->select( '*' );
            $this->db->from( 'class' );
            $this->db->join( 'subject', 'subject.su_id=class.su_id');
            $this->db->join( 'course', 'course.co_id=class.co_id');
            $this->db->where( 'class.class_status', 1 );
            $result = $this->db->get()->result();
            $array = [];
            $data  = [];
            $sum   = 0;
            $i     = 1;
            foreach( $result as $class ){
                                             $this->db->where( 'fkclass_id', $class->cl_id );
                $array[$class->cl_id]      = $this->db->get('student_class_fee')->result();
                $data[$class->cl_id]['co_name']  = $class->co_name;
                $data[$class->cl_id]['su_name']  = $class->su_name;
                $data[$class->cl_id]['sum']      = count( $array[$class->cl_id] );
                $sum                      += $data[$class->cl_id]['sum'];
                $i++;
            }
            
            $data['avg'] = (int)( $sum/$i-1 );
            return $data;
        }
        
    // ----------------------------------------------------------------------
        
        public function defaulters_subject_wise(){
            
            $this->db->select('*');
            $this->db->from('class');
            $this->db->join('course', 'course.co_id = class.co_id');
            $this->db->join('teacher', 'teacher.id = class.t_id');
            $this->db->join('subject', 'subject.su_id = class.su_id');
            $this->db->join('student_class_fee', 'student_class_fee.fkclass_id = class.cl_id');
            $this->db->join('student', 'student.student_id = student_class_fee.fkstudent_id');
            $result = $this->db->get()->result();
            $montly_fee  = [];
            $teacher_fee = []; 
            foreach( $result as $student ){
                if( !isset( $montly_fee[$student->student_id] ) ){
                  $this->db->order_by('p_id','desc');
                  $this->db->limit(1);
                  $this->db->where('fkstudentclassfee_id',$student->classfee_id);
                  $query = $this->db->get('student_payment');
                  $payment_details = $query->result();
                  if( $payment_details == null ){
                      if( !key_exists($student->su_name, $montly_fee) ){
                          $montly_fee[$student->su_name]['su_name'] = $student->su_name;
                          $montly_fee[$student->su_name]['remaning_fee']  = $student->to_be_pay;
                      }else{
                          $montly_fee[$student->su_name]['remaning_fee'] += $student->to_be_pay; 
                      }
                      if( !key_exists($student->name, $teacher_fee) ){
                          $teacher_fee[$student->name]['t_name'] = $student->name;
                          $teacher_fee[$student->name]['remaning_fee']  = $student->to_be_pay;
                      }else{
                          $teacher_fee[$student->name]['remaning_fee'] += $student->to_be_pay; 
                      }
                  }else{
                    if( $payment_details[0]->std_remain > 0 ){
                      if( !key_exists($student->su_name, $montly_fee) ){  
                          $montly_fee[$student->su_name]['su_name'] = $student->su_name;
                          $montly_fee[$student->su_name]['remaning_fee']  = $payment_details[0]->std_remain;
                      }else{
                          $montly_fee[$student->su_name]['remaning_fee'] += $payment_details[0]->std_remain; 
                      }
                      if( !key_exists($student->name, $teacher_fee) ){  
                          $teacher_fee[$student->name]['t_name'] = $student->name;
                          $teacher_fee[$student->name]['remaning_fee']  = $payment_details[0]->std_remain;
                      }else{
                          $teacher_fee[$student->name]['remaning_fee'] += $payment_details[0]->std_remain; 
                      }
                    }
                  }
                }
            }
            $fee_var['subject_vise'] = $montly_fee;
            $fee_var['teacher_vise'] = $teacher_fee;
            return $fee_var;
        }
        
    // ----------------------------------------------------------------------
      
      public function get_daily_attandance(){

        $date  = date('d-M-Y');
        $query = $this->db
                        ->select('*')
                        ->from('student_attendance')              
                        ->order_by( 'student_attendance.att_date', 'desc')
                        ->join('student_class_fee','student_class_fee.fkstudent_id=student_attendance.fkstudent_id')
                        ->join('student','student.student_id=student_attendance.fkstudent_id')
                        ->join('class', 'class.cl_id=student_attendance.fkclass_id')
                        ->join('course', 'course.co_id=class.co_id')
                        ->join('subject', 'subject.su_id=class.su_id')
                        ->where('student_attendance.att_date',$date)
                        ->get()  
                        ->result();
        $array = [];                
        foreach( $query as $class_attendense ){

          if( !array_key_exists( $class_attendense->cl_id, $array ) ){

            if( $class_attendense->status == 'p' ){

              $array[$class_attendense->cl_id]['present']     = 1;
              $array[$class_attendense->cl_id]['absent']      = 0;
              $array[$class_attendense->cl_id]['class_name']  = $class_attendense->co_name . ' - '. $class_attendense->su_name;

            }else{

              $array[$class_attendense->cl_id]['present'] = 0;
              $array[$class_attendense->cl_id]['absent']  = 1;
              $array[$class_attendense->cl_id]['class_name']  = $class_attendense->co_name . ' - '. $class_attendense->su_name;

            }

          }else{
            if( $class_attendense->status == 'p' ){

              $array[$class_attendense->cl_id]['present'] += 1;
              $array[$class_attendense->cl_id]['absent']  += 0;

            }else{

              $array[$class_attendense->cl_id]['present'] += 0;
              $array[$class_attendense->cl_id]['absent']  += 1;

            }
          }

        }                
        foreach( $array as $key => $values ){

          $array[$key]['sum'] = $values['present'] + $values['absent'];
          $array[$key]['per'] = ($values['present']/$array[$key]['sum']) * 100;
 
        }
        return $array;
      }

    // -----------------------------------------------------------------------
      
      public function get_daily_student_registration(){

        $internal = date("d-M-Y");
        $internal = date("d-M-Y", strtotime("-7 day", strtotime($internal)));
        $this->db->select('*');
        $this->db->from('class');
        $this->db->join('course', 'course.co_id = class.co_id');
        $this->db->join('teacher', 'teacher.id = class.t_id');
        $this->db->join('subject', 'subject.su_id = class.su_id');
        $this->db->join('student_class_fee', 'student_class_fee.fkclass_id = class.cl_id');
        $this->db->join('student', 'student.student_id = student_class_fee.fkstudent_id');
        $this->db->where( 'student_created_date >=', $internal);
        $result = $this->db->get()->result();
        $array = [];
        foreach ( $result as $student ){

          if( !array_key_exists( $student->cl_id, $array ) ){

              $array[$student->cl_id]['class']      = $student->co_name . ' - ' . $student->su_name; 
              $array[$student->cl_id]['number_stds'] = 1;
          }else{
              $array[$student->cl_id]['number_stds'] = $array[$student->cl_id]['number_stds'] + 1;
          }

        }
        return $array;
      } 

    // -----------------------------------------------------------------------

      function active_deactive_students(){

        $internal = date("d-M-Y");
        $internal = date("d-M-Y", strtotime("-7 day", strtotime($internal)));
        $this->db->select('*');
        $this->db->from('class');
        $this->db->join('course', 'course.co_id = class.co_id');
        $this->db->join('teacher', 'teacher.id = class.t_id');
        $this->db->join('subject', 'subject.su_id = class.su_id');
        $this->db->join('student_class_fee', 'student_class_fee.fkclass_id = class.cl_id');
        $this->db->join('student', 'student.student_id = student_class_fee.fkstudent_id');
        $this->db->where( 'student_created_date >=', $internal);
        $result = $this->db->get()->result();
        $array = [];
        foreach ( $result as $student ){

          if( !array_key_exists( $student->cl_id, $array ) ){
              $array[$student->cl_id]['class']              = $student->co_name . ' - ' . $student->su_name; 
              if( $student->st_class_fee_status == 0 || $student->student_status == 0 ){
                  $array[$student->cl_id]['deactive_number_stds'] = 1;
              }else{
                  $array[$student->cl_id]['active_number_stds'] = 1;
              }
          }else{
              if( $student->st_class_fee_status == 0 || $student->student_status == 0 ){
                  if( isset( $array[$student->cl_id]['deactive_number_stds'] ) ){
                    $array[$student->cl_id]['deactive_number_stds'] = $array[$student->cl_id]['deactive_number_stds'] + 1;
                  }else{
                    $array[$student->cl_id]['deactive_number_stds'] = 1;
                  }
              }else{
                  if( isset( $array[$student->cl_id]['active_number_stds'] ) ){
                    $array[$student->cl_id]['active_number_stds'] = $array[$student->cl_id]['active_number_stds'] + 1;
                  }else{
                    $array[$student->cl_id]['active_number_stds'] = 1;
                  }
              }
          }

        }
        return $array;  

      }

    // -----------------------------------------------------------------------
      
      public function get_weekly_attandance(){
        $query = $this->db
                        ->select('*')
                        ->from('student_attendance')
                        ->order_by( 'student_attendance.att_date', 'desc')
                        ->join('class', 'class.cl_id=student_attendance.fkclass_id')
                        ->join('course', 'course.co_id=class.co_id')
                        ->join('subject', 'subject.su_id=class.su_id')
                        ->where( 'student_attendance.month', date('M'))
                        ->where( 'student_attendance.year', date('Y'))
                        ->get()
                        ->result();  
        $student_attendance    = $query;
        $student_attendance_new = [];
        foreach( $student_attendance as $date ){

                     $this->db->where( 'student_attendance.month', date('M'));
                     $this->db->where( 'student_attendance.year', date('Y'));
                     $this->db->where('status','p');
                     $this->db->where( 'fkclass_id' , $date->fkclass_id);
            $query = $this->db->get('student_attendance');
            $student_attendance_new[$date->fkclass_id]['present']      = $query->num_rows();
            $student_attendance_new[$date->fkclass_id]['class_name']   = $date->co_name . ' - ' . $date->su_name;
            
        }
        foreach( $student_attendance as $date ){
                     $this->db->where( 'student_attendance.month', date('M'));
                     $this->db->where( 'student_attendance.year', date('Y'));
                     $this->db->where('status','a');
                     $this->db->where( 'fkclass_id' , $date->fkclass_id);
            $query = $this->db->get('student_attendance');
            $student_attendance_new[$date->fkclass_id]['absent'] = $query->num_rows();
        }
        foreach ( $student_attendance_new as $key => $student ) {
            $student_attendance_new[$key]['sum'] = $student['present'] + $student['absent'];
            if( $student_attendance_new[$key]['sum'] != 0 ){
              $student_attendance_new[$key]['per'] = ( $student['present']/$student_attendance_new[$key]['sum'] ) * 100;   
            }
        }
        return $student_attendance_new;
      }

    // -----------------------------------------------------------------------
      
      function list_of_defaulters_since(){

        $this->db->select('*');
        $this->db->from('class');
        $this->db->join('course', 'course.co_id = class.co_id');
        $this->db->join('teacher', 'teacher.id = class.t_id');
        $this->db->join('subject', 'subject.su_id = class.su_id');
        $this->db->join('student_class_fee', 'student_class_fee.fkclass_id = class.cl_id');
        $this->db->join('student', 'student.student_id = student_class_fee.fkstudent_id');
        $result = $this->db->get()->result();
        $montly_fee = [];
        foreach( $result as $student ){
            if( !isset( $montly_fee[$student->student_id] ) ){
              $this->db->order_by('p_id','desc');
              $this->db->limit(1);
              $this->db->where('fkstudentclassfee_id',$student->classfee_id);
              $this->db->where('std_paid > ', 0);
              $query = $this->db->get('student_payment');
              $payment_details = $query->result();
//                print_r($payment_details);die;
              if( $payment_details == null ){
                  if( !key_exists($student->student_id, $montly_fee) ){
                      $montly_fee[$student->student_id]['name']          = $student->student_name;
                      $montly_fee[$student->student_id]['remaning_fee']  = $student->to_be_pay;
                      $montly_fee[$student->student_id]['date_since']    = $student->classfee_created_date;
                  }else{
                      $montly_fee[$student->student_id]['remaning_fee'] += $student->to_be_pay;
                      $montly_fee[$student->student_id]['date_since']    = $student->classfee_created_date; 
                  }
              }else{
                if( $payment_details[0]->std_remain > 0 ){
                  if( !key_exists($student->student_id, $montly_fee) ){  
                      $montly_fee[$student->student_id]['name']          = $student->student_name;
                      $montly_fee[$student->student_id]['remaning_fee']  = $payment_details[0]->std_remain;
                      $montly_fee[$student->student_id]['date_since']    = $payment_details[0]->std_date;
                  }else{
                      $montly_fee[$student->student_id]['remaning_fee'] += $payment_details[0]->std_remain;
                      $montly_fee[$student->student_id]['date_since']    = $payment_details[0]->std_date; 
                  }
                }
              }
            }
        } 
        return $montly_fee;
      }

    // ------------------------------------------------------------------------
    
    public function list_of_defaulters_since_12( $data ){

        $new_array = [];
        foreach ( $data as $key => $student ) {
            
            $orignal_date1  = $student['date_since'];
            $orignal_date2  = date('d-M-Y');
            $date1          = date_create($orignal_date1);
            $date2          = date_create($orignal_date2);
            $diff           = date_diff( $date1, $date2 );
            $difference     = $diff->format("%a");
            $new_array[$key]      = $student;
            $new_array[$key]['date_diff'] = $difference;
        }
        return $new_array;
    }

    // ------------------------------------------------------------------------
      
      function level_break_up(){

        $this->db->select('*');
        $this->db->from('class');
        $this->db->join( 'student_class_fee', 'student_class_fee.fkclass_id=class.cl_id');
        $this->db->or_where('class.co_id', 3);
        $this->db->or_where('class.co_id', 5);
        $this->db->where('student_class_fee.st_class_fee_status',1);
        $query = $this->db->get();
        $result = $query->result();
        // echo '<pre>';
        // print_r($result);
        // die;
        $array = [];        
        foreach( $result as $student ){

          if( !array_key_exists( $student->fkstudent_id, $array ) ){
              $array[$student->fkstudent_id] = $student->fkstudent_id;
          }

        }

        $olevel_students['olevel'] = count($array);

        $this->db->select('*');
        $this->db->from('class');
        $this->db->join( 'student_class_fee', 'student_class_fee.fkclass_id=class.cl_id');
        $this->db->or_where('class.co_id', 4);
        $this->db->or_where('class.co_id', 6);
        $this->db->where('student_class_fee.st_class_fee_status',1);
        $query = $this->db->get();
        $result = $query->result();
        
        $array = [];        
        foreach( $result as $student ){

          if( !array_key_exists( $student->fkstudent_id, $array ) ){
              $array[$student->fkstudent_id] = $student->fkstudent_id;
          }

        }

        $olevel_students['alevel'] = count($array);
        $per = $olevel_students['alevel'] + $olevel_students['olevel'];
        $olevel_students['alevel'] = (int)(($olevel_students['alevel']/$per)*100);
        $olevel_students['olevel'] = 100-$olevel_students['alevel'];
        return $olevel_students;

      }

    // -------------------------------------------------------------------------

      function break_even_money(){

                  $this->db->limit(1);
                  $this->db->order_by( 'est_id', 'desc' );
        $query  = $this->db->get('estmates');
        $result = $query->result();

        $this->db->select('*');
        $this->db->from('student');
        $this->db->where( 'student.student_status', 1);
        $query      = $this->db->get();
        $result_1   = $query->result();
        
        $new_array = [];
        $i = 0;  
        foreach( $result_1 as $student ){
                        $this->db->where( 'st_class_fee_status', 1);
                        $this->db->where( 'fkstudent_id', $student->student_id );
            $query    = $this->db->get( 'student_class_fee' );
            $result_2 = $query->result();
            if( !empty( $result_2 ) ){
                $i++;
            }
        }
        $number['student_required']       = $result[0]->required_students;
        $number['student_registered']     = $i;
        if( $number['student_registered'] > $number['student_required'] ){
            $number['student_per']        = 100;  
        }else{
            $number['student_per']        = ($number['student_registered']/$number['student_required']) * 100;
        }
        $number['student_per_required']   = 100 - $number['student_per'];
        return $number;
        
      }

    // --------------------------------------------------------------------------
    public function paid_unpaid_students(){
        
        $this->db->select( '*' );
        $this->db->from( 'student' );
//        $this->db->join( 'student_class_fee', 'student_class_fee.fkstudent_id=student.student_id');
        $query  = $this->db->get();
        $result = $query->result();
        
        $array = [];
        foreach( $result as $student ){
            
            $array[$student->student_id]                       = $student;
                     $this->db->where( 'fkstudent_id', $student->student_id );   
            $query = $this->db->get( 'student_class_fee' );
            $array[$student->student_id]->student_class_fee    = $query->result();
            foreach( $array[$student->student_id]->student_class_fee as $student_class_fee ){
                          
                          $this->db->order_by( 'p_id', 'desc');  
                          $this->db->limit(1);  
                          $this->db->where( 'fkstudentclassfee_id', $student_class_fee->classfee_id );
                $query  = $this->db->get( 'student_payment' );
                $result = $query->result();
                $array[$student->student_id]->student_payment[$student_class_fee->classfee_id] = $result;
                foreach( $array[$student->student_id]->student_payment[$student_class_fee->classfee_id] as $iamarray ){
                    if( $iamarray->std_paid > 0 ){
                       $array[$student->student_id]->status_var = 'paid'; 
                       break;
                    }else{
                        $array[$student->student_id]->status_var = 'unpaid';
                    }
                }
            }
            
        }
        $paid   = 0;
        $unpaid = 0;
        foreach( $array as $student ){
            if( isset( $student->status_var )){
                if( $student->status_var == 'unpaid' ){
                    $unpaid++;
                }else{
                    $paid++;
                }
            }
        }
        $total           = $unpaid + $paid;
        $per['unpaid']   = (int)( ( $unpaid/$total ) * 100 );
        $per['paid']     = 100 - $per['unpaid'];
        return $per;
        
    }
    
    // --------------------------------------------------------------------------
    
    public function institue_wise_break_up(){
        $query   = $this->db->get('student');
        $result  = $query->result();
        $array = [];
        foreach( $result as $student ){
            if( !array_key_exists($student->current_school, $array) ){
                $array[$student->current_school] = $student;
            }
        }
    }
    
    // --------------------------------------------------------------------------

    public function read_student_notifications(){

      $query = $this->db
                        ->select('student_name,student_id')  
                        ->where('notification_read_status', 1)
                        ->get('student');
        $result['count']         = $query->num_rows();                  
        $result['student_name']  = $query->result();
        return $result;
        
    }

    // --------------------------------------------------------------------------

}