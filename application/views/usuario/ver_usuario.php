<link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />


<style type="text/css">
   #div_loadding_modificar_usuario{
        display: none; 
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
      <h4>
        <i class="fa fa-users" aria-hidden="true"></i> Usuarios / <?=$usuario->apellido.", ".$usuario->nombre?>
      </h4>
    </section>
    <div class="panel-body">
        
        <? mensaje_resultado($mensaje); ?>

        <div class="col-md-12" style="margin-bottom: 10px">
          <button type="submit" class="btn btn-sm btn-primary "  onclick="eliminar_usuario(<?=$usuario->id_usuario?>)"> 
              <i class="fa fa-1x fa-times" aria-hidden="true" style="padding-left:5px"></i> Eliminar usuario
          </button>
       

         <? if($usuario->bloqueado == 1 ):?>

          <a class="btn btn-sm btn-danger " href="<?=base_url()?>index.php/usuario/ver_desbloquear_usuario/<?=$usuario->id_usuario?>"><i class="fa fa-1x fa-unlock" aria-hidden="true"></i> Desbloquear usuario</a>
        <?  endif; ?>

        </div>
        
        <!-- Crear usuario -->
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Modificar usuario</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div> 
                <div class="box-body">

                    <? 
                    $attributes = array('class' => 'form', 'id' => 'form_modificar_usuario', 'name' => 'form_modificar_usuario');
                    echo form_open('usuario/modifica_usuario', $attributes); ?>

                    <? 
                              $data = array(
                                      'type'  => 'hidden',
                                      'name'  => 'id_usuario',
                                      'id'    => 'id_usuario',
                                      'value' => $usuario->id_usuario,
                                      'class' => 'form-control'
                              );

                              echo form_input($data);

                            ?>
                             <? echo mostrar_error_formulario($error, 'id_usuario');?>

                    <div class="form-group has-feedback">
                        <label for="alias"  class="col-sm-3 control-label">Alias</label>
                        <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
                            <!--<input class="form-control"  id="alias" type="text" class="form-control" name="alias"  value="<? echo set_value('alias'); ?>"  /> -->

                            <? 
                              $data = array(
                                      'type'  => 'text',
                                      'name'  => 'alias',
                                      'id'    => 'alias',
                                      'value' => $usuario->alias,
                                      'class' => 'form-control'
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
                                      'class' => 'form-control'
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
                                      'class' => 'form-control'
                              );

                              echo form_input($data);

                            ?>

                        </div>
                    </div>
                    <?=mostrar_error_formulario($error, 'apellido')?>

                    <?/*
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
                    <?=mostrar_error_formulario($error, 'password') */ ?>

                    <div class="form-group has-feedback">
                          <label for="id_cargo" class="col-sm-3 control-label">Cargo</label>
                          <div class="col-sm-9">
                            <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>
                              <?    foreach ($cargos->result() as $row): ?>

                              <?   $lista_cargos[$row->id_cargo] = $row->nombre; ?>
                           
                              <?   endforeach; ?>
                                
                              <?=form_dropdown('id_cargo', $lista_cargos, $usuario->id_cargo , "class='form-control'" )?>
                          </div>
                    </div>
                    <?=mostrar_error_formulario($error, 'id_cargo')?>



                   <div class="col-xs-12" style="margin-top:20px; margin-bottom:20px" >
                      <button type="submit" class="btn btn-primary btn-block"> Aceptar <div id="div_loadding_modificar_usuario" class="form-control-feedback"  style='margin-right:25px'><img src="<?=base_url()?>assets/images/loading_blanco.gif" ></div>  </button>   
                    </div>  

                    <? echo form_close(); ?>

                
                     
                </div>
            </div>
        </div>
        
        <!-- Rol usuarios -->
        <div class="col-md-6">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Roles del usuario</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div> 
                <div class="box-body">
 
                
                    <? 
                    $attributes = array('class' => 'form', 'id' => 'form_asignar_roles_usuario', 'name' => 'form_asignar_roles_usuario');
                    echo form_open('usuario/asignar_roles_usuario', $attributes);

                        $data = array(  
                                      'name'        => 'id_usuario',
                                      'id'          => 'id_usuario',
                                      'value'       =>  $usuario->id_usuario,
                                      'checked'     => FALSE,
                                      'style'       => 'form-control' ,
                                      'type'       => 'hidden' 
                                      );

                        echo form_input($data);



                    ?>


 
                    <table class="table" id="tabla_roles" name="tabla_roles">
                          <thead>

                            <tr style="background-color: rgba(60, 141, 188, 0.35);">
                                <th>Id</th>
                                <th>Rol</th>   
                                <th> </th>                                    
                            </tr>
                          </thead>  
                          

                          <? if($roles->num_rows() > 0) : ?>
                              
                              <tbody>

                              <? foreach ($roles->result() as $row): ?>

                                  <tr>
                                    <td> <?=$row->id_rol?> </td>
                                    <td> <?=$row->nombre?> </td> 
                                    <td> 

                                      <?
                                          $exito = 0;
                                          
                                          $data = array(  
                                                  'name'        => 'rol[]',
                                                  'id'          => 'rol',
                                                  'value'       => $row->id_rol,
                                                  'checked'     => FALSE,
                                                  'style'       => 'form-control' 
                                                  );


                                        foreach ($roles_usuario->result() as $row2):  

                                                    if($row->id_rol == $row2->id_rol):   

                                                      $exito = 1;

                                                    endif;   
                                          
                                          endforeach;  

                                          if( $exito == 1):

                                            $data['checked'] = TRUE;

                                          endif;


                                          echo form_checkbox($data);
                                      ?>
                                         
                                    </td>
                                   
                                  </tr>

                              <? endforeach; ?>
                          
                          <? endif; ?>

                          </tbody>

                    </table>

                    <? 

                        $data = array(  
                                                  'name'        => 'submit',
                                                  'type'          => 'submit',
                                                  'value'       => 'Asignar roles usuario',
                                                  'checked'     => FALSE,
                                                  'class'       => 'btn btn-primary btn-block' 
                                                  );

                        echo form_input($data);
                        

                    ?>

                </div>
            </div>

        </div>

        <? /*
        <div class="col-md-6">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Roles del usuario</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div> 
                <div class="box-body">

                    <table class="table" id="tabla_roles" name="tabla_roles">
                          <thead>

                            <tr style="background-color: rgba(60, 141, 188, 0.35);">
                                <th>Id</th>
                                <th>Rol</th>   
                                <th> </th>  
                                <th> </th>                                    
                            </tr>
                          </thead>  
                          

                          <? if($roles_usuario->num_rows() > 0) : ?>
                              
                              <tbody>

                              <? foreach ($roles_usuario->result() as $row): ?>

                                  <tr>
                                    <td> <?=$row->id_rol?> </td>
                                    <td> <?=$row->nombre?> </td> 
                                    <td> 
                                        <a href="<?=base_url()?>index.php/rol/rol/<?=$row->id_rol?>"><i class="fa fa-1x fa-binoculars" aria-hidden="true"></i></a>
                                    </td>
                                    <td>
                                        <a href="#" onclick="eliminar_rol(<?=$row->id_rol?>)"><i class="fa fa-1x fa-times" aria-hidden="true" style="padding-left:5px"></i> </a>
                                    </td> 
                                  </tr>

                              <? endforeach; ?>
                          
                          <? endif; ?>

                          </tbody>

                      </table>


                </div>
            </div>

        </div> */ ?>

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
