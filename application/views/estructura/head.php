<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
   <title>ECOGESTION | Sistema de necesidades y compras</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'/>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    
    <!-- Font Awesome Icons -->
    <link href="<?=base_url()?>assets/css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!--
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

     Ionicons 
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">-->


    <!-- jvectormap -->
    <link href="<?=base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
 
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datepicker/datepicker3.css">



    <link href="<?=base_url()?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    
    <script type="text/javascript">
            CI_ROOT = "<?=base_url()?>";
    </script>

    <style type="text/css">
      label.error { float: none; color: red; padding-left: 0px; vertical-align: bottom; }
      .sin_registros{ color:red; background-color: #F8E0E0; border: 1px solid #F78181; padding:5px; margin:5px; border-radius:2px;}
          
 

      .content-header {
        background-color:red;
      }

    </style>
 
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="<?=base_url()?>/index.php/home" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img style="height:65px" src="<?=base_url()?>assets/images/sintal_final-tierra.png"></span> 
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"> <img style="height:65px" src="<?=base_url()?>assets/images/sintal_final-blanco.png">  </span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          



          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
     
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <span class="hidden-xs"> <?=$this->session->userdata('eco_usuario')?> </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header" style="height:135px">
                    <i class="fa fa-user fa-4x" aria-hidden="true" style="color:white"></i>
                    <p>
                      <?=$this->session->userdata('eco_usuario')?>
                      <small>Id: <?=$this->session->userdata('eco_id')?> </small>
                    </p>
                  </li>           
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div style="text-align:center">
                      <a href="<?=base_url()?>/index.php/usuario/ver_cambiar_password" class="btn btn-success btn-flat">Cambiar password</a>
                    </div>
                   
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="<?=base_url()?>index.php/login/logout"> <i class="fa fa-question-circle"></i> <span>Ayuda</span> </a>
              </li>
              <li>
                <a href="<?=base_url()?>index.php/login/logout"> <i class="fa fa-power-off"></i> <span>Salir</span> </a>
              </li>
            </ul>
          </div>


         
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="min-height:700px;">
 
      
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu de Navegacion</li>
            <li>
                <a href="<?=base_url()?>index.php/home"> <i class="fa fa-angle-right"></i> <span>Home</span> </a>
            </li>

            <?=armar_menu()?>
 
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>