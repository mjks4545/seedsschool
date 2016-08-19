<?php
class Events_m extends CI_Model
{
    
    // ------------------------------------------------------------------------
    
    function __construct() {
	
	parent::__construct();
        $this->auto_eventsoffdays();

    }
    
    // ------------------------------------------------------------------------
    
    function insert(){
	
	$date = $this->input->post('e_date');
       $date = date("d-M-Y",strtotime($date));
        $_POST['e_date'] = $date;
	$this->db->insert('event',$_POST);
	$this->session->set_flashdata( "msg","Successfully Inserted" );
	$this->session->set_flashdata( "type","success" );
	return 1;
	
    }
    
    // ------------------------------------------------------------------------
    
    function get(){
	$query = $this->db->get('event');
	return $query->result();
    }
   //------------------------------------------------------------------------
   function auto_eventsoffdays()
   {
         // start date of the month
      $start_date =  date("d-M-Y",strtotime(date('01-'.('M').date('Y'))));
        //  end date of the month
       $end_date = date("d-M-Y", strtotime('-1 second',strtotime('+1 month',strtotime(date('01-'.('M').date('Y'))))));
       //  number of days between tow days
       $datediff = $end_date - $start_date;


       $interval =$start_date; //date('d-M-Y', strtotime('-8 days'));
       $current_date = date("d-M-Y");
       for($i=1; $i<=$datediff+1; $i++){
           // show days with number in a weak for saturday=6 and for sunday=0;
            $day = $weekDay = date('w', strtotime($interval));
           if($day==6 || $day==0){
               $this->db->where("e_date",$interval);
               $query = $this->db->get('event');
               $num = $query->num_rows();
                if($num==0)
                {
                    if($day==6){
                        $title = "Saturday";
                        $background="#F79F81";
                    }
                    if($day==0){
                        $title = "Sunday";
                        $background="#F5A9A9";
                    }

                    $insert = array(
                         "e_date"=>$interval,
                         "e_title"=>$title,
                         "e_bg"=>$background,
                         "e_type"=>'0'
                    );
                    $result = $this->db->insert('event',$insert);
                }

           }
           // for increment with days add one day with strting date
           $interval = date("d-M-Y", strtotime("+1 day", strtotime($interval)));
       }
   }

}