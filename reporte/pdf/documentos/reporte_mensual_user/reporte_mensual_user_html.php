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
                  Móvil 964000482 <br />Fijo (064) 201773<br />
                </td>
                
            </tr>
        </table>
    </page_footer>
   
    <table cellspacing="0" style="width: 100%; border: solid 0px #7f8c8d; text-align: center; font-size: 10pt;padding:1mm; padding-top: 0mm !important;">
        <tr >
            
            <th  style="width: 60%"></th>
<?php
$mes=$_POST['mes'];


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

 
           
            <th class="pumpkin" style="width: 40%; border: black 1px solid">REPORTE MENSUAL DE <?PHP echo $mes.' '.$_POST['anio']; ?> </th>
            
            
        </tr>
  
        <tr>
            
            <td  style="width: 60%; text-align: center"><br /></td>
           
            <td  style="width: 40%; text-align: center;border:black 1px solid;"><br><b style="text-decoration:underline; font-family:Arial, Helvetica, sans-serif;" >FECHA<BR><BR> <?php echo $hoy; ?></b></td>
            
        </tr>
   
    </table>




<?php


$mess=$_POST['mes'];

    if($mess=='01'){ 
$array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31");
}
    else if($mess=='02'){

    $array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28");
 }
    else if($mess=='03'){ 
$array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31");
}
    else if($mess=='04'){ 
$array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30");
}
    else if($mess=='05'){ 
$array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31");
}
    else if($mess=='06'){ 
$array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30");
}
    else if($mess=='07'){ 
$array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31");
}
    else if($mess=='08'){ 
$array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31");
}
    else if($mess=='09'){ 
$array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30");
}
    else if($mess=='10'){ 
$array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31");
}
    else if($mess=='11'){ 
$array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30");
} 
    else if($mess=='12'){ 
$array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31");
}

$numero1=0;
?>
<?php 
$ingreso=0;
foreach ($array as $valor) { 

$numero1=$numero1+1;
?>  



                    <?php 
                    $subcero=0;
                    $ventas = ProcesoVentaData::getReporteMensual11($numero1,$_POST['mes']);
                    if(count($ventas)>0){
                        foreach($ventas as $venta):
                            $subcero=($venta->cantidad*$venta->precio)+$subcero;
                        endforeach ;
                    }else{ $subcero=0; }; ?>
 
     
                    <?php 
                    $cero=0;
                    $boletas = ProcesoData::getReporteMensual11($numero1,$_POST['mes']);
                    if(count($boletas)>0){
                        foreach($boletas as $boleta):
                            $cero=(($boleta->precio*$boleta->cant_noche)+$boleta->total)+$cero;
                        endforeach ;
                    }else{ $cero=0; }; ?>
                      


                <?php $ingreso=$cero+$ingreso+$subcero; ?>          
<?php
}
?> 

<?php 
$egreso=0;

$numero2=0;
foreach ($array as $valor) { 
    $numero2=$numero2+1;

 
    $cero1=0;
    $gastos = GastoData::getReporteMensualDia($numero2,$_POST['mes']);
    if(count($gastos)>0){
        foreach($gastos as $gasto):
            $cero1=$gasto->precio+$cero1;
        endforeach ;
    }else{ echo ""; };

    $cero101=0; 
    $sueldos = ProcesoSueldoData::getReporteMensual11($numero2,$_POST['mes']);
    if(count($sueldos)>0){
        foreach($sueldos as $sueldo):
            $cero101=$sueldo->monto+$cero101;
        endforeach ;
    }else{ echo ""; };

 
    $cero102=0;
    $compras = ProcesoVentaData::getReporteMensual11Compra($numero2,$_POST['mes']);
    if(count($compras)>0){
        foreach($compras as $compra):
            $cero102=($compra->cantidad*$compra->precio)+$cero102;
        endforeach ;
    }else{ $cero102=0;; }; 



$egreso=$cero1+$egreso+$cero101+$cero102;   ?>
<?php
}
?>


    

