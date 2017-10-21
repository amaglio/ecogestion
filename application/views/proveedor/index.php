<link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />


<style type="text/css">
   #div_loadding_cargar_proveedor{
        display: none; 
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
      <h4>
        <i class="fa fa-user-circle" aria-hidden="true"></i> Proveedores
      </h4>
    </section>
    <div class="panel-body">
        
        <? mensaje_resultado($mensaje); ?>
        
        <!-- Crear usuario -->
        <div class="col-md-5">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Crear proveedor</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div> 
                <div class="box-body">

                    
                
                    <? 
                    $attributes = array('class' => 'form', 'id' => 'form_alta_proveedor', 'name' => 'form_alta_proveedor');
                    echo form_open('proveedor/alta_proveedor', $attributes); ?>

                    <div class="col-sm-12 ">
                        <label for="nombre_proveedor"  class="col-sm-3 control-label">Nombre</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
 
                            <? 
                              $data = array(
                                      'type'  => 'text',
                                      'name'  => 'nombre_proveedor',
                                      'id'    => 'nombre_proveedor', 
                                      'class' => 'form-control'
                              );

                              echo form_input($data);

                            ?>
                        </div>
                        <? echo mostrar_error_formulario($error, 'nombre_proveedor');?>
                    </div>

                    <div class="col-sm-12 ">
                        <label for="email_proveedor"  class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
 
                            <? 
                              $data = array(
                                      'type'  => 'text',
                                      'name'  => 'email_proveedor',
                                      'id'    => 'email_proveedor', 
                                      'class' => 'form-control'
                              );

                              echo form_input($data);

                            ?>
                        </div>
                        <? echo mostrar_error_formulario($error, 'email_proveedor');?>
                    </div>
 
                    <div class="col-sm-12 ">
                        <label for="telefono_proveedor"  class="col-sm-3 control-label">Telefono</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
 
                            <? 
                              $data = array(
                                      'type'  => 'text',
                                      'name'  => 'telefono_proveedor',
                                      'id'    => 'telefono_proveedor', 
                                      'class' => 'form-control'
                              );

                              echo form_input($data);

                            ?>
                        </div>
                        <? echo mostrar_error_formulario($error, 'telefono_proveedor');?>
                    </div>

                    <div class="col-sm-12 ">
                        <label for="contacto_proveedor"  class="col-sm-3 control-label">Contacto Humano</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
 
                            <? 
                              $data = array(
                                      'type'  => 'text',
                                      'name'  => 'contacto_proveedor',
                                      'id'    => 'contacto_proveedor', 
                                      'class' => 'form-control'
                              );

                              echo form_input($data);

                            ?>
                        </div>
                        <? echo mostrar_error_formulario($error, 'contacto_proveedor');?>
                    </div>



                   <div class="col-xs-12" style="margin-top:20px; margin-bottom:20px" >
                      <button type="submit" disabled="disabled" class="btn btn-primary btn-block"> Aceptar <div id="div_loadding_cargar_proveedor" class="form-control-feedback"  style='margin-right:25px'><img src="<?=base_url()?>assets/images/loading_blanco.gif" ></div>  </button>   
                    </div>

                    <? echo form_close(); ?>

                
                     
                </div>
            </div>
        </div>
        
        <!-- Ver Proveedores -->
        <div class="col-md-7">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Proveedores</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div> 
                <div class="box-body">  
                    
                    <table class="table" id="tabla_proveedores" name="tabla_proveedores">
                          <thead>

                            <tr style="background-color: rgba(60, 141, 188, 0.35);">
                                <th>ID</th>
                                <th>Proveedor</th>
                                <th>Contacto</th>
                                <th>Telefono</th>
                                <th></th> 
                                <th></th>                                 
                            </tr>
                          </thead>  
                          <tbody>

                            <? foreach ($proveedores->result() as $row): ?>

                              <tr>
                                <td> <?=$row->id_proveedor?> </td>
                                <td> <?=$row->nombre?> </td> 
                                <td> <?=$row->contacto?> </td>
                                <td> <?=$row->telefono?> </td>
                                <td> 
                                    <a href="<?=base_url()?>index.php/proveedor/proveedor/<?=$row->id_proveedor?>"><i class="fa fa-1x fa-binoculars" aria-hidden="true"></i></a>
                                </td>
                                <td>
                                    <a href="#" onclick="eliminar_proveedor(<?=$row->id_proveedor?>)"><i class="fa fa-1x fa-times" aria-hidden="true" style="padding-left:5px"></i> </a>
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
 


<script language="javascript" type="text/javascript" src="<?=base_url()?>assets/js/proveedor.js" ></script>
