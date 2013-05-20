<?php
class Admin_model extends CI_Model{
//This is where the admin data access will be located.
	function userCount(){
		$this->db->from('User');
		$qry = $this->db->get();
		return $qry->num_rows();
	}
	function patientCount(){
		$this->db->from('Patient');
		$qry = $this->db->get();
		return $qry->num_rows();
		
	}
	function documentCount(){
		$this->db->from('Documents');
		$qry = $this->db->get();
		return $qry->num_rows();
	}
	function listUsers(){
		$this->db->select('id, username, status, role');
		$qry = $this->db->get('User')->result();

	
		return $qry;
	}
	function getUser($id){
		$qry = $this->db->get_where('User', array('id' => $id));
		
		if($qry->num_rows() > 0){
			
			
			return $qry->result();
		}else{
			return false;
		}
	}
	function enableUser($id){
		$qry = $this->db->get_where('User', array('id' => $id));
		
		if($qry->num_rows() > 0){
			$data = array('id' => $id, 'status' => 1);
			$this->db->where('id',$id);
			$this->db->update('User',$data);
			return true;
		}else{
			return false;
		}
	}
	function disableUser($id){
		$qry = $this->db->get_where('User', array('id' => $id));
		
		if($qry->num_rows() > 0){
			$data = array( 'status' => 0);
			$this->db->where('id',$id);
			$this->db->update('User',$data);
			return true;
		}else{
			return false;
		}
	}
	function setPassword($id,$password){
		
	}
	function newUser($name, $password, $role, $status){
		//does user exist?
		
		$qry = $this->db->get_where('User', array('username' => $name));
		
	
		if(!$qry->num_rows() > 0){
			$data = array('username' => $name, 'pass' => $password, 'role' => $role, 'status' => $status);
			$this->db->insert('User',$data);
			return true;
		}else{
			return false;
		}
		
	}
	function updateUser($name, $password, $role, $status){
		//does user exist?
		
		$qry = $this->db->get_where('User', array('username' => $name));
		
	
		if($qry->num_rows() > 0){
			
			$data = array('role' => $role, 'status' => $status);
			if(!$password == null){
				$data['pass'] = $password;
			}
			$this->db->where('username', $name);
			$this->db->update('User',$data);
			return true;
		}else{
			return false;
		}
		
	}
}
?>