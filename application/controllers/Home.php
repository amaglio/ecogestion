<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->db = $this->load->database($this->session->userdata('DB'),TRUE, TRUE);		
		 $this->load->helper('general_helper');
	}

	public function index()
	{	
		//armar_menu();
 		$this->load->view('estructura/head');	
		$this->load->view('home/home');
		$this->load->view('estructura/footer');   
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */