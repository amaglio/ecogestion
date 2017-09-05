<?

class Rama_model extends CI_Model {

function __construct()
{
    parent::__construct();
}

public function traer_ramas()
{
    
    $sql =  "   SELECT *
                FROM rama r
                WHERE fecha_baja IS NULL "  ;
    
    $query = $this->db->query( $sql );

    return $query;  
}

public function traer_informacion_rama($id_rama)
{
    $sql =  "  SELECT *
                FROM rama r
                WHERE id_rama = ? "  ;
    
    $query = $this->db->query( $sql, array($id_rama) );

    return $query->row();  
}

function abm_rama($accion, $array)
{
    // Para B-M
    if(isset($array['id_rama']) && !empty($array['id_rama']))
        $id_rama = "'".$array['id_rama']."'";
    else
        $id_rama = " NULL " ;

    // Para A - M
    if(isset($array['nombre_rama']) && !empty($array['nombre_rama']))
        $nombre_rama = "'".$array['nombre_rama']."'";
    else
        $nombre_rama = " NULL " ;
 

    chrome_log("call sp_abm_rama(  
                                    '$accion', 
                                     $id_rama, 
                                     $nombre_rama ,  
                                     @pi_id_rama_new,
                                     @pv_error_msj, 
                                     @pn_error_cod   )");

    $this->db->query("call sp_abm_rama(  
                                    '$accion', 
                                     $id_rama, 
                                     $nombre_rama ,  
                                     @pi_id_rama_new,
                                     @pv_error_msj, 
                                     @pn_error_cod   )"  );

    $sql = "SELECT  @pi_id_rama_new as id_rama, 
                    @pn_error_cod as codigo_error , 
                    @pv_error_msj as mensaje_error";

    $query = $this->db->query($sql);

    return $query->row_array(); 
}

public function existe_rama($id_rama)
{
    chrome_log("Rama_model/existe_rama");
    
    $sql = "    SELECT fn_exist_rama ( ? ) as existe
                FROM dual " ;
 
    $query = $this->db->query($sql, array($id_rama));

    chrome_log( "Cod sql: ".$query->row()->existe );

    return $query->row()->existe;
}



}	

?>