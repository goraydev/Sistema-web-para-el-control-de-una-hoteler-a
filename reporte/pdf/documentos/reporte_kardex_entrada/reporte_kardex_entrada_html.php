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
           
            <th class="pumpkin" style="width: 40%; border: black 1px solid">ENTRADAS DE PRODUCTOS </th>
            
            
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
            <td  style="width: 60%; text-align: center"> <br /></td>
           
            <td  style="width: 40%; text-align: center;border:black 1px solid;"><br><b><?php echo $mes.' de '. $_GET['anio']; ?> </b></td>
            
        </tr>
   
    </table>


  


<table>
<tr>
    <td>KARDEX</td>
</tr>  
</table>
<?php $productos = ProductoData::getAll();
                if(count($productos)>0){
                  // si hay usuarios
                  ?>
                  <table class="contenido"> 

                  <tr class="tr" style="width: 100%; ">
                        <th style="width: 30%;">Nro</th> 
                        <th style="width: 80%;">PRODUCTO</th>
                        <th style="width: 30%;">MARCA</th>
                        <th style="width: 30%;">SALDO INICIAL</th>
                        <th style="width: 30%;">ENTRADAS</th>
                        
                        
                  </tr>
                   <?php foreach($productos as $producto):?>
                      <tr>

                        <?php  
                            if(isset($_GET['anio']) and isset($_GET['mes']) and $_GET['anio']!='' and $_GET['mes']!='00'){

                                    $entrada_producto=0; 
                                    $entradas = ProcesoVentaData::getAllEntradasMes($producto->id,$_GET['mes'],$_GET['anio']);
                                    if(count($entradas)>0){ 
                                      foreach($entradas as $entrada): $entrada_producto=$entrada->cantidad+$entrada_producto;  
                                      endforeach;
                                    }else{ $entrada_producto=0; }; 


                                     $salida_producto=0;
                                     $salidas = ProcesoVentaData::getAllSalidasMes($producto->id,$_GET['mes'],$_GET['anio']);
                                     if(count($salidas)>0){ 
                                     foreach($salidas as $salida): $salida_producto=$salida->cantidad+$salida_producto;  
                                      endforeach; 
                                     }else{ $salida_producto=0; }; 

                              
                            }else{

                                    $entrada_producto=0; 
                                    $entradas = ProcesoVentaData::getAllEntradas($producto->id);
                                    if(count($entradas)>0){ 
                                      foreach($entradas as $entrada): $entrada_producto=$entrada->cantidad+$entrada_producto;  
                                      endforeach;
                                    }else{ $entrada_producto=0; }; 



                                    $salida_producto=0;
                                     $salidas = ProcesoVentaData::getAllSalidas($producto->id);
                                     if(count($salidas)>0){ 
                                     foreach($salidas as $salida): $salida_producto=$salida->cantidad+$salida_producto;  
                                      endforeach; 
                                     }else{ $salida_producto=0; }; 

                            }
                            
                        ?>

                        <td><?php echo $producto->codigo; ?></td>
                        <td><?php echo $producto->nombre; ?></td>
                        <td><?php if($producto->marca!="NULL"){ echo $producto->marca;}else{ echo "------"; } ?></td>
                        <td><?php echo $producto->stock; ?></td>

                        

                        
 
                        <td><?php echo $entrada_producto; ?></td>

                        
                        
                        
                      </tr> 
                    



                      

              <?php endforeach; ?>
                      
                  </table>

               <?php }else{ 
           
                };
                ?>



    <br />
 


    
    

</page>

