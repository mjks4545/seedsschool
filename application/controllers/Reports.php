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
}