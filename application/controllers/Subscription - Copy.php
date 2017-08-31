<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Controller {

    /**
     * Constructor
     */
    function __construct()     {
        parent::__construct();
		//load the user session data to all the funtions and views tpls
	   $data['userdata'] = $this->session->all_userdata();
				//print_r(	$data['userdata']);
		if (empty($data['userdata']['id']))
		{
			$curr_URL = urlencode($_SERVER['REQUEST_URI']);
			//redirect(base_url('login?redirect='.$curr_URL), 'refresh');
			//exit;
		}
         $this->load->model('Subscription_Model');
		 $this->load->helper('form');
		 //$this->load->helper('url');
		 $this->load->library('breadcrumbs');
		
    }
	function common_include($title,$breadcrumb)
	{ 
	    $data['title'] = ($title)?$title:'subscription';
		$data['breadcrumb'] = ($breadcrumb)?$breadcrumb:'subscription';
		$user_data = $this->session->all_userdata();
     	$data['userdata'] = (!empty($user_data))? $user_data:array();
		$this->load->view('common/header',$data); 
	}	
 /* Get URLs from Brand id Output json format */
    public function get_sites() {
	$brand = explode(",",$this->input->post('brand_id'));
    header('Content-Type: application/x-json; charset=utf-8');
    echo(json_encode($this->Subscription_Model->get_sites($brand)));
  }
  /* Get Brand from category id Output json format */
   public function get_brands() {
    $category = explode(",",$this->input->post('category'));
    header('Content-Type: application/x-json; charset=utf-8');
    echo(json_encode($this->Subscription_Model->get_brands($category)));
  }
	 /**
     * subscribe by hirarcy category/brand/site
     */
    public function index()  {
        // setup page header data
		$data['content'] = "";
		$title =  "My Subscriptions";
		$data['subscribe'] =  "";	
		 /* Bread crum */
		// add breadcrumb with Base Site URL (add without index.php in the url)
		$this->breadcrumbs->push('My Subscription', '/subscription');
		// unshift crumb with Base Site URL (add without index.php in the url)
		$this->breadcrumbs->unshift('Home', '/');
	    $bread  = $this->breadcrumbs->show();
		$this->common_include($title,$bread ); 
		$user_data = $this->session->all_userdata();
	    $user_id = (!empty($user_data['id']))?$user_data['id']:1;
        $category_list = $this->Subscription_Model->get_user_categories($user_id);
		$data['categories'] =$category_list;
		$brand_list = $this->Subscription_Model->get_user_brands($user_id);
		$data['brands'] =$brand_list;
		$site_list = $this->Subscription_Model->get_user_sites($user_id);
		$data['sites'] =$site_list;
		$solution_list = $this->Subscription_Model->get_user_solutions($user_id);
		$data['solutions'] =$solution_list;
		$communication_list = $this->Subscription_Model->get_user_communications($user_id);
		$data['communications'] =$communication_list;
		
		$this->load->view('subscription/mysubscription', $data);
		$this->load->view('common/footer'); 

    }
	                           
    /**
     * subscribe by hirarcy category/brand/site
     */
   public function category()  {
        // setup page header data
		$data['content'] = "";
		$title  =  "Subscribe By Category";
		// add breadcrumb with Base Site URL (add without index.php in the url)
		//$this->breadcrumbs->push('Subscription', '/subscription');
		$this->breadcrumbs->push('Category', '/category');
		// unshift crumb with Base Site URL (add without index.php in the url)
		$this->breadcrumbs->unshift('Home', '/');
	    $bread  = $this->breadcrumbs->show();
		$this->common_include($title,$bread ); 
		$category_list = $this->Subscription_Model->get_category($user=null);
		$data['categories'] =$category_list;
		$brand_list = $this->Subscription_Model->get_brands($user=null);
		//print_r(	$brand_list);
		$data['brands'] =$brand_list;
		$site_list = $this->Subscription_Model->get_sites($user=null);
		$data['sites'] =$site_list;
		$this->load->view('subscription/category', $data);
		$this->load->view('common/footer'); 
       
    }
	 /**
     * subscribe by solution/platform 
     */
  public function solution()   {
        // setup page header data
		$data['content'] = "";
		$title =  "Subscribe By Solution";
		// add breadcrumb with Base Site URL (add without index.php in the url)
		//$this->breadcrumbs->push('Subscription', '/subscription');
		$this->breadcrumbs->push('Solution', '/solution');
		// unshift crumb with Base Site URL (add without index.php in the url)
		$this->breadcrumbs->unshift('Home', '/');
	    $bread  = $this->breadcrumbs->show();
        $this->common_include($title, $bread);  
		$team_list = $this->Subscription_Model->get_solutions();
		$com_list = $this->Subscription_Model->get_communication();
		$data['solutions'] =$team_list;
		$data['com_list'] =$com_list;
		$this->load->view('subscription/solution', $data);
		$this->load->view('common/footer'); 
   }
   
    /**
     * subscribe by solution/admin 
     */
  public function admin()   {
        // setup page header data
		$data['content'] = "";
		$title =  "Admin Interface";
	
		$this->breadcrumbs->push('Admin', '/admin');
		
		$this->breadcrumbs->unshift('Home', '/');
	    $bread  = $this->breadcrumbs->show();
        $this->common_include($title, $bread);  
		
		$category_list = $this->Subscription_Model->get_category($user=null);
		$data['categories'] =$category_list;
		$brand_list = $this->Subscription_Model->get_brands($user=null);
		//print_r(	$brand_list);
		$data['brands'] =$brand_list;
		
		$site_list = $this->Subscription_Model->get_sites($user=null);
		$data['sites'] =$site_list;
		
		$user_list = $this->Subscription_Model->get_all_users($user=null);
		$data['users'] =$user_list;
		
		$this->load->view('subscription/admin_page', $data);
		$this->load->view('common/footer'); 
   }
  
  /* Get Brand from category id Output json format */
  public function submit() {
	$user_id ='';
    $categories = $this->input->post('category');
	$brands = $this->input->post('brand');
	$sites = $this->input->post('site');
	$solutions = $this->input->post('solution');
	$communications = $this->input->post('communication');
	$email = $this->input->post('email_address');
	$user_id = $this->Subscription_Model->user_exist($email );
	if(empty($user_id)){
	  $user_data = array('email'=> $email, 'is_admin'=> '0','is_active' =>'1');
	  $user_id = $this->Subscription_Model->insert_user($user_data );	
	}	
	//echo $user_id exit;
	$user_data = $this->session->all_userdata();
	$user_id = (!empty($user_data['id']))?$user_data['id']:	$user_id;
	
	if($categories) {
	foreach($categories as $key=>$val)	{
	 $column = "id"; $where = "category =$val";
	 $child_brand[$val] = $this->Subscription_Model->get_child_data('brand', $column,$where);
	}
   }
   foreach($child_brand as $key=>$val) {
	    foreach($brands as $bkey=>$bval)	{
          if (in_array($bval, $val)) {
			 unset($child_brand[$key]);
			 $child_brand[$key][] = $bval;
		  }
     }	   
   }  
   if($child_brand) {
	foreach($child_brand as $key=>$topval)	{
		foreach($topval as $ckey=>$cval)	{	
		 $column = "id"; $where = "brand =$cval";
		 $child_site[$key][$cval] = $this->Subscription_Model->get_child_data('site', $column,$where);
		}
	}
   }
   foreach($child_site as $key=>$val) {
	    foreach($val as $bkey=>$bval)	{
	     foreach($sites as $ckey=>$cval)	{
          if (in_array($cval, $bval)) {
			 unset($child_site[$key]);
			 $child_site[$key][$bkey][] = $cval;
		  }
		}
     }	   
   }     
    print_r($child_site);	exit;

	
	$types = array('category','brand', 'site', 'team','communication');
	$table_category = "subscribe_category"; $column = "entity_id";
	
	if($sites) {	
	foreach($sites as $key=>$val) {
					
					$where =  " entity_id= $val AND entity_type = 'site'  AND user_id = $user_id";
					$data_exist = $this->Subscription_Model->check_id_exist($table_category,$column,$where);
					$data = array('entity_id'=> $val, 'entity_type'=> 'site','user_id' => $user_id);
				    if(empty($data_exist[$column]))
 					 $status = $this->Subscription_Model->insert_data($table_category,$data);
				}	
	}
	if($brands) {
		 foreach($brands as $key=>$val)	{
					$where =  " entity_id= $val AND entity_type = 'brand'  AND user_id = $user_id";
					$data_exist = $this->Subscription_Model->check_id_exist($table_category,$column,$where);
					$data = array('entity_id'=> $val, 'entity_type'=> 'brand','user_id' => $user_id);
					if(empty($data_exist[$column]))
					$status = $this->Subscription_Model->insert_data($table_category,$data);
		   }
	}
	if($categories) {
	     foreach($categories as $key=>$val)	{
			     $where =  " entity_id= $val AND entity_type = 'category'  AND user_id = $user_id";
			     $data_exist = $this->Subscription_Model->check_id_exist($table_category,$column,$where);
				 $data = array('entity_id'=>$val, 'entity_type'=> 'category','user_id' => $user_id);
				 if(empty($data_exist[$column]))
				  $status = $this->Subscription_Model->insert_data($table_category,$data);
					
		}
	}
  $table = "subscribe_solution"; 
  if($solutions || $communications) {
	  foreach($solutions as $key=>$val) {
					$data = array('solution_id'=> $val, 'commu_type_id'=> $communications[$key],'user_id' => $user_id);
					//$data_exist = $this->Subscription_Model->check_id_exist($table,$column,$data);
				   // if(empty($data_exist[$column]))
					$status = $this->Subscription_Model->insert_data($table,$data);
				}	
	}
  /* if($communications) {	
	foreach($communications as $key=>$val) {
					$data = array('commu_type_id'=> $val,'user_id' => $user_id);
					$status = $this->Subscription_Model->insert_subscribe_solution($data);
				}	
	}
*/
    echo json_encode(array("status" => $status));
  }
  public function unsubscribe() {
	$categories = $this->input->post('category');
	$brands = $this->input->post('brand');
	$sites = $this->input->post('site');
	$solutions = $this->input->post('solution');
	$communications = $this->input->post('communication');
	$email = $this->input->post('email_address');
	$user_id = $this->Subscription_Model->user_exist($email );
	if(empty($user_id)){
	  $user_data = array('email'=> $email, 'is_admin'=> '0','is_active' =>'1');
	  $user_id = $this->Subscription_Model->insert_user($user_data );	
	}	
	//echo $user_id exit;
	$user_data = $this->session->all_userdata();
	$user_id = (!empty($user_data['id']))?$user_data['id']:	$user_id;
	$table = "subscribe_category";
   if($sites) {	
	foreach($sites as $key=>$val) {
					$where =  " entity_id= $val AND entity_type = 'site'  AND user_id = $user_id";
					$status = $this->Subscription_Model->delete_data($table,$where);
				}	
	}
	if($brands) {
		 foreach($brands as $key=>$val)	{
						
						$where =  " entity_id= $val AND entity_type = 'brand'  AND user_id = $user_id";
						$status = $this->Subscription_Model->delete_data($table,$where);
		   }
	}
   if($categories) {
		 //print_r($categories);
	     foreach($categories as $key=>$val)	{
					 $where =  " entity_id= $val AND entity_type = 'category'  AND user_id  = $user_id";
					$status = $this->Subscription_Model->delete_data($table,$where);
		}
	}
   $table = "subscribe_solution"; 
   if($solutions || $communications) {
	  foreach($solutions as $key=>$val) {
					$where =  " solution_id= $val OR commu_type_id = '$communications[$key]' AND user_id = $user_id";
					$status = $this->Subscription_Model->delete_data($table,$where);
			}	
	}
	echo json_encode(array("status" => $status));  
  } 
  
  

  /* Excell data import to DB */
public function list_import() {
   $import = $this->input->post('import');
	 //$this->load->helper('url');   
     $email ='';
	
   if($import)	{
			$this->load->library('excel'); 
            $config['upload_path'] = '../public/data/';
			$config['allowed_types'] = 'xls|xlsx';
			$config['file_name'] = 'list_data.xlsx';
			$config['overwrite'] = TRUE;
            $config['remove_spaces']= TRUE;

			$this->load->library('upload', $config);
    		if (!$this->upload->do_upload('excel_file'))
			{
			  $error = array('error' => $this->upload->display_errors());
			  var_dump($error);
			   $status =0;
             }
			else{
			  $file_data =  $this->upload->data();
			  echo "Uploaded the excell";
			  $status =1;
			 }
		   $file_path =  $file_data['full_path']; 
           $objPHPExcel = PHPExcel_IOFactory::load($file_path);
           $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();

          foreach ($cell_collection as $cell) {
            $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
            $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
            $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
            //header will/should be in row 1 only. of course this can be modified to suit your need.
            if ($row == 1) {
                $header[$row][$column] = $data_value;
            } else {
				if($data_value!="")$data_value = $data_value;
                $arr_data[$row][$column] = $data_value;
            }
		  }
		 //  log_message("read data from excell",count($arr_data));
           // print "<pre>";print_r($arr_data);exit;
			foreach($arr_data as $row) 	{
			$category = $brand ='';$table_category = "subscribe_category"; $column = "entity_id";

			if(!empty($row['A']) && $row['A']) $category_name  = strtolower($row['A']);
			if(!empty($row['B']) && $row['B']) $brand_name =  strtolower($row['B']);
			if(!empty($row['C']) && $row['C']) $site_name =   strtolower($row['C']); 
			if(!empty($row['D']) && $row['D']) $email =   (!empty($row['D']))?$row['D']:'';
			//echo "ssds". $email ;
			$user_id = $this->Subscription_Model->user_exist($email );
			if(empty($user_id)){
			  $user_data = array('email'=> $email, 'is_admin'=> '0','is_active' =>'1');
			  $user_id = $this->Subscription_Model->insert_user($user_data );	
			}				
		    if(!empty($row['D']))	{	
			$category_eid = $this->Subscription_Model->check_importid_exist('category','category',$category_name);
			$brand_eid = $this->Subscription_Model->check_importid_exist('brand','brand',$brand_name);
			$site_eid = $this->Subscription_Model->check_importid_exist('site','name',$site_name);
			$table = "subscribe_category";
			if($site_eid && $user_id) {	
			      $where =  " entity_id= $site_eid AND entity_type = 'site'  AND user_id = $user_id";
					$data_exist = $this->Subscription_Model->check_id_exist($table_category,$column,$where);
					$data = array('entity_id'=> $site_eid, 'entity_type'=> 'site','user_id' => $user_id);
				    if(empty($data_exist[$column]))
 			       $status = $this->Subscription_Model->insert_data($table,$data);
			}	
			if($brand_eid && $user_id) {
			       $where =  " entity_id= $brand_eid AND entity_type = 'brand'  AND user_id = $user_id";
					$data_exist = $this->Subscription_Model->check_id_exist($table_category,$column,$where);
					$data = array('entity_id'=> $brand_eid, 'entity_type'=> 'brand','user_id' => $user_id);
					if(empty($data_exist[$column]))
			   $status = $this->Subscription_Model->insert_data($table,$data);
			}
			if($category_eid && $user_id) {
		         $where =  " entity_id= $category_eid AND entity_type = 'category'  AND user_id = $user_id";
			     $data_exist = $this->Subscription_Model->check_id_exist($table_category,$column,$where);
				 $data = array('entity_id'=>$category_eid, 'entity_type'=> 'category','user_id' => $user_id);
				 if(empty($data_exist[$column]))
			    $status = $this->Subscription_Model->insert_data($table,$data);
            }
		  }	
        }
		//$status =1;
		echo json_encode(array( $status));  
		//echo "Test";
		//redirect(base_url().'subscription/index');
    } 
  } 
  
   /* Excell data import to DB */
public function export() {
   $export = $this->input->post('export');
   
	 //$this->load->helper('url');   
     $email ='';$table_name ='';
	
   if($export)	{
			$this->load->library('excel'); 
           // Starting the PHPExcel library
		   
		   $categories = $this->input->post('category');
	       $brands = $this->input->post('brand');
	       $sites = $this->input->post('site');
		   
	       $query = $this->db->get($table_name);
           if(!$query)
            return false;
        
			$this->load->library('PHPExcel/IOFactory');
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->getProperties()->setTitle("export")->setDescription("none");
			$objPHPExcel->setActiveSheetIndex(0);
			// Field names in the first row
			$fields = $query->list_fields();
			$col = 0;
			foreach ($fields as $field)
			{
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
				$col++;
			}
		 // log_message("read data from excell",count($arr_data));
         // print "<pre>";print_r($arr_data);exit;
		 // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
				
                $col++;
            }
            $row++;
        }
        $objPHPExcel->setActiveSheetIndex(0);
        $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="list_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
        $objWriter->save('php://output');
		//redirect(base_url().'subscription/index');
    } 
  } 
  
  
  public function category_import()   {
	      $this->load->library("Excel");
		  
	      $file_path =  '../public/data/category.xlsx';
	      $objPHPExcel = PHPExcel_IOFactory::load($file_path);
          $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();

          foreach ($cell_collection as $cell) {
            $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
            $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
            $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
            //header will/should be in row 1 only. of course this can be modified to suit your need.
            if ($row == 1) {
                $header[$row][$column] = $data_value;
            } else {
				if($data_value!="")$data_value = $data_value;
                $arr_data[$row][$column] = $data_value;
            }
		  }
		 //  log_message("read data from excell",count($arr_data));
           // print_r($arr_data);exit;
			foreach($arr_data as $row) 	{
			$category = $brand ='';

			if($row['A']) $category_name  = strtolower($row['A']);
			if($row['B']) $brand_name =  strtolower($row['B']);
			if($row['C']) $site_name =   strtolower($row['C']); 
            if(!empty($category_name))
			$cat_data = array('category'=>  $category_name);
			$category_eid = $this->Subscription_Model->check_importid_exist('category','category',$category_name);
			$brand_eid = $this->Subscription_Model->check_importid_exist('brand','brand',$brand_name);
			$site_eid = $this->Subscription_Model->check_importid_exist('site','name',$site_name);

			if($category_eid) {
			$cat_id = $category_eid;
			}else
			$cat_id = $this->Subscription_Model->insert_data('category',$cat_data);
            if(!empty($brand_name))
			$brand_data = array('brand'=>  $brand_name,'category'=>  $cat_id);
			if($brand_eid) {
			$brand_id = $brand_eid;
			}else
			$brand_id = $this->Subscription_Model->insert_data('brand',$brand_data);
		    if(!empty($site_name))
			$url_data = array('name'=>  $site_name,'brand'=>  $brand_id);
			if($site_eid) {
			$url_id = $site_eid;
			}else
			$url_id = $this->Subscription_Model->insert_data('site',$url_data);
			}
			echo "Data imported to DB";
  }
}