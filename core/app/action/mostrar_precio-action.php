<?php if(isset($_POST['id_tarifa']) and $_POST['id_tarifa']!=""){ ?>

<?php $tarifa = TarifaHabitacionData::getById($_POST['id_tarifa']); ?>           
                
                <div class="input-group"> 
                  <div class="input-group-addon">
                    <i class="fa fa-money"></i> Precio&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </div>
                  <input type="number" class="form-control monto" name="precio" placeholder="Ingrese precio" value="<?php echo $tarifa->precio; ?>" onkeyup="sumar();" onchange="sumar();" id="precio" disabled>

                  <div class="input-group-addon">
                    Cant. noches
                  </div>
                  <input type="number" class="form-control monto" name="cant_noche" id="cant_noche" min="1" value="<?php echo $_POST['cant']; ?>" onkeyup="sumar();" onchange="sumar();" disabled>
                </div>
                <!-- /.input group -->
                <div class="input-group"> 
               
                  <h2 style="font-size: 18px;font-weight: bold;color: #51445f;"><span>Total a pagar: </span> <span id="spTotal" ><?php echo $tarifa->precio* $_POST['cant']; ?></span></h2>
                  <input type="hidden" name="precio" value="<?php echo $tarifa->precio* $_POST['cant']; ?>">
                
                
                </div>


<?php }; ?>