<?php

class Reports_m extends CI_Model
{

    function dailyvisitors()
    {
        //echo date('d-M-Y');die;
    	$this->db->select('*');
    	$this->db->from('visitor');
    	$data = $this->db->where('date',date('d-M-Y'));
        $query = $this->db->get();
       // echo '<pre>';print_r($query->result());
    	return $result= $query->result();
    }

    //------------------------------------------------------
    function dailystudents()
    {
  //echo       date('d-M-Y');die;
    	$this->db->select('*');
    	$this->db->from('student');
    	$this->db->where('student_created_date',date('d-M-Y'));

    	$query = $this->db->get();
    //  echo '<pre>';  print_r($query->result());
    	return $result= $query->result();
    }

    //------------------------------------------------------
    function weeklyvisitors()
    {
    	$this->db->select('*');
    	$this->db->from('visitor');	
    	$current_date = date('d-M-Y');
    	$interval =date('d-M-Y', strtotime('-7 days'));
        //echo $interval;die;
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
    	$current_date = date('Y-m-d');
    	$interval = date('Y-m-d', strtotime('-30 days') );
    	$query = $this->db->get();
    	$result= $query->result();
       foreach ($result as $row) {
        
           $date = date("Y-m-d",strtotime($row->date));

           if($date>$interval && $date<=$current_date){
                $array = array(
                    'id' =>$row->id , 
                    'name' =>$row->name , 
                    'contact' =>$row->contact, 
                    'reason' =>$row->reason, 
                    'address' =>$row->address, 
                    'relationship' =>$row->relationship, 
                    'note' =>$row->note, 
                    'date' =>$row->date, 
                    'time' =>$row->time, 
                    );
                $data[]=$array;

           }
         
        }

    	 return $data;
    }

    //------------------------------------------------------
    function monthlystudents()
    {
    
        $this->db->select('*');
        $this->db->from('student'); 
        $current_date = date('Y-m-d');
        $interval = date('Y-m-d', strtotime('-1 month') );
        $query = $this->db->get();
        $result= $query->result();
       // print_r($result);die;
       foreach ($result as $row) {
        
           $date = date("Y-m-d",strtotime($row->student_created_date));
           //echo $date;die;
           if($date>$interval && $date<=$current_date){
                $array = array(
                    'student_id' =>$row->student_id , 
                    'student_name' =>$row->student_name , 
                    'std_father_name' =>$row->std_father_name, 
                    'student_contact' =>$row->student_contact, 
                    'std_guardian_contact' =>$row->std_guardian_contact, 
                    'facebook_id' =>$row->facebook_id, 
                    'student_address' =>$row->student_address, 
                    'student_email' =>$row->student_email, 
                    'student_created_date' =>$row->student_created_date, 
                    'current_school'=>$row->current_school,
                    'student_contact'=>$row->student_contact
                    );
                $data[]=$array;

           }
         
        }

         return $data;
    }

    function yearly_visitor_reports()
    {
            $this->db->select('*');
            $this->db->from('visitor'); 
            $current_date = date('Y-m-d');
            $interval = date('Y-m-d', strtotime('-1 years') );
            $query = $this->db->get();
            $result= $query->result();
           foreach ($result as $row) {
            
               $date = date("Y-m-d",strtotime($row->date));

               if($date>$interval && $date<=$current_date){
                    $array = array(
                        'id' =>$row->id , 
                        'name' =>$row->name , 
                        'contact' =>$row->contact, 
                        'reason' =>$row->reason, 
                        'address' =>$row->address, 
                        'relationship' =>$row->relationship, 
                        'note' =>$row->note, 
                        'date' =>$row->date, 
                        'time' =>$row->time, 
                        );
                    $data[]=$array;

               }
             
            }

             return $data;

    }

     function yearlystudents()
     {
        $this->db->select('*');
        $this->db->from('student'); 
        $current_date = date('Y-m-d');
        $interval = date('Y-m-d', strtotime('-1 years') );
        $query = $this->db->get();
        $result= $query->result();
       // print_r($result);die;
       foreach ($result as $row) {
        
           $date = date("Y-m-d",strtotime($row->student_created_date));
           //echo $date;die;
           if($date>$interval && $date<=$current_date){
                $array = array(
                    'student_id' =>$row->student_id , 
                    'student_name' =>$row->student_name , 
                    'std_father_name' =>$row->std_father_name, 
                    'student_contact' =>$row->student_contact, 
                    'std_guardian_contact' =>$row->std_guardian_contact, 
                    'facebook_id' =>$row->facebook_id, 
                    'student_address' =>$row->student_address, 
                    'student_email' =>$row->student_email, 
                    'student_created_date' =>$row->student_created_date, 
                    'current_school'=>$row->current_school,
                    'student_contact'=>$row->student_contact
                    );
                $data[]=$array;

           }
         
        }

         return $data;
    }
    

}