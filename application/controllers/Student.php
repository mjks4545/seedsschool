<?php

class Student extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $session = $this->session->userdata("session_data");
        $logged_in=$session['logged_in'];
        if($logged_in==0){
            redirect(site_url()."home/");
        }
    }

//-------------------------------------------------------------------
    function index()
    {
        $result['result'] = $this->student_m->view_students();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/student_home',$result);
        $this->load->view('include/footer');

    }

    // ------------------------------------------------------------------------------------ 
    function addstudent()
    {
        $data['course'] = $this->class_m->get_course();
//        echo '<pre>';print_r($data);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/addstudent', $data);
        $this->load->view('include/footer');

    }

     //----------------------------------------------------------------------------------------- 
    function check_as_visitor()
    {

        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('visitor/v_check_as_visitor', $data);
        $this->load->view('include/footer');

    }

    //------------------------------------------------------------------------------------------------------------------
    function visitor_student()
    {
          
        $contact = $this->input->post('contact');
        $data['course'] = $this->class_m->get_course();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/addstudent', $data);
        $this->load->view('include/footer');
     

    }

    //------------------------------------------------------------------------------------------------------------------
    function addstudentpro()
    {
        $data['result'] = $this->student_m->addstudentpro();

        if ($data['result'] == 0) {
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("student/addstudent");
        }
        if ($data['result'] == 2) {
            $this->session->set_flashdata('msg', 'Student Already exist');
            $this->session->set_flashdata('type', 'danger');
            redirect("student/addstudent");
        } else {
            $this->session->set_flashdata('msg', 'Sucessfully Added');
            $this->session->set_flashdata('type', 'success');
            $student_id = $data['result']['student_id'];
            $course_id = $data['result']['course_id'];
            redirect("student/studentclasses/" . $student_id . '/' . $course_id);
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function studentclasses()
    {
        $std_id = $this->uri->segment(3);
        $crs_id = $this->uri->segment(4);
        $result['result'] = $this->student_m->studentclasses($crs_id);
        $result['std_id'] = $std_id;
//        echo '<pre>'; print_r($result);die();

        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/student_classes', $result);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function studentclasspro()
    {
        $std_id = $this->uri->segment(3);
        $data = $this->student_m->studentclasspro($std_id);
        if ($data) {
            redirect(site_url() . 'student/student_class_fee/' . $std_id);
        } else {
            redirect(site_url() . 'student/studentclasses');
        }

    }

    //------------------------------------------------------------------------------------------------------------------
    function student_class_fee()
    {
        $std_id = $this->uri->segment(3);
        $result['result'] = $this->student_m->student_class_fee($std_id);
//            echo '<pre>';print_r($result);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/student_classfee', $result);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function viewstudents()
    {
        $result['result'] = $this->student_m->view_students();
//        echo '<pre>';print_r($result);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/students_view', $result);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function studentdetails()
    {
        $id = $this->uri->segment(3);
        $result['result'] = $this->student_m->student_details($id);
        $result['class'] = $this->student_m->studentall_classes($id);
        $result['fee'] = $this->student_m->studentall_fee($id);
//        echo '<pre>';print_r($result);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/student_detailsview', $result);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function studentclassfeepro()
    {
        $result = $this->student_m->studentclassfeepro();
        if ($result == 1) {
            $this->session->set_flashdata('msg', 'Sucessfully Added');
            $this->session->set_flashdata('type', 'success');
            redirect("student/viewstudents");
        } else {
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("student/student_class_fee");
        }

    }

    //------------------------------------------------------------------------------------------------------------------
    function updatestudent()
    {
        $id = $this->uri->segment(3);
        $result['result'] = $this->student_m->updatestudent($id);
//        echo '<pre>';print_r($result);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/student_update', $result);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function updatestudentpro()
    {
        $id = $this->uri->segment(3);
        $result = $this->student_m->updatestudentpro($id);

        if ($result == 1) {
            $this->session->set_flashdata('msg', 'Sucessfully Updated');
            $this->session->set_flashdata('type', 'success');
            redirect("student/studentdetails/" . $id);
        } else {
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("student/studentdetails" . $id);
        }
    }

//------------------------------------------------------------------
    function studentclassstatus()
    {
        $st_id = $this->uri->segment(3);
        $result = $this->student_m->studentclassstatus($st_id);

        if ($result == 1) {
            $this->session->set_flashdata('msg', 'Sucessfully Updated');
            $this->session->set_flashdata('type', 'success');
            redirect("student/studentdetails/" .$st_id);
        } else {
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("student/studentdetails" . $st_id);
        }
    }
 //--------------------------------------------for image-------------------------
    function img_upload()
    {
        $st_id = $this->uri->segment(3);
        $this->db->select("*");
        $this->db->where("student_id", $st_id);
        $query = $this->db->get('student');
        $result = $query->result();
        foreach ($result as $row) {
            if (($row->pic != "") && ($row->pic == 'user.jpg')) {
                $config['upload_path'] = 'public/user_img';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '10240000';
                //$config['max_width']  = '1024';
                //$config['max_height']  = '768';
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('img')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('msg', $error);
                    $this->session->set_flashdata('type',"danger");
                        redirect(site_url() . 'student/studentdetails/' . $st_id);

                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $image_path = $data['upload_data']['file_name'];
                    $update = array(
                        'pic' => $image_path
                    );
                    $this->db->where('student_id', $st_id);
                    $this->db->update('student', $update);
                        redirect(site_url() . 'student/studentdetails/'.$st_id);
                }

            }
            if (($row->pic != "") && ($row->pic != 'user.jpg')) {
                $path = $config['upload_path'] = 'public/user_img';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['overwrite']= true;
                $config['max_size'] = '10240000';
               //$config['max_width']  = '1024';
                //$config['max_height']  = '768';
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('img')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('msg', $error);
                    $this->session->set_flashdata('type',"danger");

                       redirect(site_url() . 'student/studentdetails/'.$st_id);

                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $image_path = $data['upload_data']['file_name'];
                    unlink($path . '/' . $row->pic);
                    $update = array(
                        'pic' => $image_path
                    );
                    $this->db->where('student_id', $st_id);
                    $this->db->update('student', $update);
                       redirect(site_url() . 'student/studentdetails/'.$st_id);
                }
            }
            if (($row->pic == "")) {
                $config['upload_path'] = 'public/user_img';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '10240000';// 10 mb
                //$config['max_width']  = '1024';
                //$config['max_height']  = '768';
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('img')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('msg', $error);
                    $this->session->set_flashdata('type',"danger");

                        redirect(site_url() . 'student/studentdetails/'.$st_id);
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $image_path = $data['upload_data']['file_name'];
                    $update = array(
                        'pic' => $image_path
                    );
                    $this->db->where('student_id', $st_id);
                    $this->db->update('student', $update);
                        redirect(site_url() . 'student/studentdetails/' . $st_id);
                }

            }
        }
        /**/
    }
//--------------------------------------------------------------

        function add_newclass()
    {
        $std_id = $this->uri->segment(3);
        $data['result'] = $this->student_m->add_newclass($std_id);
        $data['std_id'] = $std_id;
//    echo '<pre>'; print_r($data);die();
        if ($data['result'] == 0) {
            $this->session->set_flashdata('msg', 'Student have Already all Subjects.');
            $this->session->set_flashdata('type', 'danger');
            redirect(site_url() . "student/studentdetails/" . $std_id);
        } else {
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('student/add_newclass', $data);
            $this->load->view('include/footer');
        }
    }



    //------------------------------------------------------------------------------------------------------------------
    function addnewclasspro()
    {
        $std_id = $this->uri->segment(3);
        $data['result'] = $this->student_m->addnewclasspro($std_id);
        $data['std_id']=$std_id;
       // echo '<pre>';print_r($data);die();
        $this->session->set_userdata("cl_ids",$data['result']);
        if ($data) {
            redirect(site_url().'student/addnewclass_fee/' . $std_id);
        } else {
            redirect(site_url().'student/studentclasses');
        }

    }

    //------------------------------------------------------------------------------------------------------------------
    function addnewclass_fee()
    {
        $std_id = $this->uri->segment(3);
        $result['result'] = $this->student_m->addnewclass_fee($std_id);
         // echo '<pre>';print_r($result);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/student_classfee', $result);
        $this->load->view('include/footer');
    }
    //--------------------------------------------------------
    function studentlevel()
    {
        $data['level']=$this->student_m->studentlevel();
//         echo '<pre>';print_r($data);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/chalan/studentlevel',$data);
        $this->load->view('include/footer');

    }
 //-----------------------------------------------------------------
    function levelclass($co_id)
    {
        $data['class']=$this->student_m->levelclass($co_id);
//         echo '<pre>';print_r($data);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/chalan/levelclasses',$data);
        $this->load->view('include/footer');

    }
//-----------------------------------------------------------------
    function clstudent($cl_id)
    {
        $data['student']=$this->student_m->clstudent($cl_id);
//         echo '<pre>';print_r($data);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/chalan/clstudent',$data);
        $this->load->view('include/footer');

    }
//-----------------------------------------------------------------
    function chalanperstudent($clfee_id)
    {
        $data['std_info']=$this->student_m->chalanperstudent($clfee_id);
         if(!$data['std_info'][0]==''){
         // echo '<pre>';print_r($data);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/chalan/studentperclass_slip',$data);
        $this->load->view('include/footer');

    }else{
        $this->session->set_flashdata('mg','No record found');
        redirect('student/clstudent/5');
    }
    }
    //-----------------------------------------------------------------
    function chalan_search()
    {
        
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/chalan/v_chalansearchview');
        $this->load->view('include/footer');

    }
         //-----------------------------------------------------------------
    function get_chalan_by_no()
    {
        $chalan_number=$this->input->post('chalan_number');
        $result['chalan_number'] = $this->student_m->get_chalan_by_no($chalan_number);
        
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/chalan/v_chalannumber', $result);
        $this->load->view('include/footer');

    }
     //-----------------------------------------------------------------
    function get_chalan_by_class()
    {
         $chalan_class=$this->input->post('chalan_class');
        $result['chalan_class'] = $this->student_m->get_chalan_by_class($chalan_class);
        //echo '<pre>'; var_dump($result);die;
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/chalan/v_chalanclass', $result);
        $this->load->view('include/footer');

    }
     //-----------------------------------------------------------------
    function get_chalan_by_roll()
    {
         $student_id=$this->input->post('student_id');
        $result['student_id'] = $this->student_m->get_chalan_by_roll($student_id);
        //echo '<pre>'; var_dump($result);die;
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/chalan/v_chalanrollnumber', $result);
        $this->load->view('include/footer');

    }
     //-----------------------------------------------------------------
    function chalan_paid_home($student_id)
    {
           
         $data['std_info']=$this->student_m->chalan_for_paid($student_id);
         //echo '<pre>';var_dump($data);die;
         if(!$data['std_info'][0]==''){
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/chalan/v_chalanpaidprint',$data);
        $this->load->view('include/footer');
    }else{
        $this->session->set_flashdata('message', 'No Record Found');
        redirect('student/studentlevel');
    }
    }
      //-----------------------------------------------------------------
    function chalan_status()
    {
          $chalan_number = $this->input->post('chalan_number');
          $this->student_m->chalan_status($chalan_number);
         
            redirect('student/chalan_search');
          
    }


    //-----------------------------------------------------------------
    function add_chalan_number()
    {
       
        
      if(isset($_POST['chalan_button'])){

        $this->student_m->add_chalan_number();

       $result['printid'] = $this->student_m->get_chalan_id($data);
        $printid = $result['printid'][0]['print_id'];
        // //echo '<pre>'; print_r($printid) ;die;

        $class_data = array(  
                          'fkey' => $printid, 
                        'class' => $this->input->post('class'),
                        'type_of_fee' =>$this->input->post('type_of_fee') 
                     
            );
     $this->student_m->add_chalan_class($class_data);
         
        redirect('student/clstudent/5');
       } 
       
        
    }
//-----------------------------------------------------------------
    function chalanperclass($cl_id)
    {
        $data['std_info']=$this->student_m->chalanperclass($cl_id);
         // echo '<pre>';print_r($data["std_info"]);die();
        if($data['std_info']=='')
        {
            $this->session->set_flashdata('msg','This Class have no student ');
        $this->session->set_flashdata('type','info');
        redirect('student/studentlevel/');
    }
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/chalan/chalanperclass_slip',$data);
        $this->load->view('include/footer');
     
     
    }
    //-----------------------------------------------------------------
    
    function chalanperlevel($co_id)
    {
        $data['std_info']=$this->student_m->chalanperlevel($co_id);
         //echo '<pre>';print_r($data["std_info"]);die();
        if($data['std_info'] == 0){
            $this->session->set_flashdata('msg','This level have no student!');
             $this->session->set_flashdata('type','info');
             redirect('student/studentlevel');

            }
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/chalan/chalanpercourse_slip',$data);
        $this->load->view('include/footer');
    

    }
       
    // -----------------------------------------

    public function change_status( $id, $status ){

        $data = [
            'student_status'  => $status
        ];
        $this->db->where('student_id', $id);
        $this->db->update('student',$data);
        redirect( site_url() . 'student' );
    }

    // -----------------------------------------
    function get_complete_payment_details(){
        
        $student_id     = $this->uri->segment(3);
        $data           = $this->student_m->get_complete_payment_details( $student_id );
        $result['trf']  = $this->student_m->get_complete_trf($student_id);
        $result['data'] = $this->student_m->get_complete_payment_details_pro( $data );
        
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/detailedfeeview',$result);
        $this->load->view('include/footer');
        
    }

    // -----------------------------------------

    function student_class_left( $student_id, $status, $class_fee_id ){

        $result = $this->student_m->student_class_left( $status, $class_fee_id );
        redirect( site_url() . 'student/studentdetails/' . $student_id );

    }

    // -----------------------------------------

}