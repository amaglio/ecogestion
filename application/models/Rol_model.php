<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rol_model extends CI_Model {

public $variable;

public function __construct()
{
	
	parent::__construct();
}

function traer_roles()
{

	$sql =	"	SELECT *
    			FROM rol r   "  ;
	
	$query = $this->db->query( $sql );

	return $query;	
}

function traer_modulos()
{

	$sql =	"	SELECT *
    			FROM modulo m   "  ;
	
	$query = $this->db->query( $sql );

	return $query;	
}

function traer_modulos_rol($id_rol)
{

	$sql =	"	SELECT *
    			FROM rol_modulo rm
    			WHERE id_rol = ?   "  ;
	
	$query = $this->db->query( $sql, array($id_rol) );

	return $query;	
}




function traer_informacion_rol($id_rol)
{

	$sql =	"	SELECT *
    			FROM rol r 
    			WHERE id_rol = ? "  ;
	
	$query = $this->db->query( $sql, array( $id_rol ));

	return $query->row();	
}

function abm_rol($accion, $array)
{
 
    if(isset($array['id_rol']) && !empty($array['id_rol']))
        $id_rol = "'".$array['id_rol']."'";
    else
        $id_rol = " NULL " ;


    if(isset($array['rol']) && !empty($array['rol']))
        $rol = "'".$array['rol']."'";
    else
        $rol = " NULL " ;

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

 	chrome_log("call sp_abm_rol(  
									'$accion', 
									 $id_rol, 
									 $rol, 
									 $modulos ,   
									 @pi_id_rol_new,
									 @pv_error_msj, 
									 @pn_error_cod	 )");

 	$this->db->query("call sp_abm_rol(  
									'$accion', 
									 $id_rol, 
									 $rol, 
									 $modulos ,   
									 @pi_id_rol_new,
									 @pv_error_msj, 
									 @pn_error_cod	 )");

 	$sql = "SELECT 	@pi_id_rol_new as id_rol, 
 					@pn_error_cod as codigo_error , 
 					@pv_error_msj as mensaje_error";

	$query = $this->db->query($sql);

	return $query->row_array(); 
}

function existe_rol($id_rol)
{
    chrome_log("Rol_model/existe_rol");
    
    $sql = "    SELECT fn_exist_rol ( ? ) as existe
                FROM dual " ;
 
    $query = $this->db->query($sql, array($id_rol));

    chrome_log( "Cod sql: ".$query->row()->existe );

    return $query->row()->existe;
}




}

 
?>