<table class="table table-bordered table-hover">

    <tr>
        <td>INGRESOS:</td>
        <td>$   <?php echo number_format($ingreso,2,'.',',');?></td>
    </tr>
    <tr>
        <td>EGRESOS:</td>
        <td> $    <?php echo number_format($egreso,2,'.',','); ?></td>
    </tr>
    <tr>
        <td>NETO:</td>
        <td>$   <?php echo number_format($ingreso-$egreso,2,'.',','); ?></td>
    </tr>
</table>




<?php


$numero1=0;
?>

<table class="contenido">
            <tr class="tr" style="width: 100%; ">
              
                <th style="width: 10%;">Nº</th>
                <th style="width: 60%;">FECHA </th>
                <th style="width:40%;">INGRESOS</th>
                <th style="width: 40%;">EGRESOS</th>
            </tr>
<?php
$egreso=0;
foreach ($array as $valor) { 

$numero1=$numero1+1;
?>
    <tr class="tr" style="width: 100%; ">
                <td style="width: 10%;"><?php echo $numero1; ?></td>
                <td style="width: 60%;">
                    <?php
$mess=$_POST['mes'];
$fecha = "2018-$mess-$numero1";  
$fechats = strtotime($fecha); 

$mes=date("m", strtotime($fecha)); 

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


            <?php
                    switch (date('w', $fechats)){ 
    case 0: echo "Domingo".', '.$numero1.' de '.$mes; break; 
    case 1: echo "Lunes".', '.$numero1.' de '.$mes; break; 
    case 2: echo "Martes".', '.$numero1.' de '.$mes; break; 
    case 3: echo "Miercoles".', '.$numero1.' de '.$mes; break; 
    case 4: echo "Jueves".', '.$numero1.' de '.$mes; break; 
    case 5: echo "Viernes".', '.$numero1.' de '.$mes; break; 
    case 6: echo "Sabado".', '.$numero1.' de '.$mes; break; 
}; ?>
                </td>
                <td style="width: 40%;">

                    <?php 
                    $subcero=0;
                    $ventas = ProcesoVentaData::getReporteMensual11($numero1,$_POST['mes']);
                    if(count($ventas)>0){
                        foreach($ventas as $venta):
                            $subcero=($venta->cantidad*$venta->precio)+$subcero;
                        endforeach ;
                    }else{ $subcero=0; }; ?>
 
     
                    <?php 
                    $cero=0;
                    $boletas = ProcesoData::getReporteMensual11($numero1,$_POST['mes']);
                    if(count($boletas)>0){
                        foreach($boletas as $boleta):
                            $cero=(($boleta->precio*$boleta->cant_noche)+$boleta->total)+$cero;
                        endforeach ;
                    }else{ $cero=0; }; ?>
                      


        
                        $   <?php echo number_format($subcero+$cero,2,'.',','); ?>
            
                </td>
                <?php $egreso=$cero+$egreso; ?>




                <td style="width: 40%;">


                        <?php  
                     $cero1=0;
    $gastos = GastoData::getReporteMensualDia($numero1,$_POST['mes']);
    if(count($gastos)>0){
        foreach($gastos as $gasto):
            $cero1=$gasto->precio+$cero1;
        endforeach ;
    }else{ echo ""; };

    $cero101=0; 
    $sueldos = ProcesoSueldoData::getReporteMensual11($numero1,$_POST['mes']);
    if(count($sueldos)>0){
        foreach($sueldos as $sueldo):
            $cero101=$sueldo->monto+$cero101;
        endforeach ;
    }else{ echo ""; };

 
    $cero102=0;
    $compras = ProcesoVentaData::getReporteMensual11Compra($numero1,$_POST['mes']);
    if(count($compras)>0){
        foreach($compras as $compra):
            $cero102=($compra->cantidad*$compra->precio)+$cero102;
        endforeach ;
    }else{ $cero102=0;; }; 

 ?>
                        $   <?php echo number_format($cero1+$cero101+$cero102,2,'.',','); ?>




                </td>
</tr>
<?php
}
?> 

</table>







 


    
    

</page>

