<?php
class Studentpayment extends CI_Controller{
    function __construct() {
        parent::__construct();
        $session = $this->session->userdata("session_data");
        $logged_in=$session['logged_in'];
        if($logged_in==0){
            redirect(site_url()."home/");
        }
    }
//-------------------------------------------------------------------
   function viewstd()
   {
       $this->load->view('include/header');
       $this->load->view('include/sidebar');
       $data['result'] = $this->studentpayment_m->viewstd();
//        echo "<pre>";print_r($data); die();
       $this->load->view('student/studentpayment/viewstd', $data);
       $this->load->view('include/footer');
   }
    //---------------------------------------------------------------
    function studentclass(){
        $st_id = $this->uri->segment(3);
        $data['result'] = $this->studentpayment_m->studentclass($st_id);
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
//        echo "<pre>";print_r($data); die();
        $this->load->view('student/studentpayment/student_class', $data);
        $this->load->view('include/footer');
    }
    //---------------------------------------------------------------
    function paynow(){
        $classfee_id = $this->uri->segment(3);
        $st_id = $this->uri->segment(4);
        $data['result'] = $this->studentpayment_m->paynow($classfee_id);
        $data['checkad'] = $this->studentpayment_m->checkad($st_id,$classfee_id);
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
//        echo "<pre>";print_r($data); die();
        $this->load->view('student/studentpayment/paynow',$data);
        $this->load->view('include/footer');
        $this->session->set_userdata("paymentdetail",'');
    }
    //---------------------------------------------------------------
    function paymonthlyfeepro(){
        $std_id = $this->input->post('fkstd_id');
        $data=$this->studentpayment_m->paymonthlyfeepro();
         $classfee_id =  $data['arr']['fkstudentclassfee_id'];
        $data['std_info']=$this->student_m->student_details($std_id);
        $data['class_info']=$this->student_m->class_details($classfee_id);
        $this->session->set_userdata("paymentdetail",$data);
//       echo "<pre>";print_r($data); die();
        if ($data['result']==1){
            $this->session->set_flashdata('msg', 'Sucessfully Added');
            $this->session->set_flashdata('type', 'success');
            redirect(site_url().'studentpayment/slip');
        }
        if ($data['result']==0){
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            $this->load->view('student/studentpayment/paynow',$std_id);
        }
    }

    //----------------------------------------------------------------
    function slip(){
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data = $this->session->userdata("paymentdetail");
            //   echo "<pre>";print_r($data); die();

        $this->load->view('student/studentpayment/payment_slip',$data);
        $this->load->view('include/footer');


    }
    //----------------------------------------------------------------
    function classpaymentdetail(){
        $classfee_id=$this->uri->segment(3);
        $std_id=$this->uri->segment(4);
        $data['result']=$this->studentpayment_m->classpaymentdetail($classfee_id,$std_id);
//        echo '<pre>';print_r($data);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/studentpayment/student_paymentdetails',$data);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------
    function otherpay(){
        $std_id=$this->uri->segment(3);
        $data['result']=$this->studentpayment_m->otherpay($std_id);
        $data['check']=$this->studentpayment_m->otherpaycheckad($std_id);
        // echo '<pre>';print_r($data);die();
        
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/studentpayment/otherpay',$data);
        $this->load->view('include/footer');

        
    }

    //-----------------------------------------------------------------
     function payotherfeepro(){
        $std_id = $this->input->post('fkstd_id');
        $data=$this->studentpayment_m->payotherfeepro($std_id);
        $data['std_info']=$this->student_m->student_details($std_id);
         $this->session->set_userdata("otherpaymentdetail",$data);

        // echo '<pre>';print_r($data);die();

        if ($data['result']==1) {
            $this->session->set_flashdata('msg', 'Sucessfully Added');
            $this->session->set_flashdata('type', 'success');
            redirect(site_url().'studentpayment/otherpayment_slip');
        }else{
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect(site_url().'studentpayment/otherpay/'.$std_id);
        }  
    }
    //----------------------------------------------------------------
    function otherpayment_slip(){
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data = $this->session->userdata("otherpaymentdetail");
           //echo "<pre>";print_r($data); die();

        $this->load->view('student/studentpayment/otherpayment_slip',$data);
        $this->load->view('include/footer');


    }
    //-----------------------------------------------------------------
    
}