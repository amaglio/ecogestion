<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SINTAL | Sistema de Intercambio de Alumnos</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?=base_url()?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?=base_url()?>assets/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <link href="<?=base_url()?>assets/css/login.css" rel="stylesheet" type="text/css" />
    
    <style type="text/css">
      #cargando{
        display: none;
      }
    </style>
 
  </head>
  <body class="login-page" style=" background-image: url('<?=base_url()?>assets/images/fondo_ucema2.png');  background-repeat: no-repeat;">
    <div class="login-box">
      <div class="login-logo">
        <img src="<?=base_url()?>assets/images/logo_sintal.png"> 
      </div> 
      <div class="login-box-body">
 
        <div class="callout callout-success">
          <h4>Cambiar password</h4>

          <p>Para iniciar por primera vez en el sistema, debe cambiar su password.</p>
        </div>
  
        <form id="form_cambiar_primer_password" method="post" action="<?=base_url()?>index.php/login/cambiar_primer_password">
            
            <div class="form-group has-feedback">
              <input type="text" id="alias" name="alias" class="form-control" placeholder="Ingrese su alias"/>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">           
              <input type="text" id="password_anterior" name="password_anterior" class="form-control" placeholder="Ingrese su password anterior"/>
              <span class="glyphicon glyphicon-sunglasses form-control-feedback"></span>
            </div>
            
            
            <div class="form-group has-feedback">           
              <input type="text" id="password_nuevo" name="password_nuevo" class="form-control" placeholder="Ingrese su nuevo password"/>
               <span class="glyphicon glyphicon-sunglasses form-control-feedback"></span>
            </div>

             <div class="form-group has-feedback">
              <input type="text" id="repite_password_nuevo" name="repite_password_nuevo" class="form-control" placeholder="Repita su nuevo password"/>
              <span class="glyphicon glyphicon-sunglasses form-control-feedback"></span>
            </div>


            <div class="row">
              <div class="col-xs-12">
                <button type="submit" class="btn btn-block btn-primary "> Cambiar password <div id="cargando" class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></div> </button> 
              </div> 
           
            </div>
        
        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?=base_url()?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?=base_url()?>assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>

    <script language="javascript" type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.4.4.min.js"></script> 
    <script language="javascript" type="text/javascript" src="<?=base_url()?>assets/js/jquery-ui-1.8.10.custom.min.js"></script> 
    <script language="javascript" type="text/javascript" src="<?=base_url()?>assets/js/jquery.validate.js" ></script>
    <script language="javascript" type="text/javascript" src="<?=base_url()?>assets/js/additional-methods.js" ></script> 
    <script>
            var jq_val = jQuery.noConflict();
    </script>

    <script language="javascript" type="text/javascript" src="<?=base_url()?>assets/js/login.js" ></script>
  </body>


</html>