<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Area extends CI_Controller {

	 	
public function __construct()
{
	parent::__construct();
	$this->load->model('Area_model');
	$this->load->model('Rama_model');
}

public function index()
{
	$datos['mensaje'] = $this->session->flashdata('mensaje');
	$datos['error'] = $this->session->flashdata('error');

	$datos['areas'] = $this->Area_model->traer_areas();
	$datos['ramas'] = $this->Rama_model->traer_ramas();

	$this->load->view('estructura/head');	
	$this->load->view('area/index',$datos);
	$this->load->view('estructura/footer');  
}

public function area($id_area=NULL) // Ver area
{
	$_POST['id_area'] = $id_area;
	$this->form_validation->set_data($_POST);
	$this->form_validation->set_message('existe_area_validation', 'El area no existe');	

	if ($this->form_validation->run('ver_area') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';

	 	$this->session->set_flashdata('mensaje', $mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());	 
		redirect("area/index");

	else:

		$datos['mensaje'] = $this->session->flashdata('mensaje');
		$datos['error'] = $this->session->flashdata('error');

		$datos['area'] = $this->Area_model->traer_informacion_area($id_area);
		$datos['ramas'] = $this->Rama_model->traer_ramas();

		$this->load->view('estructura/head');	
		$this->load->view('area/ver_area',$datos);
		$this->load->view('estructura/footer');  

	endif;
}

public function alta_area()
{
	chrome_log("alta_area");

	if ($this->form_validation->run('alta_area') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
	 	$this->session->set_flashdata('mensaje',$mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());
	 
	else:

		chrome_log("Si Paso validacion");

		$query = $this->Area_model->abm_area( 'A', $this->input->post() );
 
		if ( $query['codigo_error'] == 0 ): // OK
		 	
		 	$mensaje['mensaje'] = 'Area creada exitosamente';
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

		 		case -4: // El id_area no existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;

		 		case 1: // El id_area ya existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;
		 	}

		
		endif;

	endif; 

	$this->session->set_flashdata('mensaje', $mensaje );
	redirect("area/index");
}

public function modifica_area()
{
	chrome_log("modifica_area");

	if ($this->form_validation->run('modifica_area') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
	 	$this->session->set_flashdata('mensaje',$mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());
	 
	else:
		chrome_log("Si Paso validacion");

		$query = $this->Area_model->abm_area( 'M', $this->input->post() );
 
		if ( $query['codigo_error'] == 0 ): // OK
		 	
		 	$mensaje['mensaje'] = 'Area modificada exitosamente';
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

		 		case -4: // El id_area no existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;

		 		case 1: // El id_area ya existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;
		 	}

			$this->session->set_flashdata('mensaje', $mensaje );

		
		endif;   
	endif; 

	redirect("area/index");
}

public function baja_area()
{
	chrome_log("baja_area");

	if ($this->form_validation->run('baja_area') == FALSE):  

		chrome_log("No Paso validacion");
	 	$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
		$this->session->set_flashdata('error_alta', $this->form_validation->error_array());
		$return["error"] = TRUE;
	 
	else:
		
		chrome_log("Si Paso validacion");

		$query = $this->Area_model->abm_area( 'B', $this->input->post() );
  
		if ( $query['codigo_error'] == 0 ): // OK
		 
			$mensaje['mensaje'] = 'Area eliminada exitosamente';
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

		 		case -4: // El id_area no existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			$return["error"] = TRUE;
		 			break;

		 		case 1: // El id_area ya existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			$return["error"] = TRUE;
		 			break;
		 	}
			
		 	

		endif;  



	endif; 

	$this->session->set_flashdata('mensaje',$mensaje);
	print json_encode($return); 
}

public function existe_area_validation($id_area=null)
{
	if($this->Area_model->existe_area($id_area)) 
		return true; 
	else 
		return false; // Duplicado
}

}

?>