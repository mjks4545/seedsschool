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

		$this->load->view('include/header');
		$this->load->view('include/sidebar');
		$this->load->view('reports/daily_reports/daily_visitors',$data);
		$this->load->view('include/footer');

	}

	//-------------------------------------------------------------------
	function dailystudents()
	{
		$data['result'] = $this->reports_m->dailystudents();

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
		
		$this->load->view('include/header');
		$this->load->view('include/sidebar');
		$this->load->view('reports/monthly_reports/monthly_visitors',$data);
		$this->load->view('include/footer');

	}

	//-------------------------------------------------------------------
	function monthlystudents()
	{
		$data['result'] = $this->reports_m->monthlystudents();

		$this->load->view('include/header');
		$this->load->view('include/sidebar');
		$this->load->view('reports/monthly_reports/monthly_students',$data);
		$this->load->view('include/footer');

	}
}