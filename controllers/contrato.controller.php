<?php
require_once '../model/M.contratos.php';

session_start();

$contrato = new Contrato();

if (isset($_GET['operacion'])) {
  $operacion = $_GET['operacion'];

  // listar Contrato
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
              </button>
              <button id='btnImprimirContrato' data-idcontrato = '{$registro->idcontrato}' title='Imprimir Contrato' type='button' class='btn btn-danger'>
                <i class='nav-icon fas fa-file-pdf'></i>
              </button>
              <button id='btnOperacion' data-idcontrato = '{$registro->idcontrato}' title='Operaciones' type='button' class='btn btn-success' data-toggle='modal' data-target='#modalRegistrarOperacion' data-whatever='@mdo'>
                <i class='fas fa-file-signature'></i>
              </button>
            </td>
          </tr>
        ";
      }
    }
  }
}

if ($operacion == 'listarUnContrato') {
  $idcontrato = $contrato->listarUnContrato(["idcontrato" => $_GET["idcontrato"]]);

  if ($idcontrato) {
    echo json_encode($idcontrato[0]);
  }
}

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
    "fechatermino"  => $_GET['fechatermino'],
    "diapago"       => $_GET['diapago']
  ];

  $contrato->registrarContrato($datos);
}
?>
