              
<?php if(isset($_POST['id']) and $_POST['id']=="1"){ ?>

            <div class="form-group">
                <label>DNI:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa  fa-arrow-circle-o-right"></i>
                  </div>
                  <input type="text" class="form-control" name="documento" id="documento" required="required" placeholder="Ingrese documento para buscar" pattern="[z0-9]{8}"
         title="Solo puede ingresar 8 números">
                  <input type="hidden" id="id">
                  <div class="input-group-addon">
                      <i class="fa fa-search-plus"></i>
                    </div>
                </div>
                <!-- /.input group -->
              </div>

<?php }if(isset($_POST['id']) and $_POST['id']=="2"){ ?>

            <div class="form-group">
                <label>PASAPORTE:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa  fa-arrow-circle-o-right"></i>
                  </div>
                  <input type="text" class="form-control" name="documento" id="documento" required="required" placeholder="Ingrese documento para buscar">
                  <input type="hidden" id="id">
                  <div class="input-group-addon">
                      <i class="fa fa-search-plus"></i>
                    </div>
                </div>
                <!-- /.input group -->
              </div>
<?php }if(isset($_POST['id']) and $_POST['id']=="3"){ ?>

            <div class="form-group">
                <label>RUC:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa  fa-arrow-circle-o-right"></i>
                  </div>
                  <input type="text" class="form-control" name="documento" id="documento" required="required" placeholder="Ingrese documento para buscar">
                  <input type="hidden" id="id">
                  <div class="input-group-addon">
                      <i class="fa fa-search-plus"></i>
                    </div>
                </div>
                <!-- /.input group -->
              </div>
<?php }if(isset($_POST['id']) and $_POST['id']=="4"){ ?>

            <div class="form-group">
                <label>CI:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa  fa-arrow-circle-o-right"></i>
                  </div>
                  <input type="text" class="form-control" name="documento" id="documento" required="required" placeholder="Ingrese documento para buscar">
                  <input type="hidden" id="id">
                  <div class="input-group-addon">
                      <i class="fa fa-search-plus"></i>
                    </div>
                </div>
                <!-- /.input group -->
              </div>
<?php }; ?>