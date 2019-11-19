<?php    

defined('BASEPATH') OR exit('No direct script access allowed');

    class Message_model extends CI_Model
    {
        var $message_id = null;
        var $account_num = null;
        function __construct(){
			parent::__construct();
			$this->load->database();
        }
    
        public function message_list()
        {

            $query = $this->db->query('SELECT * FROM tbl_message_event LEFT JOIN tbl_message ON tbl_message_event.message_id = tbl_message.message_id LEFT JOIN tbl_users ON tbl_message.send_by = tbl_users.id WHERE tbl_message.recieve_by = "'.$this->session->userdata('id').'" OR tbl_message.send_by = "'.$this->session->userdata('id').'" GROUP BY tbl_message.message_id ORDER BY tbl_message.id DESC');
            return $query->num_rows() > 0 ? $query->result() : null;
        }

        public function myMessage()
        {
            if($this->message_id != null){
                $this->db->or_where('message_id', $this->message_id);
            }
            $data = array(
                'status' => "seen"
                );
                $this->db->update('tbl_message', $data);
                if($this->db->affected_rows() >=0){
                    if($this->message_id != null){
                        $this->db->or_where('message_sender', $this->message_id);
                    }
                    $query =  $this->db->query('SELECT * FROM tbl_message_event LEFT JOIN tbl_message ON tbl_message_event.message_id = tbl_message.message_id LEFT JOIN tbl_users ON tbl_message.recieve_by = tbl_users.id WHERE  tbl_message.message_id = "'.$this->message_id.'" ORDER BY created_date ASC');
                    return $query->num_rows() > 0 ? $query->result() : null;
                  }

        }

        public function images()
        {
            $images = $this->db->query('SELECT file_name FROM tbl_client WHERE account_num = "'.$this->account_num.'"');
            return $images->num_rows() > 0 ? $images->result() : null;
        }


        public function message_to()
        {
            $send_to = $this->db->query('SELECT * FROM tbl_users WHERE id != "'.$this->session->userdata('id').'"');
            return $send_to->num_rows() > 0 ? $send_to->result() : null;
        }

        public function send_message()
        {
            $insert = array(
                    'message_id' => $this->input->post('message_id'),
                    'message_text' => $this->input->post('message_text'),
                    'send_by' => $this->session->userdata('id'),
                    'recieve_by' => $this->input->post('recieve_by')
            );  
            $this->db->where('message_id', $this->input->post('message_id'));
             $this->db->insert('tbl_message', $insert);
        }
    }