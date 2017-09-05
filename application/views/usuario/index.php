<link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />


<style type="text/css">
   #div_loadding_cargar_usuario{
        display: none; 
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
      <h4>
        <i class="fa fa-users" aria-hidden="true"></i> Usuarios
      </h4>
    </section>
    <div class="panel-body">
        
        <? mensaje_resultado($mensaje); ?>
        
        <!-- Crear usuario -->
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Crear usuario</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div> 
                <div class="box-body">

                    
                
                    <? 
                    $attributes = array('class' => 'form', 'id' => 'form_alta_usuario', 'name' => 'form_alta_usuario');
                    echo form_open('usuario/alta_usuario', $attributes); ?>

                    <div class="form-group has-feedback">
                        <label for="alias"  class="col-sm-3 control-label">Alias</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
                            <input class="form-control"  id="alias" type="text" class="form-control" name="alias"  value="<? echo set_value('alias'); ?>"  />
                        </div>
                        <? echo mostrar_error_formulario($error, 'alias');?>
                    </div>
                    

                    <div class="form-group has-feedback">
                        <label for="nombre"  class="col-sm-3 control-label">Nombre</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
                            <input class="form-control"  id="nombre" type="text" class="form-control" name="nombre"  value="<? echo set_value('nombre'); ?>"  />
                        </div>
                    </div>
                    <?=mostrar_error_formulario($error, 'nombre')?>

                    <div class="form-group has-feedback">
                        <label for="apellido"  class="col-sm-3 control-label">Apellido</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
                            <input class="form-control"  id="apellido" type="text" class="form-control" name="apellido"  value="<? echo set_value('apellido'); ?>"  />
                        </div>
                    </div>
                    <?=mostrar_error_formulario($error, 'apellido')?>

                    <div class="form-group has-feedback">
                        <label for="password"  class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
                            <input class="form-control"  id="password" type="text" class="form-control" name="password"  value="<? echo set_value('password'); ?>"  />
                        </div>
                    </div>
                    <?=mostrar_error_formulario($error, 'password')?>

                    <div class="form-group has-feedback">
                          <label for="id_cargo" class="col-sm-3 control-label">Cargo</label>
                          <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
                              <? if($cargos->num_rows() > 0) :?>

                                  <?   foreach ($cargos->result() as $row): ?>

                                    <?   $lista_cargos[$row->id_cargo] = $row->nombre; ?>
                               
                                  <?   endforeach; ?>

                                  <?=form_dropdown('id_cargo', $lista_cargos,'' , "class='form-control'" )?>

                              <?  else: ?>
                                  
                                    Primero debe crear los cargos <a target="_blank" href="<?=base_url()?>index.php/cargo/index"> aqui </a>
                              <?  endif; ?>

                              
                          </div>
                    </div>
                    <?=mostrar_error_formulario($error, 'id_cargo')?>



                   <div class="col-xs-12" style="margin-top:20px; margin-bottom:20px" >
                      <button type="submit" class="btn btn-primary btn-block"> Aceptar <div id="div_loadding_cargar_usuario" class="form-control-feedback"  style='margin-right:25px'><img src="<?=base_url()?>assets/images/loading_blanco.gif" ></div>  </button>   
                    </div>

                    <? echo form_close(); ?>

                
                     
                </div>
            </div>
        </div>
        
        <!-- Ver usuarios -->
        <div class="col-md-8">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Usuarios del sistema</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div> 
                <div class="box-body">  

                    <table class="table" id="universidades_convenios" name="universidades_convenios">
                          <thead>

                            <tr style="background-color: rgba(60, 141, 188, 0.35);">
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Apellido</th>  
                                <th>Cargo</th>
                                <th>Area</th>
                                <th>Rama</th>
                                <th> </th>  
                                <th> </th>  
                                <th> </th>                                    
                            </tr>
                          </thead>  
                          <tbody>

                        <? foreach ($usuarios->result() as $row): ?>

                            <tr>
                              <td> <?=$row->alias?> </td>
                              <td> <?=$row->nombre?> </td>
                              <td> <?=$row->apellido?> </td>
                              <td> <?=$row->nombre_cargo?> </td>
                              <td> <?=$row->nombre_area?> </td>
                              <td> <?=$row->nombre_rama?> </td>
                              <td> 
                                  <a href="<?base_url()?>usuario/<?=$row->id_usuario?>"><i class="fa fa-1x fa-binoculars" aria-hidden="true"></i></a>
                              </td>
                              <td>
                                  <a href="#" onclick="eliminar_usuario(<?=$row->id_usuario?>)"><i class="fa fa-1x fa-times" aria-hidden="true" style="padding-left:5px"></i> </a>
                              </td>
                              <td>

                                  <? if($row->bloqueado == 1 ):?>
                                    <a href="<?=base_url()?>index.php/usuario/ver_desbloquear_usuario/<?=$row->id_usuario?>"><i class="fa fa-1x fa-unlock" aria-hidden="true"></i></a>
                                  <?  endif; ?>
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
 


<script language="javascript" type="text/javascript" src="<?=base_url()?>assets/js/usuario.js" ></script>
