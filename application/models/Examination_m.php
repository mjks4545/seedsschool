<?php
class Examination_m extends CI_Model
{
    //-------------------------------------------------------------------
 function get_student($t_id,$role,$co_id,$cl_id)
 {
    if($role!='admin'){
    	$this->db->select("*");
        $this->db->from("student_class_fee");
        $this->db->where("student_class_fee.fkclass_id", $cl_id);
        $this->db->join("class", "class.cl_id=student_class_fee.fkclass_id");
        $this->db->join("student", "student.student_id=student_class_fee.fkstudent_id");
        $this->db->join("teacher", "teacher.id=class.t_id");
    	 $this->db->where("id",$t_id);
    //$this->db->where("co_id",$co_id);
    	 $this->db->where("cl_id", $cl_id);
     
    $query = $this->db->get();
    $data = $query->result();
    if($data){
        return $data;
        }else{
            return 0;
        }
    
}else{
   		 $this->db->select("*");
        $this->db->from("student_class_fee");
        $this->db->where("student_class_fee.fkclass_id", $cl_id);
        $this->db->join("class", "class.cl_id=student_class_fee.fkclass_id");
        $this->db->join("student", "student.student_id=student_class_fee.fkstudent_id");
        $this->db->join("teacher", "teacher.id=class.t_id");
      
    $query = $this->db->get();
     $data = $query->result();
    if($data){
        return $data;
       } else{
            return 0;
        }
    }

 }
    // -------------------------------------------------------------------------
    
    function insert_result($cl_id,$co_id,$t_id,$role)
    {
        $su_id = $this->input->post('subject_id');
        $total_mark = $this->input->post('total_mark');
         
        foreach ($_POST['student'] as $student) {
            
            $percentage = $total_mark/$student['obtain_mark'] * 100;

            $data = [

                'fkclass_id'       => $cl_id,
                'fkcourse_id'      => $co_id,
                'fkteacher_id'     => $t_id,
                'fksubject_id'     => $su_id,
  
                'obtain_mark'      => $student['obtain_mark'],
                'total_mark'       => $total_mark,
                'fkstudent_id'     => $student['student_id'],
                'percentage'       => $percentage,

            ];

              $this->db->insert('examination', $data);

        }
            
    }
     // -------------------------------------------------------------------------
    function view_result($cl_id)
    {
         $id = $this->session->userdata['session_data']['id'];
          $role = $this->session->userdata['session_data']['role'];

        if($role == 'admin')
        {
         
            $this->db->select('*');
            $this->db->from('examination');
            $this->db->join('student','student.student_id=examination.fkstudent_id');
             $this->db->join('teacher','teacher.id=examination.fkteacher_id');
             $this->db->join('subject','subject.su_id=examination.fksubject_id');
             $this->db->join('class','class.cl_id=examination.fkclass_id');
             $this->db->where('examination.fkclass_id', $cl_id);
            // $this->db->where('fkteacher_id', $id);
            $query = $this->db->get();
            $result = $query->result();
           //echo'<pre>'; print_r($result);die;
             if($result){
                return $result;
             }else{
                return 0;
             }
        
    }else{
            $this->db->select('*');
            $this->db->from('examination');
            $this->db->join('student','student.student_id=examination.fkstudent_id');
             $this->db->join('teacher','teacher.id=examination.fkteacher_id');
             $this->db->join('subject','subject.su_id=examination.fksubject_id');
             $this->db->join('class','class.cl_id=examination.fkclass_id');
             $this->db->where('examination.fkclass_id', $cl_id);
             $this->db->where('examination.fkteacher_id', $id);
            $query = $this->db->get();
            $result = $query->result();
           //echo'<pre>'; print_r($result);die;
             if($result){
                return $result;
             }else{
                return 0;
             }

    }
    }
     // -------------------------------------------------------------------------
    function result_for_student($student_id,$cl_id,$co_id)
    {

            $this->db->select('*');
            $this->db->from('examination');
            $this->db->join('student','student.student_id=examination.fkstudent_id');
             $this->db->join('teacher','teacher.id=examination.fkteacher_id');
             $this->db->join('subject','subject.su_id=examination.fksubject_id');
             $this->db->join('class','class.cl_id=examination.fkclass_id');
             $this->db->where('examination.fkclass_id', $cl_id);
             $this->db->where('examination.fkstudent_id', $student_id);
            $query = $this->db->get();
            $result = $query->result();
           //echo'<pre>'; print_r($result);die;
             if($result){
                return $result;
             }else{
                return 0;
             }

    
    }

    // -------------------------------------------------------------------------
   
    function get( $id = null ){

        $this->db->select('*');
	$query = $this->db->get('class');
        $num = $query->num_rows();
        $config['base_url'] = site_url()."class_c/index/";
        $config['total_rows'] = $num;
        $config['per_page'] = 10;
        $config['num_links'] = 4;
        $config['uri_segment'] = 3;
        $this->db->join('subject','subject.su_id = class.su_id');
        $this->db->join('course','course.co_id = class.co_id');
        $this->db->join('teacher','teacher.id = class.t_id');
        $this->db->order_by('cl_id','desc');
        $this->pagination->initialize($config);
        $query = $this->db->get('class', $config['per_page'], $this->uri->segment(3));
	return $query->result();
	
    }
    
    // -------------------------------------------------------------------------
    function update( $id = null , $value = null ){
	
	if( $id == null ){
	
	    return 0;
	
	}
	
	$update = [
	    'class_status' => $value
	];
	
	return $this->db->update( 'class', $update , [ 'cl_id' => $id ] );
	
    }
    
    // -------------------------------------------------------------------------
    function get_course( $id = null ){
	
	$query   = $this->db->get('course');
	return $query->result();
	
    }

	// ---------------------------------------------------------------------- 
	function get_subjects(){
		$query   = $this->db->get('subject');
		return $query->result();
	}
    
    // -------------------------------------------------------------------------- ------------------------
	function updateclass($id){
		$this->db->select('*');
		$this->db->from('class');
		$this->db->join('teacher','teacher.id = class.t_id');
		$this->db->join('subject','subject.su_id = class.su_id');
		$this->db->join('course','course.co_id = class.co_id');
		$this->db->where('cl_id',$id);

		$query  = $this->db->get();
		$result = $query->result();

		if ($result){
			return $result;
		}else{
			return 0;
		}
	}

	//------------------------------------------------------------------------------------------------------------------
	function get_teachers(){
		$query = $this->db->get('teacher');
		$result= $query->result();
		if ($result){
			return $result;
		}else{
			return 0;
		}
	}

	//------------------------------------------------------------------------------------------------------------------
	function allclasses($id){
		$this->db->where('t_id',$id);
		$query = $this->db->get('class');
		return $query->result();
	}

}