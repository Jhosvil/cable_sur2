<?php
require_once '../model/M.contratos.php';

session_start();

$contrato = new Contrato();

if (isset($_GET['operacion'])) {
  $operacion = $_GET['operacion'];

  // listar Contrato Vigente
  if ($operacion == 'listarContratos') {
    $tabla = $contrato->listarContratos();
    if (count($tabla) > 0) {
      foreach ($tabla as $registro) {
        echo "
          <tr>
            <td>{$registro->idcontrato}</td>
            <td>{$registro->distritoCli}</td>
            <td>{$registro->nombreCli}</td>
            <td>{$registro->apellidoCli}</td>
            <td>{$registro->dniCli}</td>
            <td>{$registro->nombreplan}</td>
            <td>{$registro->fechainicio}</td>
            <td>{$registro->fechatermino}</td>
            <td>{$registro->diapago}</td>
            <td>
              <button id='btnVerContrato' data-idcontrato = '{$registro->idcontrato}' title='ver Contrato' type='button' class='btn btn-info' data-toggle='modal' data-target='.bd-example-modal-lg'>
                <i class='nav-icon fas fa-eye'></i>
              </button> &nbsp
              <button id='btnImprimirContrato' data-idcontrato = '{$registro->idcontrato}' title='Imprimir Contrato' type='button' class='btn btn-primary'>
                <i class='nav-icon fas fa-file-pdf'></i>
              </button>
              <button id='btnOperacion' data-idcontrato = '{$registro->idcontrato}' title='Operaciones' type='button' class='mt-1 btn btn-success' data-toggle='modal' data-target='#modalRegistrarOperacion' data-whatever='@mdo'>
                <i class='fas fa-file-signature'></i>
              </button>
              <button id='btnConcluirContrato' data-idcontrato = '{$registro->idcontrato}' title='Terminar Contrato' type='button' class='mt-1 btn btn-danger'>
                <i class='fas fa-times-circle'></i>
              </button>
              <button id='btnRealizarPago' data-idcontrato = '{$registro->idcontrato}' title='Realizar Pago' type='button' class='mt-1 btn btn-success' data-toggle='modal' data-target='#modalRegistrarPago' data-whatever='@mdo'>
                <i class='fas fa-hand-holding-usd'></i>
              </button>
            </td>
          </tr>
        ";
      }
    }
  }

  // listar Contrato no vigente
  if ($operacion == 'listarContratosInactivos') {
    $tabla = $contrato->listarContratosInactivos();
    if (count($tabla) > 0) {
      foreach ($tabla as $registro) {
        echo "
          <tr>
            <td>{$registro->idcontrato}</td>
            <td>{$registro->distritoCli}</td>
            <td>{$registro->nombreCli}</td>
            <td>{$registro->apellidoCli}</td>
            <td>{$registro->dniCli}</td>
            <td>{$registro->nombreplan}</td>
            <td>{$registro->fechainicio}</td>
            <td>{$registro->fechatermino}</td>
            <td>{$registro->diapago}</td>
            <td>
              <button id='btnVerContrato' data-idcontrato = '{$registro->idcontrato}' title='ver Contrato' type='button' class='btn btn-info' data-toggle='modal' data-target='.bd-example-modal-lg'>
                <i class='nav-icon fas fa-eye'></i>
              </button>
              <button id='btnImprimirContrato' data-idcontrato = '{$registro->idcontrato}' title='Imprimir Contrato' type='button' class='btn btn-danger'>
                <i class='nav-icon fas fa-file-pdf'></i>
              </button>
            </td>
          </tr>
        ";
      }
    }
  }
  // Listar Un contrato
  if ($operacion == 'listarUnContrato') {
    $idcontrato = $contrato->listarUnContrato(["idcontrato" => $_GET["idcontrato"]]);
  
    if ($idcontrato) {
      echo json_encode($idcontrato[0]);
    }
  }

  //Registrar un contrato
  if ($operacion == 'registrarContrato') {
    $datos = [
      "idcliente"     => $_GET['idcliente'],
      "idplan"        => $_GET['idplan'],
      "codcintillo"   => $_GET['codcintillo'],
      "codsuministro" => $_GET['codsuministro'],
      "referencia"    => $_GET['referencia'],
      "tipodireccion" => $_GET['tipodireccion'],
      "iddireccion"   => $_GET['iddireccion'],
      "nrodireccion"  => $_GET['nrodireccion'],
      "anexo"         => $_GET['anexo'],
      "fechainicio"   => $_GET ['fechainicio'],
      "diapago"       => $_GET['diapago']
    ];
  
    $contrato->registrarContrato($datos);
  }

  // Culminar un Contrato
  if ($operacion == 'culminarContrato') {
    $datos = [
      "idcontrato"  => $_GET['idcontrato']
    ];
    $contrato->culminarContrato($datos);
  }
}


?>
