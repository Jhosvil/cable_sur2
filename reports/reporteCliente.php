<?php

require_once '../vendor/autoload.php';
require_once '../model/M.contratos.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try{
    $contrato = new Contrato();
    $datosPersonales  = $contrato->listarDatosClienteXDni(["dni" => $_GET["dni"]]);
    
    $id             = $datosPersonales[0]['idcliente'];
    $cliente        = $datosPersonales[0]['cliente'];
    $dni            = $datosPersonales[0]['dni'];
    $direccion      = $datosPersonales[0]['direccion'];
    $referencia     = $datosPersonales[0]['referencia'];
    $codcintillo    = $datosPersonales[0]['codcintillo'];
    $codsuministro  = $datosPersonales[0]['codsuministro'];

  // Arrays
  $programas = ["Visual Studio Code", "Android Studio", "MS SQL Server", "Erwin"];

  ob_start();

  //!IMPORTANTE! Debemos inicializar data
  $data = "";

  // Cargar los estilos
  include './informe2/estilo.html';

  //Páginas:
  include './informe2/cliente.php';
  

  //Otras páginas:
  $data .= ob_get_clean();

  //Creando espacio
  $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'utf-8', array(10,10,10,10));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($data);

  $html2pdf->output('Contrato.pdf');

}
catch(Html2PdfException $e){
  $html2pdf->clean();
  $formatter = new ExceptionFormatter($e);
  echo $formatter->getHtmlMessage();
}

?>