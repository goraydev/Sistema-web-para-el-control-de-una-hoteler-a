              
<?php if(isset($_POST['id']) and $_POST['id']!=""){ ?>

<?php if($_POST['id']=='1') {?>      
                
               
                  <input type="hidden" name="nro_operacion"  value="-" placeholder="ingrese número de operación">
                  
               
<?php }else if($_POST['id']=='2'){?>


                
                <div class="input-group">
                  
                  <input type="text" class="form-control" name="nro_operacion" required=""  value="" placeholder="ingrese número de operación">
                  
                </div>
                <!-- /.input group -->
           

<?php  }else if($_POST['id']=='3'){?>


                
                <div class="input-group">
                  
                  <input type="text" class="form-control" name="nro_operacion" required=""  value="" placeholder="ingrese número de operación">
                  
                </div>
                <!-- /.input group -->
              

<?php } ?>


<?php }; ?>