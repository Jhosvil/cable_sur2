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
}
?>