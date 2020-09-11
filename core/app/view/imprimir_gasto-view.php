
<script type="text/javascript">
      window.onload = function() { window.print(); 

window.location='index.php?view=egreso';

      }
 </script>
<div class="row">

 <section class="content-header">
      <h1 >
        DETALLES DE EGRESO

      </h1>

</section>
</div>

<div class="row">
<section class="content">


          <div class="box box box-danger">
            <div class="box-header">
              
               
            </div>

            <!-- /.box-header -->
            <div class="box-body">


              <?php $gasto = GastoData::getById($_GET['id']);
                if(count($gasto)>0){
                  // si hay usuarios
                  ?>
                  <table class="table table-bordered table-hover">

                  <thead style="color: white; background-color: #dd4b39;">
                        <th colspan="2" style="text-align: center;">Nº DE TICKET - <?php echo $gasto->id; ?> -</th> 
                        <th></th> 
                  </thead>
                  
                      <tr>
                        <td>Detalles del gasto</td>
                        <td><?php echo $gasto->descripcion; ?></td>
                        <td></td>
                      </tr> 
 
                      <tr>
                        <td>Monto </td>
                        <td><b>$  <?php echo number_format($gasto->precio,2,'.',','); ?></b></td>
                        <td></td>
                      </tr> 
                      <tr>
                        <td>Responsable</td>
                        <td><?php echo $gasto->getUsuario()->name; ?></td>
                        <td></td>
                      </tr>  


                   
                  </table>

               <?php }else{ 
           

                };
                ?>

           </div>
    </div>    


</section>

</div>

