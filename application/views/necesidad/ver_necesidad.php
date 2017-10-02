<link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />


<style type="text/css">
   #div_loadding_modifica_necesidad{
        display: none; 
    }

    #div_loadding_asociar_recurso{
        display: none; 
    }

</style>

<div class="content-wrapper">
    <section class="content-header">
      <h4>
       <i class="fa fa-level-down" aria-hidden="true"></i> Necesidad / <?=$necesidad->id_necesidad?>
      </h4>
    </section>
    <div class="panel-body">

        <div class="col-md-12" style="margin-bottom: 10px">
          <button type="submit" class="btn btn-sm btn-primary "  onclick="eliminar_necesidad(<?=$necesidad->id_necesidad?>)"> 
              <i class="fa fa-1x fa-times" aria-hidden="true" style="padding-left:5px"></i> Eliminar necesidad
          </button>
        </div>
        
        <!-- Ver Necesidad -->
        <div class="col-md-5">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Modificar necesidad</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div> 
                <div class="box-body">

                    <? mensaje_resultado($mensaje); ?>
                
                    <? 
                    $attributes = array('class' => 'form', 'id' => 'form_modifica_necesidad', 'name' => 'form_modifica_necesidad');
                    echo form_open('necesidad/modifica_necesidad', $attributes); ?>

                        <? 
                              $data = array(
                                      'type'  => 'hidden',
                                      'name'  => 'id_necesidad',
                                      'value'  => $necesidad->id_necesidad,
                                      'id'    => 'id_necesidad', 
                                      'class' => 'form-control'
                              );

                              echo form_input($data);

                        ?>

                     <div class="form-group has-feedback">
                        <label for="Trabajo"  class="col-sm-3 control-label">Trabajo</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
 
                            <?  $trabajo = array(); ?>

                            <?  $trabajo[''] = 'Seleccionar trabajo'; ?>
                            
                            <?  foreach ($trabajos->result() as $row):  

                                    $trabajo[$row->id_trabajo] = $row->id_trabajo."-".$row->descripcion;

                                endforeach; 

                              echo form_dropdown('id_trabajo', $trabajo, $necesidad->id_trabajo ,'class="form-control" id="id_trabajo" name="id_trabajo" ' ); 

                            ?>
                        </div>
                        <? echo mostrar_error_formulario($error, 'id_trabajo');?>
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
                                      'class' => 'form-control',
                                      'value' => date('d-m-Y',strtotime($necesidad->fecha_limite))
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
                                      'class'       => 'form-control',
                                      'value' => $necesidad->comentario
                                  );

                                  echo form_textarea($data);

                            ?>

                        </div>
                    </div>
                    



                    <div class="col-xs-12" style="margin-top:20px; margin-bottom:20px" >
                      <button type="submit" class="btn btn-primary btn-block"> Modificar <div id="div_loadding_modifica_necesidad" class="form-control-feedback"  style='margin-right:25px'><img src="<?=base_url()?>assets/images/loading_blanco.gif" ></div>  </button>   
                    </div>

                    <? echo form_close(); ?>

                
                     
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Recursos de la necesidad</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div> 
                <div class="box-body"> 

                  <div class="row">

                   <? 
                    $attributes = array('class' => 'form', 'id' => 'form_asociar_recurso', 'name' => 'form_asociar_recurso');
                    echo form_open('necesidad/asociar_recurso', $attributes); ?>
 

                    <div class="form-group has-feedback">
                        <label for="recurso"  class="col-sm-3 control-label">Recurso </label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
 
                            <? 
                              $data = array(
                                      'type'  => 'text',
                                      'name'  => 'recurso',
                                      'id'    => 'recurso', 
                                      'class' => 'form-control'
                              );

                              echo form_input($data);

                            ?>
                        </div>
                        <? echo mostrar_error_formulario($error, 'recurso');?>
                    </div>

 
                    <div class="form-group has-feedback">
                        <label for="cantidad"  class="col-sm-3 control-label">cantidad </label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
 
                            <? 
                              $data = array(
                                      'type'  => 'text',
                                      'name'  => 'cantidad',
                                      'id'    => 'cantidad', 
                                      'class' => 'form-control'
                              );

                              echo form_input($data);

                            ?>
                        </div>
                        <? echo mostrar_error_formulario($error, 'cantidad');?>
                    </div>

              

                   <div class="col-xs-12" style="margin-top:20px; margin-bottom:20px" >
                      <button type="submit" class="btn btn-primary btn-block"> Asociar <div id="div_loadding_asociar_recurso" class="form-class-feedback"  style='margin-right:25px'><img src="<?=base_url()?>assets/images/loading_blanco.gif" ></div>  </button>   
                    </div>  
 

                    <? echo form_close(); ?>

                  </div>
                     
                </div>
            </div>
        </div>
        
    </div>
</div>

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
 


<script language="javascript" type="text/javascript" src="<?=base_url()?>assets/js/necesidad.js" ></script>