<?php

class Student_m extends CI_Model
{
    function __construct() {
        parent::__construct();
        
       // $this->auto_email();
         
        }
    

    function addstudentpro()
    {
        $student_name = $this->input->post('student_name');
        $father_name = $this->input->post('father_name');
        $student_contact = $this->input->post('student_contact');
        $guardian_contact = $this->input->post('guardian_contact');
        $current_school = $this->input->post('current_school');
        $facebook_id = $this->input->post('facebook_id');
        $address = $this->input->post('address');
        $email = $this->input->post('email');
        $course_id = $this->input->post('course');
        $s_gender = $this->input->post('s_gender');
        $s_cnic = $this->input->post('s_cnic');
        $created_date = date("d-M-Y");
        $created_time = date("h:i:sa");
        $month = date("M");
        $year = date("Y");
        //---------------------------duplication----------------------
        $this->db->select('*');
        $this->db->from('student');
        $this->db->where('student_name', $student_name);
        $this->db->where('std_father_name', $father_name);
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num > 0) {
            return 2;

        } else {


            //-----------------------------------------------------------
            
            $img_up = $this->img_upload();
            $length = 6;
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ,@#$%*';
            $randomString = '';
            
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }

            $insert_array = array(
                'student_name'             => $student_name,
                'std_father_name'          => $father_name,
                'student_contact'          => $student_contact,
                'std_guardian_contact'     => $guardian_contact,
                'current_school'           => $current_school,
                'facebook_id'              => $facebook_id,
                'student_address'          => $address,
                'student_email'            => $email,
                'student_pwd'              => $randomString,
                'pic'                      => $img_up,
                'fkcourse_id'              => $course_id,
                's_gender'                 => $s_gender,
                's_cnic'                   => $s_cnic,
                'student_created_date'     => $created_date,
                'student_created_time'     => $created_time,
                'student_month'            => $month,
                'student_year'             => $year,
                'notification_read_status' => 1
            );

