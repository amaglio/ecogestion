<?

class Proveedor_model extends CI_Model {

function __construct()
{
    parent::__construct();
}



public function traer_proveedores()
{
    
    $sql =  "   SELECT *
                FROM proveedor r
                WHERE fecha_baja IS NULL "  ;
    
    $query = $this->db->query( $sql );

    return $query;  

}

public function traer_informacion_proveedor($id_proveedor)
{
     $sql =  "  SELECT *
                FROM proveedor r
                WHERE id_proveedor = ? "  ;
    
    $query = $this->db->query( $sql, array($id_proveedor) );

    return $query->row();  
}

function abm_proveedor($accion, $array)
{
    // Para B-M
    if(isset($array['id_proveedor']) && !empty($array['id_proveedor']))
        $id_proveedor = "'".$array['id_proveedor']."'";
    else
        $id_proveedor = " NULL " ;

    // Para A - M
    if(isset($array['nombre_proveedor']) && !empty($array['nombre_proveedor']))
        $nombre_proveedor = "'".$array['nombre_proveedor']."'";
    else
        $nombre_proveedor = " NULL " ;

     // Para A - M
    if(isset($array['id_rama']) && !empty($array['id_rama']))
        $id_rama = "'".$array['id_rama']."'";
    else
        $id_rama = " NULL " ;
 

    chrome_log("call sp_abm_proveedor(  
                                    '$accion', 
                                     $id_proveedor, 
                                     $nombre_proveedor ,
                                     $id_rama,  
                                     @pi_id_proveedor_new,
                                     @pv_error_msj, 
                                     @pn_error_cod   )");

    $this->db->query("call sp_abm_proveedor(  
                                    '$accion', 
                                     $id_proveedor, 
                                     $nombre_proveedor ,  
                                     $id_rama,
                                     @pi_id_proveedor_new,
                                     @pv_error_msj, 
                                     @pn_error_cod   )"  );

    $sql = "SELECT  @pi_id_proveedor_new as id_proveedor, 
                    @pn_error_cod as codigo_error , 
                    @pv_error_msj as mensaje_error";

    $query = $this->db->query($sql);

    return $query->row_array(); 
}

public function existe_proveedor($id_proveedor)
{
    chrome_log("Area_model/existe_proveedor");

    chrome_log("SELECT fn_exist_proveedor ( ? ) as existe
                FROM dual ".$id_proveedor);
    
    $sql = "    SELECT fn_exist_proveedor ( ? ) as existe
                FROM dual " ;
 
    $query = $this->db->query($sql, array($id_proveedor));

    chrome_log( "Cod sql: ".$query->row()->existe );

    return $query->row()->existe;
}

}	

?>