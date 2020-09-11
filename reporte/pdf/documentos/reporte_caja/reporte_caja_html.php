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
<?php $caja=CajaData::getById($_GET['id']); ?>
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
           
            <th class="pumpkin" style="width: 40%; border: black 1px solid">INFORME DE CIERRE DE CAJA </th>
            
            
        </tr>
  
        <tr>
            
            <td  style="width: 60%; text-align: center"> <img style="width: 30%;" src="../../img/logo1.jpg" alt="Logo"><br /></td>
           
            <td  style="width: 40%; text-align: center;border:black 1px solid;"><br><b><?php echo $caja->fecha_apertura.' - '.$caja->fecha_cierre; ?></b></td>
            
        </tr>
   
    </table>


  


<table>
<tr>
    <td>INFORMACIÓN CAJA</td>
</tr>
</table>
<table   >

  
            <tr class="tr" style="width: 100%; ">
                        <th style="width: 8%;">USUARIO APERTURA</th> 
                        <th style="width: 20%;"><?php echo $caja->getUsuario()->name; ?></th>
            </tr>
            <tr class="tr" style="width: 100%; ">
                        <th style="width: 8%;">FECHA COMPLETA APERTURA</th> 
                        <th style="width: 20%;"><?php echo $caja->fecha_apertura; ?></th>
            </tr>
            <tr class="tr" style="width: 100%; ">
                        <th style="width: 8%;">FECHA COMPLETA CIERRE</th> 
                        <th style="width: 20%;"><?php echo $caja->fecha_cierre ?></th>
            </tr>
            <tr class="tr" style="width: 100%; ">
                        <th style="width: 8%;">MONTO APERTURA</th> 
                        <th style="width: 20%;">$   <?php echo number_format($caja->monto_apertura,2,'.',','); ?></th>
            </tr>
            <tr class="tr" style="width: 100%; ">
                        <th style="width: 8%;">MONTO CIERRE</th> 
                        <th style="width: 20%;">$   <?php echo number_format($caja->monto_cierre+$caja->monto_apertura,2,'.',','); ?></th>
            </tr>
            <tr>
                <th></th>
                <th></th>
            </tr>
            <tr class="tr" style="width: 100%; ">
                        <th style="width: 8%;">TOTAL EN CAJA</th> 
                        <th style="width: 20%;"><b>$   <?php echo number_format($caja->monto_cierre+$caja->monto_apertura,2,'.',','); ?></b></th>
            </tr>

    </table>






    <br />
 


    
    

</page>

