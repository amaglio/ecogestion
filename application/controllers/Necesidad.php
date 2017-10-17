<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Necesidad extends CI_Controller {

	 	
public function __construct()
{
	parent::__construct();
	$this->load->model('Necesidad_model');
	$this->load->model('Trabajo_model');
	$this->load->model('Recurso_model');
}

public function index()
{
	$datos['mensaje'] = $this->session->flashdata('mensaje');
	$datos['error'] = $this->session->flashdata('error');

	$datos['necesidades'] = $this->Necesidad_model->traer_necesidades();
	$datos['trabajos'] =  $this->Trabajo_model->traer_trabajos();

	$this->load->view('estructura/head');	
	$this->load->view('necesidad/index',$datos);
	$this->load->view('estructura/footer');  
}

public function necesidad($id_necesidad=NULL) // Ver necesidad
{
	$_POST['id_necesidad'] = $id_necesidad;
	$this->form_validation->set_data($_POST);
	$this->form_validation->set_message('existe_necesidad_validation', 'La necesidad no existe');	

	if ($this->form_validation->run('ver_necesidad') == FALSE):  

		chrome_log("No Paso validacion");
		//echo validation_errors();
	 
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';

	 	$this->session->set_flashdata('mensaje', $mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());	 
		redirect("necesidad/index");
 
	else:

		chrome_log("Paso validacion");
		$datos['mensaje'] = $this->session->flashdata('mensaje');
		$datos['error'] = $this->session->flashdata('error');
		$datos['trabajos'] =  $this->Trabajo_model->traer_trabajos();
		$datos['necesidad'] = $this->Necesidad_model->traer_informacion_necesidad($id_necesidad);

		$datos['recursos_necesidad'] = $this->Recurso_model->traer_recursos_necesidad($id_necesidad);


		$this->load->view('estructura/head');	
		$this->load->view('necesidad/ver_necesidad',$datos);
		$this->load->view('estructura/footer');  

	endif;
}	

public function alta_necesidad()
{
	chrome_log("alta_necesidad");

	if ($this->form_validation->run('alta_necesidad') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
	 	$this->session->set_flashdata('mensaje',$mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());
	 
	else:

		chrome_log("Si Paso validacion");

		$query = $this->Necesidad_model->abm_necesidad( 'A', $this->input->post() );
 
		if ( $query['codigo_error'] == 0 ): // OK
		 	
		 	$mensaje['mensaje'] = 'Necesidad creada exitosamente';
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
		 		
		 		case -3: // Parametro 'pc_accion' no reconocido

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;

		 		case -4: // El id_necesidad no existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;

		 	}

		
		endif;

	endif; 

	$this->session->set_flashdata('mensaje', $mensaje );
	redirect("necesidad/index");
}

public function modifica_necesidad()
{
	chrome_log("modifica_necesidad");

	if ($this->form_validation->run('modifica_necesidad') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
	 	$this->session->set_flashdata('mensaje',$mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());
	 
	else:
		chrome_log("Si Paso validacion");

		$query = $this->Necesidad_model->abm_necesidad( 'M', $this->input->post() );
 
		if ( $query['codigo_error'] == 0 ): // OK
		 	
		 	$mensaje['mensaje'] = 'Necesidad modificada exitosamente';
			$mensaje['clase_mensaje'] = 'success';
			$this->session->set_flashdata('mensaje',$mensaje );
					 				 
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
		 		
		 		case -3: // Parametro 'pc_accion' no reconocido

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;

		 		case -4: // El id_necesidad no existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;

		 		case 1: // El id_necesidad ya existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;
		 	}

			$this->session->set_flashdata('mensaje', $mensaje );

			
		
		endif;   
	endif; 

	redirect("necesidad/necesidad/".$this->input->post('id_necesidad'));
	///redirect("necesidad/index");
}

public function baja_necesidad()
{
	chrome_log("baja_necesidad");

	if ($this->form_validation->run('baja_necesidad') == FALSE):  

		chrome_log("No Paso validacion");
	 	$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
		$this->session->set_flashdata('error_alta', $this->form_validation->error_array());
		$return["error"] = TRUE;
	 
	else:
		
		chrome_log("Si Paso validacion");

		$query = $this->Necesidad_model->abm_necesidad( 'B', $this->input->post() );
  
		if ( $query['codigo_error'] == 0 ): // OK
		 
			$mensaje['mensaje'] = 'Necesidad eliminada exitosamente';
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
		 		
		 		case -3: // Parametro 'pc_accion' no reconocido

		 		 	$mensaje['mensaje'] ='Error: ha ocurrido un error interno, intente nuevamente';
		 			$return["error"] = TRUE;
		 			break;

		 		case -4: // El id_necesidad no existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			$return["error"] = TRUE;
		 			break;

		 		case 1: // El id_necesidad ya existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			$return["error"] = TRUE;
		 			break;
		 	}
			
		 	

		endif;  



	endif; 

	$this->session->set_flashdata('mensaje',$mensaje);
	print json_encode($return); 
}

public function existe_necesidad_validation($id_necesidad=null)
{
	if($this->Necesidad_model->existe_necesidad($id_necesidad)) 
		return true; 
	else 
		return false; // Duplicado
}

}

?>