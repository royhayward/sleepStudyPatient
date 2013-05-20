<?php
class App_Controller extends CI_Controller{
	public function App(){
		parent::__contruct();
		
		$this->load->library('session');
	}
	
	public function navLinks(){
		$links[] = array('url' => base_url().'index.php/admin', 'label' => 'Admin Home');
		$links[] = array('url' => base_url().'index.php/admin/users', 'label' => 'Users');
		$links[] = array('url' => base_url().'index.php/admin/reports', 'label' => 'Reports');
		$links[] = array('url' => base_url().'index.php/patient', 'label' => 'Patients');
		return $links;
	}
	public function validateUser(){
		if($this->session->userdata('logged_in')){
			//we are in!!
		} else {
			redirect('login');
		}
	}
	
}


?>