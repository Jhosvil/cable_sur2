<?php

require_once '../model/M.contratos.php';
require_once '../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try{
    $contrato = new Contrato();
    $idcontrato  = $contrato->listarUnContrato(["idcontrato" => $_GET["idcontrato"]]);
    
    $apelliCli   = $idcontrato[0]['apellidoCli'];
    $dniCli      = $idcontrato[0]['dniCli'];
    $distritoCli = $idcontrato[0]['distritoCli'];
    $emailCli    = $idcontrato[0]['emailCli'];
    $nombreCli   = $idcontrato[0]['nombreCli'];
    $telefonoCli = $idcontrato[0]['telefonoCli'];
    $direccliente= $idcontrato[0]['direccliente'];
    $referencia  = $idcontrato[0]['referencia'];

    $nombreplan  = $idcontrato[0]['nombreplan'];
    $precio      = $idcontrato[0]['precio'];
    $fechainicio = $idcontrato[0]['fechainicio'];
    $diapago     = $idcontrato[0]['diapago'];
    $descripcion = $idcontrato[0]['descripcion'];
    $codcintillo = $idcontrato[0]['codcintillo'];
    $fechatermino= $idcontrato[0]['fechatermino'];
    $anexo       = $idcontrato[0]['anexo'];

    $apellidoUsu = $idcontrato[0]['apellidoUsu'];
    $dniUsu      = $idcontrato[0]['dniUsu'];
    $rolUsu      = $idcontrato[0]['rolUsu'];
    $nombresUsu  = $idcontrato[0]['nombresUsu'];
    $telefonoUsu = $idcontrato[0]['telefonoUsu'];
    $emailUsu    = $idcontrato[0]['emailUsu'];

  // Arrays
  $programas = ["Visual Studio Code", "Android Studio", "MS SQL Server", "Erwin"];

  ob_start();

  //!IMPORTANTE! Debemos inicializar data
  $data = "";

  // Cargar los estilos
  include './informe/estilos.html';

  //Páginas:
  include './informe/contrato.php';
  

  //Otras páginas:
  $data .= ob_get_clean();

  //Creando espacio
  $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'utf-8', array(10,10,10,10));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($data);

  $html2pdf->output('reporte-test.pdf');

}
catch(Html2PdfException $e){
  $html2pdf->clean();
  $formatter = new ExceptionFormatter($e);
  echo $formatter->getHtmlMessage();
}

?>