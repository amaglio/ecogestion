<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Necesidad_model extends CI_Model {

public $variable;

public function __construct()
{
	
	parent::__construct();
}

function traer_necesidades()
{

	$sql =	"	SELECT r.*, CONCAT(t.id_trabajo, '- ', t.descripcion) as descripcion_trabajo
    			FROM necesidad r, trabajo t
                WHERE r.id_trabajo = t.id_trabajo   "  ;
	
	$query = $this->db->query( $sql );

	return $query;	
}


function traer_informacion_necesidad($id_necesidad)
{

	$sql =	"	SELECT *
    			FROM necesidad r 
    			WHERE id_necesidad = ? "  ;
	
	$query = $this->db->query( $sql, array( $id_necesidad ));

	return $query->row();	
}

function abm_necesidad($accion, $array)
{
 
    if(isset($array['id_necesidad']) && !empty($array['id_necesidad']))
        $id_necesidad = "'".$array['id_necesidad']."'";
    else
        $id_necesidad = " NULL " ;


    if(isset($array['necesidad']) && !empty($array['necesidad']))
        $necesidad = "'".$array['necesidad']."'";
    else
        $necesidad = " NULL " ;

    $modulos = '';

    if(isset($array['id_modulo']) && !empty($array['id_modulo'])):

    	foreach ($array['id_modulo'] as $row) 
    	{
    		$modulos .=  $row."-";
    	}	
        
        $modulos = "'".$modulos."'";
        
    else:

        $modulos = " NULL " ;

    endif;

 	chrome_log("call sp_abm_necesidad(  
									'$accion', 
									 $id_necesidad, 
									 $necesidad, 
									 $modulos ,   
									 @pi_id_necesidad_new,
									 @pv_error_msj, 
									 @pn_error_cod	 )");

 	$this->db->query("call sp_abm_necesidad(  
									'$accion', 
									 $id_necesidad, 
									 $necesidad, 
									 $modulos ,   
									 @pi_id_necesidad_new,
									 @pv_error_msj, 
									 @pn_error_cod	 )");

 	$sql = "SELECT 	@pi_id_necesidad_new as id_necesidad, 
 					@pn_error_cod as codigo_error , 
 					@pv_error_msj as mensaje_error";

	$query = $this->db->query($sql);

	return $query->row_array(); 
}

function existe_necesidad($id_necesidad)
{
    chrome_log("Necesidad_model/existe_necesidad");
    
    $sql = "    SELECT fn_exist_necesidad ( ? ) as existe
                FROM dual " ;
 
    $query = $this->db->query($sql, array($id_necesidad));

    chrome_log( "Cod sql: ".$query->row()->existe );

    return $query->row()->existe;
}




}

 
?>