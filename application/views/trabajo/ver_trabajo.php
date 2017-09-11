<link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />


<style type="text/css">
   #div_loadding_modificar_trabajo{
        display: none; 
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
      <h4>
        <i class="fa fa-tags" aria-hidden="true"></i> Trabajo / <?=$informacion_trabajo->nombre?>
      </h4>
    </section>
    <div class="panel-body">
        
        <div class="col-md-12" style="margin-bottom: 10px">
          <button type="submit" class="btn btn-sm btn-primary "  onclick="eliminar_trabajo(<?=$informacion_trabajo->id_trabajo?>)"> 
              <i class="fa fa-1x fa-times" aria-hidden="true" style="padding-left:5px"></i> Eliminar trabajo
          </button>
        </div>

      	<!-- Ver trabajo -->
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
                    $attributes = array('class' => 'form', 'id' => 'form_modifica_trabajo', 'name' => 'form_modifica_trabajo');
                    echo form_open('trabajo/modifica_trabajo', $attributes); ?>

 
                    <div class="form-group has-feedback">
                        <label for="trabajo"  class="col-sm-3 conttrabajo-label">Rol</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-conttrabajo-feedback">*</span>

                            <?

                              $data = array(
                                      'type'  => 'hidden',
                                      'name'  => 'id_trabajo',
                                      'id'    => 'id_trabajo',
                                      'value' => $informacion_trabajo->id_trabajo,
                                      'class' => 'form-conttrabajo'
                              );

                              echo form_input($data);
                             ?>

                            <? 
                              $data = array(
                                      'type'  => 'text',
                                      'name'  => 'trabajo',
                                      'id'    => 'trabajo',
                                      'value'    => $informacion_trabajo->nombre,
                                      'class' => 'form-conttrabajo'
                              );

                              echo form_input($data);

                            ?>

                        </div>
                    </div>

                     <div class="form-group has-feedback">
                        <label for="modulo"  class="col-sm-12 conttrabajo-label"  style="margin-top:15px"></label>
                        <div class="col-sm-12">
 
                              <label class=" conttrabajo-label">Modulos Permitidos para el trabajo</label>
                              
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
                                                        'style'       => 'form-conttrabajo',
                                                        'class'       => 'modulos_check'
                                                        );

                                            foreach ($modulos_trabajo->result() as $row2):  

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
                                                                    'style'       => 'form-conttrabajo',
                                                                   'class'       => 'modulos_check'
                                                                    );*/

                                                         $data = array(  
                                                                    'name'        => 'id_modulo[]',
                                                                    'id'          => 'submodulo',
                                                                    'value'       =>  $submodulo->id_modulo,
                                                                    'title'       =>  $modulos[$i]['modulo']->id_modulo,
                                                                    'checked'     => FALSE,
                                                                    'style'       => 'form-conttrabajo',
                                                                   'class'       => 'submodulos submodulos_check_'.$modulos[$i]['modulo']->id_modulo 
                                                                    );

                                                        foreach ($modulos_trabajo->result() as $row2):  

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
                                      <th>Modulos Permitidos para el trabajo</th>
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
                                                        'style'       => 'form-conttrabajo' 
                                                        );

                                                foreach ($modulos_trabajo->result() as $row2):  

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
                      <button type="submit" class="btn btn-primary btn-block"> Modificar <div id="div_loadding_modificar_trabajo" class="form-conttrabajo-feedback"  style='margin-right:25px'><img src="<?=base_url()?>assets/images/loading_blanco.gif" ></div>  </button>   
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
 


<script language="javascript" type="text/javascript" src="<?=base_url()?>assets/js/trabajo.js" ></script>