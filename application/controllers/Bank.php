<?php

class  Bank extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("bank_m");

    }

    public function index()
    {
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['bank'] = $this->bank_m->viewbank();
        $data['transaction'] = $this->bank_m->viewtransaction();
        $this->load->view("bank/bankhome", $data);
        $this->load->view("include/footer");
    }

    //-----------------------------------------------------------
    public function addbankpro()
    {
        $data['result'] = $this->bank_m->addbankpro();
        if ($data['result'] == 2) {
            $this->session->set_flashdata("msg", "This Account already Exist");
            $this->session->set_flashdata("type", "danger");
            redirect("bank/");
        }
        if ($data['result'] == 1) {
            $this->session->set_flashdata("msg", "Bank is Add Successfully");
            $this->session->set_flashdata("type", "info");
            redirect("bank/");
        }
        if ($data['result'] == 0) {
            $this->session->set_flashdata("msg", "There is some error while adding");
            $this->session->set_flashdata("type", "danger");
            redirect("bank/");
        }
    }

    //-----------------------------------------------------------------------
    public function bankstatus()
    {
        $data['result'] = $this->bank_m->bankstatus();
        if ($data['result'] == 1) {
            $this->session->set_flashdata("msg", "Bank is updated Successfully");
            $this->session->set_flashdata("type", "info");
            redirect("bank/");
        }
        if ($data['result'] == 0) {
            $this->session->set_flashdata("msg", "There is some error while Updating");
            $this->session->set_flashdata("type", "danger");
            redirect("bank/");
        }
    }

    //-----------------------------------------------------------------------
    public function deposit()
    {
        $data['result'] = $this->bank_m->deposit();
        if ($data['result'] == 1) {
            $this->session->set_flashdata("msg", "Bank is updated Successfully");
            $this->session->set_flashdata("type", "info");
            redirect("bank/");
        }
        if ($data['result'] == 0) {
            $this->session->set_flashdata("msg", "There is some error while Updating");
            $this->session->set_flashdata("type", "danger");
            redirect("bank/");
        }
    }

    //--------------------------------------------------------------------------
    public function withdraw()
    {
        $data['result'] = $this->bank_m->withdraw();
        if ($data['result'] == 1) {
            $this->session->set_flashdata("msg", "Bank is updated Successfully");
            $this->session->set_flashdata("type", "info");
            redirect("bank/");
        }
        if ($data['result'] == 0) {
            $this->session->set_flashdata("msg", "There is some error while Updating");
            $this->session->set_flashdata("type", "danger");
            redirect("bank/");
        }
    }

    //--------------------------------------------------------------------------
    function bankdetail($b_id)
    {
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['bankdetail'] = $this->bank_m->bankdetail($b_id);
//        echo "<pre>"; print_r($data);die;
        $this->load->view("bank/bankdetail",$data);
        $this->load->view("include/footer");

    }
    //------------------------------------------------------------------------
    function search(){
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['bank'] = $this->bank_m->bank_name();
        $data['search'] = $this->bank_m->searchpro();
//        echo "<pre>"; print_r($data);die;
        $this->load->view("bank/search",$data);
        $this->load->view("include/footer");
    }
    //------------------------------------------------------------------------
    function bank_account(){
        $acc = $this->bank_m->bank_account();
        echo "<option value=''>".'Please Select an Account'."</option>";
        echo "<option value='0'>".'All'."</option>";
        foreach ($acc as $row){
            echo "<option value='$row->b_account_no'>".$row->b_account_no."</option>";
        }
    }
    //------------------------------------------------------------------------
}