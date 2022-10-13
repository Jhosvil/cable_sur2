<?php
session_start();
require_once '../model/M.cliente.php';

$cliente = new Cliente();

if (isset($_GET['operacion'])) {

    // ALMACENAMOS LA OPERACION EN UNA VARIABLE
    $operacion = $_GET['operacion'];

    // SI LA OPERACION ES REGISTRAR UN CLIENTE
    if($operacion == 'registrarCliente'){
        // ARRAY
        $datos = [
            'idpersona' => $_GET['idpersona'],
            'idusuarioregistro' => $_SESSION['idusuario']
        ];
        // ENVIAMOS LOS DATOS AL MODELO
        $cliente->registrarCliente($datos);
    }

    if($operacion == 'listarClienteSanMiguel'){

      // Almacenamos en un SplObjectStorage
      $tabla = $cliente->listarClienteSanMiguel();
      if (count($tabla) > 0) {
        //Contiene datos que podemos mostrar
        foreach ($tabla as $registro) {
          //Imprimimos en una tabla
          echo "
            <tr>
              <td>{$registro->idcliente}</td>
              <td>{$registro->apecliente}</td>
              <td>{$registro->nomcliente}</td>
              <td>{$registro->dni}</td>
              <td>{$registro->apeusuario}</td>
              <td>{$registro->nomusuario}</td>
              <td>{$registro->fecharegistro}</td>
            </tr>
          ";
        }
      }
    }
}
?>
