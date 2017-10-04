<div class="content-wrapper">
    <section class="content-header">
        <h4>
            <i class="fa fa-home" aria-hidden="true"></i> Home
        </h4>
    </section>
    <div class="panel-body">
        
        <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box" style="height: 50px; min-height:70px">
            <span class="info-box-icon bg-blue" style="height: 70px; width:70px; font-size: 40px; line-height: 70px"><i class="fa fa-tasks" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Trabajos activos</span>
              <span class="info-box-number"><?php echo $trabajos->num_rows(); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box" style="height: 50px; min-height:70px">
            <span class="info-box-icon bg-red" style="height: 70px; width:70px; font-size: 40px; line-height: 70px"><i class="fa fa-bell" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Necesidades activas</span>
              <span class="info-box-number"><?php echo $necesidades->num_rows(); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
 
      </div>
 
             
        <!--  Trabajos pendientes -->
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Resumen de trabajos</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div> 
                <div class="box-body">


                    <table class="table" id="universidades_convenios" name="universidades_convenios">
                          <thead>

                            <tr style="background-color: rgba(60, 141, 188, 0.35);">
                                <th>ID</th>
                                <th>Area</th>
                                <th>Descripcion</th>
                                <th>Ver</th>                                    
                            </tr>
                          </thead>  
                          <tbody>
                            
                            <?php foreach ($trabajos->result() as $row): ?>

                                  <tr>
                                    <td><?php echo $row->id_trabajo; ?> </td>
                                    <td><?php echo $row->nombre_area; ?> </td>
                                    <td><?php echo $row->descripcion; ?> </td>
                                    <td> 
                                        <a href="<?=base_url()?>index.php/trabajo/trabajo/<?=$row->id_trabajo?>"><i class="fa fa-1x fa-binoculars" aria-hidden="true"></i></a>
                                    </td>
                                  </tr>

                            <?php endforeach; ?>


 

                          </tbody>

                    </table>
            

                </div>
            </div>
        </div>
    
        <!--  Trabajos pendientes -->
        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Resumen de necesidades</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div> 
                <div class="box-body">


                     <table class="table" id="universidades_convenios" name="universidades_convenios">
                          <thead>

                            <tr style="background-color: rgba(221, 75, 57, 0.66);">
                                <th>ID</th>
                                <th>ID trabajo</th>
                                <th>Fecha limite</th>
                                <th>Comentario</th>
                                <th>Ver</th>                                    
                            </tr>
                          </thead>  
                          <tbody>
                            
                            <?php foreach ($necesidades->result() as $row): ?>

                                  <tr>
                                    <td><?php echo $row->id_necesidad; ?> </td>
                                    <td><?php echo $row->descripcion_trabajo; ?> </td>
                                    <td><?php echo $row->fecha_limite; ?> </td>
                                    <td><?php echo $row->comentario; ?> </td>
                                    <td> 
                                        <a href="<?=base_url()?>index.php/necesidad/necesidad/<?=$row->id_necesidad?>">
                                          <i style="color:rgba(221, 75, 57, 0.66);" class="fa fa-1x fa-binoculars" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                  </tr>

                            <?php endforeach; ?>


 

                          </tbody>

                    </table>
            

                </div>
            </div>
        </div>

    </div>
</div>