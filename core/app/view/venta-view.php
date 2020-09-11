
<link rel="stylesheet" href="assets/js/vendor/footable/css/footable.core.min.css">
 
<?php 
     date_default_timezone_set('America/Lima');
     $hoy = date("Y-m-d");

             $u=null;
                $u = UserData::getById(Session::getUID());
                $usuario = $u->is_admin;
                $id_usuario = $u->id;

   $hora = date("H:i:s");
  $fecha_completo = date("Y-m-d H:i:s");   
             
  ?>
    <script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"></script>
 
       <div class="row">
         <div class="col-sm-6 col-md-8">
              <!-- Detalle de Compra -->
            <div class="panel panel-default" id="panel-detalle">

              <div class="panel-heading">
                <h6 class="panel-title">Detalle de Venta</h6>
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="input-group">
                      
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                        <span class="glyphicon glyphicon-plus"></span> Agregar productos
                      </button>
                                        </div>
                    </div>
                  </div>
                </div>

                <div class="table-responsive">
                  <table id="tbldetalle" class="table table-xxs">
                    <thead>
                      <tr class="bg-blue">
                        <th></th>
                        <th>Producto</th>
                        <th>Cant.</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Importe</th>
                        <th class="text-center">Quitar</th>
                        
                      </tr>
                    </thead> 
                    <tbody id="resultados"> 
                      
                    </tbody>
                    
                  </table>
                </div>
              </div>
            </div>
          <!-- /Detalle de Compra --> 
          <div class="form-group">
            <div class="row">
              <div class="col-sm-3">
                <a  href="index.php?view=cancelar_venta" class="btn btn-danger btn-labeled btn-block"><b>
                <i class="icon-cancel-circle2"></i>
                </b> Cancelar Venta</a>
              </div>
            </div>
          </div> 
            </div>



<!-- tile -->
                            




       <!-- Informacion Proveedor -->
          <div class="col-sm-6 col-md-4"> 

            <!-- tile -->
                            <section class="tile">

                                <!-- tile header -->
                                <div class="tile-header bg-slategray text-center" style="background-color: #4caf50 !important;
    padding: 20px 15px !important;">
                                    
                                    <h1 class="custom-font text-uppercase" id="total_compra"><strong>IMPORTANTE </strong></h1>
                                   
                                </div>
                                <!-- /tile header -->

                               

                                <!-- tile body -->
                                <div class="tile-body">
                                    <form  autocomplete="off"  method="post" action="index.php?view=addventa">

 
              <div class="form-group">
                <div class="row">  
                  <div class="col-sm-12"> 
                    <label>Tipo de cliente</label>
                    <select class="form-control select2" required  name="tipo_id_cliente" onchange="CargarTipoCliente(this.value);">  
                        <option value="">---- Selecciona ----</option> 
                        <option value="1">Huesped de habitación</option>  
                        <option value="2">Cliente natural</option> 
                    </select>  
                  </div>
                </div>
              </div>

            <div id="tipo_cliente">
              
            </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm-6">
                    <label>Tipo Comprobante</label>
                    <select  data-placeholder="..."  name="id_tipo_comprobante"
                      class="form-control" style="text-transform:uppercase;"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();">
                                      <option value="1">TICKET</option>
                                      <option value="2">BOLETA</option>
                                      <option value="3">FACTURA</option>
                                      
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <label>Fecha Comprobante</label>
                    
                      <input type="date" id="txtFechaC" name="fecha_comprobante" placeholder=""
                       class="form-control" value="<?php echo $hoy; ?>" disabled>
                                    
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
 
                  <div class="col-sm-6">
                    <label>Forma de Pago</label>
                    <select  data-placeholder="..."  name="contado"
                      class="form-control" style="text-transform:uppercase;">
                        <option value="1">CONTADO</option>
                                      
                    </select>
                  </div>

                  <div class="col-sm-6">
                    
                  </div>

                </div>
              </div>

              

              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12">
                    <button type="submit"  class="btn btn-success
                    btn-labeled btn-block btn-ladda btn-ladda-spinner"><b><i class="fa fa-money"></i>
                    </b> Guardar Venta</button>
                  </div>
                </div>
              </div>
 
              </form>

 
                                </div>
                                <!-- /tile body -->

                               

                            </section>
                            <!-- /tile -->


         
        </div>
        <!-- Informacion Proveedor -->
       </div>


        
      </div>
      <!-- /content area -->
    </div>
    <!-- /main content -->
  </div>
  <!-- /page content -->
</div>
<!-- /page container -->
</body>
</html>
 


  <!-- Carga los datos ajax --> 
  
      <!-- Modal -->
      <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
           
      
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">ACEPTAR</span></button>
          <h4 class="modal-title" id="myModalLabel">Buscar productos</h4>
          </div>
           <div class="modal-body">
             
             
          <div id="loader" style="position: absolute; text-align: center; top: 55px;  width: 100%;display:none;"></div><!-- Carga gif animado -->
          <div class="outer_div" ></div><!-- Datos ajax Final -->
                    
                   </div>
      
        
        </div> 
        </div> 
      </div>
            
            
  <script> 
    $(document).ready(function(){
      load(1);
    });
 
    function load(page){
      var q= $("#q").val();
      var parametros={"page":page,"q":q};
      $("#loader").fadeIn('slow');
      $.ajax({
        url:'./?action=buscar_producto', 
        data: parametros, 
         beforeSend: function(objeto){
         $('#loader').html('<img src="core/pedidos/img/ajax-loader.gif"> Cargando...');
        },
        success:function(data){
          $(".outer_div").html(data).fadeIn('slow');
          $('#loader').html('');
          
        } 
      })
    }
  </script>
  <script>

    function CargarTipoCliente(val)
    {   

        $('#tipo_cliente').html("Por favor espera un momento");    
        $.ajax({
            type: "POST",
            url: 'index.php?action=mostrar_cliente',
            data: 'id_mostrar_cliente='+val,
            success: function(resp){
                $('#tipo_cliente').html(resp);
            }
        });
    };




   

  function agregar (id)
    {
      var precio_venta=$('#precio_venta_'+id).val();
      var cantidad=$('#cantidad_'+id).val();
      var descripcion=$('#descripcion_'+id).val();
      //Inicia validacion
      if (isNaN(cantidad)) 
      {
      alert('Esto no es un numero');
      document.getElementById('cantidad_'+id).focus();
      return false;
      }
      if (isNaN(precio_venta))
      {
      alert('Esto no es un numero');
      document.getElementById('precio_venta_'+id).focus();
      return false;
      }
      
      //Fin validacion
    var parametros={"id":id,"precio_venta":precio_venta,"cantidad":cantidad}; 
    $.ajax({
        type: "POST",
        url: "./?action=agregar_tmp", 
        data: parametros,
     beforeSend: function(objeto){
      $("#resultados").html("Mensaje: Cargando...");
      },
        success: function(datos){

        $("#resultados").html(datos);

    }
      });
    }
    
      
    
      function eliminar (id)
    {
      
      $.ajax({
        type: "GET",
        url: "./?action=agregar_tmp",
        data: "id="+id, 
     beforeSend: function(objeto){
      $("#resultados").html("Mensaje: Cargando...");
      },
        success: function(datos){
    $("#resultados").html(datos);
    }
      });

    }
    
  
    
    
  </script>

