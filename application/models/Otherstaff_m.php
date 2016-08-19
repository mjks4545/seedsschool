<?php

class Otherstaff_m extends CI_Model
{

    function addstaffpro()
    {

        $name = $this->input->post('name');
        $contact = $this->input->post('contact');
        $cnic = $this->input->post('cnic');
        $type = $this->input->post('type');
        $salary = $this->input->post('salary');
        $address = $this->input->post('address');
        $email = $this->input->post('email');
        $created_date = date("d-M-Y");
        $created_time = date("h:i:sa");

        $length = 6;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ,@#$%*';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        $password = $randomString;
      //  echo $password;die;
        $insert_array = array(
            'name' => $name,
            'contact' => $contact,
            'cnic' => $cnic,
            'type' => $type,
            'salary' => $salary,
            'address' => $address,
            'email' => $email,
            'password'=>$password,
            'created_date' => $created_date,
            'created_time' => $created_time,
        );

        $result = $this->db->insert('otherstaff', $insert_array);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function updatestaffpro($id)
    {

        $name = $this->input->post('name');
        $contact = $this->input->post('contact');
        $cnic = $this->input->post('cnic');
        $type = $this->input->post('type');
        $salary = $this->input->post('salary');
        $address = $this->input->post('address');
        $email = $this->input->post('email');
        $updated_date = date("d-M-Y");
        $updated_time = date("h:i:sa");

        $this->db->where('id', $id);

        $insert_array = array(
            'name' => $name,
            'contact' => $contact,
            'cnic' => $cnic,
            'type' => $type,
            'salary' => $salary,
            'address' => $address,
            'email' => $email,
            'updated_date' => $updated_date,
            'updated_time' => $updated_time
        );
        $result = $this->db->update('otherstaff', $insert_array);

        if ($result) {
            return 1;
        } else {
            return 0;
        }

    }

    //------------------------------------------------------------------------------------------------------------------
    function viewstaff()
    {
        $this->db->select("*");
        $query = $this->db->get("otherstaff");
        $num = $query->num_rows();
        $config2['base_url'] = site_url() . "otherstaff/viewstaff";
        $config2['total_rows'] = $num;
        $config2['per_page'] = 10;
        $config2['num_links'] = 4;
        $config2['uri_segment'] = 3;
        $this->pagination->initialize($config2);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('otherstaff', $config2['per_page'], $this->uri->segment(3));
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

    //------------------------------------------------------------------------------------------------------------------
    function view_staffdetails($id)
    {
        $this->db->select('*');
        $this->db->from('otherstaff');
        $this->db->where('id', $id);

        $query = $this->db->get();
        $result = $query->result();

        foreach ($result as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //------------------------------------------------------------------------------------------------------------------
    function update_staff($id)
    {
        $this->db->select('*');
        $this->db->from('otherstaff');
        $this->db->where('id', $id);

        $query = $this->db->get();
        $result = $query->result();

        foreach ($result as $row) {
            $data[] = $row;
        }
        return $data;
    }

    //------------------------------------------------------------------------------------------------------------------
    function delete_staff($id)
    {
        $query = $this->db->delete('otherstaff', ['id' => $id]);
        if ($query) {
            return 1;
        } else {
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function staff_salaries($id)
    {
        $this->db->select('*');
        $this->db->from('otherstaff');
        $this->db->join('staff_salaries', 'staff_salaries.fkstaff_id = otherstaff.id');
        $this->db->where('fkstaff_id', $id);
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }

    //------------------------------------------------------------------------------------------------------------------
    function staff_data($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('otherstaff');
        $data = $query->result();
        return $data;
    }

    //------------------------------------------------------------------------------------------------------------------
    function salarypaymentpro()
    {
        $id = $this->input->post('staff_id');
        $total_salary = $this->input->post('total_salary');
        $paid_month = $this->input->post('paid_month');
        $amount_reason = $this->input->post('reason');
        $paid_salary = $this->input->post('amount');
        $created_date = date("d-M-Y");
        $created_time = date("h:i:sa");


        $this->db->select("*");
        $this->db->where("fkstaff_id", $id);
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get("staff_salaries");
        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach ($result as $r) {
                $last_paid = $r->paid_month;
                $remaining_salary = $r->remaining_salary;
                if ($last_paid == $paid_month) {
                    $remaining_salary = ($remaining_salary) - ($paid_salary);
                    $insert_array = array(

                        'fkstaff_id' => $id,
                        'paid_month' => $paid_month,
                        'paid_year' => $this->input->post('year'),
                        'total_salary' => $total_salary,
                        'amount_reason' => $amount_reason,
                        'paid_salary' => $paid_salary,
                        'remaining_salary' => $remaining_salary,
                        'created_date' => $created_date,
                        'created_time' => $created_time,

                    );
                    $result = $this->db->insert('staff_salaries', $insert_array);
                }
                if ($last_paid != $paid_month) {
                    $remaining_salary = ($total_salary) + ($remaining_salary) - ($paid_salary);
                    $insert_array = array(

                        'fkstaff_id' => $id,
                        'paid_month' => $paid_month,
                        'paid_year' => $this->input->post('year'),
                        'total_salary' => $total_salary,
                        'amount_reason' => $amount_reason,
                        'paid_salary' => $paid_salary,
                        'remaining_salary' => $remaining_salary,
                        'created_date' => $created_date,
                        'created_time' => $created_time,

                    );
                    $result = $this->db->insert('staff_salaries', $insert_array);
                }
            }
        } else {
            $remaining_salary = ($total_salary) - ($paid_salary);

            $insert_array = array(

                'fkstaff_id' => $id,
                'paid_month' => $paid_month,
                'paid_year' => $this->input->post('year'),
                'total_salary' => $total_salary,
                'amount_reason' => $amount_reason,
                'paid_salary' => $paid_salary,
                'remaining_salary' => $remaining_salary,
                'created_date' => $created_date,
                'created_time' => $created_time,

            );
            $result = $this->db->insert('staff_salaries', $insert_array);
        }
        if ($result) {
            $data['arr']=$insert_array;
            $data['result']=1;
            return $data;
        } else {
            $data['result']=1;
            return $data;
        }
    }

//-----------------------------------------------------------------------

    function stafattendence()
    {
        $this->db->select("*");
        $this->db->from("otherstaff");
        $query = $this->db->get();
        return $query->result();
    }

//-----------------------------------------------------------------------

    function staffattpro()
    {
        $date = $this->input->post('date');
        $date = date("d-M-Y", strtotime($date));
        $month = date("M", strtotime($date));
        $year = date("Y", strtotime($date));
        /* for checking attendance duplocation*/
        $this->db->select("*");
        $this->db->from("staff_attendence");
        $this->db->where("date", $date);
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num == 0) {
            $query = $this->db->get('otherstaff');
            $num = $query->num_rows();
            for ($i = 1; $i <= $num; $i++) {

                $st_id = $this->input->post('st_id' . $i);
                $status = $this->input->post('status_' . $i);
                $att = array(
                    'sta_id' => $st_id,
                    'status' => $status,
                    'date' => $date,
                    'month' => $month,
                    'year' => $year
                );
                $insert = $this->db->insert('staff_attendence', $att);
            }
            if ($insert) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 2;
        }
    }

    //-----------------------------------------------------------------------
    function todayattendance()
    {

        $this->db->select("*");
        $this->db->from('staff_attendence');
        $this->db->join('otherstaff', 'otherstaff.id = staff_attendence.sta_id');
        $this->db->where('staff_attendence.date', date("d-M-Y"));
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    //-----------------------------------------------------------------------

    function staffattendancedetail()
    {

        $this->db->select("*");
        $query = $this->db->get("otherstaff");
        $num = $query->num_rows();
        $config2['base_url'] = site_url() . "otherstaff/staffattendancedetail";
        $config2['total_rows'] = $num;
        $config2['per_page'] = 10;
        $config2['num_links'] = 4;
        $config2['uri_segment'] = 3;
        $this->pagination->initialize($config2);
//        $this->db->group_by('sta_id');
//        $this->db->join('otherstaff', 'staff_attendence.sta_id = otherstaff.id');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('otherstaff', $config2['per_page'], $this->uri->segment(3));
        $result = $query->result();
        return $result;
        /*echo "<pre>";
        print_r($result);
        die();*/
    }

    //----------------------------------------------------------------------------
    function staffattendancedetailview($st_id)
    {
        $this->db->select("*");
        $this->db->from("otherstaff");
        $this->db->where("id", $st_id);
        $this->db->join('staff_attendence', 'staff_attendence.sta_id = otherstaff.id');
        $this->db->group_by('month');
        $this->db->group_by('year');
        $query = $this->db->get();
        $num = $query->num_rows();
        $config2['base_url'] = site_url() . "otherstaff/staffattendancedetailview/".$st_id.'/';
        $config2['total_rows'] = $num;
        $config2['per_page'] = 12;
        $config2['num_links'] = 4;
        $config2['uri_segment'] = 4;
        $this->pagination->initialize($config2);
        $this->db->where("id", $st_id);
        $this->db->join('staff_attendence', 'staff_attendence.sta_id = otherstaff.id');
        $this->db->group_by('month');
        $this->db->group_by('year');
        $query = $this->db->get('otherstaff', $config2['per_page'], $this->uri->segment(4));
        $result = $query->result();
        return $result;
        /*echo "<pre>";
        print_r($data);
        die();*/
    }

    //----------------------------------------------------------------------------
    function num_status($st_id,$month,$year,$status)
    {
        $this->db->select("*");
        $this->db->from("staff_attendence");
        $where = array(
            'sta_id'=>$st_id,
            'month'=>$month,
            'year'=>$year,
            'status'=>$status
        );
        $this->db->where($where);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function change_other_staff_password()
    {
        $id = $this->input->post('pass_id');
        $data = array(
            'password'=>$this->input->post('password')
            );
        $this->db->where('id',$id);
        $this->db->update('otherstaff',$data);
    }
}