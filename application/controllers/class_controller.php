<?php 
class Class_controller extends CI_Controller
{
	function __construct() {
        parent::__construct();
        $session = $this->session->userdata("session_data");
        $logged_in=$session['logged_in'];
        if($logged_in==0){
            redirect(site_url()."home/");
        }
        $this->load->model('student_class_model');
    }

	function index()
	{
	    $_SESSION['step1'] = [];
	    $c_data['std_classes'] = $this->student_class_model->get_all_classes();
	    $this->load->view('include/header');
	    $this->load->view('include/sidebar');
	    $this->load->view('class_students/students_classes',$c_data);
	    $this->load->view('include/footer');
	}

	function class_student_details()
	{
	    $cl_id = $this->uri->segment(3);
	    $c_s_d['classes'] = $this->student_class_model->get_all_classes();
	    $c_s_d['c_s_d'] = $this->student_class_model->class_student_details($cl_id);
	    $this->load->view('include/header');
	    $this->load->view('include/sidebar');
	    $this->load->view('class_students/class_student_details',$c_s_d);
	    $this->load->view('include/footer');
	}

	function step1_submit()
	{
	  
	    $result = $this->student_class_model->class_pro_selectedstd();	
	    redirect("class_controller/promoted_student_fee");


	}
	
	//-----------------------------------------------------------------------

	
	function step2_submit()
	{
	    
	    $counter = $this->input->post('counter');
	    
	    for( $i = 1; $i <=2; $i++   ){
		
		$array = [
		    
		    'fkstudent_id' => $this->input->post( 'student_id_' . $i ),
		    'fkclass_id' =>  $this->session->userdata['step1']['pro_class'],
		    'class_fee' => $this->input->post( 'subject_fee_' . $i ),
		    'admission_fee' => $this->input->post( 'addmission_' . $i ),
		    'to_be_pay' => $this->input->post( 'fee_to_pay_' . $i ),
		    'classfee_created_date' => '',
		    'classfee_created_time' => '',
		    'st_class_fee_status' => '1',
		    
		];
		$this->db->insert('student_class_fee',$array);
		
		$array = [
		    'st_class_fee_status' => '2',
		];
		
		$this->db->where('fkstudent_id', $this->input->post( 'student_id_' . $i ));
		$this->db->where('fkclass_id', $this->session->userdata['step1']['previous_class']);
		$this->db->update( 'student_class_fee', $array);
		
	    }
	    

	}
	
	//-----------------------------------------------------------------------
	
	function promoted_student_fee()
	{
	    
	    $data['proted_std'] = $this->student_class_model->promoted_student_fee();
//	     echo '<pre>';print_r($data);die;	
	    $this->load->view('include/header');
            $this->load->view('include/sidebar');
	    $this->load->view('class_students/promoted_student_fee',$data);
	    $this->load->view('include/footer');

	}

}

?>