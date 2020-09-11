
<?php 
     date_default_timezone_set('America/Lima');
     $hoy = date("Y-m-d");
     $hora = date("H:i:s");
                    
?>

<style type="text/css">
  table.dataTable thead .sorting:after {
    opacity: 0.0;
    content: "\e150";
}

table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after {
    opacity: 0.0;
}
</style>
<div class="row">

 <section class="content-header">
      <h3>
        <span class="fa fa-file-text-o"></span> REPORTE POR RANGO DE FECHA 
        <small>Avance</small>
      </h3> 
      <ol class="breadcrumb">
        <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Reportes</a></li>
        <li class="active">Reporte Por rango</li>
      </ol>
</section>
</div>




<style type="text/css">
  
  .hh:hover{
    background-color: white;
  }
  .small-box-footer {
    position: relative;
    text-align: center;
    padding: 0px 0;
    color: #fff;
    color: rgba(255,255,255,0.8);
    display: block;
    z-index: 10;
    background: rgba(0,0,0,0.1);
    text-decoration: none;
}
.nav-tabs-custom>.nav-tabs>li>a {
    color: #3c8dbc;
    font-weight: bold;
    border-radius: 0 !important;
}
.nav-tabs-custom>.nav-tabs>li.active {
    border-top-color: #00a65a;
}
.h5, h5 {
    margin-top: 0px;
    margin-bottom: 0px;
}
</style>



<br>


<section class="tile col-md-6 ">
<form method="post" action="index.php?view=reporte_rango_producto" >
                                <div class="tile-body">

                                    <h4 class="custom-font"><strong>Fecha</strong> Inicio</h4>
                                    <input type="date" class="typeahead form-control" name="start" value="<?php echo $hoy; ?>">

                                    <h4 class="custom-font"><strong>Fecha</strong> Fin</h4>
                                    <input type="date" class="typeahead form-control" name="end" value="<?php echo $hoy; ?>">

                                    

                                </div>
                                <!-- /tile body -->
                                <div class="tile-footer">
                                    <div class="form-group text-center">
                                       
                                        <button class="btn btn-rounded btn-success ripple" type="submit"><i class="fa fa-open-eye"></i> Ver reporte</button>
                                    </div>
                                </div>
                            </form>

                            </section>







     
      
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
