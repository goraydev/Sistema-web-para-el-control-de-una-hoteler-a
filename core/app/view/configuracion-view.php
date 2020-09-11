  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CONFIGURACIÓN
        <small>Importante</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Configuración</li>
      </ol>
    </section>

    <!-- Main content --> 
    <section class="content">
      <div class="row">
        <div class="col-md-3">
         
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Selecciona</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
           
              <ul class="nav nav-tabs nav-stacked">
               <li class="active"><a href="#tab_1" data-toggle="tab" class="btn-primary">PRINCIPAL</a></li>
              
              <li><a href="#tab_3" data-toggle="tab" class="btn-primary"> <i class="fa fa-filter"></i>OTROS</a></li>
              
            
            </ul>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
       
        </div>
        <!-- /.col -->



       
        <div class="col-md-9">
          <!-- Custom Tabs --> 
          <div class="nav-tabs-custom">
            
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Defina el nombre de su empresa de la manera como desea que aparezca en las pantallas y reportes</h3>

            
            </div>
            <?php 
            $configuracion = ConfiguracionData::getAllConfiguracion(); 
            if(count($configuracion)>0){ 
              $nombre=$configuracion->nombre;
              $direccion=$configuracion->direccion;
              $estado=$configuracion->estado;
              $telefono=$configuracion->telefono;
              $fax=$configuracion->fax;
              $rnc=$configuracion->rnc;
              $registro_empresarial=$configuracion->registro_empresarial;
              $ciudad=$configuracion->ciudad;

              $id=$configuracion->id; ?>
             
              <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateconfiguracion" role="form">

            <?php }else{
              $nombre='';
              $direccion='';
              $estado='';
              $telefono='';
              $fax='';
              $rnc='';
              $registro_empresarial='';
              $ciudad='';
              $id=0; ?>
               <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addconfiguracion" role="form">
            <?php }
            ?>
            <!-- /.box-header -->
            <div class="box-body no-padding">
               

                <div class="row">
                <div class="col-md-offset-1 col-md-10">

                  <div class="form-group">
                    <label>SU EMPRESA</label>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Nombre &nbsp;&nbsp;</span>
                      <input type="text" class="form-control col-md-8" name="nombre"  placeholder="Nombre empresa" value="<?php if($nombre!='NULL'){ echo $nombre;  } ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Dirección</span>
                      <input type="text" class="form-control" name="direccion"  placeholder="Dirección" value="<?php if($direccion!='NULL'){ echo $direccion;  } ?>">
                    </div>
                  </div>

                  

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Estado&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" class="form-control" name="estado" placeholder="Estado o provincia" value="<?php if($estado!='NULL'){ echo $estado;  } ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Teléfono</span>
                      <input type="text"  class="form-control" name="telefono"  placeholder="Teléfono" value="<?php if($telefono!='NULL'){ echo $telefono;  } ?>">
                    </div>
                  </div>
                  <!--
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Fax &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" class="form-control" name="fax"  placeholder="Fax" value="<?php if($fax!='NULL'){ echo $fax;  } ?>">
                    </div>
                  </div>
                -->

            

                </div>
                </div>


                <div class="row">
                <div class="col-md-offset-1 col-md-10">

                  <div class="form-group" >
                     <label>RUC</label>
                    <div class="input-group">
                      <span class="input-group-addon"> RUC &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" class="form-control col-md-12" name="rnc" value="<?php if($rnc!='NULL'){ echo $rnc;  } ?>" >
                    </div>
                  </div>

                </div>
                </div>

                <!--
                <div class="row">

                <div class="col-md-offset-1 col-md-10">

                  <div class="form-group">
                    <label>Registro empresarial</label>
                    <div class="input-group">
                      <span class="input-group-addon"> Registro empresarial &nbsp;&nbsp;</span>
                      <input type="text" class="form-control col-md-12" name="registro_empresarial" value="<?php if($registro_empresarial!='NULL'){ echo $registro_empresarial;  } ?>">
                    </div>
                  </div>
                  
                </div>
                </div>
              -->


                <div class="row">
                <div class="col-md-offset-1 col-md-10">
         
                  <div class="form-group">
                    <label>Ciudad</label>
                    <div class="input-group">
                      <span class="input-group-addon"> Ciudad &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" class="form-control col-md-12" name="ciudad" value="<?php if($ciudad!='NULL'){ echo $ciudad;  } ?>">
                    </div>
                  </div>
                  
                </div>
                </div>

                  <div class="box-footer">

                    <input type="hidden" name="id_configuracion" value="<?php echo $id; ?>">
                    <button type="submit" class="btn btn-primary" >Actualizar datos de la empresa</button>
                    
                  </div>


                
                  
            </div>
            <!-- /.box-body -->
          </form>
    
        </div>


              </div>
              <!-- /.tab-pane -->
          
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
               

                <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">OTROS DATOS</h3>

            
            </div>
            <?php 
            $config = ConfiguracionData::getAllConfiguracion(); 
            if(count($config)>0){ 
              $logo=$config->logo;
              $id_config=$config->id; ?>
             

            <!-- /.box-header -->
             <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatelogo" enctype="multipart/form-data" role="form">
            <div class="box-body no-padding">
               


                <div class="row">
                <div class="col-md-offset-1 col-md-10">

                  <div class="form-group" >
                     <label>Logo</label>
                    <div class="input-group">
                      <span class="input-group-addon">Subir imagen </span>
                      <input type="file" class="form-control col-md-12" name="logo" >
                    </div>
                  </div>

                </div>
                </div>

                <div class="row">
                <div class="col-md-offset-1 col-md-10">

                   <?php if($logo!="" and $logo!="NULL" and $logo!=NULL):?>
                            <img src="img/<?php echo $configuracion->logo;?>" style="width:74px;">
                  <?php endif;?>
                  
                </div>
                </div>


                

                  <div class="box-footer">

                    <input type="hidden" name="id_config" value="<?php echo $id_config; ?>">
                    <button type="submit" class="btn btn-primary" >Actualizar logo</button>
                    
                  </div>


                
                  
            </div>
            <!-- /.box-body -->
          </form>
          <?php } ?>
    
        </div>



              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
</div>