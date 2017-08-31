<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	
  
	public function index()
	{   
	    $title =  "Subscription System";
		$data['message'] =  "";	
		$this->load->library('breadcrumbs');
		$this->breadcrumbs->push('Home', '/');
	    $bread  = $this->breadcrumbs->show();
		$this->common_include($title,$bread ); 
		$this->load->view('welcome', $data);
		$this->load->view('common/footer'); 
	}
	function common_include($title,$breadcrumb)
	{
		$data['title'] = ($title)?$title:'subscription';
		$data['breadcrumb'] = "Home";//($breadcrumb)?$breadcrumb:'Home';
		$user_data = $this->session->all_userdata();
     	$data['userdata'] = (!empty($user_data))? $user_data:array();
		$this->load->view('common/header',$data); 
	}	
}
