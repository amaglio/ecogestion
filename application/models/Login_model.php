<?

class Login_model extends CI_Model {

function __construct()
{
    parent::__construct();
}
 


public function loguearse( $array ) 
{
	chrome_log("Partido_model/loguearse");

 
	$usuario = $array['usuario'];
	$password = md5($array['password']);

	chrome_log("call sp_login( '$usuario' ,  '$password', @pi_id_usuario, @pv_nombre , @pv_apellido, @pn_error_cod, @pv_error_msj )");
 	
 	$this->db->query("call sp_login( '$usuario' ,  
 									 '$password', 
 									 @pi_id_usuario, 
 									 @pv_nombre , 
 									 @pv_apellido, 
 									 @pn_error_cod, 
 									 @pv_error_msj )");

 	$sql = "SELECT  @pi_id_usuario as id_usuario, 
 					@pv_nombre as nombre , 
 					@pv_apellido as apellido , 
 					@pn_error_cod as codigo_error,
 					@pv_error_msj as mensaje";

	$query = $this->db->query($sql);
	return $query->row_array(); 
}




public function registrar_usuario( $array ) 
{
	chrome_log("Partido_model/insertar_usuario");

	$nombre_cuenta = $array['nombre_cuenta'];
	$alias = $array['alias'];
	$email = $array['email'];
	$password = md5($array['password']);

	//-- Nombre 
	if(isset($array['nombre']) && !empty($array['nombre']))
        $nombre = "'".$array['nombre']."'";
    else
        $nombre = " NULL " ;

    //-- Apellido 
    if(isset($array['apellido']) && !empty($array['apellido']))
        $apellido = "'".$array['apellido']."'";
    else
        $apellido = " NULL " ;
 	
 	$this->db->query("call sp_registrar_usuario( 	'$nombre_cuenta' , 
													'$alias', 
													'$email',  
													'$password',
													$nombre, 
													$apellido,
													@pbi_id_usuario ,
													@pbi_id_email ,
													@pv_token,
													@pv_error_msj, 
													@pi_error_cod)");

 	$sql = "SELECT 	@pv_error_msj as mensaje, 
				 	@pi_error_cod as codigo_error , 
				 	@pbi_id_usuario as id_usuario,
				 	@pv_token as token,
				 	@pbi_id_email as id_email  ";
	$query = $this->db->query($sql);

	return $query->row_array();
}

public function existe_usuario($usuario)
{
	chrome_log("Login_model/existe_usuario");
	
	$sql = "	SELECT fn_exist_nick_usuario ( ? ) as existe
				FROM dual " ;
 
	$query = $this->db->query($sql, array($usuario));

	chrome_log( "Cod sql: ".$query->row()->existe );

	return $query->row()->existe;
}

public function existe_email($email)
{
	chrome_log("Login_model/existe_email");
	
	$sql = "	SELECT fn_exist_email_usuario ( ? ) as existe
				FROM dual " ;
 
	$query = $this->db->query($sql, array($email));

	chrome_log( "Cod sql: ".$query->row()->existe );

	return $query->row()->existe;
}



}	


?>