<link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />


<style type="text/css">
   #div_loadding_modifica_cargo{
        display: none; 
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
      <h4>
        <i class="fa fa-user-secret" aria-hidden="true"></i> Cargos / <?=$cargo->nombre?>
      </h4>
    </section>
    <div class="panel-body">

        <div class="col-md-12" style="margin-bottom: 10px">
          <button type="submit" class="btn btn-sm btn-primary "  onclick="eliminar_cargo(<?=$cargo->id_cargo?>)"> 
              <i class="fa fa-1x fa-times" aria-hidden="true" style="padding-left:5px"></i> Eliminar cargo
          </button>
        </div>
        
        <!-- Crear usuario -->
        <div class="col-md-5">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Modificar cargo</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div> 
                <div class="box-body">

                    <? mensaje_resultado($mensaje); ?>
                
                    <? 
                    $attributes = array('class' => 'form', 'id' => 'form_modifica_cargo', 'name' => 'form_modifica_cargo');
                    echo form_open('cargo/modifica_cargo', $attributes); ?>

                        <? 
                              $data = array(
                                      'type'  => 'hidden',
                                      'name'  => 'id_cargo',
                                      'value'  => $cargo->id_cargo,
                                      'id'    => 'id_cargo', 
                                      'class' => 'form-control'
                              );

                              echo form_input($data);

                        ?>

                     <div class="form-group has-feedback">
                        <label for="nombre_cargo"  class="col-sm-3 control-label">Cargo</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
 
                            <? 
                              $data = array(
                                      'type'  => 'text',
                                      'name'  => 'nombre_cargo',
                                      'value'  => $cargo->nombre,
                                      'id'    => 'nombre_cargo', 
                                      'class' => 'form-control'
                              );

                              echo form_input($data);

                            ?>
                        </div>
                        <? echo mostrar_error_formulario($error, 'nombre_cargo');?>
                    </div>
                    
                   <div class="form-group has-feedback">
                        <label for="nombre_area"  class="col-sm-3 control-label">Area</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
 
                            <?  $area = array(); ?>

                            <?  $area[''] = 'Seleccionar area'; ?>
                            
                            <?  foreach ($areas->result() as $row):  

                                    $area[$row->id_area] = $row->nombre;

                                endforeach; 

                              echo form_dropdown('area', $area, $cargo->id_area ,' class="form-control" id="area" name="area" ' ); 

                            ?>
                        </div>
                        <? echo mostrar_error_formulario($error, 'id_area');?>
                    </div>



                   <div class="col-xs-12" style="margin-top:20px; margin-bottom:20px" >
                      <button type="submit" class="btn btn-primary btn-block"> Modificar <div id="div_loadding_modifica_cargo" class="form-control-feedback"  style='margin-right:25px'><img src="<?=base_url()?>assets/images/loading_blanco.gif" ></div>  </button>   
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
 


<script language="javascript" type="text/javascript" src="<?=base_url()?>assets/js/cargo.js" ></script>