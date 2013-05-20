<?php
class App_model extends CI_Model{
//This is where the app data access will be located.

	function validateUser($username, $password){
		$qry = $this->db->get_where('User', array('username' => $username, 'pass' => $password));
		if($qry->num_rows() > 0){
				return $qry->result();

		}else{
			return false;
		}
	}

}
?>