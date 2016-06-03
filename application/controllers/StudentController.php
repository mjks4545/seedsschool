<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
function __construct()
        {
       
        $this->load->model('insert_model');
     if(!$this->session->userdata('email')){
       redirect('home');
      }
        }

class StudentController extends CI_Controller {
    
    function index($id)
    {
        $id = $this->uri->segment(3);
        $this->load->model('insert_model');
        $data['teacher'] = $this->insert_model->getTeacherData($id);
        $this->load->view('include/header');
        $this->load->view('students/studentView',$data);
        $this->load->view('include/footer'); 
    }

    public function add_student(){
        
        $query            = $this->db->get('countries');
        $result['result'] = $query->result();

        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('students/add_student',$result);
        $this->load->view('include/footer');
    } 
    
    //--------------------------------------------------------------------------
    
    public function view_student(){
        
        $this->db->select('*');
        $this->db->from('students');
        $this->db->join('users','users.u_id = students.fkuser_id');
        $this->db->join('student_subjects','student_subjects.fkstudent_id = students.s_id');
        $this->db->join('countries','countries.id = users.fkcountry_id');
        $this->db->join('states','states.id = users.fkstate_id');
        $this->db->join('cities','cities.id = users.fkcity_id');
        
        $query              = $this->db->get();
        $result['result']   = $query->result();
       
        
        
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('students/view_student',$result);
        $this->load->view('include/footer');
    } 
    //--------------------------------------------------------------------------
    
    public function edit_student( $s_id = null, $u_id = null ){
        
        $this->db->select('*');
        $this->db->from('students');
        $this->db->join('users','users.u_id = students.fkuser_id');
        $this->db->join('student_subjects','student_subjects.fkstudent_id = students.s_id');
        $this->db->join('countries','countries.id = users.fkcountry_id');
        $this->db->join('states','states.id = users.fkstate_id');
        $this->db->join('cities','cities.id = users.fkcity_id');
        $this->db->where('students.s_id',$s_id);
        $this->db->where('students.fkuser_id',$u_id);
        
        $query              = $this->db->get();
        $result             = $query->result();
        $result['result']   = $result[0];
       
        
        
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('students/edit_student',$result);
        $this->load->view('include/footer');
    } 
    
    //--------------------------------------------------------------------------
   
    public function create_student_after_post(){
        
        $name               = $this->input->post('name');
        $father_name        = $this->input->post('father_name');
        $dob                = $this->input->post('dob');
        $fb_id              = $this->input->post('fb_id');
        $institute          = $this->input->post('institute');
        $gender             = $this->input->post('gender');
        $course             = $this->input->post('course');
        $subject_name       = $this->input->post('subject_name');
        $subject_teacher    = $this->input->post('subject_teacher');
        $starting_date      = $this->input->post('starting_date');
        $contact            = $this->input->post('contact');
        $country            = $this->input->post('country');
        $province           = $this->input->post('province');
        $city               = $this->input->post('city');
        $address            = $this->input->post('address');
        $created_at         = mdate("%y-%m-%d");
        $updated_at         = mdate("%y-%m-%d");
        $class              = $this->input->post('class');
        
        $this->db->where('contact', $contact);
        $query = $this->db->get('users');
        $obj = $query->result();
        
        if (empty($obj)) {
        $insert_users_table = $this->db->insert('users',
        [
            'name'           => $name,
            'father_name'    => $father_name,
            'contact'        => $contact,
            'fkcountry_id'   => $country,
            'fkstate_id'     => $province,
            'fkcity_id'      => $city,
            'created_at'     => $created_at
        ]);
        $user_id = $this->db->insert_id();
        } else {
            $user_id = $obj[0]->u_id;
            $insert_users_table = $this->db->update('users',
                [
                    'name'           => $name,
                    'father_name'    => $father_name,
                    'contact'        => $contact,
                    'fkcountry_id'   => $country,
                    'fkstate_id'     => $province,
                    'fkcity_id'      => $city,
                    'updated_at'     => $updated_at
                ],['u_id' => $user_id]
            );
        }  
        $insert_students_table = $this->db->insert('students',
        [
            'fkuser_id'      => $user_id,
            'address'        => $address,
            'date_of_birth'  => $dob,
            'facebook_id'    => $fb_id,
            'institute'      => $institute,
            'gender'         => $gender,
            'course'         => $course,
            'created_at'     => $created_at,
            'ClassNo'        => $class
         ]);
        $student_id = $this->db->insert_id();
        
        $insert_subjects_table = $this->db->insert('student_subjects',
        [
            'fkstudent_id'    => $student_id,
            'subject_name'    => $subject_name,
            'subject_teacher' => $subject_teacher,
            'starting_date'   => $starting_date,
            'created_at'      => $created_at
        ]);
        
        redirect(site_url() . 'studentcontroller/view_student');
                
    }
    
    //--------------------------------------------------------------------------
    
     public function update_student_after_post( $s_id = null, $u_id = null){
        
         if ($s_id == null || $u_id == null) {
           redirect(site_url() . 'studentcontroller/edit_student');
        } else {
        $name               = $this->input->post('name');
        $father_name        = $this->input->post('father_name');
        $dob                = $this->input->post('dob');
        $fb_id              = $this->input->post('fb_id');
        $institute          = $this->input->post('institute');
        $contact            = $this->input->post('contact');
        $country            = $this->input->post('country');
        $province           = $this->input->post('province');
        $city               = $this->input->post('city');
        $address            = $this->input->post('address');
        $updated_at         = mdate("%y-%m-%d");
        
       $update_users_table = $this->db->update('users',
            [
                'name'           => $name,
                'father_name'    => $father_name,
                'contact'        => $contact,
                'fkcountry_id'   => $country,
                'fkstate_id'     => $province,
                'fkcity_id'      => $city,
                'updated_at'     => $updated_at
            ],['u_id'            => $u_id]
        );
        $update_students_table = $this->db->update('students',
            [
                'address'        => $address,
                'date_of_birth'  => $dob,
                'facebook_id'    => $fb_id,
                'institute'      => $institute,
                'updated_at'     => $updated_at
            ],['s_id'            => $s_id]
        );
       
        redirect(site_url() . 'studentcontroller/view_student');
        }         
    }
    
    //----------------------------------------------------------------------------
  
    public function delete_student($s_id = null , $u_id = null, $subject_id = null)
    {
        $this->db->delete('students',['s_id' => $s_id]);
        $this->db->delete('users',['u_id' => $u_id]);
        $this->db->delete('student_subjects',['subject_id' => $subject_id]);

        redirect(site_url() . 'studentcontroller/view_student');
    }
    
    //--------------------------------------------------------------------------
    
}

