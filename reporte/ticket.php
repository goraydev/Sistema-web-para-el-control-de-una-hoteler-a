
<?php

	require('ClassTicket.php');
	
	
include "../core/autoload.php";
include "../core/app/model/ProcesoData.php";
include "../core/app/model/PersonaData.php";
include "../core/app/model/UserData.php";
include "../core/app/model/ProcesoVentaData.php";
include "../core/app/model/HabitacionData.php";
include "../core/app/model/ProductoData.php";
include "../core/app/model/ConfiguracionData.php";


$operacion = ProcesoData::getById($_GET['id']);
     if(count($operacion)>0){
    
	$pdf = new TICKET('P','mm',array(76,297));
	$pdf->AddPage();

	 

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

                          $id=$configuracion->id;
                         

    }else{
                          $nombre='';
                          $direccion='';
                          $estado='';
                          $telefono='';
                          $fax='';
                          $rnc='';
                          $registro_empresarial='';
                          $ciudad='';
                          $id=0; 
    }

	if('1' == '1')
	{

		$pdf->SetFont('Arial', '', 12);
		$pdf->SetAutoPageBreak(true,1);
 
		$pdf->setXY(2,1.5);
	    $pdf->MultiCell(73, 4.2, $nombre, 0,'C',0 ,1);

	    $pdf->setXY(2,6);
	    $pdf->SetFont('Arial', '', 8);
	    $pdf->MultiCell(73, 4.2, $direccion, 0,'C',0 ,1);

	   
	    $get_YD = $pdf->GetY();

	    $pdf->setXY(2,$get_YD);
	    $pdf->SetFont('Arial', 'B', 10);
	    $pdf->MultiCell(73, 4.2, 'RUC : '.$rnc, 0,'C',0 ,1);

	    $pdf->setXY(2,$get_YD + 4);
	    $pdf->SetFont('Arial', '', 7);
	    $pdf->MultiCell(73, 4.2, 'Resolucion 2018-1-199999 del 25/08/2018', 0,'C',0 ,1);

	    $pdf->setXY(2,$get_YD + 8);
	    $pdf->SetFont('Arial', 'B', 7);
	    $pdf->MultiCell(73, 4.2, 'Serie : '.'A de 1 a 5000', 0,'C',0 ,1);

	   

	    $get_YH = $pdf->GetY();

		$pdf->SetFont('Arial', '', 9.2); 
		$pdf->Text(2, $get_YH + 2, '------------------------------------------------------------------');
		$pdf->SetFont('Arial', 'B', 8.5);
		$pdf->Text(3.8, $get_YH  + 5, 'TICKET SERIE '.'A');
		$pdf->Text(45, $get_YH  + 5, 'NO.  T00000'.$operacion->id);
		$pdf->SetFont('Arial', '', 8.5);
		$pdf->Text(3.8, $get_YH  + 10, 'FECHA EMISION : '.$operacion->fecha_salida);
		$pdf->Text(3.8, $get_YH + 15, 'COMPUTADORA No.: 1');
		$pdf->Text(40, $get_YH + 15, 'CAJERO : '.$operacion->getUsuario()->name);
		
		$pdf->SetXY(3.8,$get_YH + 22);
		$pdf->SetFont('Arial', '', 7.8);
		$pdf->MultiCell(68, 4.2, 'Nombre: '.$operacion->getCliente()->nombre, 0,'L',0 ,1);
		$pdf->SetXY(3.8,$get_YH + 26);
		$pdf->MultiCell(68, 4.2, 'Documento: '.$operacion->getCliente()->documento, 0,'L',0 ,1);
		$pdf->SetXY(3.8,$get_YH + 30);
		$pdf->MultiCell(68, 4.2, 'Fecha nac: '.$operacion->getCliente()->fecha_nac, 0,'L',0 ,1);
		$pdf->SetXY(3.8,$get_YH + 34);
		$pdf->MultiCell(68, 4.2, 'Procedencia: '.$operacion->getCliente()->direccion, 0,'L',0 ,1);
		$pdf->SetXY(3.8,$get_YH + 38);
		$pdf->MultiCell(68, 4.2, 'Nacionalidad: '.$operacion->getCliente()->nacionalidad, 0,'L',0 ,1);
		$pdf->SetXY(3.8,$get_YH + 42);
		$pdf->MultiCell(68, 4.2, 'Estado civil: '.$operacion->getCliente()->estado_civil, 0,'L',0 ,1);
		$pdf->SetXY(3.8,$get_YH + 46);
		$pdf->MultiCell(68, 4.2, 'Ocupacion: '.$operacion->getCliente()->ocupacion, 0,'L',0 ,1);
		$pdf->SetXY(3.8,$get_YH + 50);
		$pdf->MultiCell(68, 4.2, 'Medio transporte: '.$operacion->getCliente()->medio_transporte, 0,'L',0 ,1);
		$pdf->SetXY(3.8,$get_YH + 54);
		$pdf->MultiCell(68, 4.2, 'Destino: '.$operacion->getCliente()->destino, 0,'L',0 ,1);
		$pdf->SetFont('Arial', '', 9.2);
		$pdf->Text(2, $get_YH + 60.5, '------------------------------------------------------------------');



 		$get_YH2 = $pdf->GetY();

		$pdf->SetXY(2,$get_YH2 + 8);
		$pdf->SetFillColor(255,255,255);
		$pdf->SetFont('Arial','B',8.5);
		$pdf->Cell(13,4,'Cantid',0,0,'L',1);
		$pdf->Cell(28,4,'Descripcion',0,0,'L',1);
		$pdf->Cell(16,4,'Precio',0,0,'L',1);
		$pdf->Cell(12,4,'Total',0,0,'L',1);
		$pdf->SetFont('Arial','',8.5);
		$pdf->Text(2, $get_YH2 + 14, '-----------------------------------------------------------------------');
		$pdf->Ln(6);


		$item = 1;
		

		$pdf->setX(1.1);
		$pdf->Cell(13,4,$operacion->cant_noche,0,0,'L');
		$pdf->Cell(28,4,'Habitacion '.$operacion->getHabitacion()->nombre,0,0,'L',1);
		$pdf->Cell(16,4,$operacion->precio,0,0,'L',1);

		$pdf->Cell(8,4,($operacion->precio*$operacion->cant_noche)+$operacion->total,0,0,'L',1);
		$pdf->Ln(4.5);

		$get_Y = $pdf->GetY();
		$productos = ProcesoVentaData::getByAll($operacion->id);
		$total=0;
        if(count($productos)>0){
		foreach($productos as $producto):
		 $item = $item + 1;
			$pdf->setX(1.1);
			$pdf->Cell(13,4,$producto->cantidad,0,0,'L');
			$pdf->Cell(28,4,$producto->getProducto()->nombre,0,0,'L',1);
			$pdf->Cell(16,4,$producto->precio,0,0,'L',1);

			$sub_total=$producto->precio*$producto->cantidad;

			$pdf->Cell(8,4,$sub_total,0,0,'L',1);
			$pdf->Ln(4.5);
			$total=$sub_total+$total;	
			$get_Y = $pdf->GetY();
		endforeach;
		}



		$final= $total+(($operacion->precio*$operacion->cant_noche)+$operacion->total);

		$pdf->Text(2, $get_Y+1, '-----------------------------------------------------------------------');
		$pdf->SetFont('Arial','B',8.5);
		

		$pdf->Text(4,$get_Y + 10,'SUBTOTAL :');
		$pdf->Text(57,$get_Y + 10,number_format(($final/1.18),2,'.',','));
		$pdf->Text(4,$get_Y + 15,'TOTAL IVA :');
		$pdf->Text(57,$get_Y + 15,number_format($final-($final/1.18),2,'.',','));
		$pdf->Text(4,$get_Y + 20,'TOTAL A PAGAR :');
		$pdf->Text(57,$get_Y + 20,number_format($final,2,'.',','));
		
		$pdf->Text(2, $get_Y+25, '-----------------------------------------------------------------------');
		
		$pdf->SetFont('Arial','BI',8.5);
		$pdf->Text(3, $get_Y+52, 'Precios en : '.'PESOS MEXICANOS ');
		
		$pdf->SetFont('Arial','B',8.5);
		$pdf->Text(19, $get_Y+62, 'GRACIAS POR VISITARNOS');
		$pdf->SetFillColor(0,0,0);
		$pdf->Code39(9,$get_Y+64,'T00000'.$operacion->id,1,5);
		$pdf->Text(28, $get_Y+74, '*T00000'.$operacion->id.'*');

	}  else {

		$pdf->SetFont('Arial', '', 10);
		$pdf->Text(7, 58, '* EL COMPROBANTE DE VENTA*');
		$pdf->Text(20, 65, '* NO ES TICKET*');;
	}




	$pdf->Output('','Ticket_'.'$numero_comprobant.pdf',true);
	







}else{
 
}
?>
