<?php

class Student extends CI_Controller
{

    function index()
    {
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/student_home');
        $this->load->view('include/footer');

    }

    //------------------------------------------------------------------------------------------------------------------
    function addstudent()
    {
        $data['course'] = $this->class_m->get_course();
//        echo '<pre>';print_r($data);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/addstudent', $data);
        $this->load->view('include/footer');

    }

    //------------------------------------------------------------------------------------------------------------------
    function addstudentpro()
    {
        $data['result'] = $this->student_m->addstudentpro();
        if ($data['result'] == 0) {
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("student/addstudent");
        }
        if ($data['result'] == 2) {
            $this->session->set_flashdata('msg', 'Student Already exist');
            $this->session->set_flashdata('type', 'danger');
            redirect("student/addstudent");
        } else {
            $this->session->set_flashdata('msg', 'Sucessfully Added');
            $this->session->set_flashdata('type', 'success');
            $student_id = $data['result']['student_id'];
            $course_id = $data['result']['course_id'];
            redirect("student/studentclasses/" . $student_id . '/' . $course_id);
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function studentclasses()
    {
        $std_id = $this->uri->segment(3);
        $crs_id = $this->uri->segment(4);
        $result['result'] = $this->student_m->studentclasses($crs_id);
        $result['std_id'] = $std_id;
//        echo '<pre>'; print_r($result);die();

        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/student_classes', $result);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
<<<<<<< HEAD
=======
    function add_newclass()
    {
        $std_id = $this->uri->segment(3);
        $data['result'] = $this->student_m->add_newclass($std_id);
        $data['std_id'] = $std_id;
//    echo '<pre>'; print_r($data);die();
        if ($data['result'] == 0) {
            $this->session->set_flashdata('msg', 'Student have Already all Subjects.');
            $this->session->set_flashdata('type', 'danger');
            redirect(site_url() . "student/studentdetails/" . $std_id);
        } else {
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('student/add_newclass', $data);
            $this->load->view('include/footer');
        }
    }

    //------------------------------------------------------------------------------------------------------------------
>>>>>>> refs/remotes/origin/seeeds_muhammad
    function studentclasspro()
    {
        $std_id = $this->uri->segment(3);
        $data = $this->student_m->studentclasspro($std_id);
        if ($data) {
            redirect(site_url() . 'student/student_class_fee/' . $std_id);
        } else {
            redirect(site_url() . 'student/studentclasses');
        }

    }

    //------------------------------------------------------------------------------------------------------------------
<<<<<<< HEAD
=======
    function addnewclasspro()
    {
        $std_id = $this->uri->segment(3);
        $data['result'] = $this->student_m->addnewclasspro($std_id);
        $data['std_id']=$std_id;
       // echo '<pre>';print_r($data);die();
        $this->session->set_userdata("cl_ids",$data['result']);
        if ($data) {
            redirect(site_url().'student/addnewclass_fee/' . $std_id);
        } else {
            redirect(site_url().'student/studentclasses');
        }

    }

    //------------------------------------------------------------------------------------------------------------------
    function addnewclass_fee()
    {
        $std_id = $this->uri->segment(3);
        $result['result'] = $this->student_m->addnewclass_fee($std_id);
         // echo '<pre>';print_r($result);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/student_classfee', $result);
        $this->load->view('include/footer');
    }
     //------------------------------------------------------------------------------------------------------------------
>>>>>>> refs/remotes/origin/seeeds_muhammad
    function student_class_fee()
    {
        $std_id = $this->uri->segment(3);
        $result['result'] = $this->student_m->student_class_fee($std_id);
<<<<<<< HEAD
//            echo '<pre>';print_r($result);die();
=======
          //  echo '<pre>';print_r($result);die();
>>>>>>> refs/remotes/origin/seeeds_muhammad
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/student_classfee', $result);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function viewstudents()
    {
        $result['result'] = $this->student_m->view_students();
//        echo '<pre>';print_r($result);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/students_view', $result);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function studentdetails()
    {
        $id = $this->uri->segment(3);
        $result['result'] = $this->student_m->student_details($id);
        $result['class'] = $this->student_m->studentall_classes($id);
        $result['fee'] = $this->student_m->studentall_fee($id);
//        echo '<pre>';print_r($result);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/student_detailsview', $result);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function studentclassfeepro()
    {
        $result = $this->student_m->studentclassfeepro();
        if ($result == 1) {
            $this->session->set_flashdata('msg', 'Sucessfully Added');
            $this->session->set_flashdata('type', 'success');
            redirect("student/viewstudents");
        } else {
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("student/student_class_fee");
        }

    }

    //------------------------------------------------------------------------------------------------------------------
    function updatestudent()
    {
        $id = $this->uri->segment(3);
        $result['result'] = $this->student_m->updatestudent($id);
//        echo '<pre>';print_r($result);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/student_update', $result);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function updatestudentpro()
    {
        $id = $this->uri->segment(3);
        $result = $this->student_m->updatestudentpro($id);

        if ($result == 1) {
            $this->session->set_flashdata('msg', 'Sucessfully Updated');
            $this->session->set_flashdata('type', 'success');
            redirect("student/studentdetails/" . $id);
        } else {
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("student/studentdetails" . $id);
        }
    }

//------------------------------------------------------------------
    function studentclassstatus()
    {
        $st_id = $this->uri->segment(3);
        $result = $this->student_m->studentclassstatus($st_id);

        if ($result == 1) {
            $this->session->set_flashdata('msg', 'Sucessfully Updated');
            $this->session->set_flashdata('type', 'success');
            redirect("student/studentdetails/" .$st_id);
        } else {
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("student/studentdetails" . $st_id);
        }
    }
 //--------------------------------------------for image-------------------------
    function img_upload()
    {
        $st_id = $this->uri->segment(3);
        $this->db->select("*");
        $this->db->where("student_id", $st_id);
        $query = $this->db->get('student');
        $result = $query->result();
        foreach ($result as $row) {
            if (($row->pic != "") && ($row->pic == 'user.jpg')) {
                $config['upload_path'] = 'public/user_img';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '10240000';
                //$config['max_width']  = '1024';
                //$config['max_height']  = '768';
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('img')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('msg', $error);
                    $this->session->set_flashdata('type',"danger");
                        redirect(site_url() . 'student/studentdetails/' . $st_id);

                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $image_path = $data['upload_data']['file_name'];
                    $update = array(
                        'pic' => $image_path
                    );
                    $this->db->where('student_id', $st_id);
                    $this->db->update('student', $update);
                        redirect(site_url() . 'student/studentdetails/'.$st_id);
                }

            }
            if (($row->pic != "") && ($row->pic != 'user.jpg')) {
                $path = $config['upload_path'] = 'public/user_img';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['overwrite']= true;
                $config['max_size'] = '10240000';
               //$config['max_width']  = '1024';
                //$config['max_height']  = '768';
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('img')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('msg', $error);
                    $this->session->set_flashdata('type',"danger");

                       redirect(site_url() . 'student/studentdetails/'.$st_id);

                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $image_path = $data['upload_data']['file_name'];
                    unlink($path . '/' . $row->pic);
                    $update = array(
                        'pic' => $image_path
                    );
                    $this->db->where('student_id', $st_id);
                    $this->db->update('student', $update);
                       redirect(site_url() . 'student/studentdetails/'.$st_id);
                }
            }
            if (($row->pic == "")) {
                $config['upload_path'] = 'public/user_img';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '10240000';// 10 mb
                //$config['max_width']  = '1024';
                //$config['max_height']  = '768';
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('img')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('msg', $error);
                    $this->session->set_flashdata('type',"danger");

                        redirect(site_url() . 'student/studentdetails/'.$st_id);
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $image_path = $data['upload_data']['file_name'];
                    $update = array(
                        'pic' => $image_path
                    );
                    $this->db->where('student_id', $st_id);
                    $this->db->update('student', $update);
                        redirect(site_url() . 'student/studentdetails/' . $st_id);
                }

            }
        }
        /**/
    }
//--------------------------------------------------------------
}