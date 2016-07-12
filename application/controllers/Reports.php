<?php 

class Reports extends CI_Controller
{
	
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
		//echo '<pre>';print_r($data);die;
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

	function yearlyReports()
	{
		$this->load->view('include/header');
		$this->load->view('include/sidebar');
		$this->load->view('reports/yearly_reports/yearly_reports_home');
		$this->load->view('include/footer');
	}

	function yearlyvisitors()
	{
		$data['result'] = $this->reports_m->yearly_visitor_reports();
		$this->load->view('include/header');
		$this->load->view('include/sidebar');
		$this->load->view('reports/yearly_reports/yearly_visitors',$data);
		$this->load->view('include/footer');
	}

	function yearlyStudent()
	{
		$data['result'] = $this->reports_m->yearlystudents();
		$this->load->view('include/header');
		$this->load->view('include/sidebar');
		$this->load->view('reports/yearly_reports/yearly_students',$data);
		$this->load->view('include/footer');
	}

	function dailyfinance()
	{ 
		$data['result'] = $this->reports_m->daily_finance_reports();
		$data['other_result'] = $this->reports_m->daily_finance_report();
		$data['expense_result'] = $this->reports_m->daily_expense_loss();
		$data['staff_result'] = $this->reports_m->daily_staff_loss();
		//echo '<pre>';print_r($data['staff_result']);die;
		$data['daily_teacher_staff_loss'] = $this->reports_m->daily_teacher_staff_loss();	
		//echo '<pre>';print_r($data['daily_teacher_staff_loss']);die;
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
		//echo '<pre>';print_r($data['weekly_teacher_expense_reports']);die;
		$this->load->view('include/header');
		$this->load->view('include/sidebar');
		$this->load->view('reports/weekly_reports/weekly_finance',$data);
		$this->load->view('include/footer');
	}

	function monthlyfinance()
	{
		$data['result'] = $this->reports_m->monthly_profit_reports();
		$data['other_std_result'] = $this->reports_m->monthly_other_profit_reports();
		$data['other_expense_result'] = $this->reports_m->monthly_expense_reports();
		$data['other_staff_expense_result'] = $this->reports_m->monthly_staff_expense_reports();
		$data['weekly_teacher_expense_reports'] = $this->reports_m->monthly_teacher_expense_reports();	
		//echo '<pre>';print_r($data['other_staff_expense_result']);die;
		$this->load->view('include/header');
		$this->load->view('include/sidebar');
		$this->load->view('reports/monthly_reports/monthly_finance',$data);
		$this->load->view('include/footer');
	}

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
}
