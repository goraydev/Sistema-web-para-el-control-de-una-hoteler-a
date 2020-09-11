              
<?php if(isset($_POST['id']) and $_POST['id']!=""){ ?>

<?php if($_POST['id']=='1') {?>      
                
            <div class="input-group">
                  <div class="input-group-addon">
                    Medio de pago:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </div> 
                  <select class="form-control" onchange="CargarMediopago(this.value);" required name="id_tipo_pago">
                    
                      <option value="">--- Selecciona ---</option>
                      <option value="1" >EFECTIVO</option>
                      <option value="2" >TARJETA</option>
                      <option value="3" >DEPÓSITO</option>
                       
                    
                  </select> 
                </div>
                  
               
<?php }else if($_POST['id']=='0'){?>


                
                <input type="hidden" name="id_tipo_pago" value="0">
                <input type="hidden" name="nro_operacion"  value="-" placeholder="ingrese número de operación">
           

<?php  } ?>


<?php }; ?>