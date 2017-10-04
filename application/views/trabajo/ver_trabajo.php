<link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />


<style type="text/css">
   #div_loadding_modificar_trabajo{
        display: none; 
    }

  #div_loadding_crear_necesidad{
        display: none; 
    }  
</style>

<div class="content-wrapper">
    <section class="content-header">
      <h4>
        <i class="fa fa-tags" aria-hidden="true"></i> Trabajo / <?=$informacion_trabajo->id_trabajo?>
      </h4>
    </section>
    <div class="panel-body">
        
        <div class="col-md-12" style="margin-bottom: 10px">
          <button type="submit" class="btn btn-sm btn-primary "  onclick="eliminar_trabajo(<?=$informacion_trabajo->id_trabajo?>)"> 
              <i class="fa fa-1x fa-times" aria-hidden="true" style="padding-left:5px"></i> Eliminar trabajo
          </button>
        </div>
 
      	<!-- Ver trabajo Y crear -->
      	<div class="col-md-5">
            <!-- Ver trabajo  -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ver Trabajo</h3>
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
                        <label for="id_trabajo"  class="col-sm-3 control-label">ID</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>

                            <?

                              $data = array(
                                      'type'  => 'text',
                                      'name'  => 'id_trabajo',
                                      'id'    => 'id_trabajo',
                                      'value' => $informacion_trabajo->id_trabajo,
                                      'readonly'  => 'readonly',
                                      'class' => 'form-control'
                              );

                              echo form_input($data);
                             ?>
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="id_trabajo_tango"  class="col-sm-3 control-label">ID tango</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>

                            <?

                              $data = array(
                                      'type'  => 'text',
                                      'name'  => 'id_trabajo_tango',
                                      'id'    => 'id_trabajo_tango',
                                      'value' => $informacion_trabajo->id_trabajo_tango,
                                      'class' => 'form-control'
                              );

                              echo form_input($data);
                             ?>
                        </div>
                    </div>

                     <div class="form-group has-feedback">
                        <label for="id_area"  class="col-sm-3 control-label">Area</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
 
                            <?  $area = array(); ?>

                            <?  $area[''] = 'Seleccionar Area'; ?>
                            
                            <?  foreach ($areas->result() as $row):  

                                    $area[$row->id_area] = $row->nombre;

                                endforeach; 

                              echo form_dropdown('id_area', $area , $informacion_trabajo->id_area ,'class="form-control" id="id_area" name="id_area" ' ); 

                            ?>
                        </div>
                        <? echo mostrar_error_formulario($error, 'id_area');?> 
                    </div>


                    <div class="form-group has-feedback">
                        <label for="trabajo"  class="col-sm-3 control-label">Descripción</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>

                            <?

                              $data = array( 
                                      'rows'  => 2,
                                      'name'  => 'descripcion',
                                      'id'    => 'descripcion',
                                      'value' => $informacion_trabajo->descripcion,
                                      'class' => 'form-control'
                              );

                              echo form_textarea($data);
                             ?>
                        </div>
                    </div>


 

                   <div class="col-xs-12" style="margin-top:20px; margin-bottom:20px" >
                      <button type="submit" class="btn btn-primary btn-block"> Modificar <div id="div_loadding_modificar_trabajo" class="form-control-feedback"  style='margin-right:25px'><img src="<?=base_url()?>assets/images/loading_blanco.gif" ></div>  </button>   
                    </div>  
 

                    <? echo form_close(); ?>

                </div>
            </div>
      	    
            <!-- crear  -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> Crear trabajo</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div> 
                <div class="box-body"> 

                  <? 
                    $attributes = array('class' => 'form', 'id' => 'form_alta_necesidad', 'name' => 'form_alta_necesidad');
                    echo form_open('necesidad/alta_necesidad', $attributes); ?>

                    <div class="form-group has-feedback">
                        <label for="area"  class="col-sm-3 control-label">Area</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
 
                            <?  $area = array(); ?>

                            <?  $area[''] = 'Seleccionar area'; ?>
                            
                            <?  foreach ($areas->result() as $row):  

                                    $area[$row->id_area] = $row->id_area."-".$row->nombre;

                                endforeach; 

                              echo form_dropdown('id_area', $area, $row->id_area ,'class="form-control" id="id_area" name="id_area"  disabled="disabled" '); 

                            ?>
                        </div>
                        <? echo mostrar_error_formulario($error, 'id_area');?>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="fecha_limite"  class="col-sm-3 control-label">Fecha </label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
 
                            <? 
                              $data = array(
                                      'type'  => 'date',
                                      'name'  => 'fecha_limite',
                                      'id'    => 'fecha_limite', 
                                      'class' => 'form-control'
                              );

                              echo form_input($data);

                            ?>
                        </div>
                        <? echo mostrar_error_formulario($error, 'fecha_limite');?>
                    </div>

 
                    <div class="form-group has-feedback" style="margin-top: 10px">
                        <label for="necesidad"  class="col-sm-3 class-label">Descripción</label>
                        <div class="col-sm-9"> 

                             <? 
                           $data = array(
                                      'name'        => 'descripcion',
                                      'id'          => 'descripcion', 
                                      'rows'        => '5', 
                                      'class'       => 'form-control'
                                  );

                                  echo form_textarea($data);

                            ?>

                        </div>
                    </div>

              

                   <div class="col-xs-12" style="margin-top:20px; margin-bottom:20px" >
                      <button type="submit" class="btn btn-primary btn-block"> Crear <div id="div_loadding_crear_necesidad" class="form-class-feedback"  style='margin-right:25px'><img src="<?=base_url()?>assets/images/loading_blanco.gif" ></div>  </button>   
                    </div>  
 

                    <? echo form_close(); ?>
                     
                </div>
            </div> 
        </div>

        <!-- Necesidades del trabajo -->
        <div class="col-md-7">
           
           <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> Necesidades del trabajo</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div> 
                <div class="box-body"> 

                    <table class="table" id="tabla_necesidades" name="tabla_necesidades">
                        <thead>

                          <tr style="background-color: rgba(60, 141, 188, 0.35);">
                              <th>Id</th>
                              <th>Trabajo</th>   
                              <th>Comentario </th>  
                              <th>Fecha Limite </th>
                              <th> </th> 
                              <th> </th>                                    
                          </tr>
                        </thead>  
                        <tbody>

                        <? foreach ($necesidades_trabajo->result() as $row): ?>

                            <tr>
                              <td> <?=$row->id_necesidad?> </td>
                              <td> <?=$row->descripcion_trabajo?> </td> 
                              <td> <?=$row->comentario?> </td>
                              <td> <?=$row->fecha_limite?> </td>  
                              <td> 
                                  <a href="<?=base_url()?>index.php/necesidad/necesidad/<?=$row->id_necesidad?>"><i class="fa fa-1x fa-binoculars" aria-hidden="true"></i></a>
                              </td>
                              <td>
                                  <a href="#" onclick="eliminar_necesidad(<?=$row->id_necesidad?>)"><i class="fa fa-1x fa-times" aria-hidden="true" style="padding-left:5px"></i> </a>
                              </td> 
                            </tr>

                        <? endforeach; ?>

                        </tbody>

                    </table>
                  
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
<script language="javascript" type="text/javascript" src="<?=base_url()?>assets/js/necesidad.js" ></script>