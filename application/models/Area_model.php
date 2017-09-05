<?

class Area_model extends CI_Model {

function __construct()
{
    parent::__construct();
}



public function traer_areas()
{
    
    $sql =  "   SELECT a.*, r.nombre as rama_nombre
                FROM area a, rama r
                WHERE a.fecha_baja IS NULL 
                AND r.id_rama = a.id_rama"  ;
    
    $query = $this->db->query( $sql );

    return $query;  

}

public function traer_informacion_area($id_area)
{
     $sql =  "  SELECT *
                FROM area r
                WHERE id_area = ? "  ;
    
    $query = $this->db->query( $sql, array($id_area) );

    return $query->row();  
}

function abm_area($accion, $array)
{
    // Para B-M
    if(isset($array['id_area']) && !empty($array['id_area']))
        $id_area = "'".$array['id_area']."'";
    else
        $id_area = " NULL " ;

    // Para A - M
    if(isset($array['nombre_area']) && !empty($array['nombre_area']))
        $nombre_area = "'".$array['nombre_area']."'";
    else
        $nombre_area = " NULL " ;

     // Para A - M
    if(isset($array['id_rama']) && !empty($array['id_rama']))
        $id_rama = "'".$array['id_rama']."'";
    else
        $id_rama = " NULL " ;
 

    chrome_log("call sp_abm_area(  
                                    '$accion', 
                                     $id_area, 
                                     $nombre_area ,
                                     $id_rama,  
                                     @pi_id_area_new,
                                     @pv_error_msj, 
                                     @pn_error_cod   )");

    $this->db->query("call sp_abm_area(  
                                    '$accion', 
                                     $id_area, 
                                     $nombre_area ,  
                                     $id_rama,
                                     @pi_id_area_new,
                                     @pv_error_msj, 
                                     @pn_error_cod   )"  );

    $sql = "SELECT  @pi_id_area_new as id_area, 
                    @pn_error_cod as codigo_error , 
                    @pv_error_msj as mensaje_error";

    $query = $this->db->query($sql);

    return $query->row_array(); 
}

public function existe_area($id_area)
{
    chrome_log("Area_model/existe_area");
    
    $sql = "    SELECT fn_exist_area ( ? ) as existe
                FROM dual " ;
 
    $query = $this->db->query($sql, array($id_area));

    chrome_log( "Cod sql: ".$query->row()->existe );

    return $query->row()->existe;
}

}	

?>