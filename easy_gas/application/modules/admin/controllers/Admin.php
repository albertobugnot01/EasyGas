<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public $data = [];
    public $response = [];
	
	function __construct(){
		parent::__construct();
		$this->load->model('users_model');
		// $this->load->model('message_model');
		$this->load->model('datatable_model');
	}

    public function index(){
		$this->load->library('session');
		if($this->session->userdata('user') == "admin"){
					$this->data['js']['top']    = [
													'js/jquery-3.2.1.min.js',
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
														'dist/js/demo.js',
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
												];
					// $message = new message_model;							
					$this->data['title']        = 'Dashboard';
					$this->data['page']         = 'dashboard';
					// $this->data['message']		= $message->message_list();
		$this->templates->_admin('admin','admin/index',$this->data);
		}
		else if($this->session->userdata('user') == "cashier"){
			redirect ('cashier/index');
		}else{
			redirect ('/');
		}
	}


	public function client(){
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
					$this->data['page']         = 'Client';
					// $this->data['message']		= $message->message_list();
		$this->templates->_admin('admin','admin/client-list',$this->data);
		}
		else if($this->session->userdata('user') == "cashier"){
			redirect ('cashier/index');
		}else{
			redirect ('/');
		}
	}

	public function logout()
	{
			$this->load->library('session');
			$this->session->unset_userdata('user');
			$this->session->unset_userdata('cashier');
			redirect('/');
	}

		public function save(){
		$data=$this->users_model->save_product();
		if($data == false){
			return false;
		}
		else{
			echo json_encode($data);
		}
	}

	
	public function product_data()
	{
		$data=$this->users_model->product_list();
		echo json_encode($data);
	}
	public function update()
	{
		
		$data=$this->users_model->update_product();
		$data=$this->do_upload();
		echo '<script>Swal.fire("Company Updated!", "Your Image added successfully", "success");</script>';
	}

	public function delete(){
		$data=$this->users_model->delete_product();
		echo json_encode($data);
	}

	function do_upload(){
        $config['upload_path']="./uploads";
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_name'] = TRUE;
         
        $this->load->library('upload',$config);
        if(!$this->upload->do_upload("userfile")){
           echo '<script>Swal.fire("File Error!", "Please Check your file type", "error");</script>';
		}
		else{
			$data = $this->upload->data();
 
            //Resize and Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./uploads'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '60%';
            $config['width']= 600;
            $config['height']= 400;
            $config['new_image']= './uploads'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
 
            $image= $data['file_name']; 
             
            $result= $this->users_model->save_upload($image);
			echo '<script>Swal.fire("Company Updated!", "Your Image added successfully", "success");</script>';
			return $image;
		}
	}

		public function images(){
		$mymodel = new users_model;
		$mymodel->account_num = $this->input->post('account_num',true);
		$data['data'] = $mymodel->images();
		echo $this->load->view('mail/image',$data,true);
	}

	public function datable()
	{
			$data = $row = array();
			
			// Fetch member's records
			$memData = $this->datatable_model->getRows($_POST);
			
			$i = $_POST['start'];
			foreach($memData as $member){
				$i++;
				$data[] = array( $member->account_num, $member->company_name, $member->address, $member->telephone_num, $member->contact_person,$member->contact_number,$member->po_validity,$member->status,$member->contact_person_after,$member->contact_num_after);
			}
			
			$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->datatable_model->countAll(),
				"recordsFiltered" => $this->datatable_model->countFiltered($_POST),
				"data" => $data,
			);
			
			// Output to JSON format
			echo json_encode($output);
		}

		public function user_data()
	{
			$data = $row = array();
			
			// Fetch member's records
			$memData = $this->datatable_model->getRows($_POST);
			
			$i = $_POST['start'];
			foreach($memData as $member){
				$i++;
				$data[] = array( $member->account_num, $member->company_name, $member->address, $member->telephone_num, $member->contact_person,$member->contact_number,$member->po_validity,$member->status,$member->contact_person_after,$member->contact_num_after);
			}
			
			$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->datatable_model->countAll(),
				"recordsFiltered" => $this->datatable_model->countFiltered($_POST),
				"data" => $data,
			);
			
			// Output to JSON format
			echo json_encode($output);
		}
	
}
