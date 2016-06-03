
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TeacherController extends CI_Controller {
 function __construct()
        {
        parent::__construct();
        $this->load->model('insert_model');
     if(!$this->session->userdata('email')){
       redirect('home');
      }
        }
    function index()
    {
        $id = $this->uri->segment(3);
        $data['teacher'] = $this->insert_model->getTeacherData($id);
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('teachers/teacherView',$data);
        $this->load->view('include/footer');
    }

    public function add_teacher(){
        
        $query = $this->db->get('countries');
        $result['result'] = $query->result();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('teachers/add_teacher',$result);
        $this->load->view('include/footer');
    } 
    
    //--------------------------------------------------------------------------
    
    public function view_teacher(){
        
        $this->db->select('*');
        $this->db->from('teachers');
        $this->db->join('users','users.u_id = teachers.fkuser_id');
        $this->db->join('countries','countries.id = users.fkcountry_id');
        $this->db->join('states','states.id = users.fkstate_id');
        $this->db->join('cities','cities.id = users.fkcity_id');
        
        $query              = $this->db->get();
        $result['result']   = $query->result();
       
//        echo '<pre>';
//        print_r($result);
//        die();
        
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('teachers/view_teacher',$result);
        $this->load->view('include/footer');
    } 
    //--------------------------------------------------------------------------
    
    public function edit_teacher( $t_id = null, $u_id = null ){
        
        $this->db->select('*');
        $this->db->from('teachers');
        $this->db->join('users','users.u_id = teachers.fkuser_id');
        $this->db->join('countries','countries.id = users.fkcountry_id');
        $this->db->join('states','states.id = users.fkstate_id');
        $this->db->join('cities','cities.id = users.fkcity_id');
        $this->db->where('teachers.t_id',$t_id);
        $this->db->where('teachers.fkuser_id',$u_id);
        
        $query              = $this->db->get();
        $result             = $query->result();
        $result['result']   = $result[0];
        $result['subject'] = $this->db->query("SELECT subject_id , subject_name FROM subject");
        $teacher = 0;
        foreach ($query->result() as $key) {
            $teacher = $key->t_id;
        }
        $result['subjects'] = $this->db->query("SELECT t.Id ,  t.ClassNo , s.subject_id , s.subject_name FROM teacher_clases t INNER JOIN subject s ON t.subject_id = s.subject_id WHERE t.teach_id = ".$teacher);
        
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('teachers/edit_teacher',$result);
        $this->load->view('include/footer');
    } 
    
    //--------------------------------------------------------------------------
   
    public function create_teacher_after_post(){
        
        $name               = $this->input->post('name');
        $father_name        = $this->input->post('father_name');
        $subject            = $this->input->post('subject');
        $cnic               = $this->input->post('cnic');
        $percentage         = $this->input->post('percentage');
        $contact            = $this->input->post('contact');
        $country            = $this->input->post('country');
        $province           = $this->input->post('province');
        $city               = $this->input->post('city');
        $address            = $this->input->post('address');
        $created_at         = mdate("%y-%m-%d");
        $updated_at         = mdate("%y-%m-%d");
        
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
        $insert_teachers_table = $this->db->insert('teachers',
        [
            'fkuser_id'      => $user_id,
            'address'        => $address,
            'subject'        => $subject,
            'cnic'           => $cnic,
            'percentage'     => $percentage,
            'created_at'     => $created_at
        ]);
       
       $sql = $this->insert_model->Get_New_Teacher();
        $t_id = 0;
        $fkuser_id = 0;
        foreach ($sql->result() as $key) {
            $t_id = $key->t_id;
            $fkuser_id = $key->fkuser_id;
                }        
        redirect(site_url() . 'teachercontroller/edit_teacher/'.$t_id.'/'.$fkuser_id);
                
    }
    
    //--------------------------------------------------------------------------
    
     public function update_teacher_after_post( $t_id = null, $u_id = null){
        
         if ($t_id == null || $u_id == null) {
           redirect(site_url() . 'teachercontroller/edit_teacher');
        } else {
        $name               = $this->input->post('name');
        $father_name        = $this->input->post('father_name');
        $subject            = $this->input->post('subject');
        $cnic               = $this->input->post('cnic');
        $percentage         = $this->input->post('percentage');
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
         $update_teachers_table = $this->db->update('teachers',
        [
            'address'        => $address,
            'subject'        => $subject,
            'cnic'           => $cnic,
            'percentage'     => $percentage,
            'updated_at'     => $updated_at
        ],['t_id'            => $t_id]
        );
       
        redirect(site_url() . 'teachercontroller/view_teacher');
        }         
    }
    
    //----------------------------------------------------------------------------
  
    public function delete_teacher($t_id = null , $u_id = null)
    {
        $this->db->delete('teachers',['t_id' => $t_id]);
        $this->db->delete('users',['u_id' => $u_id]);

        redirect(site_url() . 'teachercontroller/view_teacher');
    }

    public function save_Teacher_clases()
    {
        $classes = $this->input->post("classes");
        $subject = $this->input->post("subject");
        $teacher = $this->input->post("teacher");

        $sql = $this->db->query("INSERT INTO teacher_clases(teach_id , ClassNo , subject_id) VALUES (".$teacher." , '".$classes."' , ".$subject.")");
        if ($sql > 0) {
            echo "Saved";
        }
        else
        {
            echo $sql;
        }
    }
    
    public function delete_teacher_class()
    {
        $teacher = $this->input->post("teacher");
        $this->db->query("DELETE FROM teacher_clases WHERE Id = ".$teacher);
        echo 1;
    }
    //--------------------------------------------------------------------------
    
}

