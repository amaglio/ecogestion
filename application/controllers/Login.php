<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {


public function __construct()
{
	
	parent::__construct();
	$this->load->model('Login_model');
	$this->load->model('Usuario_model');
}

// Login
public function index()
{	
	chrome_log("index");
	$datos['mensaje'] = $this->session->flashdata('mensaje');
	$datos['error'] = $this->session->flashdata('error');

	$this->load->view('login/login',$datos);    
}

// Loguearse
public function procesa_loguearse() 
{	
 	chrome_log("procesa_loguearse");
 
	if ($this->form_validation->run('loguearse') == FALSE):  // libxml_set_streams_context(streams_context)

		chrome_log("No paso validacion");
		 
		$this->session->set_flashdata('mensaje', 'No paso la validacion, intente nuevamente');
	 	$this->session->set_flashdata('error', $this->form_validation->error_array()); 

	else:

		chrome_log("Si paso validacion");
		 
		
		$query = $this->Login_model->loguearse( $this->input->post() );

		//echo $query['codigo_error'] ;
		 
		if ( $query['codigo_error'] == 0 ): // Pudo loguearse
		 
			$this->session->set_userdata('eco_id',  $query['id_usuario']);
			$this->session->set_userdata('eco_usuario', $this->input->post('usuario'));
			$this->session->set_userdata('eco_modulos', $this->Modulo_model->traer_modulos_usuario( $query['id_usuario'] ));
 
			redirect(base_url()."index.php/home");
		 				 
		else:  

		 	switch ($query['codigo_error']) 
		 	{
		 
		 		case 1: // Password incorrecto

		 		 	$this->session->set_flashdata('mensaje', 'Usuario o password incorrecto/s');
		 		 	redirect("login/index");
		 			break;
		 			 
		 		case -1: // Password incorrecto

		 		 	$this->session->set_flashdata('mensaje', 'Error en la BD, intente mas tarde');
		 		 	redirect("login/index");
		 			break; 

		 		case 2: // Usuario bloqueado

		 			$this->session->set_flashdata('mensaje', 'El usuario ha sido bloqueado por demasiados intento fallidos. Por favor, comuniquese con el administrador del sistema');
		 			redirect("login/index");
		 			break;
		 		
		 		case 3: // Cambiar Password

		 			$this->load->view('login/cambiar_primer_password'); 
		 			break; 
		 	}

			
		endif;  
	
	endif;  
 
}
 
// Desloguea al usuario
public function cambiar_primer_password()
{	
	chrome_log("procesa_loguearse");
 
	if ($this->form_validation->run('cambiar_primer_password') == FALSE):

		chrome_log("No paso validacion");
		 
		$this->session->set_flashdata('mensaje', 'No paso la validacion, intente nuevamente');
	 	$this->session->set_flashdata('error', $this->form_validation->error_array()); 
	 	var_dump($this->form_validation->error_array()) ;

	else:

		chrome_log("Paso validacion"); 
		$query = $this->Usuario_model->cambiar_password( $this->input->post() );

		//var_dump($query);
 		//echo $query['codigo_error']."-".$query['id_usuario'];

	 	switch ($query['codigo_error']):
	 	 
	 		case 0: // Cambio correcto
	 			
	 			$this->session->set_userdata('eco_id',  $query['id_usuario']);
				$this->session->set_userdata('eco_usuario', $this->input->post('usuario'));
				redirect(base_url()."index.php/home");
	 			break;

	 		case 1: // Alias inexistente

	 		 	$this->session->set_flashdata('mensaje', 'Alias inexistente');
	 		 	redirect("login/index");
	 			break;

	 		case 2: // Clave actual incorrecta

	 		 	$this->session->set_flashdata('mensaje', 'La clave actual es incorrecta');
	 		 	redirect("login/index");
	 			break;
	 		
	 		case 3: // Clave actual y clave nueva iguales

	 			$this->session->set_flashdata('mensaje', 'La clave nueva y la vieja no pueden ser iguales');
	 		 	redirect("login/index");
	 			break;
	 	
	 	endswitch;

	endif; 
	
}


// Desloguea al usuario
public function logout()
{
	$this->session->unset_userdata('eco_id');
	$this->session->unset_userdata('eco_usuario');
	$this->session->unset_userdata('eco_modulos');

	$this->db->close();
	session_destroy();
	redirect(base_url()."index.php/login");
}


}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
?>