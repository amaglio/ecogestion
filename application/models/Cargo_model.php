<?

class Cargo_model extends CI_Model {

function __construct()
{
    parent::__construct();
}

public function traer_cargos()
{
    
    $sql =  "   SELECT c.*, a.nombre as area_nombre
                FROM cargo c, area a
                WHERE c.fecha_baja IS NULL 
                AND c.id_area = a.id_area"  ;
    
    $query = $this->db->query( $sql );

    return $query;  
}

public function traer_informacion_cargo($id_cargo)
{
     $sql =  "  SELECT *
                FROM cargo r
                WHERE id_cargo = ? "  ;
    
    $query = $this->db->query( $sql, array($id_cargo) );

    return $query->row();  
}

function abm_cargo($accion, $array)
{
    // Para B-M
    if(isset($array['id_cargo']) && !empty($array['id_cargo']))
        $id_cargo = "'".$array['id_cargo']."'";
    else
        $id_cargo = " NULL " ;

    // Para A - M
    if(isset($array['nombre_cargo']) && !empty($array['nombre_cargo']))
        $nombre_cargo = "'".$array['nombre_cargo']."'";
    else
        $nombre_cargo = " NULL " ;

    // Para A - M
    if(isset($array['area']) && !empty($array['area']))
        $id_area = "'".$array['area']."'";
    else
        $id_area = " NULL " ;
 

    chrome_log("call sp_abm_cargo(  
                                    '$accion', 
                                     $id_cargo, 
                                     $nombre_cargo ,
                                     $id_area,
                                     @pi_id_cargo_new,
                                     @pv_error_msj, 
                                     @pn_error_cod   )");

    $this->db->query("call sp_abm_cargo(  
                                    '$accion', 
                                     $id_cargo, 
                                     $nombre_cargo ,
                                     $id_area,
                                     @pi_id_cargo_new,
                                     @pv_error_msj, 
                                     @pn_error_cod   )");

    $sql = "SELECT  @pi_id_cargo_new as id_cargo, 
                    @pn_error_cod as codigo_error , 
                    @pv_error_msj as mensaje_error";

    $query = $this->db->query($sql);

    return $query->row_array(); 
}

public function existe_cargo($id_cargo)
{
    chrome_log("cargo_model/existe_cargo");
    
    $sql = "    SELECT fn_exist_cargo ( ? ) as existe
                FROM dual " ;
 
    $query = $this->db->query($sql, array($id_cargo));

    chrome_log( "Cod sql: ".$query->row()->existe );

    return $query->row()->existe;
}

}	

?>