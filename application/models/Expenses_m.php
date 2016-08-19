<?php

class Expenses_m extends CI_Model{

        function addexpensespro()
        {

            $reason = $this->input->post('reason');
            $paid_to = $this->input->post('paid_to');
            $paid_amount = $this->input->post('amount');
            $year = $this->input->post('year');
            $month = $this->input->post('month');
            $expense_created_date = date('d-M-Y');

            $insert_array = array(
                'expense_reason' =>$reason,
                'expense_paid_to'=>$paid_to,
                'expense_month'=>$month,
                'expense_year'=>$year,
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

        function expenses_search()
        {
            $name= $this->input->post('exp_search');
            $this->db->select('*');
            $this->db->from('expense');
            $this->db->like('expense_id',$name);
            $this->db->or_like('expense_reason',$name);
            $this->db->or_like('expense_paid_to',$name);
            $query = $this->db->get();
            return $result= $query->result();
        }
}