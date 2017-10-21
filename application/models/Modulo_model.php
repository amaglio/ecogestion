<?

class Modulo_model extends CI_Model {

function __construct()
{
    parent::__construct();
}

function traer_modulos_sistema()
{

    $sql =  "   SELECT *
                FROM modulo m
                WHERE id_modulo_padre IS NULL
                ORDER BY id_modulo ASC";
    
    $query = $this->db->query( $sql );
 
    return  $query; 
}

function traer_submodulos_sistema($id_modulo)
{

    $sql =  "   SELECT *
                FROM modulo m
                WHERE id_modulo_padre IS NOT NULL
                AND     id_modulo_padre = ? 
                ORDER BY id_modulo ASC";
    
    $query = $this->db->query( $sql, array($id_modulo) );
 
    return  $query; 
}
 
function traer_modulos_usuario($id_usuario)
{
    chrome_log("traer_modulos_usuario");
    
    $sql =  "   SELECT 
                    DISTINCT m.nombre, m.id_modulo
                FROM 
                    usuario_rol ur
                    INNER JOIN rol_modulo rm ON (ur.id_rol = rm.id_rol)
                    INNER JOIN modulo m ON (m.id_modulo = rm.id_modulo)
                WHERE
                    ur.id_usuario = ?     
                ORDER BY m.id_modulo ASC";
    
    $query = $this->db->query( $sql, array($id_usuario) );

    //var_dump( $query->result());

    //return  $query->result();   

    return  $query;   
}

function traer_id_modulos_por_controlador($nombre_controlador)
{
    chrome_log("traer_id_modulos_por_controlador");
    
    $sql =  "    SELECT *
                FROM modulo m
                WHERE
                    m.controlador = ? ";
    
    $query = $this->db->query( $sql, array($nombre_controlador) );  

    return  $query->row()->id_modulo;   
}


}	

?>