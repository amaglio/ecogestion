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
                WHERE r.id_trabajo = t.id_trabajo   
                AND fecha_baja IS NULL"  ;
	
	$query = $this->db->query( $sql );

	return $query;	
}


function traer_necesidades_trabajo($id_trabajo)
{

    $sql =  "   SELECT r.*, CONCAT(t.id_trabajo, '- ', t.descripcion) as descripcion_trabajo
                FROM necesidad r, trabajo t
                WHERE r.id_trabajo = t.id_trabajo  
                AND fecha_baja IS NULL "  ;
    
    $query = $this->db->query( $sql );

    return $query;  
}


function traer_informacion_necesidad($id_necesidad)
{

	$sql =	"	SELECT r.*, DATE_FORMAT(fecha_limite, '%d/%m/%Y') AS fecha_limite
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


    if(isset($array['id_trabajo']) && !empty($array['id_trabajo']))
        $id_trabajo = "'".$array['id_trabajo']."'";
    else
        $id_trabajo = " NULL " ;

    $modulos = '';

    if(isset($array['fecha_limite']) && !empty($array['fecha_limite'])):

        $array_fecha = explode("/", $array['fecha_limite']);
        $fecha_limite = "'".$array_fecha[2]."-".$array_fecha[1]."-".$array_fecha[0]."'";
        
    else:

        $fecha_limite = " NULL " ;

    endif;

    $id_usuario_operador = $this->session->userdata('eco_id');


    if(isset($array['cierre_forzado']) && !empty($array['cierre_forzado']))
        $cierre_forzado = "'".$array['cierre_forzado']."'";
    else
        $cierre_forzado = " 0 " ;

    if(isset($array['descripcion']) && !empty($array['descripcion']))
        $descripcion = "'".$array['descripcion']."'";
    else
        $descripcion = " NULL " ;



 	chrome_log("call sp_abm_necesidad(  
                                            '$accion', 
                                            $id_necesidad, 
                                            $id_trabajo,
                                            $fecha_limite, 
                                            '$id_usuario_operador', 
                                            $cierre_forzado, 
                                            $descripcion, 
                                            @pi_id_necesidad_new,
                                            @pv_error_msj, 
                                            @pn_error_cod    )");

 	$this->db->query("call sp_abm_necesidad(  
        									'$accion', 
        									$id_necesidad, 
                                            $id_trabajo,
        									$fecha_limite, 
        									'$id_usuario_operador', 
                                            $cierre_forzado, 
                                            $descripcion, 
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