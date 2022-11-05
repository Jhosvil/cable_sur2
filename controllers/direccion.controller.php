<?php
session_start();
require_once '../model/M.direccion.php';

$direccion = new Direccion();

if (isset($_GET['operacion'])) {
  // ALMACENAMOS LA OPERACION EN UNA VARIABLE
  $operacion = $_GET['operacion'];

  // LA OPERACION ES REGISTRAR DIRECCON
  if ($operacion == 'registrarDireccion') {
    // ARRAY
    $datos = [
      'direccion' => $_GET['direccion']
    ];

    // ENVIAMOS LOS DATOS AL MODELO
    $direccion->registrarDireccion($datos);
  }

  // LISTAR DIRECCION EN UNA TABLA
  if ($operacion == 'listarDirecciones') {
    // Almacenamos en un objeto
    $tabla = $direccion->listarDirecciones();

    if (count($tabla) > 0) {
      // Contiene datos que podemos mostrar
      foreach ($tabla as $registro) {
        // Imprimimos
        echo "
          <tr>
            <td>{$registro->iddireccion}</td>
            <td>{$registro->direccion}</td>
            <td>
              <button id='btn-eliminar-direccion' data-iddireccion = '{$registro->iddireccion}' type='button' class='btn btn-danger'>
                <i class='nav-icon fas fa-trash-alt'></i>
              </button>
            </td>
          </tr>
        ";
      }
    }
  }

  if ($operacion == 'eliminarDirecciones') {
    // ARRAY
    $datos = ['iddireccion' => $_GET['iddireccion']];

    // ENVIAMOS LOS DATOS AL MODELO
    $direccion->eliminarDirecciones($datos);
  }

  // LISTAR DIRECCIONES EN UN SELECT PARA REGISTRAR UN CONTRATO
  if ($operacion == 'listarDireccionContra') {
    // Almacenamos en un objeto
    $tabla = $direccion->listarDirecciones();

    if (count($tabla) > 0) {
      // Contiene datos que podemos mostrar
      foreach ($tabla as $registro) {
        // Imprimimos
        echo "
          <option selected value='{$registro->iddireccion}'>{$registro->direccion}</option>
        ";
      }
    }
  }
}
?>
