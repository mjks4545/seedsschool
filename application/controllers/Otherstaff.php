<?php

class Otherstaff extends CI_Controller
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
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['staff'] = $this->otherstaff_m->viewstaff();
        $this->load->view('otherstaff/otherstaff_home',$data);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function addstaff()
    {
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('otherstaff/addstaff');
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function paymentdetails()
    {
        $id = $this->uri->segment(3);
        $data['result'] = $this->otherstaff_m->staff_salaries($id);
        $data['id'] = $id;
//        echo '<pre>';print_r($data);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('otherstaff/staff_paymentdetails', $data);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function paysalary()
    {
        $id = $this->uri->segment(3);
        $data['result'] = $this->otherstaff_m->staff_data($id);
//        echo '<pre>';print_r($data);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('otherstaff/pay_salary', $data);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function addstaffpro()
    {
        $result = $this->otherstaff_m->addstaffpro();
        if ($result == 1) {
            $this->session->set_flashdata('msg', 'Sucessfully Added');
            $this->session->set_flashdata('type', 'success');
            redirect("otherstaff/");
        }
        if ($result == 0) {
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("otherstaff/addstaff");
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function viewstaff()
    {
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['staff'] = $this->otherstaff_m->viewstaff();
//        echo '<pre>';print_r($data);die();
        $this->load->view('otherstaff/view_staff', $data);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function viewstaffdetails()
    {
        $id = $this->uri->segment(3);
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['result'] = $this->otherstaff_m->staff_salaries($id);
        $data['staff'] = $this->otherstaff_m->view_staffdetails($id);
//       echo '<pre>';print_r($data);die();
        $this->load->view('otherstaff/view_staffdetails', $data);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function updatestaff()
    {
        $id = $this->uri->segment(3);
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['staff'] = $this->otherstaff_m->update_staff($id);
//       echo '<pre>';print_r($data);die();
        $this->load->view('otherstaff/update_staff', $data);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function updatestaffpro()
    {
        $id = $this->uri->segment(3);
        $result = $this->otherstaff_m->updatestaffpro($id);
        if ($result == 1) {
            $this->session->set_flashdata('msg', 'Sucessfully Updated');
            $this->session->set_flashdata('type', 'success');
            redirect("otherstaff/viewstaffdetails/" . $id);
        }
        if ($result == 0) {
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("otherstaff/updatestaff/" . $id);
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function deletestaff()
    {

        $id = $this->uri->segment(3);
        $result = $this->otherstaff_m->delete_staff($id);
        if ($result == 1) {
            $this->session->set_flashdata('msg', 'Sucessfully Deleted');
            $this->session->set_flashdata('type', 'success');
            redirect("otherstaff/viewstaff");
        }
        if ($result == 0) {
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("otherstaff/viewstaff");
        }

    }

    //------------------------------------------------------------------------------------------------------------------
    function salarypaymentpro()
    {
        $id = $this->uri->segment(3);
        $data = $this->otherstaff_m->salarypaymentpro();
        $data['staff'] = $this->otherstaff_m->view_staffdetails($id);
        $this->session->set_userdata("paymentdetail",$data);
//           echo '<pre>';print_r($data);die();
        if ($data['result'] == 1) {
            $this->session->set_flashdata('msg', 'Sucessfully Added');
            $this->session->set_flashdata('type', 'success');
            redirect("otherstaff/payment_slip/");
//            echo $id;
        }
        if ($data['result'] == 0) {
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("otherstaff/paymentdetails/" . $id);

        }
    }

    //----------------------------------------------------------------------
    function payment_slip(){
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data = $this->session->userdata("paymentdetail");
//       echo '<pre>';print_r($data);die();
        $this->load->view('otherstaff/payment_slip', $data);
        $this->load->view('include/footer');
    }
    //----------------------------------------------------------------------

    function newattendence()
    {
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['attendence'] = $this->otherstaff_m->stafattendence();
        $this->load->view('otherstaff/newattendence', $data);
        $this->load->view('include/footer');
    }

    //----------------------------------------------------------------------

    function staffattpro()
    {
        $result = $this->otherstaff_m->staffattpro();
        if ($result == 1) {
            $this->session->set_flashdata('msg', 'Sucessfully Done');
            $this->session->set_flashdata('type', 'success');
            redirect("otherstaff/todayattendance");
        }
        if ($result == 0) {
            $this->session->set_flashdata('msg', 'There is Some Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("otherstaff/newattendence");
        }
        if ($result == 2) {
            $this->session->set_flashdata('msg', 'Attendance already Taken');
            $this->session->set_flashdata('type', 'info');
            redirect("otherstaff/todayattendance");
        }
    }

    //----------------------------------------------------------------------

    function todayattendance()
    {
        $data['attend'] = $this->otherstaff_m->todayattendance();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('otherstaff/todayattendance', $data);
        $this->load->view('include/footer');

    }

    //----------------------------------------------------------------------
    function staffattendancedetail()
    {
        $data['result'] = $this->otherstaff_m->staffattendancedetail();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('otherstaff/staffattendancedetail', $data);
        $this->load->view('include/footer');

    }
  //---------------------------------------------------------------------------
  function staffattendancedetailview(){
      $st_id = $this->uri->segment(3);
      $data['result'] = $this->otherstaff_m->staffattendancedetailview($st_id);
      $this->load->view('include/header');
      $this->load->view('include/sidebar');
      $this->load->view('otherstaff/staffattendancedetailview', $data);
      $this->load->view('include/footer');

  }

  function change_other_staff_password()
  {
    $id = $this->input->post('pass_id');    
    $data = $this->otherstaff_m->change_other_staff_password();
    redirect('otherstaff/viewstaffdetails/'.$id);
  }
}