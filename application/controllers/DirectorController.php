<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DirectorController extends CI_Controller {

    public function director_index(){
       
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('director/director_index');
        $this->load->view('include/footer');
    } 
}