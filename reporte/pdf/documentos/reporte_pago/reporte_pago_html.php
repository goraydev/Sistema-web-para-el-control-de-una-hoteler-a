<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.pumpkin{
    background:#8BC34A;
    padding: 4px 4px 4px;
    color:white;
    font-weight:bold;
    font-size:12px;
}
.silver{
    background:#bdc3c7;
    padding: 3px 4px 3px;
    border-bottom: black 1px solid;
    border-left:black 1px solid;
}
.clouds{
    background:#ecf0f1;
    padding: 3px 4px 3px;
    border-bottom: black 1px solid;
    border-left:black 1px solid;
}
.border-top{
    border-top: solid 1px #bdc3c7;
    
}
.border-left{
    border-left: solid 1px #bdc3c7;
}
.border-right{
    border-right: solid 1px #bdc3c7;
}
.border-bottom{
    border-bottom: solid 1px #bdc3c7;
}

.tr{
    style="color: black; background-color: #d2d6de;"
}
.contenido{
    width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;
}

table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
}

.contenido {    
    font-size: 12px;    margin: 0px;     width: 480px; text-align: left;    border-collapse: collapse; }

th {     font-size: 13px;     font-weight: normal;     padding: 8px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

td {    padding: 8px;     background: #e8edff;     border-bottom: 1px solid #fff;
    color: #669;    border-top: 1px solid transparent; }

tr:hover td { background: #d0dafd; color: #339; }
-->
</style>


<?php 
     date_default_timezone_set('America/Lima');
     $hoy = date("Y-m-d");
     $hora = date("H:i:s");
                    
?>

<page backtop="15mm" backbottom="28mm" backleft="5mm" backright="5mm" style="font-size: 12pt; font-family: arial" >
        <page_footer>
        <table class="page_footer" style="padding-bottom:10px;">
            <tr>

                <td style="width: 80%; text-align: right; height:3px;" >
                   pagina web
                </td>
                <td style="width: 20%; text-align: left; height:3px;" class="pumpkin">
                   
                </td>
                
            </tr>
             <tr>

                <td style="width: 80%; text-align: left">
                </td>
                <td style="width: 20%; text-align: right; font-size:12px;" >
                  WWW.<b>empresa</b>.com<br />
                  Móvil 921355925 <br />Fijo (064) 201773<br />
                </td>
                
            </tr>
        </table>
    </page_footer>
   
    <table cellspacing="0" style="width: 100%; border: solid 0px #7f8c8d; text-align: center; font-size: 10pt;padding:1mm; padding-top: 0mm !important;">
        <tr >
            
            <th  style="width: 60%"></th>
           
            <th class="pumpkin" style="width: 40%; border: black 1px solid">INFORME DE PAGOS HASTA </th>
            
            
        </tr>
  
        <tr>
             <?php
                $mes=$_GET['mes'];
                if($mes=='01'){ $mes= 'Enero';}
                else if($mes=='02'){ $mes= 'Febrero';}
                else if($mes=='03'){ $mes= 'Marzo';}
                else if($mes=='04'){ $mes= 'Abril';}
                else if($mes=='05'){ $mes= 'Mayo';}
                else if($mes=='06'){ $mes= 'Junio';}
                else if($mes=='07'){ $mes= 'Julio';}
                else if($mes=='08'){ $mes= 'Agosto';}
                else if($mes=='09'){ $mes= 'Setiembre';}
                else if($mes=='10'){ $mes= 'Octubre';}
                else if($mes=='11'){ $mes= 'Noviembre';} 
                else if($mes=='12'){ $mes= 'Diciebre';}

            ?>
            <td  style="width: 60%; text-align: center"> <img style="width: 30%;" src="../../img/logo1.jpg" alt="Logo"><br /></td>
           
            <td  style="width: 40%; text-align: center;border:black 1px solid;"><br><b><?php echo $mes; ?></b></td>
            
        </tr>
   
    </table>


  


<table>
<tr>
    <td>INFORMACIÓN DE PAGOS</td>
</tr>  
</table>
<?php $sueldos = SueldoData::getAll();
                if(count($sueldos)>0){
                  // si hay usuarios
                  ?>
                  <table  class="contenido">
 
                  <tr class="tr" style="width: 100%; ">
                        <th>DESDE</th> 
                        <th>HASTA</th> 
                        <th>TRABAJADOR</th>
                        <th>SUELDO POR MES</th>
                       
                        <th>ACUMULADO</th>
                        <th>AUMENTO</th> 
                        <th>DESCUENTO</th>
                        <th>RESTA</th>
                        <th>ESTADO</th> 
                        
                  </tr>
                   <?php foreach($sueldos as $sueldo):?>
                      <tr>

                        <?php  
                            if(isset($_GET['anio']) and isset($_GET['mes']) and $_GET['anio']!=''){

                              $dia= date("d", strtotime($sueldo->fecha_comienzo));
                              $anio=$_GET['anio'];
                              $mes=$_GET['mes'];
                              $mes_1=$_GET['mes']-1;

                              $start = date("$anio-0$mes_1-$dia");
                              $end= date("$anio-$mes-$dia");
                            }else{

                              $dia= date("d", strtotime($sueldo->fecha_comienzo));
                              $start= date("Y-m-$dia", strtotime($nuevafecha));
                              $end=  date("Y-m-$dia", strtotime($hoy));
                            }
                            
                        ?>

                       
                        <td><?php echo $start; ?></td>
                        <td><?php echo $end; ?></td>
                        <td><?php echo $sueldo->getUsuario()->name; ?></td> 
                        <td><?php echo $sueldo->monto; ?></td>  
                        

                        <?php $acumulado=0; ?> 
                        <?php $acumulados = ProcesoSueldoData::getAllAcumulado($sueldo->id,$start,$end);
                            if(count($acumulados)>0){ ?>
                                <?php foreach($acumulados as $acumula): $acumulado=$acumula->monto+$acumulado;  endforeach; ?>
                            <?php }else{ $acumulado=0; }; ?>

                        
 
                        <td><?php echo $acumulado; ?></td>

                        <?php $aumento=0; ?>
                        <?php $aumentos = ProcesoSueldoData::getAllAumento($sueldo->id,$start,$end);
                        if(count($aumentos)>0){ ?>
                            <?php foreach($aumentos as $aume): $aumento=$aume->monto+$aumento;  endforeach; ?>
                        <?php }else{ $aumento=0; }; ?>

                            <td><?php echo $aumento; ?></td> 

 
                        <?php $descuento=0; ?>
                        <?php $descuentos = ProcesoSueldoData::getAllDescuento($sueldo->id,$start,$end);
                        if(count($descuentos)>0){ ?>
                            <?php foreach($descuentos as $descuent): $descuento=$descuent->monto+$descuento;  endforeach; ?>
                        <?php }else{ $descuento=0; }; ?>

                       
                        <td><?php echo $descuento; ?></td>
                        <?php $resta = ($sueldo->monto-$descuento)-($acumulado); ?>
                        <td>
                          <?php if($resta=='0' or $resta<0){ ?>
                          <p style="color: green;"><b>Completado</b></p>
                          <?php }else{ ?>
                          <?php echo ($sueldo->monto-$descuento)-($acumulado); ?>
                          <?php }; ?>

                          </td>
                        
                        <td>
                          <?php if($resta=='0' or $resta<0){ ?>
                          <p style="color: green;"><b>Completado</b></p>
                          <?php }else{ ?>
                          <p style="color: orange;"><b>En proceso</b></p>
                          <?php }; ?>
                          
                        </td>
                        
                        
                      </tr> 
                    



                      

<?php endforeach; ?>
                      
                  </table>

               <?php }else{ 
            

                }; 
                ?>




    <br />
 


    
    

</page>

