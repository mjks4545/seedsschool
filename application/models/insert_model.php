<?php 
class Insert_model extends CI_model{

	function getRole()
	{
		$qry = $this->db->get('role');
		return $qry->result();
	}

	function chk_account($email,$password,$role)
			{
				$this->db->select("*");
				$this->db->from("login");
				$this->db->where("email",$email);
				$this->db->where("password",$password);
				$this->db->where("role",$role);
				$query=$this->db->get();
			
				if($query->num_rows()>0){
					$row = $query->row_array();
$data = array('email'=>$email,'id'=>$row['id'],'role'=>$row['role'] );
					$this->session->set_userdata($data);
					 
				
				switch($role){
					
							case '1':
							$this->session->set_userdata('role_title','Director or admin');
							$this->session->set_userdata('email',$email);
						    redirect(base_url('directorcontroller'));
							break;
							case '2':
							$this->session->set_userdata('role_title','Teacher');
							$this->session->set_userdata('email',$email);
						    redirect(base_url('teacherController/index/'. $this->session->userdata('id')));
							break;
							case '3':
							$this->session->set_userdata('role_title','Student');
							$this->session->set_userdata('email',$email);
						    redirect(base_url('studentController/index/'. $this->session->userdata('id')));
							break;
							case '4':
							$this->session->set_userdata('role_title','Visitor');
							$this->session->set_userdata('email',$email);
						    redirect(base_url('visitorController/add_visitor'));
							return true;
							break;
							case '5':
							$this->session->set_userdata('role_title','Reciptionest');
							$this->session->set_userdata('email',$email);
						    redirect(base_url('receptionistController/'));
							return true;
							break;
						}

				}
				else{
					$this->session->set_flashdata('error',"Incorrect username password or Role");
					redirect(base_url('home'));
					}
				
			}
	function getTeacherData($id){
		$this->db->where('id',$id);
		$query= $this->db->get('login');
		return $query->result_array();
	}		

}


?>