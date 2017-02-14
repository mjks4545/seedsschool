<?php 

class Reports extends CI_Controller
{
	
	// ----------------------------------------------------------------
	
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
            $this->load->view('reports/reports_home');
            $this->load->view('include/footer');
	}

	//-------------------------------------------------------------------

	function dailyreports()
	{
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('reports/daily_reports/daily_reports_home');
            $this->load->view('include/footer');
	}

	//-------------------------------------------------------------

	function daily_teacher_wise_student()
	{
		$data['result'] = $this->reports_m->tec_wise_std();
		//echo '<pre>';print_r($data);die;
		$this->load->view('include/header');
		$this->load->view('include/sidebar');
		$this->load->view('reports/daily_reports/v_daily_tws', $data);
		$this->load->view('include/footer');

	}
	
	//-------------------------------------------------------------------
	
	function dailyvisitors()
	{
            $data['result'] = $this->reports_m->dailyvisitors();
            //echo '<pre>'; print_r($data);die;
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('reports/daily_reports/daily_visitors',$data);
            $this->load->view('include/footer');
	}

	//-------------------------------------------------------------------
	
	function dailystudents()
	{
            $data['result'] = $this->reports_m->dailystudents();
            //echo '<pre>';print_r($data);die;
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('reports/daily_reports/daily_students',$data);
            $this->load->view('include/footer');
	}

	//-------------------------------------------------------------------
	
	function daily_balance()
	{
            //$data['result'] = $this->reports_m->daily_balance();
            //echo '<pre>'; print_r($data);die;
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('reports/daily_reports/daily_balance');
            $this->load->view('include/footer');
	}
	
	//-------------------------------------------------------------------

	function daily_balance_process()
	{
            $data['result'] = $this->reports_m->daily_balance_process();
            if( array_key_exists('otherpay_id', $data['result']) ){
                $this->load->view('include/header');
                $this->load->view('include/sidebar');
                $this->load->view('reports/daily_reports/daily_balance_show', $data);
                $this->load->view('include/footer');
            }else{
                $this->load->view('include/header');
                $this->load->view('include/sidebar');
                $this->load->view('reports/daily_reports/daily_balance_show2', $data);
                $this->load->view('include/footer');
            }
	}

	//-------------------------------------------------------------------
	function weeklyreports()
	{
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('reports/weekly_reports/weekly_reports_home');
            $this->load->view('include/footer');
	}

	//--------------------------------------------------------------------
	
	function weeklyvisitors()
	{
            $data['result'] = $this->reports_m->weeklyvisitors();
//		echo '<pre>';print_r($data);die;
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('reports/weekly_reports/weekly_visitors',$data);
            $this->load->view('include/footer');
	}

	//-------------------------------------------------------------------
	
	function weeklystudents()
	{
            $data['result'] = $this->reports_m->weeklystudents();
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('reports/weekly_reports/weekly_students',$data);
            $this->load->view('include/footer');
	}

	//--------------------------------------------------------------------
	
	function monthlyreports()
	{
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('reports/monthly_reports/monthly_reports_home');
            $this->load->view('include/footer');
	}

	//--------------------------------------------------------------------
	
	function monthlyvisitors()
	{
            $data['result'] = $this->reports_m->monthlyvisitors();
            //echo "<pre>";print_r($data);die;
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('reports/monthly_reports/monthly_visitors',$data);
            $this->load->view('include/footer');
	}

	//-------------------------------------------------------------------
	
	function monthlystudents()
	{
            $data['result'] = $this->reports_m->monthlystudents();
            //echo '<pre>';print_r($data);die;
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('reports/monthly_reports/monthly_students',$data);
            $this->load->view('include/footer');
	}
	
	//-------------------------------------------------------------------
	
	function monthly_teacherwisestudent()
	{
            $data['result'] = $this->reports_m->monthly_teacherwisestudent();
            //echo '<pre>';print_r($data);die;
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('reports/monthly_reports/monthly_teacherwisestudent',$data);
            $this->load->view('include/footer');
	}
	
	// ------------------------------------------------------------------------
	
	function yearlyReports()
	{
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('reports/yearly_reports/yearly_reports_home');
            $this->load->view('include/footer');
	}
	
	// -------------------------------------------------------------------
	
	function yearly_teacherwisestudent()
	{
            $data['result'] = $this->reports_m->yearly_teacherwisestudent();
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('reports/yearly_reports/v_yearly_tws', $data);
            $this->load->view('include/footer');
	}
		
	// -------------------------------------------------------------------	
	
	function yearlyvisitors()
	{
            $data['result'] = $this->reports_m->yearly_visitor_reports();
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('reports/yearly_reports/yearly_visitors',$data);
            $this->load->view('include/footer');
	}

	// -----------------------------------------------------------------------
	
	function yearlyStudent()
	{
            $data['result'] = $this->reports_m->yearlystudents();
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('reports/yearly_reports/yearly_students',$data);
            $this->load->view('include/footer');
	}
	
	// -------------------------------------------------------------------------
	
	function dailyfinance()
	{
            /////////////////////////daily income////////////////////////////
            $inc['result'] = $this->reports_m->fee_daily_finance();
            $inc['other_result'] = $this->reports_m->otherfee_daily_finance();
            $data['income'] = array_merge($inc['result'],$inc['other_result']);
            /////////////////////////Daily expenses//////////////////////////////
            $data['expense'] = $this->reports_m->daily_expense();
            $data['expense']['Staff Salary'] = $this->reports_m->daily_staff();
            $data['expense']['Paid To Teacher'] = $this->reports_m->daily_teacher();
            // $data['expense'] = array_merge($exp['expense_result'],$exp['staff_result'],$exp['daily_teacher_staff_loss']);
            ////////////////////////// for togather income and expense in one arry///////
            //echo '<pre>';print_r($data['expense']);die;
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('reports/daily_reports/daily_finance',$data);
            $this->load->view('include/footer');
	}

	//////////////Weekley Reports//////////////////////////////////

	function weeklyfinance()
	{ 
            $data['result'] = $this->reports_m->weekly_profit_reports();
            $data['other_std_result'] = $this->reports_m->weekly_other_profit_reports();
            $data['other_expense_result'] = $this->reports_m->weekly_expense_reports();
            $data['other_staff_expense_result'] = $this->reports_m->weekly_staff_expense_reports();	
            $data['weekly_teacher_expense_reports'] = $this->reports_m->weekly_teacher_expense_reports();	
            //		echo '<pre>';print_r($data);die;
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('reports/weekly_reports/weekly_finance',$data);
            $this->load->view('include/footer');
	}

	function monthlyfinance()
	{
            //////////////////////// for income//////////////////////////////////////
            $std['student_fee'] = $this->reports_m->monthly_profit_reports();
            $std['other_std_result'] = $this->reports_m->monthly_other_profit_reports();
            $data['income'] = array_merge($std['student_fee'],$std['other_std_result']);
            //////////////////////////// for expense//////////////////////////////////
            $exp['other_expense_result'] = $this->reports_m->monthly_expense_reports();
            $exp['other_staff_expense_result'] = $this->reports_m->monthly_staff_expense_reports();
            $exp['monthly_teacher_expense_reports'] = $this->reports_m->monthly_teacher_expense_reports();
            $data['expense'] = array_merge($exp['other_expense_result'],$exp['other_staff_expense_result'],$exp['monthly_teacher_expense_reports']);
            //		echo '<pre>';print_r($data['expense']);die;
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('reports/monthly_reports/monthly_finance',$data);
            $this->load->view('include/footer');
	}

	// --------------------------------------------------------------------------------
	
	function yearlyfinance()
	{
            $data['result'] = $this->reports_m->yearly_profit_reports();
            $data['other_std_result'] = $this->reports_m->yearly_other_profit_reports();
            $data['other_expense_result'] = $this->reports_m->yearly_expense_reports();
            $data['other_staff_expense_result'] = $this->reports_m->yearly_staff_expense_reports();
            $data['weekly_teacher_expense_reports'] = $this->reports_m->yearly_teacher_expense_reports();	
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('reports/yearly_reports/yearlyfinance',$data);
            $this->load->view('include/footer');
	}

	// ---------------------------------------------------------------------------------------

	function Students_reports(){
            
            $data['teachers'] = $this->reports_m->Students_reports();
            $data['subjects'] = $this->reports_m->Students_reports_subjects();
            $data['levels']   = $this->reports_m->Students_reports_levels();
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('reports/classwisestudents', $data);
            $this->load->view('include/footer');
            
	}

	//  ---------------------------------------------------------------------------- 

	function student_sub_classes(){

            $data['result'] = $this->reports_m->student_sub_classes();
            // echo '<pre>';
            // print_r( $data );die;
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('reports/student_sub_classes',$data);
            $this->load->view('include/footer');
            
	}

	//  ---------------------------------------------------------------------------- 
        
	function balance_search(){

            $data['teachers'] = $this->reports_m->Students_reports();
            $data['subjects'] = $this->reports_m->Students_reports_subjects();
            $data['levels']   = $this->reports_m->Students_reports_levels();
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('reports/v_balance_search', $data);
            $this->load->view('include/footer');

	}
        
    //  ---------------------------------------------------------------------------- 
	
    function balance_result(){

        $data['result'] = $this->reports_m->balance_result();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('reports/v_balance_result',$data);
        $this->load->view('include/footer');

   }
    
    //  ------------------------------------------------------------------------

    function paid_students(){
        
        $data['teachers'] = $this->reports_m->Students_reports();
        $data['subjects'] = $this->reports_m->Students_reports_subjects();
        $data['levels']   = $this->reports_m->Students_reports_levels();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('reports/paidreportsstudents', $data);
        $this->load->view('include/footer');
        
    }

    //  ------------------------------------------------------------------------

    function paid_students_pro(){
        
        $data                 = $this->reports_m->paid_students();
        $result['montly_fee'] = $this->reports_m->paid_students_pro( $data );
        $result['trf']        = $this->reports_m->paid_trf_reports( $result['montly_fee'] );
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('reports/all_paid_student_view',$result);
        $this->load->view('include/footer');
    }

    // -----------------------------------------------------------------------------

    function paid_teachers_reports(){
        
        $data['teachers'] = $this->reports_m->Students_reports();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('reports/paid_teachers_reports', $data);
        $this->load->view('include/footer');       

    }

    // -----------------------------------------------------------------------------

    function payment_made_teacher(){
        
        $data   = $this->reports_m->get_all_teachers();
        $result['data']  = $this->reports_m->get_all_teachers_payments( $data );
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('reports/paid_teachers_reports_results', $result);
        $this->load->view('include/footer'); 
        
        
    }

    // -----------------------------------------------------------------------------
        
    function loss_profit_reports(){
        
        $result['montlyfee']         = $this->reports_m->get_sum_montly_fee();
        $result['trf']               = $this->reports_m->get_sum_trf();
        $result['expense']           = $this->reports_m->get_sum_expense();
        $result['teacher_salaries']  = $this->reports_m->get_sum_salaries();
        if( $result['teacher_salaries'] == '' ){
            $result['teacher_salaries'] = 0;
        }
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('reports/loss_profit_sums', $result);
        $this->load->view('include/footer'); 
     
    }
    
    // -----------------------------------------------------------------------------
        
        function loss_profit_reports_search(){
			
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('reports/loss_profit_sums_search');
            $this->load->view('include/footer');
			
        }
        
        // -----------------------------------------------------------------------------
		
        function seeds_share_teacher_wise(){
			
            $data['teachers'] = $this->reports_m->Students_reports();
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view( 'reports/seeds_share_teacher_wise', $data );
            $this->load->view('include/footer');
			
        }
        
        // -----------------------------------------------------------------------------
        
        function seeds_share_teacher_wise_results(){
            
            $data            = $this->reports_m->seeds_share();
            $result['data']  = $this->reports_m->get_seeds_share_payment_details( $data );
//            echo '<pre>';
//            print_r($result['data']);die;
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('reports/seeds_share_teacher_wise_results', $result);
            $this->load->view('include/footer');
        }
        
        // -----------------------------------------------------------------------------
}
