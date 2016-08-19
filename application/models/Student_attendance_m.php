<?php

class Student_attendance_m extends CI_Model
{
    // ------------------------------------------------------------------------

    function __construct()
    {

        parent::__construct();
        $this->student_offdays_att();

    }

    //-------------------------------------------------------
    function allcourse()
    {
        $this->db->select("*");
        $this->db->from("course");
        $query = $this->db->get();
        return $query->result();
    }

    //-------------------------------------------------------------
    function allclass($co_id)
    {
        $this->db->select("*");
        $this->db->from("class");
        $this->db->where("class.co_id", $co_id);
        $this->db->join("subject", "subject.su_id=class.su_id");
        $this->db->join("teacher", "teacher.id=class.t_id");
        $this->db->join("course", "course.co_id=class.co_id");
//        $this->db->join("teacher_subject","teacher_subject.sub_id=class.su_id");
        $query = $this->db->get();
        return $query->result();
    }

    function allclass_t($co_id)
    {
        $session = $this->session->userdata('session_data');
        $id = $session['id'];
        $this->db->select("*");
        $this->db->from("class");
        $this->db->where("class.co_id", $co_id);
        $this->db->join("subject", "subject.su_id=class.su_id");
        $this->db->join("teacher", "teacher.id=class.t_id");
        $this->db->join("course", "course.co_id=class.co_id");
        $this->db->where('class.t_id', $id);
//        $this->db->join("teacher_subject","teacher_subject.sub_id=class.su_id");
        $query = $this->db->get();
        return $query->result();
    }

