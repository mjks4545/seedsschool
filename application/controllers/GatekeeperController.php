<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GateKeeperController extends CI_Controller {

    public function gatekeeper_index(){
       
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('gatekeeper/gatekeeper_index');
        $this->load->view('include/footer');
    }  
}
