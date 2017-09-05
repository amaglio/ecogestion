<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configurar_compra extends CI_Controller {

	 	
public function __construct()
{
	parent::__construct();
	$this->load->model('Configurar_compra_model'); 
}

public function index()
{
	$datos['mensaje'] = $this->session->flashdata('mensaje');
	$datos['error'] = $this->session->flashdata('error');

	$datos['areas'] = $this->Configurar_compra_model->traer_areas(); 

	$this->load->view('estructura/head');	
	$this->load->view('area/index',$datos);
	$this->load->view('estructura/footer');  
}

// +++++++++++++++ MONEDA +++++++++++++++++++

public function monedas( )  
{ 
}

public function ver_moneda($id_moneda=NULL) // Ver moneda
{ 
}

public function alta_moneda()
{
	chrome_log("alta_moneda");

	if ($this->form_validation->run('alta_moneda') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
	 	$this->session->set_flashdata('mensaje',$mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());
	 
	else:

		chrome_log("Si Paso validacion");

		$query = $this->Configurar_compra_model->abm_moneda( 'A', $this->input->post() );
 
		if ( $query['codigo_error'] == 0 ): // OK
		 	
		 	$mensaje['mensaje'] = 'moneda creada exitosamente';
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

		 		case -4: // El id_moneda no existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;

		 		case 1: // El id_moneda ya existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;
		 	}

		
		endif;

	endif; 

	$this->session->set_flashdata('mensaje', $mensaje );
	redirect("moneda/index");
}

public function modifica_moneda()
{
	chrome_log("modifica_moneda");

	if ($this->form_validation->run('modifica_moneda') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
	 	$this->session->set_flashdata('mensaje',$mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());
	 
	else:
		chrome_log("Si Paso validacion");

		$query = $this->Configurar_compra_model->abm_moneda( 'M', $this->input->post() );
 
		if ( $query['codigo_error'] == 0 ): // OK
		 	
		 	$mensaje['mensaje'] = 'moneda modificada exitosamente';
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

		 		case -4: // El id_moneda no existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;

		 		case 1: // El id_moneda ya existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;
		 	}

			$this->session->set_flashdata('mensaje', $mensaje );

		
		endif;   
	endif; 

	redirect("moneda/index");
}

public function baja_moneda()
{
	chrome_log("baja_moneda");

	if ($this->form_validation->run('baja_moneda') == FALSE):  

		chrome_log("No Paso validacion");
	 	$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
		$this->session->set_flashdata('error_alta', $this->form_validation->error_array());
		$return["error"] = TRUE;
	 
	else:
		
		chrome_log("Si Paso validacion");

		$query = $this->Configurar_compra_model->abm_moneda( 'B', $this->input->post() );
  
		if ( $query['codigo_error'] == 0 ): // OK
		 
			$mensaje['mensaje'] = 'moneda eliminada exitosamente';
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

		 		case -4: // El id_moneda no existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			$return["error"] = TRUE;
		 			break;

		 		case 1: // El id_moneda ya existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			$return["error"] = TRUE;
		 			break;
		 	}
			
		 	

		endif;  



	endif; 

	$this->session->set_flashdata('mensaje',$mensaje);
	print json_encode($return); 
}

public function existe_moneda_validation($id_area=null)
{
	if($this->Configurar_compra_model->existe_moneda($id_moneda)) 
		return true; 
	else 
		return false; // Duplicado
}

// +++++++++++++++ FORMAS DEPAGO +++++++++++++++++++

public function formas_pago( )  
{ 
}

public function ver_forma_pago($id_forma_pago=NULL) // Ver forma
{ 
}

public function alta_forma_pago()
{
	chrome_log("alta_forma_pago");

	if ($this->form_validation->run('alta_forma_pago') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
	 	$this->session->set_flashdata('mensaje',$mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());
	 
	else:

		chrome_log("Si Paso validacion");

		$query = $this->Configurar_compra_model->abm_forma_pago( 'A', $this->input->post() );
 
		if ( $query['codigo_error'] == 0 ): // OK
		 	
		 	$mensaje['mensaje'] = 'forma_pago creada exitosamente';
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

		 		case -4: // El id_forma_pago no existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;

		 		case 1: // El id_forma_pago ya existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;
		 	}

		
		endif;

	endif; 

	$this->session->set_flashdata('mensaje', $mensaje );
	redirect("forma_pago/index");
}

public function modifica_forma_pago()
{
	chrome_log("modifica_forma_pago");

	if ($this->form_validation->run('modifica_forma_pago') == FALSE):  

		chrome_log("No Paso validacion");
		$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
	 	$this->session->set_flashdata('mensaje',$mensaje);
		$this->session->set_flashdata('error', $this->form_validation->error_array());
	 
	else:
		chrome_log("Si Paso validacion");

		$query = $this->Configurar_compra_model->abm_forma_pago( 'M', $this->input->post() );
 
		if ( $query['codigo_error'] == 0 ): // OK
		 	
		 	$mensaje['mensaje'] = 'forma_pago modificada exitosamente';
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

		 		case -4: // El id_forma_pago no existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;

		 		case 1: // El id_forma_pago ya existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			break;
		 	}

			$this->session->set_flashdata('mensaje', $mensaje );

		
		endif;   
	endif; 

	redirect("forma_pago/index");
}

public function baja_forma_pago()
{
	chrome_log("baja_forma_pago");

	if ($this->form_validation->run('baja_forma_pago') == FALSE):  

		chrome_log("No Paso validacion");
	 	$mensaje['mensaje'] = 'No pasó la validación, intente nuevamente';
		$mensaje['clase_mensaje'] = 'danger';
		$this->session->set_flashdata('error_alta', $this->form_validation->error_array());
		$return["error"] = TRUE;
	 
	else:
		
		chrome_log("Si Paso validacion");

		$query = $this->Configurar_compra_model->abm_forma_pago( 'B', $this->input->post() );
  
		if ( $query['codigo_error'] == 0 ): // OK
		 
			$mensaje['mensaje'] = 'forma_pago eliminada exitosamente';
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

		 		case -4: // El id_forma_pago no existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			$return["error"] = TRUE;
		 			break;

		 		case 1: // El id_forma_pago ya existe

		 		 	$mensaje['mensaje'] = 'Error: ha ocurrido un error interno, intente nuevamente';
		 			$return["error"] = TRUE;
		 			break;
		 	}
			
		 	

		endif;  



	endif; 

	$this->session->set_flashdata('mensaje',$mensaje);
	print json_encode($return); 
}

public function existe_forma_pago_validation($id_area=null)
{
	if($this->Configurar_compra_model->existe_forma_pago($id_forma_pago)) 
		return true; 
	else 
		return false; // Duplicado
}

// +++++++++++++++ TIPO DE IVA +++++++++++++++++++
 


}

?>