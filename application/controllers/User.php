<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  function __construct()     {
        parent::__construct();
		//load the user session data to all the funtions and views tpls
	     $data['userdata'] = $this->session->all_userdata();
	
         $this->load->model('User_Model');
		 //$this->load->helper('form');
    }
   function common_include()
	{ 
	    $data['title'] =  "Login";
		$user_data = $this->session->all_userdata();
     	$data['userdata'] = (!empty($user_data))? $user_data:array();
		$this->load->view('common/header',$data); 
	}	
    /**
     * Validate login credentials
     */
    public function login()     {
       $this->common_include(); 
       // load views
       $this->load->view('user/login');
	   $this->load->view('common/footer'); 
     
    }
	public function verify_login()  {
	    $username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
	    $userData = $this->User_Model->isValidUser($username,$password);
		
	   // print_r($userData);exit;
		if($userData['isValidUser'])
		{
			   $session_data = $userData;
			
			   $this->session->set_userdata($session_data);
			
				$this->User_Model->setLogin($name);
				 $redirect_URL = ($_GET['redirect'])?$_GET['redirect']:'';	
				if (isset($redirect_URL) && $redirect_URL!='')
				{
					redirect(base_url($redirect_URL), 'refresh');
				}
				else
				{
					redirect(base_url(), 'refresh');
				}
		}
		else
		{
			$this->form_validation->set_message('verify_login','Incorrect Email or Pass');
			redirect(base_url().'user/login');
			//redirect('user/login');
		}
        
      }
	  public function check_database($password)
	  {
		 $username = $this->input->post('username');
			
    	$userData = $this->User_Model->isValidUser($username,$password);
		
		//print_r($userData);exit;
		if ($userData['isValidUser'])
		{
		  	$session_data = $userData;
			
			$this->session->set_userdata($session_data);
			
			return true;
		}else		
		return false;
	   
	}
	
    /**
     * Logout
     */
    public  function logout()    {
        $this->session->unset_userdata('id');
        $this->session->sess_destroy();
        redirect(base_url().'user/login');
    }
 

}
