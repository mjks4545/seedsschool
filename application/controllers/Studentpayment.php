<?php
class Studentpayment extends CI_Controller{

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
    }
    //---------------------------------------------------------------
    function paymonthlyfeepro(){
        $std_id = $this->input->post('fkstd_id');
        $data=$this->studentpayment_m->paymonthlyfeepro();
        if ($data==1){
            redirect(site_url().'studentpayment/studentclass/'.$std_id);
        }
        if ($data==0){
            $this->load->view('student/studentpayment/paynow',$std_id);
        }
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
       // echo '<pre>';print_r($data);die();

        if ($data) {
            redirect(site_url().'studentpayment/studentclass/'.$std_id);
        }else{
            redirect(site_url().'studentpayment/otherpay/'.$std_id);
        }  
    }

    //-----------------------------------------------------------------
    
}