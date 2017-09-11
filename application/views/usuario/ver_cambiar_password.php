<link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />


<style type="text/css">
   #div_cambiar_password{
        display: none; 
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
      <h4>
        <i class="fa fa-users" aria-hidden="true"></i> Usuario / Cambiar mi password
      </h4>
    </section>
    <div class="panel-body">

          <div class="col-md-10">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Cambiar password</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div> 

               <div class="box-body">

                          <? mensaje_resultado($mensaje); ?>
                      
                          <? 
                          $attributes = array('class' => 'form', 'id' => 'form_cambiar_password', 'name' => 'form_cambiar_password');
                          echo form_open('usuario/cambiar_password', $attributes); ?>
 

                          <div class="form-group has-feedback">
                              <label for="password_actual"  class="col-sm-3 control-label">Password actual</label>
                              <div class="col-sm-9">
                                  <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>

                                  <? 
                                    $data = array(
                                            'type'  => 'text',
                                            'name'  => 'password_anterior',
                                            'id'    => 'password_anterior', 
                                            'class' => 'form-control'
                                    );

                                    echo form_input($data);

                                  ?>
                              </div>
                              <? echo mostrar_error_formulario($error, 'password_anterior');?>
                          </div>
                          
                       
                          <div class="form-group has-feedback">
                              <label for="nuevo_password"  class="col-sm-3 control-label">Nuevo password</label>
                              <div class="col-sm-9">
                                  <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>

                                  <? 
                                    $data = array(
                                            'type'  => 'text',
                                            'name'  => 'password_nuevo',
                                            'id'    => 'password_nuevo' ,
                                            'class' => 'form-control'
                                    );

                                    echo form_input($data);

                                  ?>
                              </div>
                              <? echo mostrar_error_formulario($error, 'password_nuevo');?>
                          </div>

                         

                          <div class="form-group has-feedback">
                              <label for="repite_nuevo_password"  class="col-sm-3 control-label">Repetir nuevo password</label>
                              <div class="col-sm-9">
                                  <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>

                                  <? 
                                    $data = array(
                                            'type'  => 'text',
                                            'name'  => 'repite_nuevo_password',
                                            'id'    => 'repite_nuevo_password' ,
                                            'class' => 'form-control'
                                    );

                                    echo form_input($data);

                                  ?>
                              </div>
                              <? echo mostrar_error_formulario($error, 'repite_nuevo_password');?>
                          </div>



                         <div class="col-xs-12" style="margin-top:20px; margin-bottom:20px" >
                            <button type="submit" class="btn btn-primary btn-block"> Cambiar Password <div id="div_cambiar_password" class="form-control-feedback"  style='margin-right:25px'><img src="<?=base_url()?>assets/images/loading_blanco.gif" ></div>  </button>   
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