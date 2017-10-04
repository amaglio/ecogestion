<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trabajo extends CI_Controller {

	
public function __construct()
{
	parent::__construct();
	
	$this->load->model('Trabajo_model');
	$this->load->model('Area_model');
	$this->load->model('Necesidad_model');
}

// ----> MUESTRAN --->

public function index()
{
 	$datos['trabajos'] =  $this->Trabajo_model->traer_trabajos();
 	
 	$datos['mensaje'] = $this->session->flashdata('mensaje');
	$datos['error'] = $this->session->flashdata('error');
	$datos['areas'] = $this->Area_model->traer_areas();

	$this->load->view('estructura/head');
	$this->load->view('trabajo/index',$datos);
	$this->load->view('estructura/footer');
}

public function trabajo($id_trabajo)
{
	$_POST['id_trabajo'] = $id_trabajo;
	$this->form_validation->set_data($_POST);
	$this->form_validation->set_message('existe_trabajo_validation', 'El trabajo no existe');	

	if ($this->form_validation->run('ver_trabajo') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';

	 	$this->session->set_flashdata('mensaje', $mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());	 
		redirect("trabajo/index");

	else:

		$datos['mensaje'] = $this->session->flashdata('mensaje');
		$datos['error'] = $this->session->flashdata('error');
		$datos['areas'] = $this->Area_model->traer_areas();
		$datos['informacion_trabajo'] =  $this->Trabajo_model->traer_informacion_trabajo($id_trabajo);
		
		$datos['necesidades_trabajo'] =  $this->Necesidad_model->traer_necesidades_trabajo($id_trabajo); 
	 
		$this->load->view('estructura/head');
		$this->load->view('trabajo/ver_trabajo',$datos);
		$this->load->view('estructura/footer');

	endif;
}

// ----> PROCESAN --->

public function alta_trabajo()
{
	chrome_log("alta_trabajo");

	if ($this->form_validation->run('alta_trabajo') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
	 	$this->session->set_flashdata('mensaje',$mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());
	 
	else:
		chrome_log("Si Paso validacion");
		
		$query = $this->Trabajo_model->abm_trabajo( 'A', $this->input->post() );
 
		if ( $query['codigo_error'] == 0 ): // OK
 
			$mensaje['mensaje'] = 'Trabajo creado exitosamente';
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

		 			$mensaje['mensaje'] = 'Error, el trabajo ingresado ya existe, ingrese otro.';
		 			break;
		 	}
			

		endif;   
	
	endif; 

	$this->session->set_flashdata('mensaje', $mensaje );
	redirect("trabajo/index");
}

public function modifica_trabajo()
{
	chrome_log("modificar_trabajo");

	if ($this->form_validation->run('modificar_trabajo') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
	 	$this->session->set_flashdata('mensaje',$mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());
	 
	else:
		chrome_log("Si Paso validacion");
		
		$query = $this->Trabajo_model->abm_trabajo( 'M', $this->input->post() );

		if ( $query['codigo_error'] == 0 ): // OK
 
			$mensaje['mensaje'] = 'Trabajo creado exitosamente';
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

		 			$mensaje['mensaje'] = 'Error, el trabajo ingresado ya existe, ingrese otro.';
		 			break;
		 	}
			

		endif;   

	endif; 

	$this->session->set_flashdata('mensaje', $mensaje );
	redirect("trabajo/index/" );
}

public function baja_trabajo()
{
	chrome_log("baja_trabajo");

	if ($this->form_validation->run('baja_trabajo') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
	 	$this->session->set_flashdata('mensaje',$mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());
		$return["error"] = TRUE;
	 
	else:
		chrome_log("Si Paso validacion");
		
		$query = $this->Trabajo_model->abm_trabajo( 'B', $this->input->post() );
 
		if ( $query['codigo_error'] == 0 ): // OK
		 
			$mensaje['mensaje'] = 'Trabajo eliminado exitosamente';
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

		 			$mensaje['mensaje'] = 'Error, el trabajo ingresado ya existe, ingrese otro.';
		 			$return["error"] = TRUE;
		 			break;
		 	}
			

		endif;   
	
	endif; 

	$this->session->set_flashdata('mensaje', $mensaje );
	print json_encode($return);	
}

// ----> VALIDAN FORM VALIDATION --->

public function existe_trabajo_validation($id_trabajo=null)
{
	if($this->Trabajo_model->existe_trabajo($id_trabajo)) 
		return true; 
	else 
		return false; // Duplicado
}


}

/* End of file login.php */
/* Location: ./application/conttrabajolers/login.php */