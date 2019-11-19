<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends MY_Controller {

	public $data = [];
    public $response = [];
	
	function __construct(){
		parent::__construct();
		// $this->load->model('users_model');
        // $this->load->model('employee_model');
        $this->load->library('session');
        $this->load->model('message_model');
	}


	public function inbox(){
		$this->load->library('session');
		if($this->session->userdata('user') == "cashier"){
					$this->data['js']['top']    = [
													'plugins/sweetalert2/sweetalert2.all.min.js',
													
													
												];
					$this->data['js']['bottom']    = [
														'plugins/jquery-ui/jquery-ui.min.js',
														'plugins/bootstrap/js/bootstrap.bundle.min.js',
														'plugins/chart.js/Chart.min.js',
														'plugins/sparklines/sparkline.js',
														'plugins/jqvmap/jquery.vmap.min.js',
														'plugins/jqvmap/maps/jquery.vmap.usa.js',
														'plugins/jquery-knob/jquery.knob.min.js',
														'plugins/moment/moment.min.js',
														'plugins/daterangepicker/daterangepicker.js',
														'plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
														'plugins/summernote/summernote-bs4.min.js',
														'plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
														'dist/js/adminlte.js',
														'dist/js/pages/dashboard.js',
														'plugins/bootstrap/js/bootstrap.bundle.min.js',
														'plugins/datatables/jquery.dataTables.min.js',
														'plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
														
														
													 ];							
					$this->data['css']          = [
										'plugins/fontawesome-free/css/all.min.css',
										'plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
										'plugins/icheck-bootstrap/icheck-bootstrap.min.css',
										'plugins/jqvmap/jqvmap.min.css',
										'dist/css/adminlte.min.css',
										'plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
										'plugins/daterangepicker/daterangepicker.css',
										'plugins/summernote/summernote-bs4.css',
										'dist/css/fonts.googleapis.css',
										'dist/css/adminlte.min.css',
										'plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
										'plugins/datatables-bs4/css/dataTables.bootstrap4.css',

												];
					// $message = new message_model;							
					$this->data['title']        = 'Inbox';
					$this->data['page']         = 'inbox';
					// $this->data['message']		= $message->message_list();
		$this->templates->_admin('cashier','mail/inbox',$this->data);
		}
		else if($this->session->userdata('user') == "admin"){
			redirect ('admin/index');
		}else{
			redirect ('/');
		}
	}

    public function read($id)
	{
        $id_test = $this->db->query('SELECT * from tbl_message WHERE message_id = "'.$id.'" AND (send_by = "'.$this->session->userdata('id').'" OR recieve_by = "'.$this->session->userdata('id').'")');
        $num = $id_test->num_rows();
        if ($num > 0){
                    $this->load->library('session');
         if($this->session->userdata('user') == "cashier"){
                    $this->data['js']['top']    = [
                                                    'plugins/sweetalert2/sweetalert2.all.min.js',
                                                    
                                                    
                                                ];
                    $this->data['js']['bottom']    = [
                                                        'plugins/jquery-ui/jquery-ui.min.js',
                                                        'plugins/bootstrap/js/bootstrap.bundle.min.js',
                                                        'plugins/chart.js/Chart.min.js',
                                                        'plugins/sparklines/sparkline.js',
                                                        'plugins/jqvmap/jquery.vmap.min.js',
                                                        'plugins/jqvmap/maps/jquery.vmap.usa.js',
                                                        'plugins/jquery-knob/jquery.knob.min.js',
                                                        'plugins/moment/moment.min.js',
                                                        'plugins/daterangepicker/daterangepicker.js',
                                                        'plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
                                                        'plugins/summernote/summernote-bs4.min.js',
                                                        'plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
                                                        'dist/js/adminlte.js',
                                                        'dist/js/pages/dashboard.js',
                                                        'plugins/bootstrap/js/bootstrap.bundle.min.js',
                                                        'plugins/datatables/jquery.dataTables.min.js',
                                                        'plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
                                                        
                                                        
                                                     ];                         
                    $this->data['css']          = [
                                        'plugins/fontawesome-free/css/all.min.css',
                                        'plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
                                        'plugins/icheck-bootstrap/icheck-bootstrap.min.css',
                                        'plugins/jqvmap/jqvmap.min.css',
                                        'dist/css/adminlte.min.css',
                                        'plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
                                        'plugins/daterangepicker/daterangepicker.css',
                                        'plugins/summernote/summernote-bs4.css',
                                        'dist/css/fonts.googleapis.css',
                                        'dist/css/adminlte.min.css',
                                        'plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
                                        'plugins/datatables-bs4/css/dataTables.bootstrap4.css',

                                                ];
					$message = new message_model;     
					$message->message_id = $id;                      
                    $this->data['title']        = 'Inbox';
                    $this->data['page']         = 'read';
                    $this->data['data']     = $message->myMessage();
                    // $this->data['message_to']        = $message->message_to();
        $this->templates->_admin('cashier','mail/read',$this->data,true);
        }
                else if($this->session->userdata('user') == "admin"){
                    redirect ('admin/index');
                }else{
                    redirect ('/');
                }
        }else{
            redirect('admin/message/inbox');
        }
    }

	public function reply($id)
	{
        $id_test = $this->db->query('SELECT * from tbl_message WHERE message_id = "'.$id.'" AND (send_by = "'.$this->session->userdata('id').'" OR recieve_by = "'.$this->session->userdata('id').'")');
        $num = $id_test->num_rows();
        if ($num > 0){
                    $this->load->library('session');
         if($this->session->userdata('user') == "admin"){
                    $this->data['js']['top']    = [
                                                    'plugins/sweetalert2/sweetalert2.all.min.js',
                                                    
                                                    
                                                ];
                    $this->data['js']['bottom']    = [
                                                        'plugins/jquery-ui/jquery-ui.min.js',
                                                        'plugins/bootstrap/js/bootstrap.bundle.min.js',
                                                        'plugins/chart.js/Chart.min.js',
                                                        'plugins/sparklines/sparkline.js',
                                                        'plugins/jqvmap/jquery.vmap.min.js',
                                                        'plugins/jqvmap/maps/jquery.vmap.usa.js',
                                                        'plugins/jquery-knob/jquery.knob.min.js',
                                                        'plugins/moment/moment.min.js',
                                                        'plugins/daterangepicker/daterangepicker.js',
                                                        'plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
                                                        'plugins/summernote/summernote-bs4.min.js',
                                                        'plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
                                                        'dist/js/adminlte.js',
                                                        'dist/js/pages/dashboard.js',
                                                        'plugins/bootstrap/js/bootstrap.bundle.min.js',
                                                        'plugins/datatables/jquery.dataTables.min.js',
														'plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
														'plugins/summernote/summernote-bs4.min.js'
                                                        
                                                        
                                                     ];                         
                    $this->data['css']          = [
                                        'plugins/fontawesome-free/css/all.min.css',
                                        'plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
                                        'plugins/icheck-bootstrap/icheck-bootstrap.min.css',
                                        'plugins/jqvmap/jqvmap.min.css',
                                        'dist/css/adminlte.min.css',
                                        'plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
                                        'plugins/daterangepicker/daterangepicker.css',
                                        'plugins/summernote/summernote-bs4.css',
                                        'dist/css/fonts.googleapis.css',
                                        'dist/css/adminlte.min.css',
                                        'plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
										'plugins/datatables-bs4/css/dataTables.bootstrap4.css',
										'plugins/summernote/summernote-bs4.css',
										'dist/css/ionicons.min.css'

                                                ];
					$message = new message_model;     
					$message->message_id = $id;                      
                    $this->data['title']        = 'Inbox';
                    $this->data['page']         = 'reply';
                    $this->data['data']     = $message->myMessage();
                    // $this->data['message_to']        = $message->message_to();
        $this->templates->_admin('admin','mail/reply',$this->data,true);
        }
                else if($this->session->userdata('user') == "admin"){
                    redirect ('admin/index');
                }else{
                    redirect ('/');
                }
        }else{
            redirect('admin/message/inbox');
        }
	}
	
	public function list()
	{
		$data=$this->message_model->message_list();
		echo json_encode($data);
	}

    public function send_message()
    {
        $data=$this->message_model->send_message();
        echo json_encode($data);
    }

}
?>