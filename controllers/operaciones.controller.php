<?php
session_start();
require_once '../model/M.operaciones.php';

// INSTACIAMOS AL MODELO
$operacion = new Operacion();

if (isset($_GET['op'])) {
    $op = $_GET['op'];

    if ($op == "registrarOperacion") {
        $datos = [
            "idcontrato"            => $_GET['idcontrato'],
            "idusuariotecnico"      => $_SESSION['idusuario'],
            "tipooperacion"         => $_GET['tipooperacion'],
            "fechahora"             => $_GET['fechahora'],
            "materialesretirados"   => $_GET['materialesretirados'],
            "materialesusados"      => $_GET['materialesusados']
        ];
    
        $operacion->registrarOperacion($datos);
    }
    if ($op == "listarOperacion") {
        $tabla = $operacion->listarOperaciones();
        if (count($tabla) > 0) {
            // Contiene los datos que vamos a mostrar
            foreach ($tabla as $registro) {
            // Imprimimos en una tabla
            echo "
                <tr>
                    <td>{$registro->idoperacion}</td>
                    <td>{$registro->idcontrato}</td>
                    <td>{$registro->tecnico}</td>
                    <td>{$registro->rol}</td>
                    <td>{$registro->tipooperacion}</td>
                    <td>{$registro->fechahora}</td>
                    <td>{$registro->materialesretirados}</td>
                    <td>{$registro->materialesusados}</td>
                </tr>
            ";
            }
        }
    }
}
?>