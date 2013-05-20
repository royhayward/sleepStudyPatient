<?php
class Patient extends App_Controller {

	public function Patient(){
		parent::__construct();
		$this->load->helper('form', 'html');
		$this->load->model('patient_model');
		$this->load->library('session');
		$this->load->helper('url');
		//$this->load->library('tc_calendar');
		
	}
	public function index()
	{
		//$this->validateUser();
		$data['links'] = $this->navLinks();
		$data['patients'] = $this->patient_model->listPatients();
		
		$this->load->view('frontend/list_patient_view',$data);
	}
	public function newPatient(){
		$data['error'] = false;
		$data['links'] = $this->navLinks();
		$data['insurance'] = $this->patient_model->getInsurance();
		if($this->input->post()){
			$id = $this->addPatient($this->input->post());
			if($id){
				$data['msg'] = "Patient Created Successfully!";
				//$this->load->view('frontend/new_patient_view', $data);
				redirect('patient/single?id='.$id);
			}else{
				
				$data['error'] = true;
				//$data['msg'] = "One or more required fields is missing or incorrect.";
				$validation = $this->validatePagientData($this->input->post());
				$data['msg'] = $validation['msg'];
				$data['pdata'] = $this->input->post();
				$data['post'] = $this->input->post();
				
			}
			//do stuff
		}
		//var_dump($data);
		$this->load->view('frontend/new_patient_view', $data);
		
	}
	private function validatePatientData($pdata){
		//validate VirtOXID
		if(!strlen($pdata['VirtOXID']) == 6){
			return array('key' => 'VirtOXID', 'msg' => 'VirtOXID must be a 6 digit mumber.');
		}
		if(!strlen($pdata['fname']) >= 1){
			return array('key' => 'fname', 'msg' => 'First Name is required.');
		}
		if(!strlen($pdata['lname']) >= 1){
			return array('key' => 'lname', 'msg' => 'Last Name is required.');
		}
		if(!strlen($pdata['SSN']) > 9){
			return array('key' => 'SSN', 'msg' => 'SSN is required.');
		}
		if(!strlen($pdata['phone']) >= 7){
			return array('key' => 'phone', 'msg' => 'Phone Number is required.');
		}
		
	}
	private function addPatient($pdata){
		
		
		
		
		
		
		if($pdata['fname'] && $pdata['lname'] && $pdata['dob_month'] && $pdata['dob_day'] && $pdata['dob_yr'] && $pdata['VirtOXID'] && $pdata['shipping_Addr'] && $pdata['city'] && $pdata['state'] && $pdata['zip'] && $pdata['phone'] && $pdata['gender'] && $pdata['height_ft'] &&  $pdata['weight'] && $pdata['neck'] && $pdata['insurance'] && $pdata['ins_id']){
		
			return $this->patient_model->addPatient($pdata);
		}else{
			return false;
		}

	}
	public function changePatient(){
		$data['error'] = false;
		if($this->input->post()){
			//do stuff
		}
		$data['links'] = $this->navLinks();
		$data['users'] = $this->admin_model->listUsers();
		$this->load->view('admin/patient_view', $data);
	}
	
	
	public function editPatient(){
		$data['error'] = false;
		$data['user'] = $this->admin_model->getUser($this->input->get('id'));
		$data['links'] = $this->navLinks();
		$this->load->view('admin/edit_patient_view', $data);
	}
	
	public function single(){
		$id = $this->input->get('id');
		//var_dump($this->input->get());
		$data['links'] = $this->navLinks();
		$data['pdata'] = $this->patient_model->getPatient($id);
		$data['docs'] = $this->patient_model->getDocuments($id);
		$data['notes'] = $this->patient_model->getNotes($id);
		$data['doctors'] = $this->patient_model->getDoctors($id);
		$data['symptoms'] = $this->patient_model->getSymptoms($id);
		$data['study'] = $this->patient_model->getStudys($id);
		
		//var_dump($data);
		$this->load->view('frontend/patient_view', $data);
	}
	
	public function changeDoctor(){
		$data['links'] = $this->navLinks();
		
		
		if($this->input->post()){
			if($this->patient_model->changeDoctor($this->input->post())){
				redirect('patient/single?id='.$this->input->post('id'));
			}else{
				$data['error'] = true;
				$data['msg'] = "Please check this data and try again.";
				$id = $this->input->post('id');
				$data['pdata'] = $this->patient_model->getPatient($id);
				$data['doctor_type'] = $this->input->post('doctor_type');
				$data['post'] = $this->input->post();
				$this->load->view('frontend/new_doctor', $data);
			}
			
		}else{
			$id = $this->input->get('id');
			$data['pdata'] = $this->patient_model->getPatient($id);
			$data['doctor_type'] = $this->input->get('type');
			$this->load->view('frontend/new_doctor', $data);
		}
	}
	public function addSymptom(){
		$data['links'] = $this->navLinks();
		
		if($this->input->post()){
			//var_dump($this->input->post());
			$this->patient_model->updateSymptoms($this->input->post());
			redirect('patient/single?id='.$this->input->post('id'));
		}else{
			$data['symptoms'] = $this->patient_model->getSymptoms($this->input->get('id'));
			$data['pdata'] = $this->patient_model->getPatient($this->input->get('id'));
			$this->load->view('frontend/symptoms_entry', $data);
		}
	}
	public function addStudy(){
		$data['links'] = $this->navLinks();
		
		if($this->input->post()){
			//var_dump($this->input->post());
			$this->patient_model->addStudy($this->input->post());
			redirect('patient/single?id='.$this->input->post('id'));
		}else{
			$data['indications'] = $this->patient_model->getIndications();
			$data['pdata'] = $this->patient_model->getPatient($this->input->get('id'));
			$this->load->view('frontend/study_entry', $data);
		}
	}
	public function addDocument(){
		$data['links'] = $this->navLinks();
		
		if($this->input->post()){
			//var_dump($_FILES);
			
				$fileName = $_FILES['document']['name'];
				    $tmpName  = $_FILES['document']['tmp_name'];
				    $fileSize = $_FILES['document']['size'];
				    $fileType = $_FILES['document']['type'];

				 $fp = fopen($tmpName, 'r');
				    $content = fread($fp, filesize($tmpName));
				    $content = addslashes($content);
				    fclose($fp);

					if(!get_magic_quotes_gpc()){
					        $fileName = addslashes($fileName);
					     }

					    $file_info = pathinfo($_FILES['document']['name']);
			
			$this->patient_model->addDocument($this->input->post(), $fileName, $content, $fileSize, $fileType);
			redirect('patient/single?id='.$this->input->post('id'));
		}else{
			$data['doctypes'] = $this->patient_model->docTypes();
			$data['pdata'] = $this->patient_model->getPatient($this->input->get('id'));
			$this->load->view('frontend/document_entry', $data);
		}
	}
	public function getDoc(){
		$data['links'] = $this->navLinks();
		$data['document'] = $this->patient_model->getDocument($this->input->get('id'));
		
		$this->load->view('frontend/doc_view', $data);
	}
	public function addNote(){
		$data['links'] = $this->navLinks();
		if($this->input->post()){
			$this->patient_model->addPatientNote($this->input->post());
			redirect('patient/single?id='.$this->input->post('id'));
		}else{
			$data['pdata'] = $this->patient_model->getPatient($this->input->get('id'));
			$this->load->view('frontend/new_note_view', $data);
		}
	}
	
}
?>