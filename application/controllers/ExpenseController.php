
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
       
	$query  = $this->db->get( 'expenses' );
	$result['data'] = $query->result();
	
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('expenses/view_expenses',$result);
        $this->load->view('include/footer');
    }
    
    //--------------------------------------------------------------------------
    
    public function edit_expenses( $id = null ){
       
	$query  = $this->db->where( 'expense_id' , $id );
	$query  = $this->db->get( 'expenses' );
	$result = $query->result();
	$result = $result[0];
	
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('expenses/edit_expenses',$result);
        $this->load->view('include/footer');
	
    }
    
    //--------------------------------------------------------------------------
    
    public function delete_expenses( $id = NULL ){
	$query  = $this->db->where( 'expense_id' , $id );
	$query  = $this->db->delete( 'expenses' );
	redirect(site_url() . 'expensecontroller/view_expenses');
    }
    
    //--------------------------------------------------------------------------
    
    public function create_expense_after_post(){
	
	$created_date   = mdate("%y-%m-%d");
	$counter	= $this->input->post('number-d');
	
	for( $i=1; $i <= $counter ; $i++ ){
		
	    $patty_size      = 'expense_name_' . $i;
	    $number_of_items = 'expense_amount_' . $i;
	    $price           = 'expenses_reason_' . $i;
	
	    $expense_name     = $this->input->post($patty_size);
	    $expense_amount   = $this->input->post($number_of_items);
	    $expense_reason   = $this->input->post($number_of_items);
	
            if ( empty($expense_name) || empty($expense_amount) || empty($expense_reason)){
                
            }else{
                $insert_expense_table = $this->db->insert('expenses',
		[
		    'expense_name'      => $expense_name,
		    'expense_amount'    => $expense_amount,
		    'expenses_reason'   => $expense_reason,
		    'created_at'        => $created_date

		]);
            }
	}

        redirect(site_url() . 'expensecontroller/view_expenses');
    }
    
    //--------------------------------------------------------------------------
    
    public function edit_expense_after_post(){
        
        $expense_id     = $this->input->post('expense_id');
        $expense_name     = $this->input->post('expense_name');
        $expense_amount   = $this->input->post('expense_amount');
        $expense_reason   = $this->input->post('expenses_reason');
        $created_at       = mdate("%y-%m-%d");
        
        $insert_expense_table = $this->db->update('expenses',
            [
                'expense_name'      => $expense_name,
                'expense_amount'    => $expense_amount,
                'expenses_reason'   => $expense_reason,
                'updated_at'        => $created_at

            ],['expense_id' => $expense_id]
		);
        redirect(site_url() . 'expensecontroller/view_expenses');
    }
}