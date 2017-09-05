<link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />


<style type="text/css">
   #div_loadding_cargar_cargo{
        display: none; 
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
      <h4>
        <i class="fa fa-user-secret" aria-hidden="true"></i> Cargos
      </h4>
    </section>
    <div class="panel-body">
        
        <? mensaje_resultado($mensaje); ?>

        <!-- Crear usuario -->
        <div class="col-md-5">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Crear cargo</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div> 
                <div class="box-body">


                    <? 
                    $attributes = array('class' => 'form', 'id' => 'form_alta_cargo', 'name' => 'form_alta_cargo');
                    echo form_open('cargo/alta_cargo', $attributes); ?>

                    <div class="col-sm-12 ">
                        <label for="nombre_cargo"  class="col-sm-3 control-label">Cargo</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
 
                            <? 
                              $data = array(
                                      'type'  => 'text',
                                      'name'  => 'nombre_cargo',
                                      'id'    => 'nombre_cargo', 
                                      'class' => 'form-control'
                              );

                              echo form_input($data);

                            ?>
                        </div>
                        <? echo mostrar_error_formulario($error, 'nombre_cargo');?>
                    </div>

                    <div class="col-sm-12 ">
                        <label for="nombre_area"  class="col-sm-3 control-label">Area</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
 
                            <?  $area = array(); ?>

                            <?  $area[''] = 'Seleccionar area'; ?>
                            
                            <?  foreach ($areas->result() as $row):  

                                    $area[$row->id_area] = $row->nombre;

                                endforeach; 

                              echo form_dropdown('area', $area, '' ,'class="form-control" id="area" name="area" ' ); 

                            ?>
                        </div>
                        <? echo mostrar_error_formulario($error, 'id_area');?>
                    </div>

 



                   <div class="col-xs-12" style="margin-top:20px; margin-bottom:20px" >
                      <button type="submit" class="btn btn-primary btn-block"> Aceptar <div id="div_loadding_cargar_cargo" class="form-control-feedback"  style='margin-right:25px'><img src="<?=base_url()?>assets/images/loading_blanco.gif" ></div>  </button>   
                    </div>

                    <? echo form_close(); ?>

                
                     
                </div>
            </div>
        </div>
        
        <!-- Ver usuarios -->
        <div class="col-md-7">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Cargos</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div> 
                <div class="box-body">  

                    <table class="table" id="tabla_cargo" name="tabla_cargo">
                          <thead>

                            <tr style="background-color: rgba(60, 141, 188, 0.35);">
                                <th>ID</th>
                                <th>Cargo</th>
                                <th>Area</th>
                                <th></th> 
                                <th></th>                                 
                            </tr>
                          </thead>  
                          <tbody>

                            <? foreach ($cargos->result() as $row): ?>

                              <tr>
                                <td> <?=$row->id_cargo?> </td>
                                <td> <?=$row->nombre?> </td> 
                                <td> <?=$row->area_nombre?> </td> 
                                <td> 
                                    <a href="<?=base_url()?>index.php/cargo/cargo/<?=$row->id_cargo?>"><i class="fa fa-2x fa-binoculars" aria-hidden="true"></i></a>
                                </td>
                                <td>
                                    <a href="#" onclick="eliminar_cargo(<?=$row->id_cargo?>)"><i class="fa fa-2x fa-times" aria-hidden="true" style="padding-left:5px"></i> </a>
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
