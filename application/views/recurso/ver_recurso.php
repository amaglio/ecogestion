<link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />


<style type="text/css">
   #div_loadding_modifica_recurso{
        display: none; 
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
       <h4>
        <i class="fa fa-cubes" aria-hidden="true"></i> Recursos / <?=$recurso->descripcion?>
      </h4>
 
    </section>
    <div class="panel-body">

        <div class="col-md-12" style="margin-bottom: 10px">
          <button disabled="disabled" type="submit" class="btn btn-sm btn-primary "  onclick="eliminar_recurso(<?=$recurso->id_recurso?>)"> 
              <i class="fa fa-1x fa-times" aria-hidden="true" style="padding-left:5px"></i> Eliminar recurso
          </button>
        </div>
        
        <!-- Crear usuario -->
        <div class="col-md-5">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Modificar recurso</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div> 
                <div class="box-body">

                    <? mensaje_resultado($mensaje); ?>
                
                    <? 
                    $attributes = array('class' => 'form', 'id' => 'form_modifica_recurso', 'name' => 'form_modifica_recurso');
                    echo form_open('recurso/modifica_recurso', $attributes); ?>

                        <? 
                              $data = array(
                                      'type'  => 'hidden',
                                      'name'  => 'id_recurso',
                                      'value'  => $recurso->id_recurso,
                                      'id'    => 'id_recurso', 
                                      'class' => 'form-control'
                              );

                              echo form_input($data);

                        ?>

                     <div class="form-group has-feedback">
                        <label for="nombre_recurso"  class="col-sm-3 control-label">recurso</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
 
                            <? 
                              $data = array(
                                      'type'  => 'text',
                                      'name'  => 'nombre_recurso',
                                      'value'  => $recurso->descripcion,
                                      'id'    => 'nombre_recurso', 
                                      'class' => 'form-control'
                              );

                              echo form_input($data);

                            ?>
                        </div>
                        <? echo mostrar_error_formulario($error, 'nombre_recurso');?>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="unidad_medida"  class="col-sm-3 control-label">Unidad medida</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
 
                            <? 
                              $data = array(
                                      'type'  => 'text',
                                      'name'  => 'unidad_medida',
                                      'value'  => $recurso->unidad_medida,
                                      'id'    => 'unidad_medida', 
                                      'class' => 'form-control'
                              );

                              echo form_input($data);

                            ?>
                        </div>
                        <? echo mostrar_error_formulario($error, 'unidad_medida');?>
                    </div>
                    
                    


                   <div class="col-xs-12" style="margin-top:20px; margin-bottom:20px" >
                      <button    type="submit" class="btn btn-primary btn-block"> Modificar <div id="div_loadding_modifica_recurso" class="form-control-feedback"  style='margin-right:25px'><img src="<?=base_url()?>assets/images/loading_blanco.gif" ></div>  </button>   
                    </div>

                    <? echo form_close(); ?>

                
                     
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
 


<script language="javascript" type="text/javascript" src="<?=base_url()?>assets/js/recurso.js" ></script>