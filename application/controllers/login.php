<?php
class Login extends App_Controller {

	public function index()
	{
		$this->load->helper('form');
		$this->load->view('frontend/login_view');
		$this->load->model('app_model');
	}
	public function logout(){
		$this->session->set_userdata(array('logged_in' => false));
		$data = $this->session->unset_userdata('user_id');
		redirect('login');
	}
	public function validate(){
		$username = $this->input->post('username');
		$pass = $this->input->post('password');
		$this->load->model('app_model');
		$login = $this->app_model->validateUser($username, md5($pass));
		if($login){
			//var_dump($login);
			redirect('patient');
		}else{
			redirect('login');
		}
	}
	

}
?>