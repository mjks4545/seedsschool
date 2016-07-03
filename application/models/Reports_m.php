<?php

class Reports_m extends CI_Model
{

    function dailyvisitors()
    {
    	$this->db->select('*');
    	$this->db->from('visitor');
    	$this->db->where('date',date('d-M-Y'));

    	$query = $this->db->get();
    	return $result= $query->result();
    }

    //------------------------------------------------------
    function dailystudents()
    {
    	$this->db->select('*');
    	$this->db->from('student');
    	$this->db->where('student_created_date',date('d-M-Y'));

    	$query = $this->db->get();
    	return $result= $query->result();
    }

    //------------------------------------------------------
    function weeklyvisitors()
    {
    	$this->db->select('*');
    	$this->db->from('visitor');	
    	$current_date = date('d-M-Y');
    	$interval =date('d-M-Y', strtotime('-7 days'));
    	$this->db->where("date <=",$current_date); 
    	$this->db->or_where("date >",$interval);

	  	$query = $this->db->get();
    	return $result= $query->result();
    }

    //------------------------------------------------------
    function weeklystudents()
    {
    	$this->db->select('*');
    	$this->db->from('student');
    	$current_date = date('d-M-Y');
    	$interval = date('d-M-Y', strtotime('-7 days'));
    	$this->db->where("student_created_date <=",$current_date); 
    	$this->db->or_where("student_created_date >",$interval);

    	$query = $this->db->get();
    	return $result= $query->result();
    }

    //------------------------------------------------------
    function monthlyvisitors()
    {
    	$this->db->select('*');
    	$this->db->from('visitor');	
    	$current_date = date('d-M-Y');
    	$interval = date('d-M-Y', strtotime('-30 days') ) . "<br/>";
   	    $this->db->where("date >",$interval);
    	$this->db->where("date <=",$current_date); 
    	$query = $this->db->get();
    	$result= $query->result();
    	return $result;

    }

    //------------------------------------------------------
    function monthlystudents()
    {
    	$this->db->select('*');
    	$this->db->from('student');
    	$current_date = date('d-M-Y');
    	$interval =date('d-M-Y', strtotime('-30 days'));
    	$this->db->where("student_created_date <=",$current_date); 
    	$this->db->or_where("student_created_date >",$interval);
    	
    	$query = $this->db->get();
    	return $result= $query->result();
    }
    

}