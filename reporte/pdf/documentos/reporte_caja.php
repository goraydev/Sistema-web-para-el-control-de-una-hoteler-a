<?php

	 ob_start();
	session_start();
	/* Connect To Database*/
include "../../../core/autoload.php";
include "../../../core/app/model/ProcesoData.php";
include "../../../core/app/model/PersonaData.php";
include "../../../core/app/model/UserData.php";
include "../../../core/app/model/ProcesoVentaData.php";
include "../../../core/app/model/HabitacionData.php";
include "../../../core/app/model/ProductoData.php";
include "../../../core/app/model/CajaData.php";


	require_once(dirname(__FILE__).'/../html2pdf.class.php');
    
     include(dirname('__FILE__').'/reporte_caja/reporte_caja_html.php');
    $content = ob_get_clean();

    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output('reporte_diario_user.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
 