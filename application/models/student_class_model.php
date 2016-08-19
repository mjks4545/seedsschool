<?php 
class Student_class_model extends CI_model
{


	function get_all_classes()
	{
		 	$this->db->select('*');
		 	$this->db->from('class');
		 	$this->db->join('subject','subject.su_id=class.su_id');
		 	$this->db->join('teacher','teacher.id=class.t_id');
		 	$this->db->join('course','course.co_id=class.co_id');
	$qry =  $this->db->get();

	$c_data =$qry->result();
	// echo '<pre>';print_r($c_data);die;

	return $c_data;
	
	}

	function class_student_details($cl_id)
	{
		$this->db->from('student_class_fee scf');
		$this->db->where('fkclass_id',$cl_id);
		$this->db->join('student s','s.student_id = scf.fkstudent_id');
		$qry_1 = $this->db->get()->result();
		return $qry_1;
		// echo '<pre>';print_r($qry_1);die;
	}
	//-----------------------------------------
	function class_pro_selectedstd()
	{
		   $this->session->set_userdata(
			   [
			       'step1' => $_POST
			   ]
			   );
		   return 0;
		   
		/* for promoted class id*/
	}
//----------------------------------------------------
	function promoted_student_fee()
	{
	    echo '<pre>';
	    print_r($_SESSION['step1']);die();
	    $step1 = $_SESSION['step1'];
	    $num = $step1['num']; 
	    for ($i=1; $i<$num ; $i++) { 
		$stu = $step1[ 's_id_' . $i];
		$this->db->where('student_id', $stu);
		$query = $this->db->get('student');
		$students[] =  $query->result();
	    }
	    $data['student']  = $students;
//	    print_r($students);
	    
	     // ----------------------------------------------------------------
	        
		     $this->db->where('cl_id', $step1['pro_class']);
		     $this->db->join('subject','subject.su_id = class.su_id');
	    $query  = $this->db->get('class');
	    
	    $result = $query->result();
	    $data['class'] = $result;
	    return $data;

	}
//----------------------------------------------------


}

?>