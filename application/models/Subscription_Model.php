<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription_Model  extends CI_Model {

   /* To get get_brand data   */ 
  public function get_user_categories($user=NULL){
	 $this->db->select('uc.id,category');
	 $this->db->from('category uc');		
     $this->db->join('subscribe_category sc', 'uc.id = sc.entity_id'); 
	 $this->db->where('entity_type','category');
	 if($user != NULL)  {
	  $this->db->where('user_id',$user);
	 }
     $query = $this->db->get();
	 $res = '';
	 if($query->result_array()){
      foreach($query->result_array() as $row){
	  $res .= '<li><a id="'.$row['id'].'" class="lists" data-related="'.$row['id'].'" onclick="multiplecat('.$row['id'].')">'.ucwords(strtolower($row['category'])).'</a></li>';
     }
     return $res;
	 }else{
    return FALSE;
    }
}
/* To get get_brand data   */ 
  public function get_user_brands($category = null,$user = null){
	$this->db->select('ub.id,brand,ub.category');
	$this->db->from('brand ub');	
	$this->db->join('subscribe_category sc', 'ub.id = sc.entity_id'); 
	$this->db->join('category uc', 'ub.category = uc.id');
	$this->db->where('entity_type','brand');
	if($user != NULL) {
	$this->db->where('user_id',$user);
	}
	if($category != NULL)   {
	  $this->db->where_in('ub.category', $category);
	}
	$this->db->order_by('brand', 'asc');
	$query  = $this->db->get();
	$res = '';
	if($query->result_array()){
		foreach($query->result_array() as $row){
		$res .= '<li><a id="'.$row['id'].'" data-related="'.$row['category'].'" class="lists"  onclick="multipleids('.$row['id'].')" >'.$row['brand'].'</a> </li>';
			
		}
	return $res;
	}else{
     return FALSE;
    }
   }
  public function get_user_sites($brand = null,$user = null) {
	//$data[''] = 'All Urls';
    $this->db->select('uu.id,name,uu.brand');
	$this->db->from('site uu');	
	$this->db->join('subscribe_category sc', 'uu.id = sc.entity_id'); 
	$this->db->join('brand ub', 'uu.brand = ub.id');
	$this->db->where('entity_type','site');
    if($user != NULL)   {
     $this->db->where('user_id',$user);
    }
	if($brand != NULL)   {
	  $this->db->where_in('uu.brand', $brand);
	}
    $this->db->order_by('name', 'asc'); 
    $query = $this->db->get(); 
	
	$res = '';
	if($query->result_array()){
    foreach($query->result_array() as $row){
		//$data[$row['brand']][] = array('Value'=>$row['id'], 'Text'=>$row['name']);
		$res .= '<li><a id="'.$row['id'].'" data-related="'.$row['brand'].'" class="lists"  onclick="multiplesites('.$row['id'].')">'.$row['name'].'</a></li>';

    }
	return $res;
	}else{
   return FALSE;
   }
  }
  /* To get get_brand data   */ 
  public function get_user_solutions($user = null){

		$this->db->select('sl.id,team');
		$this->db->from('solution sl');	
		$this->db->join('subscribe_solution ss', 'sl.id = ss.solution_id'); 
		if($user != NULL) {
		 $this->db->where('user_id',$user);
		}
		$this->db->order_by('team', 'asc'); 
		$this->db->group_by('sl.id'); 
		$query  = $this->db->get();
		$res = '';
		if($query->result_array()){
		foreach($query->result_array() as $row){
			//$data[$row['id']] = $row['team'];
			$res .= '<li><a id="'.$row['id'].'"  class="lists" data-related="'.$row['id'].'"  onclick="multiplesolutions('.$row['id'].')">'.$row['team'].'</a></li>';
		}
		return $res;
		}else{
	   return FALSE;
	  }
   }
    /* To get get_brand data   */ 
  public function get_user_communications($solution = null,$user = null){

		//$data[''] = 'All';
		$this->db->select('cn.id,type');
		$this->db->from('communication cn');	
		$this->db->join('subscribe_solution ss', 'cn.id = ss.commu_type_id'); 
		$this->db->join('solution us', 'ss.solution_id = us.id');
		if($user != NULL){
		 $this->db->where('user_id',$user);
		}
		if($solution != NULL)   {
	     $this->db->where_in('ss.solution_id', $solution);
	     }
		$this->db->order_by('type', 'asc'); 
		$this->db->group_by('type'); 
		$query  = $this->db->get();
		$res = '';
		if($query->result_array()){
		foreach($query->result_array() as $row){
			$res .= '<li><a id="'.$row['id'].'"  class="lists" data-related="'.$row['type'].'"   onclick="multiplecoms('.$row['id'].')">'.$row['type'].'</a></li>';
		}
		return $res;
		}else{
	   return FALSE;
	  }
   }
   
 /* To get get_category data used on category page  */ 
 public function get_category($user=NULL){
	$this->db->select('id,category');
	$this->db->order_by('category', 'asc');
    $query  = $this->db->get('category');
	$res = '';
	if($query->result_array()){
    foreach($query->result_array() as $row){
        //$data[$row['id']] =  ucwords(strtolower($row['category'])); 
	  $res .= '<li><a id="'.$row['id'].'" class="lists" data-related="'.$row['id'].'" onclick="multiplecat('.$row['id'].')">'.ucwords(strtolower($row['category'])).'</a></li>';
					
    }
    return $res;
	}else{
   return FALSE;
  }
}
/* To get get_brand data  on category page   */ 
  public function get_brands($category_ids = null){

		//$data[''] = 'All Brands';
		$this->db->select('id,brand,category');
		//$this->db->where('category', $category);
		$this->db->where_in('category', $category_ids);
		$this->db->order_by('brand', 'asc');
		$query  = $this->db->get('brand');
		$res1 = '';
		if($query->result_array()){
		foreach($query->result_array() as $row){
			//$data[$row['category']][] = array('Value'=>$row['id'], 'Text'=>ucwords($row['brand']));
		//$name = $this->get_category_name($row['category']);
		$res1 .= '<li><a id="'.$row['id'].'" data-related="'.$row['category'].'" class="lists"  onclick="multipleids('.$row['id'].')" >'.$row['brand'].'</a> </li>';
			
		}
		return $res1;
		}else{
	   return FALSE;
	  }
   }
  
/* To get get_brand data  on category page   */ 
  public function get_sites($brand = null) {
	//$data[''] = 'All Urls';
    $this->db->select('id,tpid,name,brand');
	$this->db->where_in('brand', $brand);
    $this->db->order_by('name', 'asc'); 
    $query = $this->db->get('site'); 
	$res = '';
	if($query->result_array()){
    foreach($query->result_array() as $row){
		//$data[$row['brand']][] = array('Value'=>$row['id'], 'Text'=>$row['name']);
		$res .= '<li><a id="'.$row['id'].'" data-related="'.$row['brand'].'" class="data-section lists"  onclick="multiplesites('.$row['id'].')">'.$row['name'].'</a></li>';

    }
	return $res;
	}else{
   return FALSE;
   }
  }
   public function get_child_data($table,$column = null,$where = null) {
	//$data[''] = 'All Urls';
    $this->db->select($column);
	if($where != NULL) {
	 $this->db->where($where);
	 }
    $this->db->order_by('id', 'asc'); 
    $query = $this->db->get($table); 
	$res = '';
	if($query->result_array()){
    foreach($query->result_array() as $row){
	  $data[$row[$column]] = $row[$column];
     }
	return $data;
	}else{
   return FALSE;
   }
  }
   public function get_category_name($category=NULL){
	$this->db->select('id,category');
	 $this->db->where('id',$category);
	$this->db->order_by('category', 'asc');
    $query  = $this->db->get('category');
	if($query->result_array()){
		$res = $query->result_array();
	}
	//print_r(	$res);
	return $res[0];
  }
   public function get_brand_name($brand=NULL){
	$this->db->select('brand,ct.category as category');
	$this->db->from('brand bn');	
	$this->db->join('category ct', 'bn.category = ct.id'); 
	$this->db->where('bn.id',$brand);
	
    $query  = $this->db->get();
	if($query->result_array()){
		$res = $query->result_array();
	}
	//print_r(	$res);
	return $res[0];
  }
  /* To get get_solutions data used on solution page  */ 
  public function get_solutions($team = null){
		//$data[''] = 'All Team';
		$this->db->select('id,team');
		//$this->db->where('category', $team);
		$query  = $this->db->get('solution');
		$res = '';
		if($query->result_array()){
		foreach($query->result_array() as $row){
			//$data[$row['id']] = $row['team'];
			$res .= '<li><a id="'.$row['id'].'"  class="lists" data-related="'.$row['id'].'"  onclick="multiplesolutions('.$row['id'].')">'.$row['team'].'</a></li>';
		}
		return $res;
		}else{
	   return FALSE;
	  }
   }
  /* To get get_brand data on solution page   */ 
  public function get_communication($team = null){

		//$data[''] = 'All';
		$this->db->select('id,type');
		//$this->db->where('category', $team);
		$query  = $this->db->get('communication');
		$res = '';
		if($query->result_array()){
		foreach($query->result_array() as $row){
			//$data[$row['id']] = $row['type'];
			$res .= '<li><a id="'.$row['id'].'"  class="lists" data-related="'.$row['type'].'"   onclick="multiplecoms('.$row['id'].')">'.$row['type'].'</a></li>';
		}
		return $res;
		}else{
	   return FALSE;
	  }
   }
    /* To get get_brand data on solution page   */ 
  public function get_communication_ids($team = null){
	   $this->db->select('id,type');
		$query  = $this->db->get('communication');
		$res = '';
		if($query->result_array()){
		foreach($query->result_array() as $row){
			$data[] = $row['id'];
		}
		return $data;
		}else{
	   return FALSE;
	  }
   }
   /* To get get_category data used on category page  */ 
 public function get_all_users($user=NULL){
	$this->db->select('id,email');
	$this->db->order_by('email', 'asc');
    $query  = $this->db->get('users');
	if($query->result_array()){
    foreach($query->result_array() as $row){
       $data[$row['id']] =  $row['email']; 
				
    }
    return $data;
	}else{
   return FALSE;
  }
}
  /* To get get_category data used on category page  */ 
 public function user_exist($user=NULL) {
	$this->db->select('id,email');
	if($user != NULL) 	{
		 $this->db->where('email',$user);
	}
    $query  = $this->db->get('users');
	if($query->result_array()){
    foreach($query->result_array() as $row){
       $data =  $row['id']; 
    }
    return $data;
	}else{
    return FALSE;
    }
   }
   /* To do insert category subscribe data to DB */
   public function insert_user($data) {
    $this->db->insert('users', $data);
    $last_id = $this->db->insert_id();
    return $last_id;
  }
  
 
   /* Insert excell data to DB for the form fields*/
   /* To do insert data to DB */
   public function insert_data($table,$data) {
    $this->db->insert($table, $data);
    $last_id = $this->db->insert_id();
    return $last_id;
   }
      /* To do delete data to DB */
    public function delete_data($table,$where) {
	if($where != NULL) {
	 $this->db->where($where);
	}
    $this->db->delete($table);
	return $this->db->affected_rows();
   }
   public function check_id_exist($table,$columns,$where){
     $this->db->select($columns);
     if($where != NULL)   {
	   $this->db->where($where);
	 }
    $query = $this->db->get($table);
	$data = $query->result_array();
	//print_r($data);
	$return = (!empty( $data[0]))? $data[0]:'';
    return $return;
   }

   public function check_importid_exist($table,$wherecol, $whereval){
   $this->db->select('id');
     if($wherecol != NULL)  {
	   $this->db->where($wherecol,$whereval);
	 }
     $query = $this->db->get($table);
	 if($query->result_array()){
     foreach($query->result_array() as $row){
       $data =  $row['id']; 
       }
      return $data;
	 }else{
      return FALSE;
     }
   }
     /* Insert excell data to DB for the form fields*/
}