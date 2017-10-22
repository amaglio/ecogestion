<link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

<link   type="text/css" href="<?php echo base_url(); ?>assets/css/dark-hive/jquery-ui-1.8.10.custom.css" rel="stylesheet" /> 
<link   type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" /> 
<style type="text/css">



<style type="text/css">
   #div_loadding_modifica_necesidad{
        display: none; 
    }

    #div_loadding_asociar_recurso{
        display: none; 
    }

    #sin_resultado{
      display: none; 
      width: 95%;
      background-color: rgba(61, 141, 188, 0.58);
      margin: 10px;
      padding: 10px;
      padding-bottom: 20px;
          border: solid 1px #3d8dbc;
    }
    
    #div_recurso_seleccionado
    {
      display: none; 
      width: 95%;
      background-color: rgba(61, 141, 188, 0.58);
      margin: 10px;
      padding: 10px;
      padding-bottom: 20px;
          border: solid 1px #3d8dbc;
    }

    #div_crear_recurso
    {
      display: none; 
      width: 95%;
      background-color: rgba(61, 141, 188, 0.58);
      margin: 10px;
      padding: 10px;
      padding-bottom: 20px;
          border: solid 1px #3d8dbc;
    }

    #div_loadding_modifica_necesidad
    {
      display: none;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
      <h4>
       <i class="fa fa-level-down" aria-hidden="true"></i> Necesidad / <?=$necesidad->id_necesidad?>
      </h4>
    </section>
    <div class="panel-body">

        <div class="col-md-12" style="margin-bottom: 10px">
          <button type="submit" class="btn btn-sm btn-primary "  onclick="eliminar_necesidad(<?=$necesidad->id_necesidad?>)"> 
              <i class="fa fa-1x fa-times" aria-hidden="true" style="padding-left:5px"></i> Eliminar necesidad
          </button>
        </div>
        
        <!-- Ver Necesidad y cargar recurso -->
        <div class="col-md-5">

          <!-- Ver Necesidad -->
          <div class="box box-primary">
              <div class="box-header with-border">
                  <h3 class="box-title">Modificar necesidad</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
              </div> 
              <div class="box-body">

                  <? mensaje_resultado($mensaje); ?>
              
                  <? 
                  $attributes = array('class' => 'form', 'id' => 'form_modifica_necesidad', 'name' => 'form_modifica_necesidad');
                  echo form_open('necesidad/modifica_necesidad', $attributes); ?>

                      <? 
                            $data = array(
                                    'type'  => 'hidden',
                                    'name'  => 'id_necesidad',
                                    'value'  => $necesidad->id_necesidad,
                                    'id'    => 'id_necesidad', 
                                    'class' => 'form-control'
                            );

                            echo form_input($data);

                      ?>

                   <div class="form-group has-feedback">
                      <label for="Trabajo"  class="col-sm-3 control-label">Trabajo</label>
                      <div class="col-sm-9">
                          <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>

                          <?  $trabajo = array(); ?>

                          <?  $trabajo[''] = 'Seleccionar trabajo'; ?>
                          
                          <?  foreach ($trabajos->result() as $row):  

                                  $trabajo[$row->id_trabajo] = $row->id_trabajo."-".$row->descripcion;

                              endforeach; 

                            echo form_dropdown('id_trabajo', $trabajo, $necesidad->id_trabajo ,'class="form-control" id="id_trabajo" name="id_trabajo" ' ); 

                          ?>
                      </div>
                      <? echo mostrar_error_formulario($error, 'id_trabajo');?>
                  </div>

                   <div class="form-group has-feedback">
                      <label for="fecha_limite"  class="col-sm-3 control-label">Fecha </label>
                      <div class="col-sm-9">
                          <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>

                          <? 
                            $data = array(
                                    'type'  => 'text',
                                    'name'  => 'fecha_limite',
                                    'id'    => 'fecha_limite', 
                                    'class' => 'form-control calendario',
                                    'value' =>  $necesidad->fecha_limite
                            );

                            echo form_input($data);

                          ?>
                      </div>
                      <? echo mostrar_error_formulario($error, 'fecha_limite');?>
                  </div>

                  <div class="form-group has-feedback" style="margin-top: 10px">
                      <label for="necesidad"  class="col-sm-3 class-label">Descripción</label>
                      <div class="col-sm-9"> 

                           <? 
                         $data = array(
                                    'name'        => 'descripcion',
                                    'id'          => 'descripcion', 
                                    'rows'        => '5', 
                                    'class'       => 'form-control',
                                    'value' => $necesidad->comentario
                                );

                                echo form_textarea($data);

                          ?>

                      </div>
                  </div>
                  



                  <div class="col-xs-12" style="margin-top:20px; margin-bottom:20px" >
                    <button type="submit" class="btn btn-primary btn-block"> Modificar <div id="div_loadding_modifica_necesidad" class="form-control-feedback"  style='margin-right:25px'><img src="<?=base_url()?>assets/images/loading_blanco.gif" ></div>  </button>   
                  </div>

                  <? echo form_close(); ?>

              
                   
              </div>
          </div>

          <!-- Cargar recurso a la necesidad -->
          <div class="box box-primary">
              <div class="box-header with-border">
                  <h3 class="box-title">Asociar recurso a la necesidad</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
              </div> 
              <div class="box-body"> 

                <div class="row">

                 <? 
                  $attributes = array('class' => 'form', 'id' => 'form_asociar_recurso', 'name' => 'form_asociar_recurso');
                  echo form_open('necesidad/asociar_recurso', $attributes); ?>

                  <input type="hidden" name="recurso_oculto" id="recurso_oculto" >

                  <div class="row col-sm-12">
                      <label for="recurso"  class="col-sm-3 control-label">Recurso </label>
                      <div class="col-sm-9">
                          <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>

                          <? 
                            $data = array(
                                    'type'  => 'text',
                                    'name'  => 'recurso',
                                    'id'    => 'recurso', 
                                    'class' => 'form-control'
                            );

                            echo form_input($data);

                          ?>
                      </div>
                      <? echo mostrar_error_formulario($error, 'recurso');?>
                  </div>

                  <!-- SIN RESULTADO -->
                  <div class="row col-sm-12" id="sin_resultado" style="padding:15px;   text-align:center">

                        No existe el recurso <a   id="button_cargar_recurso" onclick="mostrar_cargar_recurso()"   class="btn btn-xs" >Crear recurso</a>
                  </div>

                  <!-- RECURSOS SELECCIONADOS -->
                  <div class="row col-sm-12" id="div_recurso_seleccionado">
                    <div class="col-sm-12" style="padding-bottom: 10px">
                          <button class="btn btn-xs" onclick="ocultar_recurso_seleccinoado()"> 
                                Cerrar <i class="fa fa-times" aria-hidden="true"></i>
                          </button> 
                    </div>  
                    <div class="col-sm-4"><label>Id</label>  </div>
                    <div class="col-sm-8">
                        <input readonly="readonly" type="text" class="form-control" id="id_recurso" name="id_recurso" placeholder="Id recurso">
                    </div>
                    <div class="col-sm-4"><label>Recurso</label>  </div>
                    <div class="col-sm-8">
                       <input readonly="readonly" type="text" class="form-control" id="descripcion_recurso" name="descripcion_recurso" placeholder="Descripción recurso">
                    </div>               
                  </div>

                  <!-- CREAR RECURSO -->
                  <div class="row col-sm-12" id="div_crear_recurso">
                    <div class="col-sm-12" style="padding-bottom: 10px">
                          <a class="btn btn-xs" onclick="ocultar_crear_recurso()"> 
                                Cerrar <i class="fa fa-times" aria-hidden="true"></i>
                          </a> 
                    </div>  
                    <div class="col-sm-4"><label>Recurso</label>  </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="recurso_manual" name="recurso_manual" placeholder="Descripcion/nombre del recurso">
                    </div>
                    <div class="col-sm-4"> <label>Unidad <br> Medida </label>  </div>
                    <div class="col-sm-8">
                       <input readonly="readonly" type="text" class="form-control" id="unidad_medida" name="unidad_medida" placeholder=" Kg, unidad, mtrs..">
                    </div>               
                  </div>


                  <div class="row col-sm-12">
                      <label for="cantidad"  class="col-sm-3 control-label">Cantidad </label>
                      <div class="col-sm-9">
                          <span style="right: -10px;" class="campo_requerido  form-control-feedback">*</span>

                          <? 
                            $data = array(
                                    'type'  => 'text',
                                    'name'  => 'cantidad',
                                    'id'    => 'cantidad', 
                                    'class' => 'form-control'
                            );

                            echo form_input($data);

                          ?>
                      </div>
                      <? echo mostrar_error_formulario($error, 'cantidad');?>
                  </div>

                  <div class="row col-sm-12" style="margin-top:20px; margin-bottom:20px" >

                    <button type="submit" class="btn btn-primary btn-block"> Asociar <div id="div_loadding_asociar_recurso" class="form-class-feedback"  style='margin-right:25px'><img src="<?=base_url()?>assets/images/loading_blanco.gif" ></div>  </button>   
                  </div>  


                  <? echo form_close(); ?>

                </div>
                   
              </div>
          </div>

        </div>

        <div class="col-md-7">
            
          <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Recursos para la necesidad</h3>
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
                                <th>Cantidad necesaria</th> 
                                <th></th>  
                                <th></th>                                
                            </tr>
                          </thead>  
                          <tbody>

                            <? 
                      
                            foreach ($recursos_necesidad->result() as $row): 

                             ?>

                              <tr>
                                <td> <?php echo $row->id_recurso; ?> </td>
                                <td> <?php echo $row->descripcion; ?> </td> 
                                <td> <?php echo $row->unidad_medida; ?> </td> 
                                <td> <?php echo $row->cantidad_necesaria; ?> </td> 
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
 
<!-- Datepicker -->
<script src="<?=base_url()?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>

<script language="javascript" type="text/javascript" src="<?=base_url()?>assets/js/necesidad.js" ></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.12.1/jquery-ui.js"></script> 

<script>
  var jq_ui = jQuery.noConflict();
</script>

<script type="text/javascript">

    jq_ui('#recurso').autocomplete({
          
          minLength: 3,
          change: function( event, ui ) {
             //jq_ui('#div_recurso_seleccionado_manual').hide();
          },
          source:'<?php echo site_url('recurso/ajax_recurso'); ?>',
          select: function(event, ui) 
          {   
              jq_ui("#div_recurso_seleccionado").show();
              jq_ui("#id_recurso").val(ui.item.id_recurso);
              jq_ui("#descripcion_recurso").val(ui.item.value);
              jq_ui('#recurso').attr('disabled', true);
              jq_ui('#recurso').val("");
              jq_ui( "#cantidad" ).focus();
              
              jq_ui(this).val("");
              return false;  
            
          },
          response: function(event, ui) { 
            
            event.preventDefault();

            if (ui.content.length === 0) 
            {   
              jq_ui('label.error').hide();

              jq_ui('#sin_resultado').show();
              return true;
              
            } 
            else 
            {
              jq_ui('#sin_resultado').hide();
            }

          }

    });

    function ocultar_recurso_seleccinoado()
    {
        jq_ui('#recurso').val(""); 
        jq_ui('#id_recurso').val(""); 
        jq_ui('#descripcion_recurso').val(""); 
        jq_ui('#div_recurso_seleccionado').hide();
        jq_ui('#recurso').attr('readonly', false);
    }
 

    function mostrar_cargar_recurso()
    {
        jq_ui("#sin_resultado").hide();
        jq_ui("#div_crear_recurso").show();
        jq_ui( "#recurso_manual" ).focus();
    }

    function ocultar_crear_recurso()
    {

      jq_ui("#div_crear_recurso").hide();
    }



</script>

<script type="text/javascript">
 
  jq_va.validator.addMethod("ingreso_recurso", 
    function(value, element) 
      {   
          var recurso = jq_va( "#recurso" ).val().length;
          var id_recurso = jq_va( "#id_recurso" ).val().length;
          
          var recurso_manual = jq_va( "#recurso_manual" ).val().length;

           if(  id_recurso <= 0 && recurso_manual <= 0 )
           {
                return false;
           }
           else
           {
               return true;
           }  

         
         
      }, 
     "Debe ingresar el recurso"
  );
  
  jq_va(function(){

      jq_va('#form_asociar_recurso').validate({
          ignoreTitle: true,
          rules :{ /* 
                  recurso: {
                      ingreso_recurso : true
                  },*/
                  cantidad: {
                      required : true
                  },
                  recurso_manual: {
                      required : true
                  },
                  unidad_medida: {
                      required : true
                  } 

          },
          messages : {
                  /*
                  recurso: {
                      ingreso_recurso : "Debe seleecionar el recurso o crearlo"
                  },*/
                  cantidad: {
                      required : "Debe ingresar la cantidad"
                  },
                  recurso_manual: {
                      required : "Debe ingresar el nombre del recurso"
                  },
                  unidad_medida: {
                      required : "Debe ingresar la unidad de medida"
                  }
          } 

      });    
  }); 
</script>