<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proveedor extends CI_Controller {

	 	
public function __construct()
{
	parent::__construct();
	$this->load->model('Proveedor_model'); 
}

public function index()
{
	$datos['mensaje'] = $this->session->flashdata('mensaje');
	$datos['error'] = $this->session->flashdata('error');

	$datos['proveedores'] = $this->Proveedor_model->traer_proveedores();

	$this->load->view('estructura/head');	
	$this->load->view('proveedor/index',$datos);
	$this->load->view('estructura/footer');  
}

public function proveedor($id_proveedor=NULL) // Ver proveedor
{
	$_POST['id_proveedor'] = $id_proveedor;
	$this->form_validation->set_data($_POST);
	$this->form_validation->set_message('existe_proveedor_validation', 'El proveedor no existe');	

	if ($this->form_validation->run('ver_proveedor') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';

	 	$this->session->set_flashdata('mensaje', $mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());	 
		var_dump( $this->form_validation->error_array());
		//redirect("proveedor/index");

	else:

		$datos['mensaje'] = $this->session->flashdata('mensaje');
		$datos['error'] = $this->session->flashdata('error');

		$datos['proveedor'] = $this->Proveedor_model->traer_informacion_proveedor($id_proveedor);


		$this->load->view('estructura/head');	
		$this->load->view('proveedor/ver_proveedor',$datos);
		$this->load->view('estructura/footer');  

	endif;
}

public function alta_proveedor()
{
	chrome_log("alta_proveedor");

	if ($this->form_validation->run('alta_proveedor') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
	 	$this->session->set_flashdata('mensaje',$mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());
	 
	else:

		chrome_log("Si Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		/*
		$query = $this->Proveedor_model->abm_proveedor( 'A', $this->input->post() );
 
		if ( $query['codigo_error'] == 0 ): // OK
		 	
		 	$mensaje['mensaje'] = 'Proveedor creada exitosamente';
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

		 		case -4: // El id_proveedor no existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;

		 		case 1: // El id_proveedor ya existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;
		 	}

		
		endif;
		*/

	endif; 

	$this->session->set_flashdata('mensaje', $mensaje );
	//redirect("proveedor/index");
}

public function modifica_proveedor()
{
	chrome_log("modifica_proveedor");

	if ($this->form_validation->run('modifica_proveedor') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
	 	$this->session->set_flashdata('mensaje',$mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());
	 
	else:
		chrome_log("Si Paso validacion");

		$query = $this->Proveedor_model->abm_proveedor( 'M', $this->input->post() );
 
		if ( $query['codigo_error'] == 0 ): // OK
		 	
		 	$mensaje['mensaje'] = 'Proveedor modificada exitosamente';
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

		 		case -4: // El id_proveedor no existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;

		 		case 1: // El id_proveedor ya existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;
		 	}

			$this->session->set_flashdata('mensaje', $mensaje );

		
		endif;   
	endif; 

	redirect("proveedor/index");
}

public function baja_proveedor()
{
	chrome_log("baja_proveedor");

	if ($this->form_validation->run('baja_proveedor') == FALSE):  

		chrome_log("No Paso validacion");
	 	$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
		$this->session->set_flashdata('error_alta', $this->form_validation->error_array());
		$return["error"] = TRUE;
	 
	else:
		
		chrome_log("Si Paso validacion");

		$query = $this->Proveedor_model->abm_proveedor( 'B', $this->input->post() );
  
		if ( $query['codigo_error'] == 0 ): // OK
		 
			$mensaje['mensaje'] = 'Proveedor eliminada exitosamente';
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

		 		case -4: // El id_proveedor no existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			$return["error"] = TRUE;
		 			break;

		 		case 1: // El id_proveedor ya existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			$return["error"] = TRUE;
		 			break;
		 	}
			
		 	

		endif;  



	endif; 

	$this->session->set_flashdata('mensaje',$mensaje);
	print json_encode($return); 
}

public function existe_proveedor_validation($id_proveedor=null)
{
	if($this->Proveedor_model->existe_proveedor($id_proveedor)) 
		return true; 
	else 
		return false; // Duplicado
}

}

?>