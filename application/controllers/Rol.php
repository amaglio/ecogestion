<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rol extends CI_Controller {

	
public function __construct()
{
	parent::__construct();
	
	$this->load->model('Rol_model');
}

// ----> MUESTRAN --->

public function index()
{
 	$datos['roles'] =  $this->Rol_model->traer_roles();
 	
 	$modulos =  $this->Modulo_model->traer_modulos_sistema();
 	$array_modulos = array();
 	
 	foreach ($modulos->result() as $row):

	    $mod['modulo'] = $row;
	    $mod['submodulo']  =  $this->Modulo_model->traer_submodulos_sistema($row->id_modulo);

	    array_push($array_modulos,  $mod);

	endforeach;

	$datos['modulos'] =  $array_modulos;

 	$datos['mensaje'] = $this->session->flashdata('mensaje');
	$datos['error_rol'] = $this->session->flashdata('error_rol');

	$this->load->view('estructura/head');
	$this->load->view('rol/index',$datos);
	$this->load->view('estructura/footer');
}

public function rol($id_rol)
{
	$_POST['id_rol'] = $id_rol;
	$this->form_validation->set_data($_POST);
	$this->form_validation->set_message('existe_rol_validation', 'El rol no existe');	

	if ($this->form_validation->run('ver_rol') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';

	 	$this->session->set_flashdata('mensaje', $mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());	 
		redirect("rol/index");

	else:

		$datos['mensaje'] = $this->session->flashdata('mensaje');
		$datos['error'] = $this->session->flashdata('error');

		$datos['informacion_rol'] =  $this->Rol_model->traer_informacion_rol($id_rol);
		$datos['roles'] =  $this->Rol_model->traer_roles();

		$modulos =  $this->Modulo_model->traer_modulos_sistema();
	 	$array_modulos = array();
	 	
	 	foreach ($modulos->result() as $row):

		    $mod['modulo'] = $row;
		    $mod['submodulo']  =  $this->Modulo_model->traer_submodulos_sistema($row->id_modulo);

		    array_push($array_modulos,  $mod);

		endforeach;

		$datos['modulos'] =  $array_modulos;


		//$datos['modulos'] =  $this->Rol_model->traer_modulos();
		$datos['modulos_rol'] =  $this->Rol_model->traer_modulos_rol($id_rol);
	 
		$this->load->view('estructura/head');
		$this->load->view('rol/ver_rol',$datos);
		$this->load->view('estructura/footer');

	endif;
}

// ----> PROCESAN --->

public function alta_rol()
{
	chrome_log("alta_rol");

	if ($this->form_validation->run('alta_rol') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
	 	$this->session->set_flashdata('mensaje',$mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());
	 
	else:
		chrome_log("Si Paso validacion");
		
		$query = $this->Rol_model->abm_rol( 'A', $this->input->post() );
 
		if ( $query['codigo_error'] == 0 ): // OK
 
			$mensaje['mensaje'] = 'Rol creado exitosamente';
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

		 			$mensaje['mensaje'] = 'Error, el rol ingresado ya existe, ingrese otro.';
		 			break;
		 	}
			

		endif;   
	
	endif; 

	$this->session->set_flashdata('mensaje', $mensaje );
	redirect("rol/index");
}

public function modifica_rol()
{
	chrome_log("modificar_rol");

	if ($this->form_validation->run('modificar_rol') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
	 	$this->session->set_flashdata('mensaje',$mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());
	 
	else:
		chrome_log("Si Paso validacion");
		
		$query = $this->Rol_model->abm_rol( 'M', $this->input->post() );

		if ( $query['codigo_error'] == 0 ): // OK
 
			$mensaje['mensaje'] = 'Rol creado exitosamente';
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

		 			$mensaje['mensaje'] = 'Error, el rol ingresado ya existe, ingrese otro.';
		 			break;
		 	}
			

		endif;   

	endif; 

	$this->session->set_flashdata('mensaje', $mensaje );
	redirect("rol/index/" );
}

public function baja_rol()
{
	chrome_log("baja_rol");

	if ($this->form_validation->run('baja_rol') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
	 	$this->session->set_flashdata('mensaje',$mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());
		$return["error"] = TRUE;
	 
	else:
		chrome_log("Si Paso validacion");
		
		$query = $this->Rol_model->abm_rol( 'B', $this->input->post() );
 
		if ( $query['codigo_error'] == 0 ): // OK
		 
			$mensaje['mensaje'] = 'Rol eliminado exitosamente';
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

		 			$mensaje['mensaje'] = 'Error, el rol ingresado ya existe, ingrese otro.';
		 			$return["error"] = TRUE;
		 			break;
		 	}
			

		endif;   
	
	endif; 

	$this->session->set_flashdata('mensaje', $mensaje );
	print json_encode($return);	
}

// ----> VALIDAN FORM VALIDATION --->

public function existe_rol_validation($id_rol=null)
{
	if($this->Rol_model->existe_rol($id_rol)) 
		return true; 
	else 
		return false; // Duplicado
}


}

/* End of file login.php */
/* Location: ./application/controllers/login.php */