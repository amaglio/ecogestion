<link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />


<style type="text/css">
   #div_loadding_modificar_rol{
        display: none; 
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
      <h4>
        <i class="fa fa-tags" aria-hidden="true"></i> Roles / <?=$informacion_rol->nombre?>
      </h4>
    </section>
    <div class="panel-body">
        
        <div class="col-md-12" style="margin-bottom: 10px">
          <button type="submit" class="btn btn-sm btn-primary "  onclick="eliminar_rol(<?=$informacion_rol->id_rol?>)"> 
              <i class="fa fa-1x fa-times" aria-hidden="true" style="padding-left:5px"></i> Eliminar rol
          </button>
        </div>

      	<!-- Ver rol -->
      	<div class="col-md-5">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ver Rol</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div> 
                <div class="box-body">

                     <? mensaje_resultado($mensaje); ?>

                    <? 
                    $attributes = array('class' => 'form', 'id' => 'form_modifica_rol', 'name' => 'form_modifica_rol');
                    echo form_open('rol/modifica_rol', $attributes); ?>

 
                    <div class="form-group has-feedback">
                        <label for="rol"  class="col-sm-3 control-label">Rol</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>

                            <?

                              $data = array(
                                      'type'  => 'hidden',
                                      'name'  => 'id_rol',
                                      'id'    => 'id_rol',
                                      'value' => $informacion_rol->id_rol,
                                      'class' => 'form-control'
                              );

                              echo form_input($data);
                             ?>

                            <? 
                              $data = array(
                                      'type'  => 'text',
                                      'name'  => 'rol',
                                      'id'    => 'rol',
                                      'value'    => $informacion_rol->nombre,
                                      'class' => 'form-control'
                              );

                              echo form_input($data);

                            ?>

                        </div>
                    </div>

                     <div class="form-group has-feedback">
                        <label for="modulo"  class="col-sm-12 control-label"  style="margin-top:15px"></label>
                        <div class="col-sm-12">
 
                              <label class=" control-label">Modulos Permitidos para el rol</label>
                              
                              <ul class="list-group">
                              
                              <?  for ($i=0; $i < count($modulos); $i++): ?>

                                    <?  $exito = 0; ?>

                                    <li class="list-group-item">

                                        <?
                                            $data = array(  
                                                        'name'        => 'id_modulo[]',
                                                        'id'          => 'modulo_'.$modulos[$i]['modulo']->id_modulo,
                                                        'value'       => $modulos[$i]['modulo']->id_modulo,
                                                        'checked'     => FALSE,
                                                        'style'       => 'form-control',
                                                        'class'       => 'modulos_check'
                                                        );

                                            foreach ($modulos_rol->result() as $row2):  

                                                if($modulos[$i]['modulo']->id_modulo == $row2->id_modulo):   

                                                    $exito = 1;

                                                endif;   

                                            endforeach;  

                                            if( $exito == 1):

                                                $data['checked'] = TRUE;

                                            endif;

                                            echo form_checkbox($data);

                                        ?>

                                        <?=$modulos[$i]['modulo']->nombre?> 

                                        <?  if($modulos[$i]['submodulo']->num_rows() > 0): ?>

                                              <ul class="list-group" style="padding-top: 10px; " id="<?=$modulos[$i]['modulo']->id_modulo?>">
                                              
                                              <?  foreach ($modulos[$i]['submodulo']->result() as $submodulo): ?>

                                                    <?  $exito = 0; ?>
                                                    
                                                    <li class="list-group-item">
                                                    <?  /*
                                                        $data = array(  
                                                                    'name'        => 'id_modulo[]',
                                                                    'id'          => 'id_modulo',
                                                                    'value'       =>  $submodulo->id_modulo,
                                                                    'checked'     => FALSE,
                                                                    'style'       => 'form-control',
                                                                   'class'       => 'modulos_check'
                                                                    );*/

                                                         $data = array(  
                                                                    'name'        => 'id_modulo[]',
                                                                    'id'          => 'submodulo',
                                                                    'value'       =>  $submodulo->id_modulo,
                                                                    'title'       =>  $modulos[$i]['modulo']->id_modulo,
                                                                    'checked'     => FALSE,
                                                                    'style'       => 'form-control',
                                                                   'class'       => 'submodulos submodulos_check_'.$modulos[$i]['modulo']->id_modulo 
                                                                    );

                                                        foreach ($modulos_rol->result() as $row2):  

                                                            if($row2->id_modulo == $submodulo->id_modulo):   

                                                                $exito = 1;

                                                            endif;   

                                                        endforeach;  

                                                        if( $exito == 1):

                                                            $data['checked'] = TRUE;

                                                        endif;


                                                        echo form_checkbox($data);  
                                                    ?>

                                                    <?=$submodulo->nombre?> 
                                                    
                                                    </li>

                                                    
                                              <?  endforeach; ?>

                                              </ul>
                                              
                                        <?  endif; ?>

                                    </li>

                              <?  endfor; ?>

                              </ul>
                              <?/* 
                              <table class="table" >
                                <thead>

                                  <tr style="background-color: rgba(60, 141, 188, 0.35);">
                                      <th>Modulos Permitidos para el rol</th>
                                      <th> </th>                                    
                                  </tr>
                                </thead>  
                                

                                <?/* if($modulos->num_rows() > 0) : ?>
                                    
                                    <tbody>

                                    <? foreach ($modulos->result() as $row): ?>

                                        <tr>
                                          <td> <?=$row->nombre?> </td> 
                                          <td> 

                                            <?
                                                $exito = 0;
                                                
                                                $data = array(  
                                                        'name'        => 'id_modulo[]',
                                                        'id'          => 'id_modulo',
                                                        'value'       => $row->id_modulo,
                                                        'checked'     => FALSE,
                                                        'style'       => 'form-control' 
                                                        );

                                                foreach ($modulos_rol->result() as $row2):  

                                                    if($row->id_modulo == $row2->id_modulo):   

                                                        $exito = 1;

                                                    endif;   

                                                endforeach;  

                                                if( $exito == 1):

                                                    $data['checked'] = TRUE;

                                                endif;


                                                echo form_checkbox($data);
                                            ?>
                                               
                                          </td>
                                         
                                        </tr>

                                    <? endforeach; ?>
                                
                                <? endif; 

                                </tbody>

                              </table>*/?>


                        </div>
                    </div>
                    

                   <div class="col-xs-12" style="margin-top:20px; margin-bottom:20px" >
                      <button type="submit" class="btn btn-primary btn-block"> Modificar <div id="div_loadding_modificar_rol" class="form-control-feedback"  style='margin-right:25px'><img src="<?=base_url()?>assets/images/loading_blanco.gif" ></div>  </button>   
                    </div>  
 

                    <? echo form_close(); ?>

                </div>
            </div>
      	</div>

    </div>
</div>
 
 <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>

<script>
var jq_puro = jQuery.noConflict();
</script>

<!-- Validaciones -->

<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.4.4.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-1.8.10.custom.min.js"></script>
 
<script language="javascript" type="text/javascript" src="<?=base_url()?>assets/js/jquery.validate.js" ></script>
<script language="javascript" type="text/javascript" src="<?=base_url()?>assets/js/additional-methods.js" ></script> 

<script>
var jq_va = jQuery.noConflict();
</script>

<!-- Datatables -->

<script src="https://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript" ></script>
<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

<script>
     var jq_dt = jQuery.noConflict();
</script>
 


<script language="javascript" type="text/javascript" src="<?=base_url()?>assets/js/rol.js" ></script>