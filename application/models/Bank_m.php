<?php

class Bank_m extends CI_Model
{
    function addbankpro()
    {
        $name = $this->input->post("bank_name");
        $acc_no = $this->input->post("acc_no");
        $acc_branch = $this->input->post("branch");
        $acc_title = $this->input->post("acc_title");
        //---------------- for  duplication---------------
        $this->db->where("b_account_no", $acc_no);
        $query = $this->db->get("bank");
        $num = $query->num_rows();
        if ($num > 0) {
            return 2;
        } else {
            $insert = array(
                "b_name" => $name,
                "b_account_no" => $acc_no,
                "b_branch" => $acc_branch,
                "b_account_title" => $acc_title,
                "b_date" => date("d-M-Y H:I a"),
                "b_month" => date("M"),
                "b_year" => date("Y")

            );
            $result = $this->db->insert("bank", $insert);
            if ($result) {
                return 1;
            } else {
                return 0;
            }

        }
    }

    //----------------------------------------------------------------------
    function viewbank()
    {
        $query = $this->db->get("bank");
        return $query->result();
    }

    //----------------------------------------------------------------------
    function viewtransaction()
    {
        $query = $this->db->get("bank_transection");
        return $query->result();
    }

    //----------------------------------------------------------------------
    function bankstatus()
    {
        $b_id = $this->uri->segment(3);
        $b_status = $this->uri->segment(4);
        $this->db->where("b_id", $b_id);
        $result = $this->db->update("bank", ["b_status" => $b_status]);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }

    //----------------------------------------------------------------------
    function deposit()
    {
        $b_id = $this->uri->segment(3);
        $t_way = $this->input->post("t_type");
        $ch_num = $this->input->post("ch_no");
        $detail = $this->input->post("detail");
        $amount = $this->input->post("amount");
        if (!empty($ch_num)) {
            $insert = array(
                "fkbank_id" => $b_id,
                "t_amount" => $amount,
                "t_chknum" => $ch_num,
                "t_way" => $t_way,
                "t_detail" => $detail,
                "t_date" => date("d-M-Y"),
                "t_time" => date("h:i a"),
                "t_month" => date("M"),
                "t_year" => date("Y"),
                "t_type" => 1
            );
        } else {
            $insert = array(
                "fkbank_id" => $b_id,
                "t_amount" => $amount,
                "t_way" => $t_way,
                "t_detail" => $detail,
                "t_date" => date("d-M-Y"),
                "t_time" => date("h:i a"),
                "t_month" => date("M"),
                "t_year" => date("Y"),
                "t_type" => 1
            );
        }
        $result = $this->db->insert("bank_transection", $insert);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }//----------------------------------------------------------------------

    function withdraw()
    {
        $b_id = $this->uri->segment(3);
        $t_way = $this->input->post("t_type");
        $ch_num = $this->input->post("ch_no");
        $detail = $this->input->post("detail");
        $amount = $this->input->post("amount");
        if (!empty($ch_num)) {
            $insert = array(
                "fkbank_id" => $b_id,
                "t_amount" => $amount,
                "t_chknum" => $ch_num,
                "t_way" => $t_way,
                "t_detail" => $detail,
                "t_date" => date("d-M-Y"),
                "t_time" => date("h:i a"),
                "t_month" => date("M"),
                "t_year" => date("Y"),
                "t_type" => 0
            );
        } else {
            $insert = array(
                "fkbank_id" => $b_id,
                "t_amount" => $amount,
                "t_way" => $t_way,
                "t_detail" => $detail,
                "t_date" => date("d-M-Y"),
                "t_time" => date("h:i a"),
                "t_month" => date("M"),
                "t_year" => date("Y"),
                "t_type" => 0
            );
        }
        $result = $this->db->insert("bank_transection", $insert);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }

    //----------------------------------------------------------------------
    function bankdetail($b_id)
    {
        $this->db->where("fkbank_id", $b_id);
        $this->db->join("bank", "bank.b_id=bank_transection.fkbank_id");
        $query = $this->db->get("bank_transection");
        return $query->result();
    }

    //----------------------------------------------------------------------
    function bank_name()
    {
        $this->db->select("*");
        $this->db->from("bank");
        $this->db->group_by("b_name");
        $query = $this->db->get();
        return $query->result();
    }

    //----------------------------------------------------------------------
    function bank_account()
    {
        $b_name = $this->input->post("b_name");
        $this->db->select("*");
        $this->db->from("bank");
        $this->db->where("b_id", $b_name);
        $query = $this->db->get();
        $result = $query->result();
        $name = $result[0]->b_name;
        $this->db->select("*");
        $this->db->from("bank");
        $this->db->where("b_name", $name);
        $query1 = $this->db->get();
        return $query1->result();

    }

    //----------------------------------------------------------------------
    function searchpro()
    {
        //////////////searching///////////////
       if(isset($_POST['submit'])) {
           $b_id = $this->input->post("b_name");
           $bank_acc = $this->input->post("b_acc");
           $t_way = $this->input->post("t_way");
           $t_type = $this->input->post("t_type");
           $t_month = $this->input->post("t_month");
           $t_year = $this->input->post("t_year");
           $this->db->where("b_id",$b_id);
           $query = $this->db->get("bank");
           $result = $query->result();
           $name = $result[0]->b_name;
           $where = array();
           $where['bank.b_name']=$name;
           if ($bank_acc!=0){
               $where['bank.b_account_no'] =$bank_acc;
           }
           if ($t_type!="all"){
                $where['bank_transection.t_type']=$t_type;
           }
           if ($t_way!="all"){
               $where['bank_transection.t_way']=$t_way;
           }
           if ($t_month!="all"){
               $where['bank_transection.t_month']=$t_month;
           }
           if ($t_year!=0){
               $where['bank_transection.t_year'] =$t_year;
           }

         $this->db->select("*");
         $this->db->from("bank_transection");
         $this->db->join("bank","bank.b_id=bank_transection.fkbank_id");
         $this->db->where($where);
         $query2 = $this->db->get();
         return $query2->result();

       }
    }
    //----------------------------------------------------------------------
}