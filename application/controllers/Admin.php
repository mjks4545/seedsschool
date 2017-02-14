<?php


class Admin extends CI_Controller
{
    
    // ---------------------------------------------------------------
    
    function __construct() {
        parent::__construct();
        $session = $this->session->userdata("session_data");
        $logged_in=$session['logged_in'];
        if($logged_in==0){
            redirect(site_url()."home/");
        }
    }
    
    // ---------------------------------------------------------------
    
    function index()
    {
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('admin/admin_home');
        $this->load->view('include/footer');

    }
  //-------------------------------------------------------------
    function invoice(){
        $this->load->view('include/header_login');
        //$this->load->view('include/sidebar');
        $this->load->view('invoice/invoice');
//        $this->load->view('include/footer');
    }

    function admin_setting()
    {
        $session = $this->session->userdata('session_data');
        $id= $session['id'];
         $data['adm_data'] = $this->main_m->get_admin_data($id);
        // echo '<pre>';print_r($data);die;
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('admin/admin_setting',$data);
        $this->load->view('include/footer');
    }
    
    // ----------------------------------------------------------------

    function change_admin_password()
    {
        $data = $this->main_m->change_admin_password();
        redirect('admin/admin_setting');
    }
    //--------------------------------------------------
    function add_auto_montly_fee()
    {
        $this->main_m->deactive_completed_student();
        $this->main_m->add_auto_montly_fee();
        redirect( site_url() . 'admin');
    }
    
    // -------------------------------------------------

    function define_break_even(){
        
        $result['result'] = $this->main_m->get_all_teachers_break_even();
        $this->load->view( 'include/header' );
        $this->load->view( 'include/sidebar' );
        $this->load->view( 'admin/define_break_even', $result );
        $this->load->view( 'include/footer' );   

    }

    // -------------------------------------------------

    function add_break_even_point(){
        
        $id = $this->main_m->add_break_even_point();
              $this->main_m->update_break_even( $id, $this->input->post('fixed_expense') );
        redirect( site_url() . 'director');
        
    }

    // -------------------------------------------------

    function send_daily_reports(){

        $reg_std  = $this->main_m->send_daily_reports();
        $payments = $this->main_m->send_daily_payments();
        $trf      = $this->main_m->send_daily_trf();
        $absent   = $this->main_m->abesnet_students();
        $message  = '<H1>Daily Email Notification</h1>';
        $message .= '<p>This is daily notification message</p>';
        $message .= '<h3>Today\'s Student Registered</h3>';
        $i = 1;
        foreach ( $reg_std as $std ) {

            $message .= '(' . $i . ') ' . $std->student_name . '<br>';
            $i++;

        }
        $i = 1;
        $message .= '<h3>Today\'s Monthly Fee Payments Made</h3>';
        $total_payments = 0;
        foreach ( $payments as $payment ) {
            $total_payments += $payment->std_paid;
            $message .= '(' . $i . ') ' . $payment->student_name . ' ' . $payment->su_name . " " . $payment->co_name . ' ' . $payment->std_paid .'<br>';
            $i++;

        }
        $message .= 'Total Monthly Fee Payments made ' . $total_payments;
        $message .= '<h3>Today\'s TRF Payments Made</h3>';
        $i = 1;
        $total_payments = 0;
        foreach ($trf as $admission) {
            $message .= '(' . $i . ') ' . $admission->student_name . ' ' . $admission->paid_amt . '<br>';
            $total_payments += $admission->paid_amt;
            $i++;
        }
        $message .= 'Total TRF Payments made ' . $total_payments;
        
        // Always set content-type when sending HTML email
        $headers  = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <admin@seedsschool.com>' . "\r\n";

        echo '<pre>';
        print_r($message);
        die;

        // mail('nasirawkum@gmail.com', 'Notification Email', $message, $headers);

        redirect( site_url() .  'soft/admin' );

    }

    // -------------------------------------------------

}