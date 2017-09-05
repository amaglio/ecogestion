<link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />


<style type="text/css">
   #div_loadding_modifica_area{
        display: none; 
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
      <h4>
        <i class="fa fa-sitemap" aria-hidden="true"></i> Areas / <?=$area->nombre?>
      </h4>
    </section>
    <div class="panel-body">
        
        <div class="col-md-12" style="margin-bottom: 10px">
          <button type="submit" class="btn btn-sm btn-primary "  onclick="eliminar_area(<?=$area->id_area?>)"> 
              <i class="fa fa-1x fa-times" aria-hidden="true" style="padding-left:5px"></i> Eliminar area
          </button>
        </div>
        
        <!-- Crear usuario -->
        <div class="col-md-5">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Modificar area</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div> 
                <div class="box-body">

                    <? mensaje_resultado($mensaje); ?>
                
                    <? 
                    $attributes = array('class' => 'form', 'id' => 'form_modifica_area', 'name' => 'form_modifica_area');
                    echo form_open('area/modifica_area', $attributes); ?>

                        <? 
                              $data = array(
                                      'type'  => 'hidden',
                                      'name'  => 'id_area',
                                      'value'  => $area->id_area,
                                      'id'    => 'id_area', 
                                      'class' => 'form-control'
                              );

                              echo form_input($data);

                        ?>

                     <div class="form-group has-feedback">
                        <label for="nombre_area"  class="col-sm-3 control-label">Area</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
 
                            <? 
                              $data = array(
                                      'type'  => 'text',
                                      'name'  => 'nombre_area',
                                      'value'  => $area->nombre,
                                      'id'    => 'nombre_area', 
                                      'class' => 'form-control'
                              );

                              echo form_input($data);

                            ?>
                        </div>
                        <? echo mostrar_error_formulario($error, 'nombre_area');?>
                    </div>
                    
                    <div class="form-group has-feedback">
                        <label for="nombre_area"  class="col-sm-3 control-label">Rama</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
 
                            <?  $rama = array(); ?>

                            <?  $rama[''] = 'Seleccionar Rama'; ?>
                            
                            <?  foreach ($ramas->result() as $row):  

                                    $rama[$row->id_rama] = $row->nombre;

                                endforeach; 

                              echo form_dropdown('id_rama', $rama, $area->id_rama ,'class="form-control" id="id_rama" name="id_rama" ' ); 

                            ?>
                        </div>
                        <? echo mostrar_error_formulario($error, 'id_rama');?>
                    </div>



                   <div class="col-xs-12" style="margin-top:20px; margin-bottom:20px" >
                      <button type="submit" class="btn btn-primary btn-block"> Modificar <div id="div_loadding_modifica_area" class="form-control-feedback"  style='margin-right:25px'><img src="<?=base_url()?>assets/images/loading_blanco.gif" ></div>  </button>   
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
 


<script language="javascript" type="text/javascript" src="<?=base_url()?>assets/js/area.js" ></script>