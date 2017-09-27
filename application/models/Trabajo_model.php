<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trabajo_model extends CI_Model {

public $variable;

public function __construct()
{
	
	parent::__construct();
}

function traer_trabajos()
{

	$sql =	"	SELECT t.*, a.nombre as nombre_area
    			FROM trabajo t, area a
                WHERE t.id_area = a.id_area "  ;
	
	$query = $this->db->query( $sql );

	return $query;	
}


function traer_informacion_trabajo($id_trabajo)
{

	$sql =	"	SELECT *
    			FROM trabajo r 
    			WHERE id_trabajo = ? "  ;
	
	$query = $this->db->query( $sql, array( $id_trabajo ));

	return $query->row();	
}

function abm_trabajo($accion, $array)
{
 
    if(isset($array['id_trabajo']) && !empty($array['id_trabajo']))
        $id_trabajo = "'".$array['id_trabajo']."'";
    else
        $id_trabajo = " NULL " ;


    if(isset($array['trabajo']) && !empty($array['trabajo']))
        $trabajo = "'".$array['trabajo']."'";
    else
        $trabajo = " NULL " ;

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

 	chrome_log("call sp_abm_trabajo(  
									'$accion', 
									 $id_trabajo, 
									 $trabajo, 
									 $modulos ,   
									 @pi_id_trabajo_new,
									 @pv_error_msj, 
									 @pn_error_cod	 )");

 	$this->db->query("call sp_abm_trabajo(  
									'$accion', 
									 $id_trabajo, 
									 $trabajo, 
									 $modulos ,   
									 @pi_id_trabajo_new,
									 @pv_error_msj, 
									 @pn_error_cod	 )");

 	$sql = "SELECT 	@pi_id_trabajo_new as id_trabajo, 
 					@pn_error_cod as codigo_error , 
 					@pv_error_msj as mensaje_error";

	$query = $this->db->query($sql);

	return $query->row_array(); 
}

function existe_trabajo($id_trabajo)
{
    chrome_log("Trabajo_model/existe_trabajo");
    
    $sql = "    SELECT fn_exist_trabajo ( ? ) as existe
                FROM dual " ;
 
    $query = $this->db->query($sql, array($id_trabajo));

    chrome_log( "Cod sql: ".$query->row()->existe );

    return $query->row()->existe;
}




}

 
?>