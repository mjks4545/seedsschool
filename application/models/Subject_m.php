<?php
class Subject_m extends CI_Model
{

	// -------------------------------------------------------------------------

	function insert(){

		$name         = $this->input->post('name');
		$duration     = $this->input->post('duration');

		$this->db->select('*');
		$this->db->where('su_name', $name);
		$query = $this->db->get('subject');
		$num = $query->num_rows();
		if( $num > 0  ){

			return 2;

		}else{

			$insrt = [
				'su_name'           => $name,
				'duration'          => $duration
			];

			$result = $this->db->insert('subject', $insrt);
			if ($result) {
				return 1;
			} else {
				return 0;
			}

		}
	}

	// -------------------------------------------------------------------------

	function get( $id = null ){

		if( $id != null ){
			$this->db->where( 'su_id',$id );
            $query = $this->db->get('subject');
            return $query->result();
        }else {
        $this->db->select("*");
        $query = $this->db->get("subject");
        $num = $query->num_rows();
        $config['base_url'] = site_url()."subject/index/";
        $config['total_rows'] = $num;
        $config['per_page'] = 10;
        $config['num_links'] = 4;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        $this->db->order_by('su_id','desc');
        $query = $this->db->get('subject', $config['per_page'], $this->uri->segment(3));
		return $query->result();
        }
	}

	// -------------------------------------------------------------------------

	function update( $id = null ){

		if( $id == null ){
			return 0;
		}
		$name         = $this->input->post('name');
		$duration     = $this->input->post('duration');
		$update = [
			'su_name'     => $name,
			'duration'    => $duration
		];
		return $this->db->update( 'subject', $update , [ 'su_id' => $id ] );
	}

	// -------------------------------------------------------------------------

	function delete( $id = null ){

		if( $id == null ){
			return 0;
		}
		$this->db->where( 'su_id', $id );
		return $this->db->delete( 'subject' );
	}

	// -------------------------------------------------------------------------
 function allsub(){
     $this->db->select("*");
     $this->db->from("subject");
     $query = $this->db->get();
     return $query->result();
 }
}