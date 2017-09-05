<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model {

public $variable;

public function __construct()
{
	
	parent::__construct();
}


public function traer_cargos()
{
	
	$sql =	"	SELECT CONCAT(c.nombre,  ' - ', a.nombre) as nombre,
					   c.id_cargo 
    			FROM cargo c ,area a
    			WHERE c.id_area = a.id_area 
    			AND c.fecha_baja IS NULL "  ;
	
	$query = $this->db->query( $sql );

	return $query;	

}

/*
public function traer_usuarios()
{
	
	$sql =	"	SELECT u.*, c.nombre as cargo
    			FROM usuario u
    				 LEFT JOIN cargo c ON u.id_cargo = c.id_cargo
    			WHERE u.fecha_baja IS NULL "  ;
	
	$query = $this->db->query( $sql );

	return $query;	
}*/

public function traer_usuarios()
{
	
	$sql =	"	SELECT *
    			FROM v_usuario "  ;
	
	$query = $this->db->query( $sql );

	return $query;	
}

public function traer_roles_usuario($id_usuario)
{
	
	$sql =	"	SELECT *
				FROM rol r, usuario_rol ur
				WHERE r.id_rol = ur.id_rol
				AND	  ur.id_usuario = ?	  "  ;
	
	$query = $this->db->query( $sql, array( $id_usuario ) );

	return $query;	
}

public function traer_datos_usuario($id_usuario)
{
	
	$sql =	"	SELECT u.*, c.nombre as cargo
    			FROM usuario u
    				 LEFT JOIN cargo c ON u.id_cargo = c.id_cargo
    			WHERE u.id_usuario = ? "  ;
	
	$query = $this->db->query( $sql, array( $id_usuario ) );

	return $query->row();	
}


public function desbloquear_usuario($array)
{
	$id_usuario = $array['id_usuario'];
	$password =  md5($array['password']); 

	chrome_log( "call sp_desbloquear_usuario( 	'$id_usuario' ,  
		 									 	'$password', 
		 									 	@pn_error_cod, 
		 										@pv_error_msj  ) ");

 	$this->db->query("call sp_desbloquear_usuario( 	'$id_usuario' ,  
		 									 	'$password', 
		 									 	@pn_error_cod, 
		 										@pv_error_msj  )  ");

 	$sql = "SELECT  @pn_error_cod as codigo_error,
 					@pv_error_msj as mensaje ";

	$query = $this->db->query($sql);

	return $query->row_array(); 
}

public function cambiar_password($array)
{
	$alias = $array['alias'];
	$password_anterior =  md5($array['password_anterior']);
	$password_nuevo =  md5($array['password_nuevo']);

	chrome_log("CALL `sp_cambiar_password_usr` ('$alias','$password_anterior', '$password_nuevo', @cod, @msj))");
 	
 	$this->db->query("call sp_cambiar_password_usr( '$alias' ,  
				 									 '$password_anterior', 
				 									 '$password_nuevo', 
				 									 @pn_error_cod, 
				 									 @pv_error_msj,
				 									 @pn_id_usuario )");

 	$sql = "SELECT  @pn_error_cod as codigo_error,
 					@pv_error_msj as mensaje,
 					@pn_id_usuario as id_usuario";

	$query = $this->db->query($sql);

	return $query->row_array(); 
}

function abm_usuario($accion, $array)
{
	// Para B-M
	if(isset($array['id_usuario']) && !empty($array['id_usuario']))
        $id_usuario = "'".$array['id_usuario']."'";
    else
        $id_usuario = " NULL " ;

    // Para A
    if(isset($array['alias']) && !empty($array['alias']))
        $alias = "'".$array['alias']."'";
    else
        $alias = " NULL " ;

    // Para A
    if(isset($array['password']) && !empty($array['password']))
        $password = "'".md5($array['password'])."'";
    else
        $password = " NULL " ;

    // Para A - M
    if(isset($array['nombre']) && !empty($array['nombre']))
        $nombre = "'".$array['nombre']."'";
    else
        $nombre = " NULL " ;

    // Para A - M
    if(isset($array['apellido']) && !empty($array['apellido']))
        $apellido = "'".$array['apellido']."'";
    else
        $apellido = " NULL " ;

    // Para A - M
    if(isset($array['id_cargo']) && !empty($array['id_cargo']))
        $id_cargo = "'".$array['id_cargo']."'";
    else
        $id_cargo = " NULL " ;


 	chrome_log("call sp_abm_usuario(  
									'$accion', 
									 $id_usuario, 
									 $alias, 
									 $password , 
									 $nombre ,  
									 $apellido ,  
									 $id_cargo ,  
									 @pi_id_usuario_new,
									 @pv_error_msj, 
									 @pn_error_cod	 )");

 	$this->db->query("call sp_abm_usuario(  
									'$accion', 
									 $id_usuario, 
									 $alias, 
									 $password , 
									 $nombre ,  
									 $apellido ,  
									 $id_cargo ,  
									 @pi_id_usuario_new, 
									 @pv_error_msj, 
									 @pn_error_cod)" );

 	$sql = "SELECT 	@pi_id_usuario_new as id_usuario, 
 					@pn_error_cod as codigo_error , 
 					@pv_error_msj as mensaje_error";

	$query = $this->db->query($sql);

	return $query->row_array(); 
}

function existe_usuario($id_usuario)
{
    chrome_log("Usuario_model/existe_usuario");
    
    $sql = "    SELECT fn_exist_usuario ( ? ) as existe
                FROM dual " ;
 
    $query = $this->db->query($sql, array($id_usuario));

    chrome_log( "Cod sql: ".$query->row()->existe );

    return $query->row()->existe;
}

function es_usuario_desbloquear($id_usuario_debloquear)
{
    chrome_log("Usuario_model/id_usuario_debloquear");
    
    $sql = "    SELECT fn_es_usuario_desbloquear ( ? ) as existe
                FROM dual " ;
 
    $query = $this->db->query($sql, array($id_usuario_debloquear));

    chrome_log( "Cod sql: ".$query->row()->existe );

    return $query->row()->existe;
}

public function asignar_roles_usuario($array)
{
	$id_usuario = $array['id_usuario'];
	$roles = '';

	foreach ($array['rol'] as $row) 
	{
		$roles .= $row."-";
	}
 

	chrome_log( "call sp_asignar_roles_usuario( 	'$id_usuario' ,  
			 									 	'$roles', 
			 									 	@pv_error_msj, 
			 										@pn_error_cod  ) ");

 	$this->db->query(" call sp_asignar_roles_usuario( 	'$id_usuario' ,  
			 									 	'$roles', 
			 									 	@pv_error_msj, 
			 										@pn_error_cod  )  ");

 	$sql = "SELECT  @pn_error_cod as codigo_error,
 					@pv_error_msj as mensaje ";

	$query = $this->db->query($sql);

	return $query->row_array(); 
}



 


}

 
?>