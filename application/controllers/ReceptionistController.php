<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReceptionistController extends CI_Controller {

      public function reception_index(){
       
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('receptionist/reception_index');
        $this->load->view('include/footer');
    }
}

