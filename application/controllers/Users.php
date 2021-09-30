<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('UsersModel');
		$this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn');
	}

	public function index(){
		if($this->isUserLoggedIn != 0){
			redirect('Users/isLoggedIn');
		}else{
			redirect('Users/loginToApp');
		}
	}
	public function isLoggedIn(){
		if($this->isUserLoggedIn){
			$id = $this->session->userdata('userId');
			$data['user'] = $this->UsersModel->fetch_single_user($id);
			$this->load->view('app_view/profile', $data);
		}else{
			redirect('Users/index');
		}
	}
	public function loginToApp()
	{
		$data = $this->input->post();
		if($this->isUserLoggedIn != 0){
			redirect('Users/index');
		}else{
			if($this->input->post('user_email')){

				$email = $this->input->post('user_email');
				$password = $this->input->post('user_password');
				$data['data'] = $this->UsersModel->fetch_user($email, $password);
				if($data['data'] != null){
					$this->session->set_userdata('isUserLoggedIn', TRUE);
					$this->session->set_userdata('userId', $data['data'][0]['id']);
					redirect('Users/index');
				}else{
					redirect('Users/loginToApp');
				}
			}else{
				$this->load->view('app_view/login');
			}
		}

	}
	public function logout(){
		$this->session->unset_userdata('isUserLoggedIn');
		session_destroy();
		redirect('Users/index');
	}
	public function edit($id){
//		echo $id; die();
		$data['user'] = $this->UsersModel->fetch_single_user($id);
		$this->load->view('app_view/profile_edit', $data);
	}
	public function upload_image(){
		$id = $this->input->post('id');
		$config['upload_path']          = "././assets/uploads/";
		$config['allowed_types']        = 'gif|jpg|png';
//		$config['max_size']             = 2048;
//		$config['max_width']            = 1024;
//		$config['max_height']           = 768;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
//			echo "<pre>"; print_r($data); die();
			$file_name = $data['upload_data']['file_name'];
			$file = array(
				'image_file' => $file_name,
			);
			$res = $this->UsersModel->update_data($file, $id);
			if($res == 1){
				redirect('Users/index');
			}
		}
	}
}
