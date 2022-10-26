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
    // OPERACION PARA LISTAR A LOS CLIENTES DEL DISTRITO DE SAN MIGUEL
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
              <td>
                <button id='btnEliminarCliente' title='Desabilitar Cliente' data-idcliente='{$registro->idcliente}' type='button' class='btn btn-danger'>
                  <i class='fas fa-user-minus'></i>
                </button>
                <button id='btnNuevoContrato' title='Realizar Nuevo Contrato' data-idcliente='{$registro->idcliente}' type='button' class='btn btn-success' data-toggle='modal' data-target='#modalRegistrarContrato' data-whatever='@mdo'>
                  <i class='fas fa-file-contract'></i>
                </button>
              </td>
            </tr>
          ";
        }
      }
    }

    // OPERACION PARA LISTAR A LOS CLIENTES DEL DISTRITO DE LOS MOROCHUCOS
    if ($operacion == 'listarClienteMorochucos') {
      $tabla = $cliente->listarClienteMorochucos();
      if (count($tabla) > 0) {
        // Contiene los datos que vamos a mostrar
        foreach ($tabla as $registro) {
          // Imprimimos en una tabla
          echo "
            <tr>
              <td>{$registro->idcliente}</td>
              <td>{$registro->apecliente}</td>
              <td>{$registro->nomcliente}</td>
              <td>{$registro->dni}</td>
              <td>{$registro->apeusuario}</td>
              <td>{$registro->nomusuario}</td>
              <td>{$registro->fecharegistro}</td>
              <td>
                <button id='btnEliminarCliente' title='Desabilitar Cliente' data-idcliente='{$registro->idcliente}' type='button' class='btn btn-danger'>
                  <i class='fas fa-user-minus'></i>
                </button>
                <button id='btnNuevoContrato' title='Realizar Nuevo Contrato' data-idcliente='{$registro->idcliente}' type='button' class='btn btn-success'>
                  <i class='fas fa-file-contract'></i>
                </button>
              </td>
            </tr>
          ";
        }
      }
    }

    // OPRACION PARA INHABILITAR A UN CLIENTE
    if ($operacion == 'inabilitarCliente') {
      # Array asociativo con datos
      $datosenviar = [
        "idcliente" => $_GET['idcliente'],
        "idusuarioregistro" => $_SESSION['idusuario']
      ];
      $cliente->inabilitarCliente($datosenviar);
    }
}
?>
