<?php

class Expenses_m extends CI_Model{

        function addexpensespro()
        {

            $reason = $this->input->post('reason');
            $paid_to = $this->input->post('paid_to');
            $paid_amount = $this->input->post('amount');
            $expense_created_date = date('d-M-Y');

            $insert_array = array(
                'expense_reason' =>$reason,
                'expense_paid_to'=>$paid_to,
                'expense_paid_amount'=>$paid_amount,
                'expense_created_date'=>$expense_created_date,
                );
            $result=$this->db->insert('expense',$insert_array);
        }

        //----------------------------------------------------------
        function viewexpenses()
        {
            $this->db->select('*');
            $this->db->from('expense');
            $this->db->order_by('expense_id','desc');
            $query = $this->db->get();
            return $result= $query->result();

        }
}