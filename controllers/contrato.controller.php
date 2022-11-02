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
              <button title='ver Contrato' type='button' class='btn btn-info' data-toggle='modal' data-target='.bd-example-modal-lg'>
                <i class='nav-icon fas fa-eye'></i>
              </button>
              <button title='Imprimir Contrato' type='button' class='btn btn-danger'>
                <i class='nav-icon fas fa-file-pdf'></i>
              </button>
            </td>
          </tr>
        ";
      }
    }
  }
}
 ?>
