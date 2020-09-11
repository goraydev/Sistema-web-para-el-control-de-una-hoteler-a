              
<?php if(isset($_POST['id_mostrar_cliente']) and $_POST['id_mostrar_cliente']=='1'){ ?>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12"> 
                    <label>Selecciona Habitación</label>
                    <select class="form-control select2" required  name="id_proveedor">  
                        <option value="NULL">---- Selecciona Proveedor (OPCIONAL) ----</option> 
                                  <?php $proveedores = PersonaData::getProveedor();?>
                                  <?php foreach($proveedores as $proveedor):?>
                                    <option value="<?php echo $proveedor->id;?>"><?php echo $proveedor->nombre;?></option>
                                  <?php endforeach;?>
                    </select>  
                  </div>
                </div>
              </div>
<?php }else if (isset($_POST['id_mostrar_cliente']) and $_POST['id_mostrar_cliente']=='2') { ?>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12"> 
                    <label>Nombres del cliente</label>
                    <input type="text" name="cliente" class="form-control" placeholder="Ingrese nombre (Opcional)">
                  </div>
                </div>
              </div>
<?php }; ?>