
<body id="minovate" class="appWrapper sidebar-sm-forced">


 <!-- row --> 
<div class="row">
  <!-- col -->
  <div class="col-md-12">
    <section class="tile">
      <div class="tile-header dvd dvd-btm">  
        <h1 class="custom-font"><a onclick="javascript:print()"><strong>Imprimir</strong> </a></h1>
       
      </div>
      <!-- tile body -->
      <div class="tile-body">
        

               

              <?php $habitaciones = HabitacionData::getAll();
                if(count($habitaciones)>0){
                  // si hay usuarios
                  ?>
                  <table  class="table table-custom" style="font-size: 11px;" border="1px">

                  <thead style="color: white; background-color: #827e7e;">
                        <th>Nº</th> 
                        <th>NOMBRE</th>
                        <th>CATEGORÍA</th>
                        <th>ESTADO</th>
                  </thead>
                   <?php foreach($habitaciones as $habitacion):?>
                      <tr>
                        <td><?php echo $habitacion->id; ?></td>
                        <td><?php echo $habitacion->nombre; ?></td>
                        <td><?php echo $habitacion->getCategoria()->nombre; ?></td>
                        <td>
                          <?php if($habitacion->estado=='1' ){ ?>
                          DISPONIBLE
                          <?php }else if($habitacion->estado=='2' ){?>
                            OCUPADO
                          <?php }else if($habitacion->estado=='3' ){?>
                           LIMPIEZA
                          <?php }else if($habitacion->estado=='4' ){?>
                           MANTENIMIENTO
                          <?php } ?>
                        </td>
                        
                      </tr> 


                    <?php endforeach; ?>
                      
                  </table>

               <?php }else{ 
            echo"<h4 class='alert alert-success'>NO HAY REGISTRO</h4>";

                };
                ?>

           </div>    


</section>

</div>
</div>

     

       


       <script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"></script>
        
        <script src="assets/js/vendor/footable/footable.all.min.js"></script>
      
        
 <script>
            $(window).load(function(){

                $('.footable').footable();

            });
</script>