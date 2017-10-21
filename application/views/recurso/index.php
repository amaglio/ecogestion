<link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />


<style type="text/css">
   #div_loadding_cargar_recurso{
        display: none; 
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
      <h4>
        <i class="fa fa-cubes" aria-hidden="true"></i> Recursos
      </h4>
    </section>
    <div class="panel-body">
        
        <? mensaje_resultado($mensaje);


         ?>
        
        <!-- Crear recurso -->
        <div class="col-md-5">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Crear recurso</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div> 
                <div class="box-body">

                    
                
                    <? 
                    $attributes = array('class' => 'form', 'id' => 'form_alta_recurso', 'name' => 'form_alta_recurso');
                    echo form_open('recurso/alta_recurso', $attributes); ?>

                    <div class="col-sm-12 ">
                        <label for="nombre_recurso"  class="col-sm-3 control-label">Recurso</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
 
                            <? 
                              $data = array(
                                      'type'  => 'text',
                                      'name'  => 'nombre_recurso',
                                      'id'    => 'nombre_recurso', 
                                      'class' => 'form-control'
                              );

                              echo form_input($data);

                            ?>
                        </div>
                        <? echo mostrar_error_formulario($error, 'nombre_recurso');?>
                    </div>

                    <div class="col-sm-12 ">
                        <label for="unidad_medida"  class="col-sm-3 control-label">Unidad Medida</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
 
                            <? 
                              $data = array(
                                      'type'  => 'text',
                                      'name'  => 'unidad_medida',
                                      'id'    => 'unidad_medida', 
                                      'class' => 'form-control'
                              );

                              echo form_input($data);

                            ?>
                        </div>
                        <? echo mostrar_error_formulario($error, 'unidad_medida');?>
                    </div>

                    <div class="col-xs-12" style="margin-top:20px; margin-bottom:20px" >
                      <button  type="submit" class="btn btn-primary btn-block"> Aceptar <div id="div_loadding_cargar_recurso" class="form-control-feedback"  style='margin-right:25px'><img src="<?=base_url()?>assets/images/loading_azul.gif" ></div>  </button>   
                    </div>

                    <? echo form_close(); ?>

                
                     
                </div>
            </div>
        </div>
        
        <!-- Ver Recursos -->
        <div class="col-md-7">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Recursos</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div> 
                <div class="box-body">  

                    <table class="table" id="tabla_recursos" name="tabla_recursos">
                          <thead>

                            <tr style="background-color: rgba(60, 141, 188, 0.35);">
                                <th>ID</th>
                                <th>Recurso</th>
                                <th>Unidad Medida</th> 
                                <th></th>  
                                <th></th>                                
                            </tr>
                          </thead>  
                          <tbody>

                            <? 

                            foreach ($recursos->result() as $row): 

                             ?>

                              <tr>
                                <td> <?php echo $row->id_recurso; ?> </td>
                                <td> <?php echo $row->descripcion; ?> </td> 
                                <td> <?php echo $row->unidad_medida; ?> </td> 
                                <td> 
                                    <a href="<?=base_url()?>index.php/recurso/recurso/<?=$row->id_recurso?>"><i class="fa fa-1x fa-binoculars" aria-hidden="true"></i></a>
                                </td>
                                <td>
                                    <a href="#" onclick="eliminar_recurso(<?=$row->id_recurso?>)"><i class="fa fa-1x fa-times" aria-hidden="true" style="padding-left:5px"></i> </a>
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
 


<script language="javascript" type="text/javascript" src="<?=base_url()?>assets/js/recurso.js" ></script>
