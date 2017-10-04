<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 
		$this->load->helper('general_helper');
		$this->load->model('Necesidad_model');
		$this->load->model('Trabajo_model');

	}

	public function index()
	{	
		$datos['mensaje'] = $this->session->flashdata('mensaje');
		$datos['error'] = $this->session->flashdata('error');

		$datos['trabajos'] =  $this->Trabajo_model->traer_trabajos();
		$datos['necesidades'] = $this->Necesidad_model->traer_necesidades();

 		$this->load->view('estructura/head');	
		$this->load->view('home/home',$datos);
		$this->load->view('estructura/footer');   
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */