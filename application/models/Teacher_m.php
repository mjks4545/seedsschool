<?php

class Teacher_m extends CI_Model
{

    function addteacherpro()
    {

        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $cnic = $this->input->post('cnic');
        //$subject      = $this->input->post('subject');
        $address = $this->input->post('address');
        $contact = $this->input->post('contact');
        //$percentage   = $this->input->post('percentage');
        $created_date = date("d-M-Y");
        $created_time = date("h:i:sa");
        $length = 6;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ,@#$%*';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        $password = $randomString;
        $insert_array = array(
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'cnic' => $cnic,
            'address' => $address,
            //'subject'       => $subject,
            'contact' => $contact,
            //'percentage'    => $percentage,
            'created_date' => $created_date,
            'created_time' => $created_time
        );
        $result = $this->db->insert('teacher', $insert_array);

        if ($result) {
            return 1;
        } else {
            return 0;
        }

    }

    //--------------------------------------------------------------------------
    function updateteacherpro($id)
    {

        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $cnic = $this->input->post('cnic');
        //$subject      = $this->input->post('subject');
        $address = $this->input->post('address');
        $contact = $this->input->post('contact');
        //$percentage   = $this->input->post('percentage');
        $updated_date = date("d-M-Y");
        $updated_time = date("h:i:sa");

        $this->db->where('id', $id);

        $insert_array = array(
            'name' => $name,
            'email' => $email,
            'cnic' => $cnic,
            'address' => $address,
            //'subject'       => $subject,
            'contact' => $contact,
            //'percentage'    => $percentage,
            'updated_date' => $updated_date,
            'updated_time' => $updated_time
        );
        $result = $this->db->update('teacher', $insert_array);

        if ($result) {
            return 1;
        } else {
            return 0;
        }

    }

    //--------------------------------------------------------------------------

    function viewteachers()
    {
        $this->db->select("*");
        $query = $this->db->get("teacher");
        $num = $query->num_rows();
        $config2['base_url'] = site_url() . "teacher/viewteacher";
        $config2['total_rows'] = $num;
        $config2['per_page'] = 10;
        $config2['num_links'] = 4;
        //config for bootstrap pagination class integration
        $config2['uri_segment'] = 3;
        $this->db->order_by('id', 'desc');
        $this->pagination->initialize($config2);
        $query = $this->db->get('teacher', $config2['per_page'], $this->uri->segment(3));

        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach ($result as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return 0;
        }
    }

    //--------------------------------------------------------------------------

    function delete_teacher($id)
    {

        $query = $this->db->delete('teacher', ['id' => $id]);
        if ($query) {
            return 1;
        } else {
            return 0;
        }

    }

    //--------------------------------------------------------------------------

    function view_teacherdetails($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('teacher');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    //--------------------------------------------------------------------------

    function academicinfo_teacher($id)
    {
        $this->db->select('*');
        $this->db->from('class');
        $this->db->join('teacher', 'teacher.id = class.t_id');
        $this->db->join('subject', 'subject.su_id = class.su_id');
        $this->db->join('course', 'course.co_id = class.co_id');
        $this->db->where('class.t_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    //--------------------------------------------------------------------------
    function update_teacher($id)
    {
        $this->db->select('*');
        $this->db->from('teacher');

        $this->db->where('id', $id);

        $query = $this->db->get();
        $result = $query->result();

        foreach ($result as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //---------------------------------------------------------------------------

    function get_teacher($id = null)
    {

        if ($id == null) {
            return 0;
        }

        $this->db->select("*");
        $this->db->from("teacher_subject");
        $this->db->join('teacher', 'teacher.id = teacher_subject.t_id');
        $this->db->where('sub_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;

    }

    //-----------------------------------------------------------------------------
    function teachersubjectaddpro($t_id)
    {
        $su_id = $this->input->post("subject");
        $comission = $this->input->post("comission");
        $this->db->where('t_id', $t_id);
        $this->db->where('sub_id', $su_id);
        $query = $this->db->get("teacher_subject");
        $num = $query->num_rows();
        if ($num > 0) {
            return 2;
        } else {
            $insrt = array(
                "t_id" => $t_id,
                "sub_id" => $su_id,
                "comission" => $comission
            );
            $insert = $this->db->insert('teacher_subject', $insrt);
            if ($insert) {
                return 1;
            } else {
                return 0;
            }
        }

    }

    //----------------------------------------------------------------------
    function teacher_subject($id)
    {
        $this->db->select("*");
        $this->db->from("teacher_subject");
        $this->db->where("t_id", $id);
        $this->db->join('subject', 'subject.su_id = teacher_subject.sub_id');
        $query = $this->db->get();
        return $query->result();
    }

    //--------------------------------------------------------------------
    function sallrypersubject($t_id, $sub_id)
    {
        $this->db->select('*');
        $this->db->from('class');
        $this->db->join('student_class_fee', 'student_class_fee.fkclass_id = class.cl_id');
        $this->db->where('class.t_id', $t_id);
        $this->db->where('class.su_id', $sub_id);
        $this->db->where('class.class_status', 1);

        $query = $this->db->get();
        $pesi = $query->result();
        $to_be_pay = 0;
        foreach ($pesi as $rupi) {
            $to_be_pay = $to_be_pay + $rupi->to_be_pay;
        }


//        echo '<pre>';print_r($to_be_pay);die();
        return $to_be_pay;
    }

    //-------------------------------------------------------
    function selectall_teacher()
    {
        $query = $this->db->get('teacher');
        return $query->result();
    }
//-------------------------------------------------------
    function active_teacher()
    {
        $this->db->where("t_status",1);
        $query = $this->db->get('teacher');
        return $query->result();
    }

    //-----------------------------------------------------------
    function teachernewattendancepro()
    {
        $date = $this->input->post('date');
        $date = date("d-M-Y", strtotime($date));
        $month = date("M", strtotime($date));
        $year = date("Y", strtotime($date));
        /* for checking attendance duplocation*/
        $this->db->select("*");
        $this->db->from("teacher_attendence");
        $this->db->where("date", $date);
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num == 0) {
            $this->db->where('t_status',1);
            $query = $this->db->get('teacher');
            $num = $query->num_rows();
            for ($i = 1; $i <= $num; $i++) {

                $t_id = $this->input->post('t_id' . $i);
                $status = $this->input->post('status_' . $i);
                $att = array(
                    'fkteacher_id' => $t_id,
                    'status' => $status,
                    'date' => $date,
                    'month' => $month,
                    'year' => $year
                );
                $insert = $this->db->insert('teacher_attendence', $att);
            }
            if ($insert) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 2;
        }

    }

    //-----------------------------------------------------------
    function todayattendance()
    {

        $this->db->select("*");
        $this->db->from('teacher_attendence');
        $this->db->join('teacher', 'teacher.id = teacher_attendence.fkteacher_id');
        $this->db->where('teacher_attendence.date', date("d-M-Y"));
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    //-----------------------------------------------------------
    function teacher_attendance_detail()
    {
        $this->db->select("*");
        $this->db->from("teacher");
        $query = $this->db->get();
        return $query->result();
    }
    //-----------------------------------------------------------
    function teacher_attendance_detailview($st_id)
    {
        $this->db->select("*");
        $this->db->from("teacher");
        $this->db->where("id", $st_id);
        $this->db->join('teacher_attendence', 'teacher_attendence.fkteacher_id = teacher.id');
        $this->db->group_by('month');
        $this->db->group_by('year');
        $query = $this->db->get();
        $num = $query->num_rows();
        $config2['base_url'] = site_url() . "teacher/teacherattendancedetailview/".$st_id.'/';
        $config2['total_rows'] = $num;
        $config2['per_page'] = 12;
        $config2['num_links'] = 4;
        $config2['uri_segment'] = 4;
        $this->pagination->initialize($config2);
        $this->db->where("id", $st_id);
        $this->db->join('teacher_attendence', 'teacher_attendence.fkteacher_id = teacher.id');
        $this->db->group_by('month');
        $this->db->group_by('year');
        $query = $this->db->get('teacher', $config2['per_page'], $this->uri->segment(4));
        $result = $query->result();
        /*echo "<pre>";
        print_r($result);
        die();*/
        return $result;

    }
    //----------------------------------------------------------------------------
    function num_status($st_id,$month,$year,$status)
    {
        $this->db->select("*");
        $this->db->from("teacher_attendence");
        $where = array(
            'fkteacher_id'=>$st_id,
            'month'=>$month,
            'year'=>$year,
            'status'=>$status
        );
        $this->db->where($where);
        $query = $this->db->get();
        return $query->num_rows();
    }
    //-----------------------------------------------------------
  function status($status,$id){
      $this->db->where('id',$id);
      $array = array(
          't_status'=>$status
      );
      $result = $this->db->update('teacher',$array);
      if($result){
          return 1;
      }
      else{
          return 0;
      }
  }
    //-----------------------------------------------------------
    function teacher_paymentdetail($id){
        $this->db->select('*');
        $this->db->from('teacher');
        $this->db->join('teacher_salaries', 'teacher_salaries.fkteacher_id = teacher.id');
        $this->db->where('fkteacher_id', $id);
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }

    //-----------------------------------------------------------
   function paysalary($id){
       $this->db->select('*');
       $this->db->from('student_class_fee');
       $this->db->join('class', 'class.cl_id = student_class_fee.fkclass_id');
//       $this->db->join('teacher_subject','teacher_subject.sub_id=class.su_id');
//       $this->db->join('teacher','teacher.id=class.t_id');
       $this->db->where('class.t_id', $id);
       $query = $this->db->get();
       $result = $query->result();
       $sallary = 0;
       foreach($result as $row){
           $where=array(
               'sub_id'=>$row->su_id,
               'teacher_subject.t_id'=>$row->t_id
           );
           $this->db->where($where);
           $query = $this->db->get('teacher_subject');
           $comission =$query->result();
           $comission_t = $comission[0]->comission;
           $pay = $row->to_be_pay;

            $sallary =$sallary+($pay*$comission_t)/100;
       }
       $result['salary']=$sallary;
       return $result;
   }

    //-----------------------------------------------------------
    function salarypaymentpro($id){
        $total_salary = $this->input->post('total_salary');
        $paid_month = $this->input->post('paid_month');
        $amount_reason = $this->input->post('reason');
        $paid_salary = $this->input->post('amount');
        $created_date = date("d-M-Y");
        $created_time = date("h:i:sa");


        $this->db->select("*");
        $this->db->where("fkteacher_id", $id);
        $this->db->order_by('sa_id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get("teacher_salaries");
        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach ($result as $r) {
                $last_paid = $r->paid_month;
                $remaining_salary = $r->remaining_salary;
                if ($last_paid == $paid_month) {
                    $total_salary=$r->total_salary;
                    $remaining_salary = ($remaining_salary) - ($paid_salary);
                    $insert_array = array(

                        'fkteacher_id' => $id,
                        'paid_month' => $paid_month,
                        'total_salary' => $total_salary,
                        'amount_reason' => $amount_reason,
                        'paid_salary' => $paid_salary,
                        'remaining_salary' => $remaining_salary,
                        'created_date' => $created_date,
                        'created_time' => $created_time,

                    );
                    $result = $this->db->insert('teacher_salaries', $insert_array);
                }
                if ($last_paid !== $paid_month) {
                    $remaining_salary = ($total_salary) + ($remaining_salary) - ($paid_salary);
                    $insert_array = array(

                        'fkteacher_id' => $id,
                        'paid_month' => $paid_month,
                        'total_salary' => $total_salary,
                        'amount_reason' => $amount_reason,
                        'paid_salary' => $paid_salary,
                        'remaining_salary' => $remaining_salary,
                        'created_date' => $created_date,
                        'created_time' => $created_time,

                    );
                    $result = $this->db->insert('teacher_salaries', $insert_array);
                }
            }
        } else {
            $remaining_salary = ($total_salary) - ($paid_salary);

            $insert_array = array(

                'fkteacher_id' => $id,
                'paid_month' => $paid_month,
                'total_salary' => $total_salary,
                'amount_reason' => $amount_reason,
                'paid_salary' => $paid_salary,
                'remaining_salary' => $remaining_salary,
                'created_date' => $created_date,
                'created_time' => $created_time,

            );
            $result = $this->db->insert('teacher_salaries', $insert_array);
        }
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }
    //-----------------------------------------------------------

    function change_teacher_password()
    {
        $id = $this->input->post('pass_id');
        //$password = $this->input->post('password');
        $data = array(
            'password'=>$this->input->post('password')
            );        
        $this->db->where('id',$id);
        $this->db->update('teacher',$data);
    }

}
