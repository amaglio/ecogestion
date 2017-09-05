<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rama extends CI_Controller {

	 	
public function __construct()
{
	parent::__construct();
	$this->load->model('Rama_model');
}


public function index()
{
	$datos['mensaje'] = $this->session->flashdata('mensaje');
	$datos['error'] = $this->session->flashdata('error');

	$datos['ramas'] = $this->Rama_model->traer_ramas();

	$this->load->view('estructura/head');	
	$this->load->view('rama/index',$datos);
	$this->load->view('estructura/footer');  
}

public function rama($id_rama)
{	
	$_POST['id_rama'] = $id_rama;
	$this->form_validation->set_data($_POST);
	$this->form_validation->set_message('existe_rama_validation', 'La rama no existe');	

	if ($this->form_validation->run('ver_rama') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';

	 	$this->session->set_flashdata('mensaje', $mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());	 
		redirect("rama/index");

	else:

		$datos['mensaje'] = $this->session->flashdata('mensaje');
		$datos['error'] = $this->session->flashdata('error');
		$datos['rama'] = $this->Rama_model->traer_informacion_rama($id_rama);

		$this->load->view('estructura/head');	
		$this->load->view('rama/ver_rama',$datos);
		$this->load->view('estructura/footer');

	endif;  
}

public function alta_rama()
{
	chrome_log("alta_rama");

	if ($this->form_validation->run('alta_rama') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
	 	$this->session->set_flashdata('mensaje',$mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());
	 
	else:
		chrome_log("Si Paso validacion");

		$query = $this->Rama_model->abm_rama( 'A', $this->input->post() );
  
		if ( $query['codigo_error'] == 0 ): // OK
 
			$mensaje['mensaje'] = 'Rama creada exitosamente';
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

		 		case -4: // El id_rama no existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;

		 		case 1: // Rama duplicada

		 		 	$mensaje['mensaje'] = 'Nombre de rama duplicado, ingrese otro.';
		 			break;
		 	}
			

		endif;   
	
	endif; 

	$this->session->set_flashdata('mensaje', $mensaje );
	redirect("rama/index");
}

public function modifica_rama()
{
	chrome_log("modifica_rama");

	if ($this->form_validation->run('modifica_rama') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
	 	$this->session->set_flashdata('mensaje',$mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());
	 
	else:
		chrome_log("Si Paso validacion");

		$query = $this->Rama_model->abm_rama( 'M', $this->input->post() );
 
		if ( $query['codigo_error'] == 0 ): // OK
		 
			$mensaje['mensaje'] = 'Rama modificada exitosamente';
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

		 		case -4: // El id_rama no existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;

		 		case 1: // El id_rama ya existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;
		 	}
			

		endif;   
	
	endif; 

	$this->session->set_flashdata('mensaje', $mensaje );
	redirect("rama/index/");
}

public function baja_rama()
{
	chrome_log("baja_rama");

	if ($this->form_validation->run('baja_rama') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
	 	$this->session->set_flashdata('mensaje',$mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());
		$return["error"] = TRUE;
	 
	else:
		chrome_log("Si Paso validacion");

		$query = $this->Rama_model->abm_rama( 'B', $this->input->post() );
  
		if ( $query['codigo_error'] == 0 ): // OK

			$mensaje['mensaje'] = 'Rama eliminada exitosamente';
			$mensaje['clase_mensaje'] = 'success';
			$return["error"] = FALSE;
					 				 
		else:  
		 	$mensaje['clase_mensaje'] = 'danger';

		 	switch ($query['codigo_error']) 
		 	{

		 		case -1: // Error mysql

		 		 	$mensaje['mensaje'] =  'Error: ha ocurrido un error interno, intente nuevamente';
		 			$return["error"] = TRUE;
		 			break;

		 		case -2: // Falta algun parametro

		 			$mensaje['mensaje'] =  'Error: falta algun parametro obligatorio';
		 			$return["error"] = TRUE;
		 			break;
		 		
		 		case -3: // Parametro 'pc_accion' no reconocido

		 		 	$mensaje['mensaje'] =  'Error: ha ocurrido un error interno, intente nuevamente';
		 			$return["error"] = TRUE;
		 			break;

		 		case -4: // El id_rama no existe

		 		 	$mensaje['mensaje'] =  'Error: ha ocurrido un error interno, intente nuevamente';
		 			$return["error"] = TRUE;
		 			break;

		 		case 1: // El id_rama ya existe

		 		 	$mensaje['mensaje'] =  'Error: ha ocurrido un error interno, intente nuevamente';
		 			$return["error"] = TRUE;
		 			break;
		 	}
			

		endif;  

	endif; 

	$this->session->set_flashdata('mensaje',$mensaje);
	print json_encode($return);

}

public function existe_rama_validation($id_rama=null)
{
	if($this->Rama_model->existe_rama($id_rama)) 
		return true; 
	else 
		return false; // Duplicado
}


}

?>