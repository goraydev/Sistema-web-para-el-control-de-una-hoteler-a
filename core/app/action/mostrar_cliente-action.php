              
<?php if(isset($_POST['id_mostrar_cliente']) and $_POST['id_mostrar_cliente']=='1'){ ?>




              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12"> 
                    <label>Cargar a una Habitación</label>
                    <select class="form-control select2" required  name="id_operacion">  
                        <option value="">---- Selecciona Habitación ----</option> 
                                  <?php $habitaciones = ProcesoData::getProceso();?>
                                  <?php foreach($habitaciones as $habitacion):?>
                                    <option value="<?php echo $habitacion->id;?>"><?php echo 'Habitacion:: '.$habitacion->getHabitacion()->nombre.' &nbsp;&nbsp;&nbsp; Huesped:: '. $habitacion->getCliente()->nombre;?></option>
                                  <?php endforeach;?>
                    </select>  
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12"> 
                    <label>Proceso</label>
                    <select class="form-control select2" required  name="pagado" >
                        <option value="1">Cancelado</option>  
                        <option value="2">Cargar a habitación</option> 
                    </select>  
                  </div>
                </div>
              </div>

<?php }else if (isset($_POST['id_mostrar_cliente']) and $_POST['id_mostrar_cliente']=='2') { ?>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12"> 
                    <label>Nombres del cliente</label>
                    <input type="text" name="nombre_cliente" class="form-control"  placeholder="Ingrese nombre (Opcional)">
                  </div>
                </div>
              </div>

               <div class="form-group">
                <div class="row">
                  <div class="col-sm-12"> 
                    <label>Proceso</label>
                    <select class="form-control select2" required  name="pagado" >
                        <option value="1">Cancelado</option>  
                 
                    </select>  
                  </div>
                </div>
              </div>
<?php }; ?>