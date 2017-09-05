<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* ----------- CREAR EL JSON --------------------
 * Crea el json para enviar al webservice. */

if(!function_exists('crear_json'))
{
    function crear_json($return)
	{
		if (function_exists('json_encode'))
		{
    		chrome_log(json_encode($return));
			print json_encode($return);
			//ChromePhp::log(json_encode($return));
		}
		else
		{
        	chrome_log(json_encode($return));
			print __json_encode($return);
			//ChromePhp::log(__json_encode($return));
		}
	}
}

// Muestra el error traido en un array del form_validation
if(!function_exists('mostrar_error_formulario'))
{
    function mostrar_error_formulario($array,$campo)
	{
		if (isset($array[$campo])): ?>

                  <div class="error" style="color:red;">
                    <h5><?=$array[$campo];?></h5>
                  </div>

    <? endif; 
	}
}

// Mensaje de error de las variables flash session
if(!function_exists('mensaje_resultado'))
{
    function mensaje_resultado($mensaje)
    {
        if ($mensaje): ?>
                <div class="callout callout-<?=$mensaje['clase_mensaje']?> mensaje_resultado" style="padding:5px 30px 5px 15px" id="div_mensaje">
                  <h5><?=$mensaje['mensaje']?></h5>
                </div>
        <? endif;  
    }
}

if(!function_exists('armar_menu'))
{
    function armar_menu()
    {
        
        chrome_log("armar_menu");

        $CI =& get_instance();

        $array_modulos = array(); 

        $modulos =  $CI->Modulo_model->traer_modulos_sistema(); 
       
        foreach ($modulos->result() as $row):

                $mod['modulo'] = $row;
                $mod['submodulo']  =  $CI->Modulo_model->traer_submodulos_sistema($row->id_modulo);

                array_push($array_modulos,  $mod);

        endforeach; 
 
        for ($i=0; $i < count($array_modulos); $i++): ?>
            
            <?  if(tiene_el_modulo($array_modulos[$i]['modulo']->id_modulo)): ?>

                    <li class="treeview">

                        <a href="<?=base_url()?>index.php/<?=$array_modulos[$i]['modulo']->controlador?>/index">
                          <i class="fa fa-angle-right" aria-hidden="true"></i>
                          <span><?=$array_modulos[$i]['modulo']->nombre?></span>
                            <? if($array_modulos[$i]['submodulo']->num_rows() > 0 ): ?> 
                                <i class="fa fa-arrow-circle-down pull-right"></i>  
                            <? endif; ?>
                        </a>
                        
                        <?  if($array_modulos[$i]['submodulo']->num_rows() > 0 ): ?>


                                    <ul class="treeview-menu">
                                    <?  foreach ($array_modulos[$i]['submodulo']->result() as $submodulo): ?>

                                            <?  if(tiene_el_modulo($submodulo->id_modulo)): ?>

                                                    <li class="treeview">
                                                        <a href="<?=base_url()?>index.php/<?=$submodulo->controlador?>/index">
                                                          <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                          <span><?=$submodulo->nombre?></span>
                                                        </a>
                                                    </li>
                                            
                                            <? endif;   ?>

                                    <?  endforeach; ?>
                            </ul>

                        <?  endif;   ?>
             
                    </li>

            <? endif;   ?>

    <?  endfor; 
 
    }
}

if(!function_exists('tiene_el_modulo'))
{
    function tiene_el_modulo($id_modulo_buscado)
    {
        chrome_log("tiene_el_modulo");

         $CI =& get_instance();

        $modulos_usuario =  $CI->Modulo_model->traer_modulos_usuario( $CI->session->userdata('eco_id') );

        chrome_log($modulos_usuario);

        foreach ($modulos_usuario->result() as $row):
            
            if($row->id_modulo == $id_modulo_buscado)
                return true;

        endforeach;

        return false; 

    }
}


// Esta funcion es por qu eno funciona el chrome_log en el servidor web
/*
if(!function_exists('chrome_log'))
{
    function chrome_log($id_modulo_buscado)
    {
        

    }
} */

?>