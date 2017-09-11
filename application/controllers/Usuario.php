<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

	
public function __construct()
{
	parent::__construct();
	
	$this->load->model('Usuario_model');
	$this->load->model('Rol_model');

}

// ----> MUESTRAN --->

public function index()
{
	$datos['mensaje'] = $this->session->flashdata('mensaje');
	$datos['error'] = $this->session->flashdata('error');

	$datos['cargos'] =  $this->Usuario_model->traer_cargos();

	$datos['usuarios'] =  $this->Usuario_model->traer_usuarios();

	$this->load->view('estructura/head');
	$this->load->view('usuario/index',$datos);
	$this->load->view('estructura/footer');
}

public function usuario($id_usuario)
{	
	$_POST['id_usuario'] = $id_usuario;
	$this->form_validation->set_data($_POST);
	$this->form_validation->set_message('existe_usuario_validation', 'El usuario no existe');	

	if ($this->form_validation->run('ver_usuario') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';

	 	$this->session->set_flashdata('mensaje', $mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());	 
		redirect("usuario/index");

	else:

		$datos['mensaje'] = $this->session->flashdata('mensaje');
		$datos['error'] = $this->session->flashdata('error');

		$datos['cargos'] =  $this->Usuario_model->traer_cargos();
		$datos['usuario'] =  $this->Usuario_model->traer_datos_usuario($id_usuario);
		$datos['roles_usuario'] =  $this->Usuario_model->traer_roles_usuario($id_usuario);
		$datos['roles'] =  $this->Rol_model->traer_roles();

		$this->load->view('estructura/head');
		$this->load->view('usuario/ver_usuario',$datos);
		$this->load->view('estructura/footer');

	endif;
}

public function  ver_desbloquear_usuario($id_usuario_desbloquear=NULL)
{
	chrome_log("desbloquear_usuario");

	$_POST['id_usuario_desbloquear'] = $id_usuario_desbloquear;
	$this->form_validation->set_data($_POST);

	$this->form_validation->set_message('es_usuario_desbloquear_validation', 'El usuario no existe o no hay que desbloquearlo');

	if ($this->form_validation->run('ver_desbloquear_usuario') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';

	 	$this->session->set_flashdata('mensaje', $mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());
	 	redirect("usuario/index");

	else:
		chrome_log("Si Paso validacion");

		$datos['mensaje'] = $this->session->flashdata('mensaje');
		$datos['error'] = $this->session->flashdata('error');
		$datos['cargos'] =  $this->Usuario_model->traer_cargos();

		$datos['usuario'] =  $this->Usuario_model->traer_datos_usuario($id_usuario_desbloquear);	

		$this->load->view('estructura/head');
		$this->load->view('usuario/ver_desbloquear_usuario',$datos);
		$this->load->view('estructura/footer');

	endif; 

	//redirect("usuario/index/");
}

public function  ver_cambiar_password()
{
	chrome_log("desbloquear_usuario");
 

	$datos['mensaje'] = $this->session->flashdata('mensaje');
	$datos['error'] = $this->session->flashdata('error');  

	$this->load->view('estructura/head');
	$this->load->view('usuario/ver_cambiar_password',$datos);
	$this->load->view('estructura/footer');

 

	//redirect("usuario/index/");
}

// ----> PROCESAN --->

public function alta_usuario()
{
	chrome_log("alta_usuario");

	if ($this->form_validation->run('alta_usuario') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
	 	$this->session->set_flashdata('mensaje',$mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());
	 
	else:
		chrome_log("Si Paso validacion");
		
		$query = $this->Usuario_model->abm_usuario( 'A', $this->input->post() ); 

 
		if ( $query['codigo_error'] == 0 ): // OK
		 
 
			$mensaje['mensaje'] = 'Usuario creado exitosamente';
			$mensaje['clase_mensaje'] = 'success';
					 				 
		else:  
			$mensaje['clase_mensaje'] = 'danger';
		 	
		 	switch ($query['codigo_error']) 
		 	{

		 		case -1: // Error mysql

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;

		 		case -2: // Falta algun parametro

		 			$mensaje['mensaje'] = 'Error: falta algun parametro obligatorio';
		 			break;
		 		
		 		case 1: // Alias duplicado

		 			$mensaje['mensaje'] = 'Error, el alias ingresado ya se encuentra registrado, ingrese otro.';
		 			break;
		 	}
			

		endif;   
	
	endif; 

	$this->session->set_flashdata('mensaje', $mensaje );
	redirect("usuario/index");
}

public function modifica_usuario() // TERMINAR
{
	chrome_log("modifica_usuario");
 
	if ($this->form_validation->run('modifica_usuario') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
	 	$this->session->set_flashdata('mensaje',$mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());
	 
	else:
	 
		$query = $this->Usuario_model->abm_usuario( 'M', $this->input->post() );
		 
		if ( $query['codigo_error'] == 0 ): // OK
		 
			$mensaje['mensaje'] = 'Usuario modificado exitosamente';
			$mensaje['clase_mensaje'] = 'success';
					 				 
		else:  
		 	
		 	$mensaje['clase_mensaje'] = 'danger';

		 	switch ($query['codigo_error']) 
		 	{

		 		case -1: // Error mysql

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 		 	$return["error"] = TRUE;
		 			break;

		 		case -2: // Falta algun parametro

		 			$mensaje['mensaje'] = 'Error: falta algun parametro obligatorio';
		 			$return["error"] = TRUE;
		 			break;
		 		
		 		case 1: // Alias duplicado

		 			$mensaje['mensaje'] = 'Error: el alias ingresado esta duplicado';
		 			$return["error"] = TRUE;
		 			break;
		 	}
			 

		endif;  

	endif; 

	$this->session->set_flashdata('mensaje', $mensaje );
	redirect("usuario/usuario/".$this->input->post('id_usuario')); 
}

public function baja_usuario()
{
	chrome_log("baja_usuario");

	if ($this->form_validation->run('baja_usuario') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
		$this->session->set_flashdata('error', $this->form_validation->error_array());
		$return["error"] = TRUE;
	 
	else:
		chrome_log("Si Paso validacion");
		$query = $this->Usuario_model->abm_usuario( 'B', $this->input->post() );
		 
		if ( $query['codigo_error'] == 0 ): // OK
		 
			$mensaje['mensaje'] = 'Usuario eliminado exitosamente';
			$mensaje['clase_mensaje'] = 'success';
			$return["error"] = FALSE;
					 				 
		else:  
		 	
		 	$mensaje['clase_mensaje'] = 'danger';

		 	switch ($query['codigo_error']) 
		 	{

		 		case -1: // Error mysql

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 		 	$return["error"] = TRUE;
		 			break;

		 		case -2: // Falta algun parametro

		 			$mensaje['mensaje'] = 'Error: falta algun parametro obligatorio';
		 			$return["error"] = TRUE;
		 			break;
		 		
		 		case 1: // Alias duplicado

		 			$mensaje['mensaje'] = 'Error: el alias ingresado esta duplicado';
		 			$return["error"] = TRUE;
		 			break;
		 	}
			 

		endif;   


	endif;

	$this->session->set_flashdata('mensaje',$mensaje);
	print json_encode($return);
}

public function desbloquear_usuario()
{
	chrome_log("desbloquear_usuario");

	if ($this->form_validation->run('desbloquear_usuario') == FALSE):  

		chrome_log("No Paso validacion");
	 	$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
		$this->session->set_flashdata('error', $this->form_validation->error_array());
		var_dump($this->form_validation->error_array());
	 
	else:
		chrome_log("Si Paso validacion");
 
		$query = $this->Usuario_model->desbloquear_usuario( $this->input->post() );
		 
		if ( $query['codigo_error'] == 0 ): // Pudo desbloquear
		 	
		 	chrome_log("Pudo desbloquear");
		 	$mensaje['mensaje'] = 'Usuario desbloqueado exitosamente';
			$mensaje['clase_mensaje'] = 'success'; 
		 				 
		elseif ( $query['codigo_error'] == -1 ):

			chrome_log("Error mysql");
			$mensaje['clase_mensaje'] = 'danger';
			$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
			 
		endif;  


	endif; 

	$this->session->set_flashdata('mensaje',$mensaje);
	redirect("usuario/index");
}

public function asignar_roles_usuario() // TERMINAR
{
	chrome_log("asignar_roles_usuario");
 
	if ($this->form_validation->run('asignar_roles_usuario') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
		$this->session->set_flashdata('error', $this->form_validation->error_array());
	 
	else:
		
		chrome_log("Si Paso validacion");
	 
		$query = $this->Usuario_model->asignar_roles_usuario( $this->input->post() );
		 
		if ( $query['codigo_error'] == 0 ): // OK
		 
 			$mensaje['mensaje'] =  'Roles modificados exitosamente';
			$mensaje['clase_mensaje'] = 'success';
					 				 
		else:  
		 	
		 	switch ($query['codigo_error']) 
		 	{

		 		case -1: // Error mysql

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;

		 		case -2: // Falta algun parametro

		 			$mensaje['mensaje'] = 'Error: falta algun parametro obligatorio';
		 			break;
		 		
		 		case 1: // Alias duplicado

		 			$mensaje['mensaje'] = 'Error: el alias ingresado esta duplicado';
		 			break;
		 	}
			 

		endif;  

	endif; 

	$this->session->set_flashdata('mensaje', $mensaje );
	redirect("usuario/usuario/".$this->input->post('id_usuario')); 
}

public function cambiar_password()
{
	chrome_log("cambiar_password");

	$_POST['alias'] = $this->session->userdata('eco_usuario');
	$this->form_validation->set_data($_POST);

	if ($this->form_validation->run('cambiar_password') == FALSE):  

		chrome_log("No Paso validacion");
	 	$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
		$this->session->set_flashdata('error', $this->form_validation->error_array());
		var_dump($this->form_validation->error_array());
	 
	else:
		chrome_log("Si Paso validacion");
	 
		$query = $this->Usuario_model->cambiar_password( $this->input->post() );
		 
		if ( $query['codigo_error'] == 0 ): // OK
		 
 			$mensaje['mensaje'] =  'Password modificado exitosamente';
			$mensaje['clase_mensaje'] = 'success';
					 				 
		else:  
		 	
		 	$mensaje['clase_mensaje'] = 'danger';
		 
		 	switch ($query['codigo_error']) 
		 	{

		 		case -1: 

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;

		 		case 1: 

		 			$mensaje['mensaje'] = 'Error: usuario inexistente';
		 			break;
		 		
		 		case 2:  

		 			$mensaje['mensaje'] = 'Error: clave actual incorrecta';
		 			break;

		 		case 2:  

		 			$mensaje['mensaje'] = 'Error: la clave actual y la nueva deben ser distintas';
		 			break;
		 	}
			 

		endif;  


	endif; 

	$this->session->set_flashdata('mensaje',$mensaje);
	redirect("usuario/ver_cambiar_password");
}
// ----> VALIDAN FORM VALIDATION --->

public function existe_usuario_validation($id_usuario=null)
{
	if($this->Usuario_model->existe_usuario($id_usuario)) 
		return true; 
	else 
		return false; // Duplicado
}

public function es_usuario_desbloquear_validation($id_usuario_a_desbloquear=null)
{
	if($this->Usuario_model->es_usuario_desbloquear($id_usuario_a_desbloquear)) 
		return true; 
	else 
		return false; // Duplicado
}


}

/* End of file login.php */
/* Location: ./application/controllers/login.php */