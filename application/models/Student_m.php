<?php

class Student_m extends CI_Model
{

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
        $created_date = date("d-M-Y");
        $created_time = date("h:i:sa");
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
            $insert_array = array(
                'student_name' => $student_name,
                'std_father_name' => $father_name,
                'student_contact' => $student_contact,
                'std_guardian_contact' => $guardian_contact,
                'current_school' => $current_school,
                'facebook_id' => $facebook_id,
                'student_address' => $address,
                'student_email' => $email,
                'pic' => $img_up,
                'fkcourse_id' => $course_id,
                'student_created_date' => $created_date,
                'student_created_time' => $created_time,
            );

            $result = $this->db->insert('student', $insert_array);
            if ($result) {
                $fkstudent_id = $this->db->insert_id();
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
            return 'user.jpg';

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
        $this->db->join('subject', 'subject.su_id = class.su_id');
        $this->db->join('teacher', 'teacher.id = class.t_id');
        $this->db->where('co_id', $crs_id);

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
        $this->db->join('subject', 'subject.su_id = class.su_id');
        $this->db->join('teacher', 'teacher.id = class.t_id');
        $this->db->where('fkstudent_id', $id);

        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function add_newclass($std_id){
        $this->db->select('*');
        $this->db->from('class');
        $this->db->join('student_class_fee','student_class_fee.fkclass_id = class.cl_id');
        $this->db->where("student_class_fee.fkstudent_id",$std_id);
        $query = $this->db->get();
        $result1 = $query->result();
        $num_offer = $query->num_rows();
        foreach ( $result1 as $ids ){
            $array_ids[] = $ids->cl_id;
        }
        $this->db->select('*');
        $this->db->from('class');
        $this->db->join('subject','subject.su_id = class.su_id');
        $this->db->join('teacher','teacher.id = class.t_id');
        $query2 = $this->db->get();
        $num = $query2->num_rows();
        if($num_offer<$num){
       $result = $query2->result();
        for($i=0;$i <= $num-1; $i++){
            if(in_array( $result[$i]->cl_id, $array_ids ) ){
                continue;
            }
            $data[] = $result[$i];

        }
        return $data;
    }
        else{
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
        $this->db->select('*');
        $this->db->from('class');
        $this->db->where('co_id', $co_id);
        $query = $this->db->get();
        $num = $query->num_rows();
        for ($i = 1; $i <= $num; $i++) {
            $subject = $this->input->post('select_' . $i);
            if ($subject == 'on') {
                $cl_id = $this->input->post('class_' . $i);

                $insert_array['student_classes' . $i] = array(
                    'fkclass_id' => $cl_id,
                    'fkstudent_id' => $std_id,
                );
                $insert_table = $this->db->insert('student_class_fee', $insert_array['student_classes' . $i]);

            }
        }
        if ($insert_table) {
            return $insert_table;
        } else {
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function addnewclasspro($std_id)
    {
        $co_id = $this->input->post('co_id');
        $this->db->select('*');
        $this->db->from('class');
        $this->db->where('co_id',$co_id);
        $query = $this->db->get();
        $num = $query->num_rows();
        for ($i = 1; $i <= $num; $i++) {
            $subject = $this->input->post('select_' . $i);
            if ($subject == 'on') {
                $cl_id = $this->input->post('class_' . $i);

                $insert_array['student_classes' . $i] = array(
                    'fkclass_id' => $cl_id,
                    'fkstudent_id' => $std_id,
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
        $arr=$this->session->userdata("cl_ids");
        $this->db->select('*');
        $this->db->from('student_class_fee');
        $this->db->join('class', 'class.cl_id = student_class_fee.fkclass_id');
        $this->db->join('subject', 'subject.su_id = class.su_id');
        $this->db->where('fkstudent_id',$std_id);
        $this->db->where_in('fkclass_id',$arr);

        $query = $this->db->get();
        $result = $query->result();

        if ($result) {
            return $result;
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

    //------------------------------------------------------------------------------------------------------------------
    function studentclassfeepro()
    {

        $admission_fee = $this->input->post('admission_fee');
        for ($i = 1; $i <= 20; $i++) {
            $id = $this->input->post("std_cls_fee_id_" . $i);
            $sub_fee = $this->input->post("subject_fee_" . $i);
            $fee_to_pay = $this->input->post("fee_to_pay_" . $i);
            $created_date = date("d-M-Y");
            $created_time = date("h:i:sa");

            $this->db->where('classfee_id', $id);
            $update = array(
                'class_fee' => $sub_fee,
                'admission_fee' => $admission_fee,
                'to_be_pay' => $fee_to_pay,
                'classfee_created_date' => $created_date,
                'classfee_created_time' => $created_time,
            );
            $query = $this->db->update('student_class_fee', $update);
        }

        if ($query) {
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
          $this->db->where('fkstudent_id',$st_id);
          $this->db->where('classfee_id',$classfee_id);
          $up = array(
              "st_class_fee_status"=>$status
          );
          $query = $this->db->update('student_class_fee',$up);
          if($query){
              return 1;
          }
          else{
              return 0;
          }
  }
//-------------------------------------------------------------------
    function monthlyfeedetails($std_id){
        $this->db->select('*');
        $this->db->from('student_class_fee');
        $this->db->where('fkstudent_id',$std_id);
        $this->db->join('student_payment',
            'student_payment.fkstudentclassfee_id=student_class_fee.classfee_id');

        $query = $this->db->get();
        $result= $query->result();
        $total_paid = 0;
        foreach ($result as $row) {
            $total_paid = $total_paid + $row->std_paid;
        }
        return $total_paid;

    }
    //-------------------------------------------------------------------
    function monthlyfeeremaining($std_id){
        $this->db->select('*');
        $this->db->from('student_class_fee');
        $this->db->where('fkstudent_id',$std_id);
        $this->db->join('student_payment',
            'student_payment.fkstudentclassfee_id=student_class_fee.classfee_id');

        $query = $this->db->get();
        $result= $query->result();
        $remain = 0;
        foreach ($result as $row) {
            $remain = ($remain)+($row->std_remain);
        }
        return $remain;
    }

    //--------------------------------------------------------------------
    function monthlyfeedate($std_id){
        $this->db->select('*');
        $this->db->from('student_class_fee');
        $this->db->where('fkstudent_id',$std_id);
        $this->db->join('student_payment',
            'student_payment.fkstudentclassfee_id=student_class_fee.classfee_id');

        $query = $this->db->get();
        $result= $query->result();
        $date= 0;
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
        $this->db->where('fkstudent_id',$std_id);

        $query = $this->db->get();
        $result= $query->result();
        $paid= 0;
        foreach ($result as $row) {
            $paid = $paid + $row->paid_amt;
        }
        return $paid;

    }

    //------------------------------------------------------------------
    function otherfeeremaining($std_id){
        $this->db->select('*');
        $this->db->from('student_other_payment');
        $this->db->where('fkstudent_id',$std_id);

        $query = $this->db->get();
        $result= $query->result();
        $remain = 0;
        foreach ($result as $row) {
            $remain = $row->otherfee_remain;
        }
        return $remain;
    }

    //---------------------------------------------------------
    function otherfeedate($std_id){
        $this->db->select('*');
        $this->db->from('student_other_payment');
        $this->db->where('fkstudent_id',$std_id);

        $query = $this->db->get();
        $result= $query->result();
        $date= 0;
        foreach ($result as $row) {
            $date = $row->otherpay_created_date;
        }
        return $date;
    }
   //-----------------------------------------------------------------
   function std_search(){
       $search = $this->input->post("std_search");
       $this->db->select("*");
       $this->db->from("student");
       $this->db->like('student_name',$search);
       $this->db->or_like('std_father_name',$search);
       $this->db->or_like('student_contact',$search);
       $this->db->or_like('student_email',$search);
       $this->db->or_like('student_id',$search);
       $query = $this->db->get();
       $result = $query->result();
      return $result;
   }



}