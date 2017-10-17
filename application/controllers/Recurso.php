<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recurso extends CI_Controller {

	 	
public function __construct()
{
	parent::__construct();
	$this->load->model('Recurso_model');
}

public function index()
{
	$datos['mensaje'] = $this->session->flashdata('mensaje');
	$datos['error'] = $this->session->flashdata('error');

	$datos['recursos'] = $this->Recurso_model->traer_recursos();

	$this->load->view('estructura/head');	
	$this->load->view('recurso/index',$datos);
	$this->load->view('estructura/footer'); 
}

public function recurso($id_recurso=NULL) // Ver recurso
{
	$_POST['id_recurso'] = $id_recurso;
	$this->form_validation->set_data($_POST);
	$this->form_validation->set_message('existe_recurso_validation', 'El recurso no existe');	

	if ($this->form_validation->run('ver_recurso') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';

	 	$this->session->set_flashdata('mensaje', $mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());	 
		redirect("recurso/index");

	else:

		$datos['mensaje'] = $this->session->flashdata('mensaje');
		$datos['error'] = $this->session->flashdata('error');

		$datos['recurso'] = $this->Recurso_model->traer_informacion_recurso($id_recurso);


		$this->load->view('estructura/head');	
		$this->load->view('recurso/ver_recurso',$datos);
		$this->load->view('estructura/footer');  

	endif;
}

public function alta_recurso()
{
	chrome_log("alta_recurso");

	if ($this->form_validation->run('alta_recurso') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
	 	$this->session->set_flashdata('mensaje',$mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());
	 
	else:

		chrome_log("Si Paso validacion");

		$query = $this->Recurso_model->abm_recurso( 'A', $this->input->post() );
 
		if ( $query['codigo_error'] == 0 ): // OK
		 	
		 	$mensaje['mensaje'] = 'Recurso creado exitosamente';
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

		 		case -4: // El id_recurso no existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;

		 		case 1: // El id_recurso ya existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;
		 	}

		
		endif;

	endif; 

	$this->session->set_flashdata('mensaje', $mensaje );
	redirect("recurso/index");
}

public function modifica_recurso()
{
	chrome_log("modifica_recurso");

	if ($this->form_validation->run('modifica_recurso') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
	 	$this->session->set_flashdata('mensaje',$mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());
	 
	else:
		chrome_log("Si Paso validacion");

		$query = $this->Recurso_model->abm_recurso( 'M', $this->input->post() );
 
		if ( $query['codigo_error'] == 0 ): // OK
		 	
		 	$mensaje['mensaje'] = 'Recurso modificada exitosamente';
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

		 		case -4: // El id_recurso no existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;

		 		case 1: // El id_recurso ya existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;
		 	}

			$this->session->set_flashdata('mensaje', $mensaje );

		
		endif;   
	endif; 

	redirect("recurso/index");
}

public function baja_recurso()
{
	chrome_log("baja_recurso");

	if ($this->form_validation->run('baja_recurso') == FALSE):  

		chrome_log("No Paso validacion");
	 	$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
		$this->session->set_flashdata('error_alta', $this->form_validation->error_array());
		$return["error"] = TRUE;
	 
	else:
		
		chrome_log("Si Paso validacion");

		$query = $this->Recurso_model->abm_recurso( 'B', $this->input->post() );
  
		if ( $query['codigo_error'] == 0 ): // OK
		 
			$mensaje['mensaje'] = 'recurso eliminada exitosamente';
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

		 		case -4: // El id_recurso no existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			$return["error"] = TRUE;
		 			break;

		 		case 1: // El id_recurso ya existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			$return["error"] = TRUE;
		 			break;
		 	}
			
		 	

		endif;  



	endif; 

	$this->session->set_flashdata('mensaje',$mensaje);
	print json_encode($return); 
}

public function existe_recurso_validation($id_recurso=null)
{
	if($this->Recurso_model->existe_recurso($id_recurso)) 
		return true; 
	else 
		return false; // Duplicado
}

}

?>