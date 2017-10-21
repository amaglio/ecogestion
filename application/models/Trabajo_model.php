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

	$sql =	"	SELECT t.*, a.nombre as nombre_area,  DATE_FORMAT(t.fecha_inicio, '%d/%m/%Y') AS fecha_inicio,  DATE_FORMAT(t.fecha_fin, '%d/%m/%Y') AS fecha_fin
                FROM trabajo t, area a
                WHERE t.id_area = a.id_area
                AND t.id_trabajo = ? "  ;
	
	$query = $this->db->query( $sql, array( $id_trabajo ));

	return $query->row();	
}

function abm_trabajo($accion, $array)
{
 
    if(isset($array['id_trabajo']) && !empty($array['id_trabajo']))
        $id_trabajo = "'".$array['id_trabajo']."'";
    else
        $id_trabajo = " NULL " ;


    if(isset($array['id_trabajo_tango']) && !empty($array['id_trabajo_tango']))
        $id_trabajo_tango = "'".$array['id_trabajo_tango']."'";
    else
        $id_trabajo_tango = " NULL " ;


    if(isset($array['descripcion']) && !empty($array['descripcion']))
        $descripcion = "'".$array['descripcion']."'";
    else
        $descripcion = " NULL " ;

    if(isset($array['id_area']) && !empty($array['id_area']))
        $id_area = "'".$array['id_area']."'";
    else
        $id_area = " NULL " ;

    if(isset($array['id_trabajo_estado']) && !empty($array['id_trabajo_estado']))
        $id_trabajo_estado = "'".$array['id_trabajo_estado']."'";
    else
        $id_trabajo_estado = " NULL " ;


    $id_usuario_operador = $this->session->userdata('eco_id');

    if(isset($array['fecha_inicio']) && !empty($array['fecha_inicio'])):

        $array_fecha = explode("/", $array['fecha_inicio']);
        $fecha_inicio = "'".$array_fecha[2]."-".$array_fecha[1]."-".$array_fecha[0]."'";
        
    else:

        $fecha_inicio = " NULL " ;

    endif;


    if(isset($array['fecha_fin']) && !empty($array['fecha_fin'])):

        $array_fecha = explode("/", $array['fecha_fin']);
        $fecha_fin = "'".$array_fecha[2]."-".$array_fecha[1]."-".$array_fecha[0]."'";
        
    else:

        $fecha_fin = " NULL " ;

    endif;

     if(isset($array['comentario']) && !empty($array['comentario']))
        $comentario = "'".$array['comentario']."'";
    else
        $comentario = " NULL " ;

 

 	$this->db->query("call sp_abm_trabajo(  
									'$accion', 
									$id_trabajo, 
									$id_trabajo_tango, 
									$descripcion ,   
                                    $id_area,
                                    $id_trabajo_estado,
                                    '$id_usuario_operador',
                                    $fecha_inicio,
                                    $fecha_fin,
                                    $comentario,
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