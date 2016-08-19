<?php

class Visitor_m extends CI_Model
{
    //-------------------------------------------------------------
    function addvisitorpro()
    {
        $name = $this->input->post('name');
        $contact = $this->input->post('contact');
        $reason = $this->input->post('reason');
        $address = $this->input->post('address');
        $relationship = $this->input->post('relationship');
        $gender = $this->input->post('gender');
        $cnic = $this->input->post('cnic');
        $note = $this->input->post('note');
        $date = date("d-M-Y");
        $v_month = date("M");
        $v_year = date("Y");
        $time = date("h:i:sa");
        $insrt = array(
            'name' => $name,
            'contact' => $contact,
            'reason' => $reason,
            'address' => $address,
            'relationship' => $relationship,
            'note' => $note,
            'v_gender' => $gender,
            'v_cnic' => $cnic,
            'date' => $date,
            'time' => $time,
            'v_month' => $v_month,
            'v_year' => $v_year,

        );
        $result = $this->db->insert('visitor', $insrt);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }

    //-------------------------------------------------------------------
    function viewvisitors()
    {
        $this->db->select("*");
        $this->db->order_by('id desc,v_status asc');
        $query = $this->db->get("visitor");
        $num = $query->num_rows();
        $config['base_url'] = site_url() . "visitor/viewvisitors";
        $config['total_rows'] = $num;
        $config['per_page'] = 10;
        $config['num_links'] = 4;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        $this->db->order_by('v_status asc,id desc');
        $query = $this->db->get('visitor', $config['per_page'], $this->uri->segment(3));
        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach ($result as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return 0;
        }
    }

    //-------------------------------------------------------------------
    function view_visitor_detail($id)
    {
        $this->db->select("*");
        $this->db->where("id", $id);
        $query = $this->db->get('visitor');
        $result = $query->result();
        foreach ($result as $row) {
            $data[] = $row;
        }
        return $data;
    }

    function status($id)
    {

        $this->db->where("id", $id);
        $status = array(
            'v_status' => '1'
        );
        $this->db->update('visitor', $status);
    }

    //-------------------------------------------------------------------
    function delete_visitor($id)
    {

        $query = $this->db->delete('visitor', ['id' => $id]);
        if ($query) {
            return 1;
        } else {
            return 0;
        }

    }

    function total_visitors()
    {
        $this->db->select("*");
        $query = $this->db->get("visitor");
        $num = $query->num_rows();
        return $num;

    }

    //-------------------------------------------------------------------function total_visitors()
    function unviewed_visitors()
    {
        $this->db->select("*");
        $this->db->where("v_status", 0);
        $query = $this->db->get("visitor");
        $num = $query->num_rows();
        return $num;

    }

    //-------------------------------------------------------------------function total_visitors()
    function viewed_visitors()
    {
        $this->db->select("*");
        $this->db->where("v_status", 1);
        $query = $this->db->get("visitor");
        $num = $query->num_rows();
        return $num;

    }

    //-------------------------------------------------------------------
    public function visitor_search()
    {
        $search = $this->input->post("visitor_search");
        $this->db->select("*");
        $this->db->from("visitor");
        $this->db->like('name', $search);
        $this->db->or_like('contact', $search);
        $this->db->or_like('relationship', $search);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    //---------------------------------------------------------------------
    function addcommentpro($v_id)
    {
        $comments = $this->input->post("comment");
        $this->db->where("id", $v_id);
        $update = $this->db->update("visitor", ["comments" => $comments]);
        if ($update) {
            return 1;
        } else {
            return 0;
        }
    }

    //----------------------------------------------------------------------
    function visitorhistory($vcnic)
    {
        $this->db->where("v_cnic", $vcnic);
        $query = $this->db->get("visitor");
        $result = $query->result();
        return $result;
    }

    //--------------------------------------------------------------------
    function visitorpermonth()
    {
        $year = date("Y");
        $cmonth = date("m");
        for ($i = 1; $i <= $cmonth; $i++) {
            $month = date('M', strtotime("01-" . $i . "-2001"));
            $this->db->select('*');
            $this->db->from('visitor');
            $this->db->where("v_year", $year);
            $this->db->where("v_month", $month);
            $query = $this->db->get();
            $num_v[] = $query->num_rows();

        }
        return $num_v;
    }

    //------------------------------------------------
    function visitorperyear()
    {

        $year = date("Y") - 9;
        $cyear = date("Y");
        for ($i = $year; $i <= $cyear; $i++) {
            $this->db->select('*');
            $this->db->from('visitor');
            $this->db->where("v_year", $i);
            $query = $this->db->get();
            $num_vpy[] = $query->num_rows();
        }
        return $num_vpy;

    }
    //-----------------------------------------------------------------
}