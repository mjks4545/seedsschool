<?php

class Course_m extends CI_Model{
    function view_courses(){
        $this->db->order_by('co_id','desc');
        $query  = $this->db->get('course');
        $result = $query->result();

        if($result){
            return $result;
        }else{
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function addcoursepro(){
        $course_title   = $this->input->post('course_title');
        $created_date   = date("d-M-Y");
        $created_time   = date("h:i:sa");

        $insert_array = array(
            'co_name'       => $course_title,
            'created_date'  => $created_date,
            'created_time'  => $created_time,
        );
        $result = $this->db->insert('course',$insert_array);
        if($result){
            return 1;
        }else{
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function updatecourse($id){
        $this->db->where('co_id',$id);
        $query = $this->db->get('course');
        $result = $query->result();
        if ($result){
            return $result;
        }else{
            return 0;
        }

    }

    //------------------------------------------------------------------------------------------------------------------
    function updatecoursepro($id){
        $course_name    = $this->input->post('course_title');
        $updated_date   = date("d-M-Y");
        $updated_time   = date("h:i:sa");
        $this->db->where('co_id',$id);

        $update_array = array(
            'co_name'      => $course_name,
            'updated_date' => $updated_date,
            'updated_time' => $updated_time,
        );
        $result = $this->db->update('course',$update_array);
        if ($result){
            return $result;
        }else{
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function deletecourse($id){
        $query = $this->db->delete('course',['co_id' => $id]);
        if ($query){
            return 1;
        }else{
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
}