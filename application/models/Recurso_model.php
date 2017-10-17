<?

class Recurso_model extends CI_Model {

function __construct()
{
    parent::__construct();
}



public function traer_recursos()
{
    
    $sql =  "   SELECT *
                FROM recurso
                WHERE fecha_baja IS NULL"  ;
    
    $query = $this->db->query( $sql );
 

    return $query;  

}

public function traer_recursos_necesidad($id_necesidad)
{
    
    $sql =  "   SELECT *
                FROM necesidad_item ni, recurso r
                WHERE ni.id_recurso = r.id_recurso
                AND ni.id_necesidad = $id_necesidad "  ;
    
    $query = $this->db->query( $sql );
 

    return $query;  

}


public function traer_informacion_recurso($id_recurso)
{
     $sql =  "  SELECT *
                FROM recurso r
                WHERE id_recurso = ? "  ;
    
    $query = $this->db->query( $sql, array($id_recurso) );

    return $query->row();  
}

function abm_recurso($accion, $array)
{
    // Para B-M
    if(isset($array['id_recurso']) && !empty($array['id_recurso']))
        $id_recurso = "'".$array['id_recurso']."'";
    else
        $id_recurso = " NULL " ;

    // Para A - M
    if(isset($array['nombre_recurso']) && !empty($array['nombre_recurso']))
        $nombre_recurso = "'".$array['nombre_recurso']."'";
    else
        $nombre_recurso = " NULL " ;

     // Para A - M
    if(isset($array['unidad_medida']) && !empty($array['unidad_medida']))
        $unidad_medida = "'".$array['unidad_medida']."'";
    else
        $unidad_medida = " NULL " ;
 

    chrome_log("call sp_abm_recurso(  
                                    '$accion', 
                                     $id_recurso, 
                                     $nombre_recurso ,
                                     $unidad_medida,  
                                     @pi_id_recurso_new,
                                     @pv_error_msj, 
                                     @pn_error_cod   )");

    $this->db->query("call sp_abm_recurso(  
                                    '$accion', 
                                     $id_recurso, 
                                     $nombre_recurso ,  
                                     $unidad_medida,
                                     @pi_id_recurso_new,
                                     @pv_error_msj, 
                                     @pn_error_cod   )"  );

    $sql = "SELECT  @pi_id_recurso_new as id_recurso, 
                    @pn_error_cod as codigo_error , 
                    @pv_error_msj as mensaje_error";

    $query = $this->db->query($sql);

    return $query->row_array(); 
}

public function existe_recurso($id_recurso)
{
    chrome_log("recurso_model/existe_recurso");
    
    $sql = "    SELECT fn_exist_recurso ( ? ) as existe
                FROM dual " ;
 
    $query = $this->db->query($sql, array($id_recurso));

    chrome_log( "Cod sql: ".$query->row()->existe );

    return $query->row()->existe;
}

}	

?>