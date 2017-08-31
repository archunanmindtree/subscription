<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct() {        
		parent::__construct();
		
	}
		
	public function index()
	{
		$user = $this->session->userdata('user');
		//$user = $this->session->all_userdata();
		//print '<pre>';print_r($_SERVER);exit;
		if (!empty($user))
		{
			$this->session->set_userdata('showNotice','1');
			redirect(base_url().'dashboard', 'refresh');
			exit;
		}
		
		if (isset($_POST['uname']))
		{	
			//die($_POST['uname']);
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('uname', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('pwd', 'Password', 'trim|required|xss_clean|callback_check_database');
			
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['error'] = 'Username or Password did not match';
				$this->load->view('login.php',$data);
			}
			else
			{
				$this->session->set_userdata('showNotice','1');
				$redirect_URL = $_GET['redirect'];
				
				$this->load->model('user_model','',TRUE);
				$this->user_model->setLogin($_POST['uname']);
				
				if (isset($redirect_URL) && $redirect_URL!='')
				{
					redirect(base_url($redirect_URL), 'refresh');
				}
				else
				{
					redirect(base_url().'dashboard', 'refresh');
				}
			}
		}
		else
		{
			$this->load->view('login.php');
		}
		
	}
	
	
	public function check_database($password)
	{
		$username = $this->input->post('uname');
		$this->load->model('user_model','',TRUE);
				
		
		$userData = $this->user_model->isValidUser($username,$password);
		//print_r($userData);exit;
		if ($userData['isValidUser'])
		{
			$remeber = $this->input->post('remem');
			if(!$remeber)
			{
				$this->session->sess_expire_on_close = TRUE;
			}
			else
			{
				$this->config->set_item('sess_expiration',0); 
			}
			$session_data = $userData;
			
			$this->session->set_userdata($session_data);
			
			return true;
		}
		
		return false;
	   
	}
	 
	 /*public function logout()
	 {
		$unset_array = array('user' => '');
		$this->session->unset_userdata($unset_array);
		redirect(base_url(), 'refresh');
	 }*/
	 
	 /**
	 *
	 *
	 **/
	 public function logOut ($mid){
		$this->load->library("Utilities");
		$data = $this->utilities->deleteallsession();
		$this->load->model('user_model','',TRUE);
		if($this->user_model->logOutAction($mid) > 0){
			redirect(base_url());
		}
	 }
	
}
