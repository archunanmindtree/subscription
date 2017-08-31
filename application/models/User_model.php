<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	
	 function isValidUser($email, $password)
	 {
	   $this -> db -> select('id,username,email,is_admin');
	   $this -> db -> from('users');
	   $this -> db -> where('username', $email);
	   //$this -> db -> where('is_active != "0"');
	   $this -> db -> where('password', md5($password));
	   $this -> db -> limit(1);
       $query = $this -> db -> get();

	    if($query -> num_rows() == 1)
	   {
		
		 $result =  $query->result_array();
		 $result = $result[0];
		 $result['isValidUser'] = true;
	   }
	   else
	   {
		 $result['isValidUser'] = false;
	   }
	   return $result;
	
   }
   
   public function setLogin($mid){
		//$this->load->library('Utilities');
		$updateTime  = date('Y-m-d H:i:s');
		$data = array('last_login' => $updateTime);
		$this->db->update('users', $data, "id = '".$mid."'");
		
	}
    
}