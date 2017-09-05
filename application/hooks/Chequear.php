<?php
if (!defined( 'BASEPATH')) exit('No direct script access allowed'); 
 
class Chequear  
{
	 	
	public function check_login()
	{	
		//echo "aa";
		$CI =& get_instance();

		 
		!$CI->load->library('session') ? $CI->load->library('session') : false;
		!$CI->load->helper('url') ? $CI->load->helper('url') : false;
 
		if($CI->uri->segment(1) == 'login' && $CI->session->userdata('eco_id') == true)
        {
 
            //redirect(base_url('index.php/home'));
        }
        else if($CI->session->userdata('eco_id') == false && $CI->uri->segment(1) != 'login')
        {
 
        	redirect(base_url('index.php/login'));
 
        } 

	}

	public function check_permisos()
	{	
 		 
		$CI =& get_instance();

		 
		!$CI->load->library('session') ? $CI->load->library('session') : false;
		!$CI->load->helper('url') ? $CI->load->helper('url') : false; 


		//echo  "url:".$CI->uri->segment(1)."<br>";

		//if( $CI->uri->segment(1) != 'home' && $CI->uri->segment(1) != 'login'):

		if( $CI->uri->segment(1) != 'home' && $CI->uri->segment(1) != 'login'):

			$id_modulo =  $CI->Modulo_model->traer_id_modulos_por_controlador( $CI->uri->segment(1) );

			if(!tiene_el_modulo($id_modulo)):

				redirect(base_url('index.php/home'));
				//echo "no tiene el modulo";

			endif;

		endif;
 		
		 
	}
} 
?>