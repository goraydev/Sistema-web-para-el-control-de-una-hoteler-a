
<?php 
     date_default_timezone_set('America/Lima');
     $hoy = date("Y-m-d");
     $hora = date("H:i:s");
                    
?>



<div class="row">

 <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Reportes</a></li>
        <li class="active">Reporte mensual</li>
      </ol>
</section>
</div>


<h3 >
        <span class="fa fa-file-text-o"></span> REPORTE MENSUAL
        <small>Avance</small>
      </h3>


 
    <script>
      var progreso = 0;
      var idIterval = setInterval(function(){
        // Aumento en 10 el progeso
        progreso +=10;
        $('#bar').css('width', progreso + '%');
       
      //Si llegó a 100 elimino el interval
        if(progreso == 100){
       clearInterval(idIterval);
      }
      },1000);
    </script>
 

<br> 
<div class="row">

      <div  class="col-md-12">
          <div class="box box-success box-solid">
            
            <!-- /.box-header -->
            <form method="post"  action="reporte/pdf/documentos/reporte_mensual_user.php" id="addcaja" target="_blank">
              <div class="box-body">

              <div class="progress progress-sm active">
                <div  id="bar" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                  <span class="sr-only">20% Complete</span>
                </div>
              </div>

              <div class="col-md-3">
                <div class="row">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon text-green"><i class="fa fa-calendar"></i> AÑO</span>
                      <select class="form-control select2" required  name="anio">   
                          <option value="2018">2018</option>
                          <option value="2017">2017</option>
                          <option value="2016">2016</option>
                          <option value="2015">2015</option>
                          <option value="2014">2014</option>
                          <option value="2013">2013</option>
                          <option value="2012">2012</option>
                          <option value="2011">2011</option>
                      </select>  
                    </div>
                  </div>
                 </div>
              </div>

              <div class="col-md-3">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon text-green" ><i class="fa fa-calendar"></i> MES</span>
                      <select class="form-control select2" required  name="mes">   
                          <option value="1">Enero</option>
                          <option value="2">Febrero</option>
                          <option value="3">Marzo</option>
                          <option value="4">Abril</option>
                          <option value="5">Mayo</option>
                          <option value="6">Junio</option>
                          <option value="7">Julio</option>
                          <option value="8">Agosto</option>
                          <option value="9">Setiembre</option>
                          <option value="10">Octubre</option>
                          <option value="11">Noviembre</option>
                          <option value="12">Diciembre</option>
                      </select>  
                    </div>
                  </div>   
              </div> 
              <!--
              <div class="col-md-4">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon text-green" ><i class="fa fa-user"></i> USUARIO</span>
                       <select class="form-control select2" required  name="id_user">   
                          <option value="0">------Todos------</option>
                        <?php $users = UserData::getAll();?>
                        <?php foreach($users as $user):?>
                          <option value="<?php echo $user->id;?>"><?php echo $user->name;?></option>
                        <?php endforeach;?>
                      </select>  
                    </div>
                  </div> 
              </div>
              -->
              <div class="col-md-2">
                  <div class="form-group">
                    <div class="input-group">
                      <button  type="submit" class="btn btn-success pull-right" target="_blank"><i class='fa fa-file-pdf-o'></i> Generar PDF</button> 
                    </div>
                  </div> 
              </div>
                
 
              </div>

             

          </form>

          </div>
          <!-- /.box -->
      </div>

</div>


     
      
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
   
  });
</script>

<script>
  $(function () {
    $("#example2").DataTable();
   
  });
</script>
