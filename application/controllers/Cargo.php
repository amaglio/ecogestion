<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cargo extends CI_Controller {

	 	
public function __construct()
{
	parent::__construct();
	$this->load->model('Cargo_model');
	$this->load->model('Area_model');
}

public function index()
{
	$datos['mensaje'] = $this->session->flashdata('mensaje');
	$datos['error'] = $this->session->flashdata('error');

	$datos['cargos'] = $this->Cargo_model->traer_cargos();
	$datos['areas'] = $this->Area_model->traer_areas();

	$this->load->view('estructura/head');	
	$this->load->view('cargo/index',$datos);
	$this->load->view('estructura/footer');  
}

public function cargo($id_cargo=NULL) // Ver cargo
{
	$_POST['id_cargo'] = $id_cargo;
	$this->form_validation->set_data($_POST);
	$this->form_validation->set_message('existe_cargo_validation', 'El cargo no existe');	

	if ($this->form_validation->run('ver_cargo') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';

	 	$this->session->set_flashdata('mensaje', $mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());	

		redirect("cargo/index");

	else:

		$datos['mensaje'] = $this->session->flashdata('mensaje');
		$datos['error'] = $this->session->flashdata('error');

		$datos['cargo'] = $this->Cargo_model->traer_informacion_cargo($id_cargo);
		$datos['areas'] = $this->Area_model->traer_areas();
		
		$this->load->view('estructura/head');	
		$this->load->view('cargo/ver_cargo',$datos);
		$this->load->view('estructura/footer');  

	endif;
}

public function alta_cargo()
{
	chrome_log("alta_cargo");

	if ($this->form_validation->run('alta_cargo') == FALSE):  

		chrome_log("No Paso validacion");
	 	$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
	 	$this->session->set_flashdata('mensaje',$mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());
		 
	 
	else:
		chrome_log("Si Paso validacion");

		$query = $this->Cargo_model->abm_cargo( 'A', $this->input->post() );
	 
		if ( $query['codigo_error'] == 0 ): // OK
		 
			$mensaje['mensaje'] = 'Cargo creado exitosamente';
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

		 		case -4: // El id_cargo no existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;

		 		case 1: // El id_cargo ya existe

		 		 	$mensaje['mensaje'] ='Error: ha ocurrido un error interno, intente nuevamente';
		 			break;
		 	}
			

		endif;   

	endif; 

	$this->session->set_flashdata('mensaje', $mensaje );
	redirect("cargo/index");
}

public function modifica_cargo()
{
	chrome_log("modifica_cargo");

	if ($this->form_validation->run('modifica_cargo') == FALSE):  

		chrome_log("No Paso validacion");
	 	$this->session->set_flashdata('mensaje', 'No pasó la validación, intente nuevamente');
		$this->session->set_flashdata('error_alta', $this->form_validation->error_array());
		var_dump($this->form_validation->error_array());
	 
	else:
		chrome_log("Si Paso validacion");

		$query = $this->Cargo_model->abm_cargo( 'M', $this->input->post() );
		 
		if ( $query['codigo_error'] == 0 ): // OK
		 
			$mensaje['mensaje'] = 'Cargo modificado exitosamente';
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

		 		case -4: // El id_cargo no existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;

		 		case 1: // El id_cargo ya existe

		 		 	$mensaje['mensaje'] ='Error: ha ocurrido un error interno, intente nuevamente';
		 			break;
		 	}
			

		endif;   

	endif; 

	$this->session->set_flashdata('mensaje', $mensaje );
	redirect("cargo/index");
}

public function baja_cargo()
{
	chrome_log("baja_cargo");

	if ($this->form_validation->run('baja_cargo') == FALSE):  

		chrome_log("No Paso validacion");
	 	$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
	 	$this->session->set_flashdata('mensaje',$mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());
		$return["error"] = TRUE;
	 
	else:
		chrome_log("Si Paso validacion");

		$query = $this->Cargo_model->abm_cargo( 'B', $this->input->post() );
  
		if ( $query['codigo_error'] == 0 ): // OK
		 
			$mensaje['mensaje'] = 'Cargo eliminado exitosamente';
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

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			$return["error"] = TRUE;
		 			break;

		 		case -4: // El id_cargo no existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			$return["error"] = TRUE;
		 			break;

		 		case 1: // El id_cargo ya existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			$return["error"] = TRUE;
		 			break;
		 	}
			

		endif;  

	endif; 

	$this->session->set_flashdata('mensaje', $mensaje );
	print json_encode($return); 
}

public function existe_cargo_validation($id_cargo=null)
{
	if($this->Cargo_model->existe_cargo($id_cargo)) 
		return true; 
	else 
		return false; // Duplicado
}

}

?>