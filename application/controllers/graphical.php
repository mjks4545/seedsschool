<?php
 class Graphical extends CI_Controller{

    //---------------------------------------------------------------
    function index()
    {
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['num_v'] =$this->visitor_m->visitorpermonth();
        $data['num_spm'] =$this->student_m->studentpermonth();
        $data['spy'] =$this->student_m->studentperyear();
        $data['vpy'] =$this->visitor_m->visitorperyear();
// for studuent fee
        $data['studentfee'] = $this->studentpayment_m->monthlyfee();
        $data['yearlyfee'] = $this->studentpayment_m->yearlyfee();
        $data['studentotherfee'] = $this->studentpayment_m->otherpermonthfee();
        $data['yearlyotherfee'] = $this->studentpayment_m->yearlyotherfee();
        $data['monthly_report'] = $this->studentpayment_m->monthlyreport();
        $data['yearly_report'] = $this->studentpayment_m->yearlyreport();
//        echo "<pre>";print_r($data['yearly_report']);die;
        $this->load->view("admin/admin_home_charts",$data);
        $this->load->view('include/footer');
    }

 }