    //-----------------------------------------------------------------
    function takeattendance($cl_id)
    {
        $this->db->select("*");
        $this->db->from("student_class_fee");
        $this->db->where("fkclass_id", $cl_id);
        $this->db->join("student", "student.student_id=student_class_fee.fkstudent_id");
        $this->db->join("class", "class.cl_id=student_class_fee.fkclass_id");
        $this->db->join("teacher", "teacher.id=class.t_id");
        $this->db->where("student_status", '1');
        $this->db->where("st_class_fee_status", '1');

//        $this->db->join("course","course.co_id=class.co_id");
//        $this->db->join("teacher_subject","teacher_subject.sub_id=class.su_id");
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num == 0) {
            return 0;
        } else {
            return $query->result();
        }
    }

    //-----------------------------------------------------------------
    function takeattendancepro($co_id, $cls_id)
    {
        $total = $this->input->post("total_num");
        $date = $this->input->post('date');
        $date = $this->input->post('date');
        /* for date to split and convert*/
        $date = date("d-M-Y", strtotime($date));
        $month = date("M", strtotime($date));
        $year = date("Y", strtotime($date));
        $time = date("h:i sa");
        /* for checking attendance duplocation*/
        $this->db->select("*");
        $this->db->from("student_attendance");
        $this->db->where("att_date", $date);
        $this->db->where("fkclass_id", $cls_id);
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num == 0) {
            for ($i = 1; $i <= $total; $i++) {
                $att = array(
                    "fkclass_id" => $cls_id,
                    "fkstudent_id" => $this->input->post("student_id_" . $i),
                    "status" => $this->input->post("status_" . $i),
                    "att_date" => $date,
                    "time" => $time,
                    "month" => $month,
                    "year" => $year,
                );
                $result = $this->db->insert("student_attendance", $att);
            }
            if ($result) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 2;
        }

    }

    //-----------------------------------------------------------------
    function todayattendance($cl_id, $co_id)
    {
        $date = date("d-M-Y");
        $this->db->select("*");
        $this->db->from("student_attendance");
        $this->db->join('student', 'student.student_id=student_attendance.fkstudent_id');
        $this->db->join('class', 'class.cl_id=student_attendance.fkclass_id');
        $this->db->join('teacher', 'teacher.id=class.t_id');
        $this->db->join('subject', 'subject.su_id=class.su_id');
        $where = array(
            'student_attendance.fkclass_id' => $cl_id,
            'student_attendance.att_date' => $date
        );
        $this->db->where($where);
        $query = $this->db->get();
        $num = $query->num_rows();
        $result = $query->result();
        if ($num > 0) {
            return $result;
        } else {
            return 0;
        }
    }

    //-----------------------------------------------------------------
    function classattendance($cl_id)
    {
        $this->db->select("*");
        $this->db->from("student_class_fee");
        $this->db->where("fkclass_id", $cl_id);
        $this->db->join("student", "student.student_id=student_class_fee.fkstudent_id");
        $this->db->join("class", "class.cl_id=student_class_fee.fkclass_id");
        $this->db->join("subject", "subject.su_id=class.su_id");
//        $this->db->join("course","course.co_id=class.co_id");
//        $this->db->join("teacher_subject","teacher_subject.sub_id=class.su_id");
        $query = $this->db->get();
        return $query->result();
    }

    //-----------------------------------------------------------------
    function attendancedetail($st_id, $cl_id, $co_id)
    {
        $this->db->select("*");
        $this->db->from("student_attendance");
        $this->db->where("fkclass_id", $cl_id);
        $this->db->where("fkstudent_id", $st_id);
        $this->db->order_by("st_attendance_id", "desc");
        $this->db->join("student", "student.student_id=student_attendance.fkstudent_id");
        $this->db->join("class", "class.cl_id=student_attendance.fkclass_id");
        $this->db->join("subject", "subject.su_id=class.su_id");
//        $this->db->join("course","course.co_id=class.co_id");
//        $this->db->join("teacher_subject","teacher_subject.sub_id=class.su_id");
        $query = $this->db->get();
        return $query->result();
    }
    //-----------------------------------------------------------------


    /******************** for percent of attendance*****************************/
    function total_num($st_id, $cl_id)
    {
        $this->db->select("*");
        $this->db->from("student_attendance");
        $this->db->where("fkclass_id", $cl_id);
        $this->db->where("fkstudent_id", $st_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    //-------------------------------------------------------------------
    function total_status($st_id, $cl_id, $status)
    {
        $this->db->select("*");
        $this->db->from("student_attendance");
        $this->db->where("fkclass_id", $cl_id);
        $this->db->where("fkstudent_id", $st_id);
        $this->db->where("status", $status);
        $query = $this->db->get();
        return $query->num_rows();
    }

    //-------------------------------------------------------------------

    function teacher_attandance()
    {

        $this->db->where('date', $this->input->post('date'));
        $this->db->where('class_id', $this->input->post('class_id'));
        $this->db->where('fkteacher_id', $this->input->post('teacher_id'));
        $query = $this->db->get('teacher_attendence');
        $result = $query->result();
        if (empty($result)) {

            $month = date("M", strtotime($this->input->post('date')));
            $year = date("Y", strtotime($this->input->post('date')));
            $data = [
                'fkteacher_id' => $this->input->post('teacher_id'),
                'status' => 'p',
                'date' => $this->input->post('date'),
                'month' => $month,
                'year' => $year,
                'class_id' => $this->input->post('class_id'),
            ];

            $insert = $this->db->insert('teacher_attendence', $data);
            return $insert;

        }

        return 0;

    }

    //---------------------------student attenance off days -------------
    function student_offdays_att()
    {
        $this->db->select("*");
        $this->db->from("student_class_fee");
        $this->db->where("st_class_fee_status", 1);
        $query_c = $this->db->get();
        $result_c = $query_c->result();
        foreach ($result_c as $row_c) {
            $cl_id = $row_c->fkclass_id;
            $s_id = $row_c->fkstudent_id;
            // for checking and taking last record of the teacher attendance
            $this->db->select("*");
            $this->db->from("student_attendance");
            $this->db->where("fkstudent_id", $s_id);
            $this->db->where("fkclass_id", $cl_id);
            $this->db->order_by("st_attendance_id", 'desc');
            $this->db->limit(1);
            $query_att = $this->db->get();
            if ($query_att->num_rows() > 0) {
                $result_att = $query_att->result();
                $from = date("d-M-Y", strtotime($result_att[0]->att_date));
                $to = date("d-M-Y", strtotime('-1 days'));
                $from_dif = strtotime($from);
                $to_diff = strtotime($to);
                $diff = $to_diff - $from_dif;
                $diff = floor($diff / (60 * 60 * 24));
                for ($i = 1; $i <= $diff; $i++) {
                    // for increment with days add one day with strting date
                    $from = date("d-M-Y", strtotime("+1 day", strtotime($from)));
                    $this->db->select("*");
                    $this->db->from("event");
                    $this->db->where("e_date", $from);
                    $query_event = $this->db->get();
                    if ($query_event->num_rows() > 0) {
                        $result_event = $query_event->result();
                        $evnt_type = $result_event[0]->e_type;
                        $evnt_title = $result_event[0]->e_title;
                        if ($evnt_type == 0) {
                            $this->db->insert("student_attendance", [
                                "fkstudent_id" => $s_id,
                                "fkclass_id" => $cl_id,
                                "status" => $evnt_title,
                                "att_date" => $from,
                                "time" => date("h:i a"),
                                "month" => date("M", strtotime($from)),
                                "year" => date("Y", strtotime($from))

                            ]);
                        }
                    } else {
                        $this->db->insert("student_attendance", [
                            "fkstudent_id" => $s_id,
                            "fkclass_id" => $cl_id,
                            "status" => "a",
                            "att_date" => $from,
                            "time" => date("h:i a"),
                            "month" => date("M", strtotime($from)),
                            "year" => date("Y", strtotime($from))

                        ]);
                    }
                }
            }
        }
    }
//------------------------------------------------------------------------
}