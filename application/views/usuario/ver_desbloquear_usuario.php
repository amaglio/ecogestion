<link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />


<style type="text/css">
   #div_loadding_desbloquear_usuario{
        display: none; 
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
      <h4>
        <i class="fa fa-users" aria-hidden="true"></i> Usuario / <?=$usuario->apellido.", ".$usuario->nombre?> / Desbloquear usuario
      </h4>
    </section>
    <div class="panel-body">

          <div class="col-md-10">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Desbloquear usuario</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div> 

               <div class="box-body">

                          <? mensaje_resultado($mensaje); ?>
                      
                          <? 
                          $attributes = array('class' => 'form', 'id' => 'form_desbloquear_usuario', 'name' => 'form_desbloquear_usuario');
                          echo form_open('usuario/desbloquear_usuario', $attributes); ?>

                          <? 
                                    $data = array(
                                            'type'  => 'hidden',
                                            'name'  => 'id_usuario',
                                            'id'    => 'id_usuario',
                                            'value' => $usuario->id_usuario,
                                            'class' => 'form-control',
                                            'readonly'=>'true'
                                    );

                                    echo form_input($data);

                                  ?>
                                   <? echo mostrar_error_formulario($error, 'id_usuario');?>

                          <div class="form-group has-feedback">
                              <label for="alias"  class="col-sm-3 control-label">Alias</label>
                              <div class="col-sm-9">
                                  <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>

                                  <? 
                                    $data = array(
                                            'type'  => 'text',
                                            'name'  => 'alias',
                                            'id'    => 'alias',
                                            'value' => $usuario->alias,
                                            'class' => 'form-control',
                                            'readonly'=>'true'
                                    );

                                    echo form_input($data);

                                  ?>
                              </div>
                              <? echo mostrar_error_formulario($error, 'alias');?>
                          </div>
                          
                       
                          <div class="form-group has-feedback">
                              <label for="nombre"  class="col-sm-3 control-label">Nombre</label>
                              <div class="col-sm-9">
                                  <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
                                  
                                  <? 
                                    $data = array(
                                            'type'  => 'text',
                                            'name'  => 'nombre',
                                            'id'    => 'nombre',
                                            'value' => $usuario->nombre,
                                            'class' => 'form-control',
                                            'readonly'=>'true'
                                    );

                                    echo form_input($data);

                                  ?>


                              </div>
                          </div>
                          <?=mostrar_error_formulario($error, 'nombre')?>

                          <div class="form-group has-feedback">
                              <label for="apellido"  class="col-sm-3 control-label">Apellido</label>
                              <div class="col-sm-9">
                                  <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>

                                   <? 
                                    $data = array(
                                            'type'  => 'text',
                                            'name'  => 'apellido',
                                            'id'    => 'apellido',
                                            'value' => $usuario->apellido,
                                            'class' => 'form-control',
                                            'readonly'=>'true'
                                    );

                                    echo form_input($data);

                                  ?>

                              </div>
                          </div>
                          <?=mostrar_error_formulario($error, 'apellido')?>


                          <div class="form-group has-feedback">
                                <label for="id_cargo" class="col-sm-3 control-label">Cargo</label>
                                <div class="col-sm-9">
                                  <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
                                    <?    foreach ($cargos->result() as $row): ?>

                                    <?   $lista_cargos[$row->id_cargo] = $row->nombre; ?>
                                 
                                    <?   endforeach; ?>
                                      
                                    <?=form_dropdown('id_cargo', $lista_cargos,'' , 'class="form-control"  disabled="disabled" ')?>
                                </div>
                          </div>
                          <?=mostrar_error_formulario($error, 'id_cargo')?>


                          <div class="form-group has-feedback">
                              <label for="password"  class="col-sm-3 control-label">Password</label>
                              <div class="col-sm-9">
                                  <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>

                                  <? 
                                    $data = array(
                                            'type'  => 'text',
                                            'name'  => 'password',
                                            'id'    => 'password',
                                            'class' => 'form-control'
                                    );

                                    echo form_input($data);

                                  ?>

                              </div>
                          </div>
                          <?=mostrar_error_formulario($error, 'password')?>



                         <div class="col-xs-12" style="margin-top:20px; margin-bottom:20px" >
                            <button type="submit" class="btn btn-primary btn-block"> Desbloquear <div id="div_loadding_desbloquear_usuario" class="form-control-feedback"  style='margin-right:25px'><img src="<?=base_url()?>assets/images/loading_blanco.gif" ></div>  </button>   
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
 
<script language="javascript" type="text/javascript" src="<?=base_url()?>assets/js/usuario.js" ></script>