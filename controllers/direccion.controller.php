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
}
?>
