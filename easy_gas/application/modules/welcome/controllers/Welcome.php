<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public $data = [];
    public $response = [];

	public function __construct() {
        parent::__construct();
      $this->load->model('welcome/users_model');
    }
	public function index(){
		$this->load->library('session');
		if($this->session->userdata('user') == "admin"){
			redirect ('admin/index');
		}
		else if($this->session->userdata('user') == "cashier"){
			redirect ('cashier/index');
		}else{
			$this->data['js']['top']    = [
				// 'js/jquery-3.2.1.min.js',
				// 'js/modernizr.min.js',
				'plugins/sweetalert2/sweetalert2.all.min.js',
				
			];
			$this->data['js']['bottom']    = [
							'js/bootstrap.min.js'
						];							
			$this->data['css']          = [
							'dist/css/login.css',
							'dist/css/util.css',
							'dist/css/bots-css/bootstrap.min.css',
							'plugins/sweetalert2/sweetalert2.all.min.css'
						];
						
			$this->data['title']        = 'Login';
			$this->data['page']         = 'welcome';
			$this->templates->_render('welcome','welcome_message', $this->data);
		}

    }
    public function login(){
		//load session library
        $this->load->library('session');
        $user_model = new Users_model;

		$output = array('error' => false);

		$email = $_POST['email'];
		$password = $_POST['password'];

		$data = $user_model->login($email, $password);

		if($data['usertype'] === 'admin' && $data['action'] === 'ACTIVE'){

			$sesdata = array(
				'id' => $data['id'],
				'name' => $data['name'],
				'username'  => $email,
				'email'     => $data['email_address'],
				'usertype'     => $data['usertype'],
				'user' => "admin"
			);
			
			$this->session->set_userdata($sesdata);
			$output['message'] = 'Logging in. Please wait...';
		}
		else if($data['usertype'] === 'cashier' && $data['action'] === 'ACTIVE'){
			$sesdata = array(
				'id' => $data['id'],
				'name' => $data['name'],
				'username'  => $email,
				'email'     => $data['email_address'],
				'usertype'     => $data['usertype'],
				'user' => "cashier"
			);
			$this->session->set_userdata($sesdata);
			$output['message'] = 'Logging in. Please wait...';
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Login Invalid. User not found';
		}

		echo json_encode($output); 
	}

	public function logout(){
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('cashier');
		redirect('/');
	}

}
