<?php
class Class_m extends CI_Model
{
    
    // -------------------------------------------------------------------------
    
    function insert(){
	
	$name             = $this->input->post('name');
	$sdate            = $this->input->post('sdate');
	$timestamp        = strtotime($sdate);
	$sdate        	  = date("d-M-Y", $timestamp);
	$endingdate       = date("d-M-Y", strtotime("+4 months", strtotime($sdate)));
	$counter          = $this->input->post('counter');
	$date             = date("d-M-Y");
	
	for( $i = 1; $i <= $counter; $i++ ){

	    $time_p     = 'time_'    . $i;
	    $fee_p      = 'fee_'    . $i;
	    $subject_p  = 'subject_' . $i;
	    $teacher_p  = 'teacher_' . $i;
	    $time       = $this->input->post( $time_p );
	    $fee        = $this->input->post( $fee_p );
	    $subject    = $this->input->post( $subject_p );
	    $teacher    = $this->input->post( $teacher_p );

	    $result = $this->db->insert('class', [

		'su_id'   => $subject,
		'co_id'   => $name,
		't_id'    => $teacher,
		'fee'     => $fee,
		'time'    => $time,
		's_date'  => $sdate,
		'date'    => $date,
		'e_date'  => $endingdate

	    ]);
	}

	if ($result) {
	    return 1;
	} else {
	    return 0;
	}
	    
    }

	//------------------------------------------------------------------------------------------------------------------
	function updateclasspro($id){

		$course_id = $this->input->post('course_name');
		$sdate = $this->input->post('sdate');
		$timestamp        = strtotime($sdate);
		$sdate        	  = date("d-M-Y", $timestamp);
		$endingdate       = date("d-M-Y", strtotime("+4 months", strtotime($sdate)));
		$time = $this->input->post('time_1');
		$fee = $this->input->post('fee_1');
		$subject = $this->input->post('subject_1');
		$teacher = $this->input->post('teacher_1');
		$date             = date("d-M-Y");

		$this->db->where('cl_id',$id);
		$update_array = array(
			'co_id'		=> $course_id,
			'su_id'		=> $subject,
			't_id'		=> $teacher,
			'fee'		=> $fee,
			'time'		=> $time,
			's_date'	=> $sdate,
			'date'		=> $date,
			'e_date' 	=> $endingdate,
		);

		$result = $this->db->update('class',$update_array);
		if ($result){
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

	//------------------------------------------------------------------------------------------------------------------
	function get_subjects(){
		$query   = $this->db->get('subject');
		return $query->result();
	}
    
    // -----------------------------------------------------------------------------------------------------------------
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