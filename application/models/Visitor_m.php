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
        $note = $this->input->post('note');
        $date = date("d-M-Y");
        $time = date("h:i:sa");
        $insrt = array(
            'name' => $name,
            'contact' => $contact,
            'reason' => $reason,
            'address' => $address,
            'relationship' => $relationship,
            'note' => $note,
            'date' => $date,
            'time' => $time,

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
        $config['base_url'] = site_url()."visitor/viewvisitors";
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
        $this->db->where("id",$id);
        $query = $this->db->get('visitor');
        $result = $query->result();
        foreach($result as $row){
            $data[]=$row;
        }
        return $data;
    }
    function status($id)
    {

        $this->db->where("id",$id);
        $status = array(
            'v_status'=>'1'
        );
        $this->db->update('visitor',$status);
    }
    //-------------------------------------------------------------------
    function delete_visitor($id){

        $query = $this->db->delete('visitor', ['id' => $id]);
        if($query){
            return 1;
        }else{
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
    function unviewed_visitors(){
        $this->db->select("*");
        $this->db->where("v_status",0);
        $query = $this->db->get("visitor");
        $num = $query->num_rows();
        return $num;

    }
    //-------------------------------------------------------------------function total_visitors()
    function viewed_visitors(){
        $this->db->select("*");
        $this->db->where("v_status",1);
        $query = $this->db->get("visitor");
        $num = $query->num_rows();
        return $num;

    }
    //-------------------------------------------------------------------
}