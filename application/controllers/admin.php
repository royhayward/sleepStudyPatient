<?php
class Admin extends App_Controller {

	public function Admin(){
		parent::__construct();
		$this->load->helper('form', 'html');
		$this->load->model('admin_model');
		$this->load->library('session');
		$this->load->helper('url');
		
	}
	public function index()
	{
		//$this->validateUser();
		$data['links'] = $this->navLinks();
		$data['users'] = $this->admin_model->userCount();
		$data['patients'] = $this->admin_model->patientCount();
		
		$this->load->view('admin/home_admin_view',$data);
	}
	public function users(){
			//$this->validateUser();
			$data['links'] = $this->navLinks();
			$data['users'] = $this->admin_model->listUsers();
			
			$this->load->view('admin/user_admin_view',$data);
	}
	public function newUser(){
		$data['error'] = false;
		if($this->input->post()){
			
			if($this->input->post('pass1') == $this->input->post('pass2')){	

					$password = md5($this->input->post('pass1'));
					
					if($this->admin_model->newUser($this->input->post('username'),$password,$this->input->post('role'),$this->input->post('status'))){
						$data['msg'] = "User succesfully created";
					}else{
						$data['error'] = true;
						$data['msg'] = "Sorry, this user can't be created.";
					}
			}else{
				$data['error'] = true;
				$data['msg'] = "Sorry, the passwords supplied didn't match. ";
				//$data['links'] = $this->navLinks();
				//$this->load->view('admin/newuser_admin_view', $data);
			}	
		}
		$data['links'] = $this->navLinks();
		$this->load->view('admin/newuser_admin_view', $data);
		
	}
	public function changeUser(){
		$data['error'] = false;
		if($this->input->post()){
			if($this->input->post('pass1')){
				if($this->input->post('pass1') == $this->input->post('pass2')){	
					$password = md5($this->input->post('pass1'));
				}	else{
						$data['error'] = true;
						$data['msg'] = "Sorry, the passwords supplied didn't match. ";
				}	
			}else{
				$password = null;
			}
		
			if($this->admin_model->updateUser($this->input->post('username'), $password, $this->input->post('Role'), $this->input->post('Status'))){
				$data['msg'] = "User succesfully updated";
			}else{
				$data['error'] = true;
				$data['msg'] = "Sorry, this user can't be updated.";				
			}
		}
		$data['links'] = $this->navLinks();
		$data['users'] = $this->admin_model->listUsers();
		$this->load->view('admin/user_admin_view', $data);
	}
	public function disableUser(){
		$data['error'] = false;
		if($this->admin_model->disableUser($this->input->get('id'))){
			$data['msg'] = "User successfully disabled.";
		}else{
			$data['error'] = true;
			$data['msg'] = "Sorry, user could not be disabled.";
		}
		$data['links'] = $this->navLinks();
		$data['users'] = $this->admin_model->listUsers();
		
		$this->load->view('admin/user_admin_view',$data);
		
	}
	public function enableUser(){
		$data['error'] = false;
		if($this->admin_model->enableUser($this->input->get('id'))){
			$data['msg'] = "User successfully enabled.";
		}else{
			$data['error'] = true;
			$data['msg'] = "Sorry, user could not be enabled.";
		}
		$data['links'] = $this->navLinks();
		$data['users'] = $this->admin_model->listUsers();
		
		$this->load->view('admin/user_admin_view',$data);
		
	}
	public function editUser(){
		$data['error'] = false;
		$data['user'] = $this->admin_model->getUser($this->input->get('id'));
		$data['links'] = $this->navLinks();
		$this->load->view('admin/edituser_admin_view', $data);
	}
	public function reports(){
		
				//$this->validateUser();
				$data['links'] = $this->navLinks();
				$data['users'] = $this->admin_model->userCount();
				$data['patients'] = $this->admin_model->patientCount();

				$this->load->view('admin/reports_admin_view',$data);
	}

	
}
?>