
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExpenseController extends CI_Controller {

    public function expense_index(){
       
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('expenses/expenses_index');
        $this->load->view('include/footer');
    } 
    
    //---------------------------------------------------------------------------
    
    public function add_expenses(){
       
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('expenses/add_expenses');
        $this->load->view('include/footer');
    }
    
    //--------------------------------------------------------------------------
    
    public function view_expenses(){
       
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('expenses/add_expenses');
        $this->load->view('include/footer');
    }
    
    //--------------------------------------------------------------------------
    
    public function create_expense_after_post(){
        
        $expense_name = $this->input->post('expense_name');
        $expense_amount = $this->input->post('expense_amount');
        $created_at = mdate("%y-%m-%d");
        
        $insert_expense_table = $this->db->insert('expenses',
            [
                'expense_name' => $expense_name,
                'expense_amount' => $expense_amount,
                'created_at' => $created_at

            ]);
        redirect(site_url() . 'expensecontroller/add_expenses');
    }
}