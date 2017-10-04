<link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />


<style type="text/css">
   #div_loadding_crear_trabajo{
        display: none; 
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
      <h4>
        <i class="fa fa-puzzle-piece" aria-hidden="true"></i>  Trabajos
      </h4>
    </section>
    <div class="panel-body">
      
      <? mensaje_resultado($mensaje); ?>


      <!-- Crear trabajo -->
      <div class="col-md-5">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Crear Trabajo</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div> 
                <div class="box-body">

                    <? 
                    $attributes = array('class' => 'form', 'id' => 'form_alta_trabajo', 'name' => 'form_alta_trabajo');
                    echo form_open('trabajo/alta_trabajo', $attributes); ?>

 
                    <div class="form-group has-feedback">
                        <label for="trabajo"  class="col-sm-3 class-label">Descripción</label>
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

                     <div class="form-group has-feedback">
                        <label for="nombre_area"  class="col-sm-3 control-label">Area</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
 
                            <?  $area = array(); ?>

                            <?  $area[''] = 'Seleccionar Area'; ?>
                            
                            <?  foreach ($areas->result() as $row):  

                                    $area[$row->id_area] = $row->nombre;

                                endforeach; 

                              echo form_dropdown('id_area', $area, '' ,'class="form-control" id="id_area" name="id_area" ' ); 

                            ?>
                        </div>
                        <? echo mostrar_error_formulario($error, 'id_area');?>
                    </div>

                     <div class="form-group has-feedback">
                        <label for="id_trabajo_tango"  class="col-sm-3 control-label">ID trabajo Tango</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
 
                            <? 
                              $data = array(
                                      'type'  => 'text',
                                      'name'  => 'id_trabajo_tango',
                                      'id'    => 'id_trabajo_tango', 
                                      'class' => 'form-control'
                              );

                              echo form_input($data);

                            ?>
                        </div>
                        <? echo mostrar_error_formulario($error, 'id_trabajo_tango');?>
                    </div>

              

                   <div class="col-xs-12" style="margin-top:20px; margin-bottom:20px" >
                      <button type="submit" class="btn btn-primary btn-block"> Crear <div id="div_loadding_crear_trabajo" class="form-class-feedback"  style='margin-right:25px'><img src="<?=base_url()?>assets/images/loading_blanco.gif" ></div>  </button>   
                    </div>  
 

                    <? echo form_close(); ?>

                </div>
            </div>
      </div>

      <!--Ver trabajos -->
      <div class="col-md-7">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Trabajos</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div> 
                <div class="box-body">

                    <table class="table" id="tabla_trabajos" name="tabla_trabajos">
                          <thead>

                            <tr style="background-color: rgba(60, 141, 188, 0.35);">
                                <th>Id</th>
                                <th>Id tango</th>   
                                <th>Descripción </th>  
                                <th>Area </th>  
                                <th> </th>  
                                <th> </th>                                    
                            </tr>
                          </thead>  
                          <tbody>

                        <? foreach ($trabajos->result() as $row): ?>

                            <tr>
                              <td> <?=$row->id_trabajo?> </td>
                              <td> <?=$row->id_trabajo_tango?> </td>
                              <td> <?=$row->descripcion?> </td> 
                              <td> <?=$row->nombre_area?> </td>
                              <td> 
                                  <a href="<?=base_url()?>index.php/trabajo/trabajo/<?=$row->id_trabajo?>"><i class="fa fa-2x fa-binoculars" aria-hidden="true"></i></a>
                              </td>
                              <td>
                                  <a href="#" onclick="eliminar_trabajo(<?=$row->id_trabajo?>)"><i class="fa fa-2x fa-times" aria-hidden="true" style="padding-left:5px"></i> </a>
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