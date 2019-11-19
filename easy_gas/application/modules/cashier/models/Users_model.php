<?php
	class Users_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function login($email, $password){
			$query = $this->db->get_where('tbl_users', array('username'=>$email, 'pass_word'=>$password));
			return $query->row_array();
		}

		function product_list(){
			$hasil=$this->db->get('tbl_client');
			return $hasil->result();
		}
		
	function save_product(){
		$account_num = $this->input->post('account_num');
			$this->db->select("account_num")
			->from("tbl_client")
			->where("account_num",$account_num);
			$query = $this->db->get();
			$num = $query->num_rows();
			if ($num > 0) {
				return false;
			}else{
				$data = array(
					'account_num' 	=> $this->input->post('account_num'), 
					'company_name' 	=> $this->input->post('company_name'), 
					'address' => $this->input->post('address'),
					'telephone_num' => $this->input->post('telephone_num'), 
					'contact_person' => $this->input->post('contact_person'), 
					'contact_number' => $this->input->post('contact_number'), 
					'po_validity' => $this->input->post('po_validity'), 
					'status' => $this->input->post('status'),
					'contact_person_after' => $this->input->post('contact_person_after'), 
					'contact_num_after' => $this->input->post('contact_num_after'), 
					'file_name' => 'inser-image.png',
				);
			$result=$this->db->insert('tbl_client',$data);
			return $result;
			}
	}

	function update_product(){
		$data = array(
			'account_num' 	=> $this->input->post('account_num_edit'), 
			'company_name' 	=> $this->input->post('company_name_edit'), 
			'address' => $this->input->post('address_edit'),
			'telephone_num' => $this->input->post('telephone_num_edit'), 
			'contact_person' => $this->input->post('contact_person_edit'), 
			'contact_number' => $this->input->post('contact_number_edit'), 
			'po_validity' => $this->input->post('po_validity_edit'), 
			'status' => $this->input->post('status_edit'),
			'contact_person_after' => $this->input->post('contact_person_after_edit'), 
			'contact_num_after' => $this->input->post('contact_num_after_edit'),
		);
		$this->db->where('account_num', $this->input->post('account_num_edit'));
		$result=$this->db->update('tbl_client',$data);
		return $result;
	}

	function delete_product(){
		$account_num=$this->input->post('account_num');
		$this->db->where('account_num', $account_num);
		$result=$this->db->delete('tbl_client');
		return $result;
	}
		function save_upload($image)
		{
        $imageID=$this->input->post('imageID');
        $data = array(
                'file_name' => $image
            );  
            $this->db->where('account_num', $imageID);
   			 $result= $this->db->update('tbl_client', $data);
        	return $result;
		   }
		   
		   public function images()
		   {
			   $images = $this->db->query('SELECT file_name FROM tbl_client WHERE account_num = "'.$this->account_num.'"');
			   return $images->num_rows() > 0 ? $images->result() : null;
		   }

	}
?>