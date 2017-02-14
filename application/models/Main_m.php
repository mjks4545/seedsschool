<?php 
class Main_m extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

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
        if($role=='director'){
           $this->db->where('email',$email);
           $this->db->where('pwd',$pwd); 
           $query = $this->db->get('admin');
        }
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
        else if($role=="receptionist")
        {
            $this->db->where('email',$email);
            $this->db->where('password',$pwd);
            $this->db->where('type',$role); 
            $query = $this->db->get('otherstaff');            
        }
         else if($role =="parent")
        {
            $this->db->where('student_email',$email);
            $this->db->where('student_pwd',$pwd); 
              
            $query = $this->db->get('student');
             
        }
        $num = $query->num_rows();
        if($num>0){
        $result = $query->result();
//        echo $role;print_r( $result );die;
        foreach($result as $row){
          if( $role=="admin" || $role=="director" ){  
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
// for parent--------------------------------
            if($role=="parent"){
                if($row->student_status==0){
                    return 0;
                }

                else
                {
                    $session_data = array(
                        'parent_email'=>$email,
                        'parent_password'=>$pwd,
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

    
    function add_auto_montly_fee()
    {
        $this->db->select("*");
        $this->db->from("student_class_fee");
        $this->db->where("st_class_fee_status","1");
        $query = $this->db->get();
        $result = $query->result(); 
        foreach($result as $row){
            $scf_id=$row->classfee_id;
            $scf_tobepay = $row->to_be_pay;
            $c_month = date("m");
            $this->db->select("*");
            $this->db->from("student_payment");
            $this->db->where("fkstudentclassfee_id",$scf_id);
            $this->db->where('f_starting_date !=', '');
            $this->db->order_by("p_id","desc");
            $this->db->limit("1");
            $query1 = $this->db->get();
            $fee = $query1->result();
            if($query1->num_rows()>0) {
                $remain = 0;
                $fee = $query1->result();
                foreach ($fee as $f) {
                    $paid_month     = date("m", strtotime($f->std_month));
                    $paid_year      = $f->std_year;
                    $already_remain = $f->std_remain;
                    $orignal_date1  = $f->f_starting_date;
                    $orignal_date2  = date('Y-m-d');
                    $date1          = date_create($orignal_date1);
                    $date2          = date_create($orignal_date2);
                    $diff           = date_diff( $date1, $date2 );
                    $difference = $diff->format("%a");
                    if($difference > 30){
                        $arry = array(
                            "fkstudentclassfee_id" => $scf_id,
                            "std_payment" => $scf_tobepay,
                            "std_paid" => 0,
                            "std_remain" => ($already_remain)+($scf_tobepay),
                            "std_month" => date("M"),
                            "std_date" => date("d-M-Y"),
                            'std_year'=>date("Y"),
                            "std_reason" =>"Monthly Fee",
                            "f_starting_date" => date('Y-m-d', strtotime('+30 days', strtotime($orignal_date1)))
                        );
                        $this->db->insert("student_payment",$arry);
                    }
                }
            }/*end of if*/
            else{
                $orignal_date3 =  $row->starting_date;
                $orignal_date4 =  date('Y-m-d');
                $date3 = date_create($orignal_date3);
                $date4 = date_create($orignal_date4);
                $diff  = date_diff($date3,$date4);
                $difference = $diff->format("%a");
                if( $difference > 30 ){
                    $arry = array(
                        "fkstudentclassfee_id" => $scf_id,
                        "std_payment" => $scf_tobepay,
                        "std_paid" => 0,
                        "std_remain" => $scf_tobepay,
                        "std_month" => date("M"),
                        "std_date" => date("d-M-Y"),
                        'std_year'=>date("Y"),
                        "std_reason" =>"Monthly Fee",
                        "f_starting_date" => date('Y-m-d', strtotime('+30 days', strtotime($orignal_date3)))
                    );
                    $this->db->insert("student_payment",$arry);
                }
            }
            
        }/*end of main foreach*/
    }
    // ------------------------------------------------------------------------

    public function deactive_completed_student(){

        $this->db->select("*");
        $this->db->from("student_class_fee");
        $this->db->where("student_class_fee.st_class_fee_status","1");
        $this->db->join("class", "class.cl_id=student_class_fee.fkclass_id");
        $this->db->join("subject", "class.su_id=subject.su_id");
        $query = $this->db->get();
        $result = $query->result();
        foreach( $result as $student ){
            $orignal_date1  = $student->starting_date;
            $orignal_date2  = date('Y-m-d');
            $date1          = date_create($orignal_date1);
            $date2          = date_create($orignal_date2);
            $diff           = date_diff( $date1, $date2 );
            $difference     = $diff->format("%a");
            $time           = $student->duration * 30;
            if( $difference > $time ){
                $this->db->where( 'classfee_id', $student->classfee_id);
                $this->db->update( 'student_class_fee', [ 'st_class_fee_status' => 0 ]);
            }
        }
    }

    // ------------------------------------------------------------------------
        
    public function get_all_teachers_break_even(){
        
                  $this->db->select('*');
                  $this->db->from('teacher');
                  $this->db->join( 'teacher_subject', 'teacher_subject.t_id=teacher.id');
                  $this->db->join( 'subject', 'subject.su_id=teacher_subject.teacher_subject_id');
        $query  = $this->db->get();
        $result = $query->result();
        return $result;
    }
    // ------------------------------------------------------------------------
    
    public function add_break_even_point(){
        $array = [
            'est_fxd_exp'      => $this->input->post('fixed_expense'),
            'est_session_name' => $this->input->post('session'),
            'est_date_created' => $_POST['teachers'][1]['b_date_created'],
            'est_time_created' => $_POST['teachers'][1]['b_time_created'],
        ];
                     $this->db->insert( 'estmates', $array);
        $insert_id = $this->db->insert_id();
        if( $insert_id ){
            foreach( $_POST['teachers'] as $result ){
                $result['fkest_id'] = $insert_id;
                $this->db->insert( 'break_even', $result);
            }
            return $insert_id;
        }else{
            return 0;
        }
    }
    
    // ------------------------------------------------------------------------
    
    public function update_break_even( $id, $total_amount ){
        
                  $this->db->where('fkest_id', $id);   
        $query  = $this->db->get('break_even');
        $result = $query->result();
        $sub_total       = 1;
        $total_students  = 0;
        foreach( $result as $teacher ){
            $expectedstudents       = ( !empty( $teacher->expectedstudents ) || $teacher->expectedstudents != 0 ) ?  $teacher->expectedstudents : 1;
            $classexpectedstrength  = ( !empty( $teacher->classexpectedstrength ) || $teacher->classexpectedstrength != 0 ) ?  str_replace("%","",$teacher->classexpectedstrength) : 1;
            $seedsshare             = ( !empty( $teacher->seedsshare ) || $teacher->seedsshare != 0 ) ?  $teacher->seedsshare : 1;
            $classfee               = ( !empty( $teacher->classfee ) || $teacher->classfee != 0 ) ?  $teacher->classfee : 1;
            $numbermonths           = ( !empty( $teacher->numbermonths ) || $teacher->numbermonths != 0 ) ?  $teacher->numbermonths : 1;
            $seedsshare             = '0.' . $seedsshare;
            $sub_total             += $expectedstudents * $classexpectedstrength * $seedsshare * $classfee * $numbermonths;
            $total_students        += $expectedstudents;
        }
        echo $cost_per_student = $sub_total/$total_students;
        $total = (int)($total_amount/$cost_per_student);
        if( $total == 0 ){
            $total = 1;
        }
        $this->db->where( 'est_id', $id );
        echo $this->db->update('estmates', [ 'required_students' => $total ]);
        die;
    }
    
    // --------------------------------------------------------------------

    public function send_daily_reports(){

        return  $this->db
                        ->select('student_name')
                        ->from('student')
                        ->where('student_created_date', date('d-M-Y'))
                        ->get()
                        ->result();

    }

    // ---------------------------------------------------------------

    public function send_daily_payments(){

        return $this->db
                        ->select('student_payment.std_paid,subject.su_name,co_name,student.student_name')
                        ->from('student_payment')
                        ->join('student_class_fee', 'student_class_fee.classfee_id=student_payment.fkstudentclassfee_id')
                        ->join('class','class.cl_id=student_class_fee.fkclass_id')
                        ->join('subject','subject.su_id=class.su_id')
                        ->join('course','course.co_id=class.co_id')
                        ->join('student', 'student.student_id=student_class_fee.fkstudent_id')
                        ->where('student_payment.std_date', date('d-M-Y'))
                        ->where('student_payment.std_paid !=', 0)
                        ->get()
                        ->result();
    }

    // ---------------------------------------------------------------

    public function send_daily_trf(){

        return $this->db
                        ->select('student.student_name,student_other_payment.paid_amt')
                        ->from('student_other_payment')
                        ->join('student', 'student.student_id=student_other_payment.fkstudent_id')
                        ->where('student_other_payment.otherpay_created_date', date('d-M-Y'))
                        ->where('student_other_payment.paid_amt !=', 0)
                        ->get()
                        ->result();
    }

    // ---------------------------------------------------------------

    public function abesnet_students(){

        // $this->db
        //         ->select('*')
        //         ->from()
        //         ->get()
        //         ->result();
        // echo '<pre>';
        // print_r(  );
        // die;

    }

    // ---------------------------------------------------------------
}