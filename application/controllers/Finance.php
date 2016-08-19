<?php
 class Finance extends CI_Controller
 {

     public function index()
     {
         $this->load->view('include/header');
         $this->load->view('include/sidebar');
         $this->load->view("admin/finance");
         $this->load->view("include/footer");
     }
 }



?>