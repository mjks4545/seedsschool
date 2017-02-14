<?php

class Expenses_m extends CI_Model{

        function addexpensespro()
        {
            $head        = $this->input->post('head');
            $paid_to     = $this->input->post('paid_to');
            $paid_amount = $this->input->post('amount');
            $reason      = $this->input->post('reason');
            $date        = $this->input->post('date');
            $year        = date('Y', strtotime( $date ) );
            $month       = date('M', strtotime( $date ) );

            $originalDate = $date;
            $newDate = date("d-M-Y", strtotime($originalDate));

            $insert_array = array(
                'expense_head'         =>  $reason,
                'expense_reason'       =>  $head,
                'expense_paid_to'      =>  $paid_to,
                'expense_month'        =>  $month,
                'expense_year'         =>  $year,
                'expense_paid_amount'  =>  $paid_amount,
                'expense_created_date' =>  $newDate,
                );

            $result=$this->db->insert('expense',$insert_array);
        }

        //----------------------------------------------------------
        function viewexpenses()
        {
            $month = date('M');
            $this->db->select('*');
            $this->db->from('expense');
            $this->db->where('expense_month', $month);
            $this->db->order_by('expense_id','desc');
            $query = $this->db->get();
            $result = $query->result();
            $expense_array = [];
            foreach( $result as $expense ){
                $expense_array[$expense->expense_reason][] = $expense;
            }
            // echo '<pre>';
            // print_r($expense_array);
            // die;
            return $expense_array;
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

        // -------------------------------------------------------

        public function get_month_year(){

                      $this->db->select('expense_month,expense_year');
                      $this->db->from('expense');
            $query  = $this->db->get();
            $result = $query->result();
            $array  = [];
            $array['month'] = [];
            $array['year']  = [];
            foreach( $result as $month_year ){
                if( !in_array($month_year->expense_month, $array['month']) ){
                    $array['month'][] = $month_year->expense_month;
                }
                if( !in_array($month_year->expense_year, $array['year']) ){
                    $array['year'][] = $month_year->expense_year;
                }
            }
            return $array;
        }

        // -------------------------------------------------------

        public function viewexpenses_months( $month, $year ){

            $this->db->select('*');
            $this->db->from('expense');
            $this->db->where('expense_month', $month);
            $this->db->where('expense_year', $year);
            $this->db->order_by('expense_id','desc');
            $query = $this->db->get();
            $result = $query->result();
            $expense_array = [];
            foreach( $result as $expense ){
                $expense_array[$expense->expense_reason][] = $expense;
            }
            // echo '<pre>';
            // print_r($expense_array);
            // die;
            return $expense_array;   

        }

        // --------------------------------------------------------
}