            $result = $this->db->insert('student', $insert_array);
            if ($result) {
                $fkstudent_id = $this->db->insert_id();
                $result = $this->insert_notification('A New Student Registered', 'Registered', 'student', $fkstudent_id, 'student_id');
                $ids = array(
                    'student_id' => $fkstudent_id,
                    'course_id' => $course_id,
                );
                return $ids;
            } else {
                return 0;
            }
        }
    }//-------------------------------------------------------------------------------

    function img_upload()
    {
        $config['upload_path'] = 'public/user_img';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG';
        $config['max_size'] = '10240000';
        //$config['max_width']  = '1024';
        //$config['max_height']  = '768';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('img')) {
            $error = array('error' => $this->upload->display_errors());
            return $error;

        } else {
            $data = array('upload_data' => $this->upload->data());
            $image_path = $data['upload_data']['file_name'];
            return $image_path;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function studentclasses($crs_id)
    {

        $this->db->select('*');
        $this->db->from('class');
        $this->db->join('course', 'course.co_id = class.co_id');
        $this->db->join('subject', 'subject.su_id = class.su_id');
        $this->db->join('teacher', 'teacher.id = class.t_id');
       $this->db->where('class.class_status', 1);

        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function studentall_classes($id)
    {

        $this->db->select('*');
        $this->db->from('student_class_fee');
        $this->db->join('class', 'class.cl_id = student_class_fee.fkclass_id');
        $this->db->join('course', 'course.co_id = class.co_id');
        $this->db->join('subject', 'subject.su_id = class.su_id');
        $this->db->join('teacher', 'teacher.id = class.t_id');
        $this->db->where('student_class_fee.fkstudent_id', $id);

        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function studentall_fee($id)
    {

        $this->db->select('*');
        $this->db->from('student_class_fee');
//        $this->db->join('class', 'class.cl_id = student_class_fee.fkclass_id');
//        $this->db->join('subject', 'subject.su_id = class.su_id');
//        $this->db->join('teacher', 'teacher.id = class.t_id');
        $this->db->where('fkstudent_id', $id);

        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }

    //---------------------------------------------------------------------------------------------------------------------
    function studentclasspro($std_id)
    {
       $co_id = $this->input->post('co_id');
       $r_c = $this->input->post('r_c');
        $this->db->select('*');
        $this->db->from('class');
//        $this->db->where('co_id', $co_id);
        $query = $this->db->get();
        $num = $query->num_rows();
        for ($i = 1; $i <= $num; $i++) {
            $subject = $this->input->post('select_' . $i);
            if ($subject == 'on') {
                $cl_id = $this->input->post('class_' . $i);
                $this->db->where('cl_id',$cl_id);
                // after merge
                 $qry          =  $this->db->get('class');
                  $result       =  $qry->result_array();
                  //echo '<pre>';print_r($result);die();
                  $this->db->where('class.cl_id',$cl_id);
                  $resultss     =  $result[0]['no_slots']-1;
                  $insert_array =  array('no_slots' => $resultss);
                  $update       =  $this->db->update('class',$insert_array);
                //end merge
                $insert_array['student_classes' . $i] = array(
                    'fkclass_id' => $cl_id,
                    'fkstudent_id' => $std_id,
                    'st_class_fee_status' => 0
                );
                $insert_table = $this->db->insert('student_class_fee', $insert_array['student_classes' . $i]);

            }
        }
        if ($insert_table) {
            $this->db->where("student_id",$std_id);
            $this->db->update("student",["reason_concision"=>$r_c]);
            return $insert_table;
        } else {
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function student_class_fee($std_id)
    {

        $this->db->select('*');
        $this->db->from('student_class_fee');
        $this->db->join('class', 'class.cl_id = student_class_fee.fkclass_id');
        $this->db->join('subject', 'subject.su_id = class.su_id');
        $this->db->where('fkstudent_id', $std_id);
        $query = $this->db->get();
        $result = $query->result();

        if ($result) {
            return $result;
        } else {
            return 0;
        }

    }

//-----------------------------------------------------
    function add_admissionfee($std_id, $admission_fee)
    {
        $inser_arr = array(
            "fkstudent_id" => $std_id,
            "total_amt" => $admission_fee,
            "paid_amt" => 0,
            "otherfee_remain" => $admission_fee,
            "amt_reason" => 'Admission Fee',
            "other_month"=>date("M"),
            "other_year"=>date("Y"),
            "otherpay_created_date" => date("d-M-Y")
        );
        if( $admission_fee != 0 ){
            $this->db->insert("student_other_payment", $inser_arr);    
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function studentclassfeepro()
    {
        $std_id = $this->input->post('student_id');
        $r_c = $this->input->post('r_c');
        $admission_fee = $this->input->post('admission_fee');
        for ($i = 1; $i <= 20; $i++) {
            $id            = $this->input->post("std_cls_fee_id_" . $i);
            $sub_fee       = $this->input->post("subject_fee_" . $i);
            $fee_to_pay    = $this->input->post("fee_to_pay_" . $i);
            $starting_date = $this->input->post("starting_" . $i);
            $created_date = date("d-M-Y");
            $created_time = date("h:i:sa");

            $this->db->where('classfee_id', $id);
            $update = array(
                'class_fee'              => $sub_fee,
                'admission_fee'          => $admission_fee,
                'to_be_pay'              => $fee_to_pay,
                'classfee_created_date'  => $created_date,
                'classfee_created_time'  => $created_time,
                'st_class_fee_status'    => 1,
                'starting_date'          => $starting_date,
            );
            // if( $admission_fee != 0 ){
                $query = $this->db->update('student_class_fee', $update);
            // }
        }
        $this->add_admissionfee($std_id, $admission_fee);
        if ($query) {
            $this->db->where("student_id",$std_id);
            $this->db->update("student",["reason_concision"=>$r_c]);
            return 1;
        } else {
            return 0;
        }

    }

    //------------------------------------------------------------------------------------------------------------------
    function view_students()
    {
        $this->db->select('*');
        $this->db->from('student');
        $this->db->order_by('student_id', 'desc');
        $this->db->join('course', 'course.co_id = student.fkcourse_id');
//        $this->db->join('subject','subject.su_id = class.co_id');

        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return 0;
        }

    }

    //------------------------------------------------------------------------------------------------------------------
    function student_details($id)
    {
        $this->db->select('*');
        $this->db->from('student');
        $this->db->where('student_id', $id);
//        $this->db->join('class','class.co_id = student.fkcourse_id');
//        $this->db->join('subject','subject.su_id = class.su_id');
//        $this->db->join('teacher','teacher.id = class.t_id');
//        $this->db->where('student_id',$id);

        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function class_details($classfee_id)
    {
        $this->db->select('*');
        $this->db->from('student_class_fee');
        $this->db->where('classfee_id', $classfee_id);
        $this->db->join('class', 'class.cl_id = student_class_fee.fkclass_id');
        $this->db->join('subject', 'subject.su_id = class.su_id');
//        $this->db->join('teacher','teacher.id = class.t_id');
//        $this->db->where('student_id',$id);

        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function updatestudent($id)
    {
        $this->db->where('student_id', $id);
        $query = $this->db->get('student');
        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function updatestudentpro($id)
    {

        $student_name = $this->input->post('student_name');
        $father_name = $this->input->post('father_name');
        $student_contact = $this->input->post('student_contact');
        $guardian_contact = $this->input->post('guardian_contact');
        $current_school = $this->input->post('current_school');
        $facebook_id = $this->input->post('facebook_id');
        $address = $this->input->post('address');
        $email = $this->input->post('email');
        $s_gender = $this->input->post('s_gender');
        $s_cnic = $this->input->post('s_cnic');
        $updated_date = date("d-M-Y");
        $updated_time = date("h:i:sa");

        $this->db->where('student_id', $id);

        $update_array = array(
            'student_name' => $student_name,
            'std_father_name' => $father_name,
            'student_contact' => $student_contact,
            'std_guardian_contact' => $guardian_contact,
            'current_school' => $current_school,
            'facebook_id' => $facebook_id,
            'student_address' => $address,
            'student_email' => $email,
            's_gender' => $s_gender,
            's_cnic' => $s_cnic,
            'student_updated_date' => $updated_date,
            'student_updated_time' => $updated_time,
        );

        $result = $this->db->update('student', $update_array);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }

    //----------------------------------------------------------------------------
    function studentclassstatus($st_id)
    {
        $status = $this->uri->segment(4);
        $classfee_id = $this->uri->segment(5);
        $this->db->where('fkstudent_id', $st_id);
        $this->db->where('classfee_id', $classfee_id);
        $up = array(
            "st_class_fee_status" => $status
        );
        $query = $this->db->update('student_class_fee', $up);
        if ($query) {
            return 1;
        } else {
            return 0;
        }
    }

//-------------------------------------------------------------------
    function monthlyfeedetails($std_id)
    {
        $this->db->select('*');
        $this->db->from('student_class_fee');
        $this->db->where('fkstudent_id', $std_id);
        $this->db->join('student_payment',
            'student_payment.fkstudentclassfee_id=student_class_fee.classfee_id');

        $query = $this->db->get();
        $result = $query->result();
        $total_paid = 0;
        foreach ($result as $row) {
            $total_paid = $total_paid + $row->std_paid;
        }
        return $total_paid;

    }

    //-------------------------------------------------------------------
    function monthlyfeeremaining($std_id)
    {
        $this->db->select('*');
        $this->db->from('student_class_fee');
        $this->db->where('fkstudent_id', $std_id);
        $this->db->join('student_payment',
            'student_payment.fkstudentclassfee_id=student_class_fee.classfee_id');

        $query = $this->db->get();
        $result = $query->result();
        $remain = 0;
        foreach ($result as $row) {
            $remain = $row->std_remain;
        }
        return $remain;
    }

    //--------------------------------------------------------------------
    function monthlyfeedate($std_id)
    {
        $this->db->select('*');
        $this->db->from('student_class_fee');
        $this->db->where('fkstudent_id', $std_id);
        $this->db->join('student_payment',
            'student_payment.fkstudentclassfee_id=student_class_fee.classfee_id');

        $query = $this->db->get();
        $result = $query->result();
        $date = 0;
        foreach ($result as $row) {
            $date = $row->std_date;
        }
        return $date;
    }

    //-------------------------------------------------------------------
    function otherfeedetails($std_id)
    {
        $this->db->select('*');
        $this->db->from('student_other_payment');
        $this->db->where('fkstudent_id', $std_id);

        $query = $this->db->get();
        $result = $query->result();
        $paid = 0;
        foreach ($result as $row) {
            $paid = $paid + $row->paid_amt;
        }
        return $paid;

    }

    //------------------------------------------------------------------
    function otherfeeremaining($std_id)
    {
        $this->db->select('*');
        $this->db->from('student_other_payment');
        $this->db->where('fkstudent_id', $std_id);

        $query = $this->db->get();
        $result = $query->result();
        $remain = 0;
        foreach ($result as $row) {
            $remain = $row->otherfee_remain;
        }
        return $remain;
    }

    //---------------------------------------------------------
    function otherfeedate($std_id)
    {
        $this->db->select('*');
        $this->db->from('student_other_payment');
        $this->db->where('fkstudent_id', $std_id);

        $query = $this->db->get();
        $result = $query->result();
        $date = 0;
        foreach ($result as $row) {
            $date = $row->otherpay_created_date;
        }
        return $date;
    }

    //-----------------------------------------------------------------
    function std_search()
    {
        $search = $this->input->post("std_search");
        $this->db->select("*");
        $this->db->from("student");
        $this->db->like('student_name', $search);
        $this->db->or_like('std_father_name', $search);
        $this->db->or_like('student_contact', $search);
        $this->db->or_like('student_email', $search);
        $this->db->or_like('student_id', $search);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

//-----------------------------------------------------------------------
    function add_newclass($std_id)
    {
        $this->db->select('*');
        $this->db->from('class');
        $this->db->join('student_class_fee', 'student_class_fee.fkclass_id = class.cl_id');
        $this->db->where("student_class_fee.fkstudent_id", $std_id);
        $this->db->where("class.class_status",1);
        $query = $this->db->get();
        $result1 = $query->result();
        $num_offer = $query->num_rows();
        if ($num_offer>0) {
        foreach ($result1 as $ids) {
            $array_ids[] = $ids->cl_id;
        }
            $this->db->select('*');
            $this->db->from('class');
            $this->db->join('subject', 'subject.su_id = class.su_id');
            $this->db->join('course', 'course.co_id = class.co_id');
            $this->db->join('teacher', 'teacher.id = class.t_id');
            $this->db->where("class.class_status",1);
            $query2 = $this->db->get();
            $num = $query2->num_rows();
            if ($num_offer < $num) {
                $result = $query2->result();
                for ($i = 0; $i <= $num - 1; $i++) {
                    if (in_array($result[$i]->cl_id, $array_ids)) {
                        continue;
                    }
                    $data[] = $result[$i];

                }
                return $data;
            } else {
                return 0;
            }
        } // for add class when no class selected by student
        else {
            $this->db->select('*');
            $this->db->from('class');
            $this->db->join('course', 'course.co_id = class.co_id');
            $this->db->join('subject', 'subject.su_id = class.su_id');
            $this->db->join('teacher', 'teacher.id = class.t_id');
            $this->db->where("class.class_status",1);
            $query2 = $this->db->get();
            $result = $query2->result();
            if($result) {
                return $result;
            }
        else{
                return 0;
            }

        }
    }
//-----------------------------------------------
    function addnewclasspro($std_id)
    {
        $co_id = $this->input->post('co_id');
        $this->db->select('*');
        $this->db->from('class');
        //$this->db->where('co_id', $co_id);
        $query = $this->db->get();
        $num = $query->num_rows();
        for ($i = 1; $i <= $num; $i++) {
            $subject = $this->input->post('select_' . $i);
            if ($subject == 'on') {
                $cl_id = $this->input->post('class_' . $i);

                $insert_array['student_classes' . $i] = array(
                    'fkclass_id' => $cl_id,
                    'fkstudent_id' => $std_id,
                    'st_class_fee_status' => 0,
                );
                //--------------------for latest inserted recored-----
                $insert_table = $this->db->insert('student_class_fee', $insert_array['student_classes' . $i]);
                $arr_cl[] = $cl_id;
            }
        }
        if ($insert_table) {
            return $arr_cl;
        } else {
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function addnewclass_fee($std_id)
    {
        $arr = $this->session->userdata("cl_ids");
        $this->db->select('*');
        $this->db->from('student_class_fee');
        $this->db->join('class', 'class.cl_id = student_class_fee.fkclass_id');
        $this->db->join('subject', 'subject.su_id = class.su_id');
        $this->db->where('fkstudent_id', $std_id);
        $this->db->where_in('fkclass_id', $arr);

        $query = $this->db->get();
        $result = $query->result();

        if ($result) {
            return $result;
        } else {
            return 0;
        }

    }
//---------------------------------------------------------------------
    function studentpermonth()
    {
        $year = date("Y");
        $cmonth = date("m");
        for($i=1; $i<=$cmonth;$i++){
            $month = date('M',strtotime("01-".$i."-2001"));
            $this->db->select('*');
            $this->db->from('student');
            $this->db->where("student_year",$year);
            $this->db->where("student_month",$month);
            $query = $this->db->get();
            $num_spm[] = $query->num_rows();

        }
        return $num_spm;
    }
//----------------------------------------------------------------
    function studentperyear()
    {

        $year = date("Y")-9;
        $cyear = date("Y");
        for($i=$year; $i<=$cyear; $i++){
            $this->db->select('*');
            $this->db->from('student');
            $this->db->where("student_year",$i);
            $query = $this->db->get();
            $num_spy[] = $query->num_rows();
        }
        return $num_spy;

    }
//------------------------------------------------------------------------
 function studentlevel()
 {
     $query = $this->db->get("course");
     return $query->result();
 }
//------------------------------------------------------------------------
 function levelclass($co_id)
 {
     $this->db->select("*");
     $this->db->from("class");
     $this->db->join("course","course.co_id=class.co_id");
     $this->db->join("teacher","teacher.id=class.t_id");
     $this->db->join("subject","subject.su_id=class.su_id");
     $this->db->where("class.co_id",$co_id);
     $query = $this->db->get();
     return $query->result();
 }
 //------------------------------------------------------------------------
 function clstudent($cl_id)
 {
     $this->db->select("*");
     $this->db->from("student_class_fee");
     $this->db->join("student","student.student_id=student_class_fee.fkstudent_id");
     $this->db->where("student_class_fee.fkclass_id",$cl_id);
     $query = $this->db->get();
     return $query->result();
 }

  //------------------------------------------------------------------------
 function add_chalan_number()
 {
                         
                        $chalan_number = $this->input->post('chalan_number');
                         $student_id = $this->input->post('student_id');
                        $payment_date = date("d-M-Y") ;
                       // print_r($payment_date);die;
                        $fee_month = $this->input->post('fee_month');
                         $total_balance = $this->input->post('total_balance');
                        $last_paid = $this->input->post('last_paid');
                       
                        $student_name = $this->input->post('student_name');
                 
    // $this->db->insert('chalan_record',$chalan);
     $sql = "INSERT INTO chalan_record (chalan_number,student_id,payment_date,fee_month,total_balance,last_paid,student_name) VALUES ('$chalan_number','$student_id','$payment_date','$fee_month','$total_balance','$last_paid','$student_name') ON DUPLICATE KEY UPDATE chalan_number='$chalan_number' ";
        $query=$this->db->query($sql);
        
         
     
 }
 //------------------------------------------------------------------------
 function get_chalan_id()
 {
     $this->db->select_max('print_id');
     $query = $this->db->get('chalan_record');   
    // $query = $this->db->get('chalan_record');
     return $query->result_array();
 }

 //------------------------------------------------------------------------
 function add_chalan_class($record)
 {
     $this->db->insert('chalan_record_class',$record);
     
     // $query = $this->db->get('chalan_record_class');
     // return $query->result();
 }

 //------------------------------------------------------------------------

 function get_chalan_by_class($chalan_class)
 {
    $sql = "select * from chalan_record join chalan_record_class on chalan_record.print_id=chalan_record_class.fkey WHERE class= '$chalan_class' ";
    $query = $this->db->query($sql);
     // $this->db->where('class', $chalan_class);
      
     //  $query = $this->db->get('chalan_record_class');
       return $query->result();
 }
 //------------------------------------------------------------------------

 function get_chalan_by_roll($student_id)
 {
    $sql = "select * from chalan_record WHERE student_id= '$student_id' ";
    $query = $this->db->query($sql);
     // $this->db->where('class', $chalan_class);
      
     //  $query = $this->db->get('chalan_record_class');
       return $query->result();
 }

  //------------------------------------------------------------------------

 function get_chalan_by_no($chalan_number)
 {
     $this->db->where('chalan_number',$chalan_number);
     
      $query = $this->db->get('chalan_record');
     return $query->result();
 }
 //------------------------------------------------------------------------

     function chalan_for_paid($clfee_id)
     {
         $this->db->select("*");
         $this->db->from("student_payment");
         $this->db->join("student_class_fee","student_class_fee.classfee_id=student_payment.fkstudentclassfee_id");
         $this->db->join("student","student.student_id=student_class_fee.fkstudent_id");
         $this->db->join("class","class.cl_id=student_class_fee.fkclass_id");
         $this->db->join("course","course.co_id=class.co_id");
         $this->db->join("subject","subject.su_id=class.su_id");
         $this->db->join("chalan_record","chalan_record.student_id=student.student_id");
         $this->db->where("fkstudentclassfee_id",$clfee_id);
         $this->db->order_by("p_id","desc");
         $this->db->limit("1");
         $query = $this->db->get();
         return $query->result();
     }
      //------------------------------------------------------------------------

 function chalan_status($chalan_number)
 {
     $this->db->where('chalan_number',$chalan_number);
      $this->db->set('status',1);
     
      $query = $this->db->update('chalan_record');

      
 }

 //------------------------------------------------------------------------

     function chalanperstudent($clfee_id)
     {
         $this->db->select("*");
         $this->db->from("student_payment");
         $this->db->join("student_class_fee","student_class_fee.classfee_id=student_payment.fkstudentclassfee_id");
         $this->db->join("student","student.student_id=student_class_fee.fkstudent_id");
         $this->db->join("class","class.cl_id=student_class_fee.fkclass_id");
         $this->db->join("course","course.co_id=class.co_id");
         $this->db->join("subject","subject.su_id=class.su_id");
         $this->db->where("fkstudentclassfee_id",$clfee_id);
         $this->db->order_by("p_id","desc");
         $this->db->limit("1");
         $query = $this->db->get();
         return $query->result();
     }
 //------------------------------------------------------------------------
    function chalanperclass($cl_id)
    {
        $this->db->select("*");
        $this->db->from("student_class_fee");
        $this->db->where("fkclass_id",$cl_id);
        /*$this->db->join("student_payment","student_payment.	fkstudentclassfee_id=student_class_fee.classfee_id");
        $this->db->order_by("student_payment.p_id");
        $this->db->limit("1");*/
        $query = $this->db->get();
        //echo '<pre>';print_r($query->result());die;
        foreach($query->result() as $row_c)
        {
            $classfee_id = $row_c->classfee_id;
            $this->db->select("*");
            $this->db->from("student_payment");
            $this->db->where("fkstudentclassfee_id",$classfee_id);
            $this->db->join("student_class_fee","student_class_fee.classfee_id=student_payment.fkstudentclassfee_id");
            $this->db->join("student","student.student_id=student_class_fee.fkstudent_id");
            $this->db->join("class","class.cl_id=student_class_fee.fkclass_id");
            $this->db->join("course","course.co_id=class.co_id");
            $this->db->join("subject","subject.su_id=class.su_id");
            $this->db->order_by("student_payment.p_id","desc");
            $this->db->limit("1");
            $query1 = $this->db->get();
             $std_p[] =$query1->result();


        }
        return $std_p;
         
    }
 //------------------------------------------------------------------------
   function chalanperlevel($co_id)
   {
       $this->db->select("*");
       $this->db->from("class");
       $this->db->join("student_class_fee","student_class_fee.fkclass_id=class.cl_id");
       //$this->db->join('student_payment','student_payment.fkstudentclassfee_id = student_class_fee.classfee_id');
       $this->db->where("class.co_id",$co_id);
       $this->db->where("class.class_status",'1');
       $this->db->where("student_class_fee.st_class_fee_status",'1');
       $this->db->group_by("student_class_fee.fkstudent_id");
       $query = $this->db->get();
       if($query->num_rows()>0) {
           foreach ($query->result() as $row) {
               $student_id = $row->fkstudent_id;
               $this->db->select("*");
               $this->db->from("student_class_fee");
               $this->db->join("student", "student.student_id=student_class_fee.fkstudent_id");
               $this->db->join("class", "class.cl_id=student_class_fee.fkclass_id");
               $this->db->join("course", "course.co_id=class.co_id");
               $this->db->join("subject", "subject.su_id=class.su_id");
               $this->db->where("fkstudent_id", $student_id);
               $this->db->where("student_class_fee.st_class_fee_status", '1');
               $query1 = $this->db->get();
               $std_p[] = $query1->result();
               /*$i = 1;
               foreach( $std_p as $classinfo){
                    $this->db->where( $classinfo['classfee_id']);
                    $this->db->order_by('p_id','DESC');
                    $this->db->limit(1);
                    $queryvar = $this->db->get('student_payment');
                   $somethingarray[$i]['id'] = $classinfo['classfee_id'];
                   $somethingarray[$i]['fee'] = $queryvar->result();
                   $i++;
                }*/
               /* foreach($query1->result() as $row1){
                    $classfee_id = $row1->classfee_id;
                    $this->db->select("*");
                    $this->db->from("student_payment");
                    $this->db->where("fkstudentclassfee_id",$classfee_id);
                    $this->db->join("student_class_fee","student_class_fee.classfee_id=student_payment.fkstudentclassfee_id");
                    $this->db->join("student","student.student_id=student_class_fee.fkstudent_id");
                    $this->db->join("class","class.cl_id=student_class_fee.fkclass_id");
                    $this->db->join("course","course.co_id=class.co_id");
                    $this->db->join("subject","subject.su_id=class.su_id");
                    $this->db->order_by("student_payment.p_id","desc");
                    $this->db->limit("1");
                    $query2 =$this->db->get();
                    $std_p1["fee"][] = $query2->result();
                }*/
           }
           for ($i = 0; $i < sizeof($std_p); $i++) {
               for ($j = 0; $j < sizeof($std_p[$i]); $j++) {
                   $std_p[$i][$j]->classfee_id;
                   $this->db->order_by('p_id', 'DESC');
                   $this->db->where('fkstudentclassfee_id', $std_p[$i][$j]->classfee_id);
                   $lavana = $this->db->get('student_payment');
                   $std_j = $lavana->result();
                  echo '<pre>';print_r($std_j);die;
                   $std_j = $std_j[0];
                   $std_p[$i][$j]->p_id = $std_j->p_id;
                   $std_p[$i][$j]->std_payment = $std_j->std_payment;
                   $std_p[$i][$j]->std_paid = $std_j->std_paid;
                   $std_p[$i][$j]->std_remain = $std_j->std_remain;
                   $std_p[$i][$j]->std_date = $std_j->std_date;
                   $std_p[$i][$j]->std_reason = $std_j->std_reason;
               }
           }

           return $std_p;
       }
       else{
           return 0;
       }
   }
  

// ------------------------------------------------------------------------------------
 //     function auto_email()
 // {
  
 //    $date = date('h:i') ; 
 //    if($date>'10:58') {

 //        $this->db->select('student_email');
 //        $this->db->from('student');
 //        $res = $this->db->get();
 //        $result =$res->result();


 //       $config['protocol'] = 'sendmail';
 //        $config['mailpath'] = '/usr/sbin/sendmail';
 //        $config['charset'] = 'iso-8859-1';
 //        $config['wordwrap'] = TRUE;

 //        $this->email->initialize($config);
  
 //         $this->email->from('shabirullah518@gmail.com'); 
 //         $this->email->to($result);
 //         $this->email->subject('Email Test'); 
 //         $this->email->message('Testing the email class.'); 
 //        $result = $this->email->send();
 //        if($this->email->send()){
 //            echo "email success";die;
 //        }else{
 //            echo "fail";die;
 //        }
        
 // }  
 // }

  //------------------------------------------------------------------------
  
    public function get_complete_payment_details($student_id){
      
        $this->db->select('*');
        $this->db->from('student_class_fee');
        $this->db->join( 'class', 'class.cl_id=student_class_fee.fkclass_id');
//        $this->db->join( 'student', 'student.student_id=student_class_fee.fkstudent_id');
        $this->db->join( 'subject', 'subject.su_id=class.su_id');
        $this->db->join( 'course', 'course.co_id=class.co_id');
        $this->db->join( 'teacher', 'teacher.id=class.t_id');
        $this->db->where( 'student_class_fee.fkstudent_id', $student_id);
        $query  = $this->db->get();
        $result = $query->result();
        return $result;
        
    }
    
  //------------------------------------------------------------------------
    public function get_complete_payment_details_pro($data){
        $empty_array = [];
        foreach( $data as $element ){
            $this->db->where('fkstudentclassfee_id', $element->classfee_id);
            $query = $this->db->get('student_payment');
            $empty_array[$element->classfee_id]        = $element;
            $empty_array[$element->classfee_id]->paid  = $query->result();
        }
        return $empty_array;
    }

    // ----------------------------------------------------------------------
    
    public function get_complete_trf( $id ){

                  $this->db->where( 'fkstudent_id', $id);
        $query  = $this->db->get('student_other_payment');
        $result = $query->result();
        return $result;
    }

    // ----------------------------------------------------------------------

    public function student_class_left( $status, $class_fee_id ){

        $array = [
            'class_left' => $status
        ];

        $this->db
                ->where('classfee_id', $class_fee_id)
                ->update(  'student_class_fee', $array );

    }

    // ----------------------------------------------------------------------
    
    public function get_notifications(){


        $query = $this->db
                          ->select('student_name,student_id')  
                          ->where('notification_read_status', 1)
                          ->get('student');
        $result['count']         = $query->num_rows();                  
        $query = $this->db
                          ->select('student.student_name,student_payment.std_paid')
                          ->from('student_payment')  
                          ->join('student_class_fee', 'student_class_fee.classfee_id=student_payment.fkstudentclassfee_id')
                          ->where('student_notification', 1)
                          ->join('student', 'student.student_id=student_class_fee.fkstudent_id')
                          ->get();
        $result['p_count'] = $query->num_rows();

        return $result; 

    }

    // ------------------------------------------------------------------------

    public function insert_notification($name, $type, $table_name, $forgenkey, $forgenkeyname){
        $created_date = date("d-M-Y");
        $created_time = date("h:i:sa");
        $notifcations = [
                    
                    'no_name'             => $name,
                    'no_type'             => $type,
                    'no_status'           => 1,
                    'table_name'          => $table_name,
                    'no_fk_id'            => $forgenkey,
                    'primary_key_name'    => $forgenkeyname,
                    'no_date_created'     => $created_date,
                    'no_time_created'     => $created_time

                ];

        $result = $this->db->insert('notifications', $notifcations);
        return $result;
    }

}