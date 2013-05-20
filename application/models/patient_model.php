<?php
class Patient_model extends CI_Model{
//This is where the patient data access will be located.
	function listPatients(){
		$this->db->select('id, FirstName, LastName, last_updated, State, Phone');
		$qry = $this->db->get('Patient')->result();

		return $qry;
	}
	function patientCount(){
		$this->db->from('Patient');
		$qry = $this->db->get();
		return $qry->num_rows();
		
	}
	function docTypes(){
		$qry = $this->db->get_where('Doc_Types',array('active' => 1));
		return $qry->result();
	}
	function addPatient($patient){
		//var_dump($patient);
		
		$qry = $this->db->get_where('Patient', array('VirtOXID' => $patient['VirtOXID']));
		
		if(!$qry->num_rows() > 0){
			$data = array('FirstName' => $patient['fname'], 'LastName' => $patient['lname'], 'DOB' => $patient['dob_yr'] . "/" . $patient['dob_month'] . "/". $patient['dob_day'], 'SSN' => $patient['SSN'], 'VirtOXID' => $patient['VirtOXID'], 'ShippingAddress' => $patient['shipping_Addr'], 'City' => $patient['city'], 'State' => $patient['state'], 'Zip' => $patient['zip'], 'Phone' => $patient['phone'], 'Gender' => $patient['gender'], 'Height_feet' => $patient['height_ft'], 'Height_inch' => $patient['height_inch'], 'Weight' => $patient['weight'], 'NeckSize' => $patient['neck'], 'id_Insurance' => $patient['insurance'], 'Insurance_ID' => $patient['ins_id']);
			if(isset($patient['mname'])){
				$data['MiddleInitial'] = $patient['mname'];
			}
			$date = getdate();
			$data['created_date'] = $date['year']."-".$date['mon']."-".$date['yday']." ".$date['hours'].":".$date['minutes'].":".$date['seconds'] ;
			$this->db->insert('Patient',$data);
			
			return $this->db->insert_id();
		}else{
			return false;
		}
		return;
	}
	function getPatient($id){
		$this->db->from('Patient');
		$this->db->join('Insurance', 'Insurance.id = Patient.id_Insurance');
		$this->db->where('Patient.id', $id);
		$qry = $this->db->get();
		if($qry->num_rows() > 0){
			return $qry->result();
		}else{
			return false;
		}
	}
	function getNotes($id){
		$this->db->order_by('date','desc');
		$qry = $this->db->get_where('PatientNotes', array('id_Patient' => $id));
		//if($qry->num_rows() > 0){
			return $qry->result();
		//}else{
		//	return false;
		//}
	}
	function getSymptoms($id){
		$query = "SELECT
		    p.id_Patient,
		    s.id,
		    s.symptom,
			s.active
		FROM Symptoms AS S
		Left OUTER JOIN Patient_Symptoms AS p ON p.id_Symptoms = s.id
		WHERE p.id_Patient = ".$id." OR p.id_Patient IS NULL";
		
		return $this->db->query($query)->result();
		
		
		/*
		$this->db->select('id, symptom');
		$q = $this->db->get_where('Symptoms', array('active' => 1));
		$return['symptom_list'] = $q->result();
		
		$this->db->from('Patient_Symptoms', 'Symptoms');
		$this->db->join('Symptoms', 'Patient_Symptoms.id_Symptoms = Symptoms.id');
		$this->db->where('Patient_Symptoms.id_Patient', $id);
		
		$qry = $this->db->get();
		
		$return['symptoms_observed'] = $qry->result();
		return $return;
	*/
	}
	function updateSymptoms($post){
		$id = $post['id'];
		//var_dump($post);
		
		//get list of active symptoms
		
		
		$this->db->select('id');
		$qry = $this->db->get_where('Symptoms', array('active' => 1))->result();
		foreach($qry as $y){
			$list[$y->id] = false;
		}
		foreach($post as $key =>$s){
			if($s = 'symptom'){
				$list[$key] = true;
			}
		}
		//var_dump($list);
		foreach($list as $key=>$l){
			if($l){
				
				$qry = $this->db->get_where('Patient_Symptoms', array('id_Patient' => $id, 'id_Symptoms' => $key));
				if(!$qry->num_rows() > 0){
					$this->db->insert('Patient_Symptoms',array('id_Patient' => $id, 'id_Symptoms' => $key) );
				}
			}else{
				$qry = $this->db->get_where('Patient_Symptoms', array('id_Patient' => $id, 'id_Symptoms' => $key));
				if($qry->num_rows() > 0){
					$this->db->delete('Patient_Symptoms',array('id_Patient' => $id, 'id_Symptoms' => $key) );
				}
			}
			
		}
		if(isset($post['other'])){
			$qry = $this->db->get_where('Symptoms', array('Symptom' => $other['name']));
			if(!$qry->num_rows() > 0){
				$new_s = $this->db->get_where('Symptoms', array('Symptom' => $other['name']) )->result();
				$qry = $this->db->get_where('Patient_Symptoms', array('id_Patient' => $id, 'id_Symptom' => $new_s->id));
				if(!$qry->num_rows() > 0){
					$this->db->insert('Patient_Symptoms',array('id_Patient' => $id, 'id_Symptoms' => $new_s->id) );
				}
			}else{
				$this->db->insert('Symptoms', array('Symptom' => $other['name'], 'active' => 0));
				$new_s = $this->db->get_where('Symptoms', array('Symptom' => $other['name']) )->result();
				$this->db->insert('Patient_Symptoms', array('id_Patient' => $id, 'id_Symptoms' => $new_s->id));
			}
		}
		
		return true;
	}
	function getIndications(){
		$qry = $this->db->get_where('Indications',array('active' => 1));
		return $qry->result();
	}
	function getStudys($id){
		$query = "SELECT 
					s.date,
					i.indication
					FROM Study AS s
					INNER JOIN Study_Indications AS si ON si.id_study = s.id
					INNER JOIN Indications AS i ON i.id = si.id_Indications
					WHERE s.id_Patient = $id";
		return $this->db->query($query)->result();
	}
	function addStudy($post){
	
		$this->db->insert('Study',array('id_patient' => $post['id']));
		$study_id = $this->db->insert_id();
		
		foreach($post as $key=>$p){
			if($p){
				$this->db->insert('Study_Indications', array('id_Indications' => $key, 'id_Study' => $study_id));
			}
		}
		
		
		return true;
	}
	function getDoctors($id){
		$this->db->select('id_PCP, id_SleepCenter, id_DME, id_Dentist');
		$qry = $this->db->get_where('Patient', array('id' => $id));
		foreach($qry->result() as $q){
			$d = $q;
		}
		if($d->id_PCP){
			$qry2 = $this->db->get_where('PCP', array('id' => $d->id_PCP));
			$return['pcp'] = $qry2->result();
		}else{
			$return['pcp'] = false;
		}
		if($d->id_SleepCenter){
			$qry3 = $this->db->get_where('SleepCenter', array('id' => $d->id_SleepCenter));
			$return['sleepCenter'] = $qry3->result();
		}else{
			$return['sleepCenter'] = false;
		}
		if($d->id_DME){
			$qry4 = $this->db->get_where('DME', array('id' => $d->id_DME));
			$return['dme'] = $qry4->result();
		}else{
			$return['dme'] = false;
		}
		if($d->id_Dentist){
			$qry5 = $this->db->get_where('Dentist', array('id' => $d->id_Dentist));
			$return['dentist'] = $qry5->result();
		}else{
			$return['dentist'] = false;
		}
		
		return $return;
	}
	function changeDoctor($post){
		if($post['doctor_type'] == 'pcp'){
			$qry = $this->db->get_where('PCP', array('EIN' => $post['ein']));
			if(!$qry->num_rows() > 0){
				$data = array('FirstName' => $post['fname'], 'LastName' => $post['lname'], 'NPI' => $post['npi'], 'EIN' => $post['ein']);
				$this->db->insert('PCP',$data);
			}
			$this->db->select('id');
			$r = $this->db->get('PCP')->result();
			foreach($r as $id){
				$pcp_id = $id->id;
			}
		//var_dump($pcp_id);
			$this->db->where('id', $post['id']);
			return $this->db->update('Patient',array('id_PCP' => $pcp_id));
		}
		if($post['doctor_type'] == 'dentist'){
			$qry = $this->db->get_where('Dentist', array('EIN' => $post['ein']));
			if(!$qry->num_rows() > 0){
				$data = array('Name' => $post['name'], 'NPI' => $post['npi'], 'EIN' => $post['ein']);
				$this->db->insert('Dentist',$data);
			}
			$this->db->select('id');
			$r = $this->db->get('Dentist')->result();
			foreach($r as $id){
				$pcp_id = $id->id;
			}
		//var_dump($pcp_id);
			$this->db->where('id', $post['id']);
			return $this->db->update('Patient',array('id_Dentist' => $pcp_id));
		}	
		if($post['doctor_type'] == 'sleepCenter'){
			$qry = $this->db->get_where('SleepCenter', array('EIN' => $post['ein']));
			if(!$qry->num_rows() > 0){
				$data = array('Name' => $post['name'], 'NPI' => $post['npi'], 'EIN' => $post['ein']);
				$this->db->insert('SleepCenter',$data);
			}
			$this->db->select('id');
			$r = $this->db->get('SleepCenter')->result();
			foreach($r as $id){
				$pcp_id = $id->id;
			}
		//var_dump($pcp_id);
			$this->db->where('id', $post['id']);
			return $this->db->update('Patient',array('id_SleepCenter' => $pcp_id));
		}
		if($post['doctor_type'] == 'dme'){
			$qry = $this->db->get_where('DME', array('EIN' => $post['ein']));
			if(!$qry->num_rows() > 0){
				$data = array('Name' => $post['name'], 'NPI' => $post['npi'], 'EIN' => $post['ein']);
				$this->db->insert('DME',$data);
			}
			$this->db->select('id');
			$r = $this->db->get('DME')->result();
			foreach($r as $id){
				$pcp_id = $id->id;
			}
		//var_dump($pcp_id);
			$this->db->where('id', $post['id']);
			return $this->db->update('Patient',array('id_DME' => $pcp_id));
		}
	}
	function addDocument($post, $fileName, $content, $filesize, $fileType){
	
			
			$this->db->insert('Documents', array('id_Patient' =>$post['id'], 'Name' => $fileName, 'content' => $content, 'tags' => $post['tags'], 'title' => $post['title'], 'id_Doc_Types' => $post['doc_type'], 'size' => $filesize, 'type' => $fileType));
			return true;
	}
	function getDocuments($id){
		$qry = $this->db->get_where('Documents', array('id_Patient' => $id));
		return $qry->result();
	}
	function getInsurance(){
		$qry = $this->db->get('Insurance');
		return $qry->result();
	}
	public function getDocument($id){
		//$this->db->join('Doc_Types', 'Doc_Types.id = Documents.id_Doc_Types');
		//$qry = $this->db->get_where('Documents', array('Documents.id' => $id));
		
		$qry = $this->db->get_where('Documents', array('id' => $id));
		return $qry->result();
	}
	public function addPatientNote($ndata){
		//var_dump($ndata);
		
		$this->db->insert('PatientNotes', array('id_Patient' => $ndata['id'], 'Note' => $ndata['patient_note']));
		return true;
	}
}
?>