<?php
    session_start();
    require_once '../model/M.pago.php';
    $pago = new Pagos();

    if (isset($_GET['operacion'])) {
        $operacion = $_GET['operacion'];

        // REGISTRAR PAGOS
        if ($operacion == 'registrarPago') {
            $datos = [
                "idcontrato"        =>  $_GET['idcontrato'],
                "anopago"           =>  $_GET['anopago'],
                "mespago"           =>  $_GET['mespago'],
                "netopagar"         =>  $_GET['netopagar'],
                "idusuarioregistro" =>  $_SESSION['idusuario']
            ];
            $pago->registrarPago($datos);
        }

        //LISTAR PAGOS
        if ($operacion == 'listarPagos') {
            // Almacenamos en un objeto
            $tabla = $pago->listarPagos();
            if (count($tabla) > 0) {
                // Contiene datos que podemos mostrar
                foreach ($tabla as $registro) {
                    // Imprimimos
                    echo "
                        <tr>
                            <td>{$registro->idpago}</td>
                            <td>{$registro->nomCli}</td>
                            <td>{$registro->apeCli}</td>
                            <td>{$registro->dirreccionCli}</td>
                            <td>{$registro->dniCli}</td>
                            <td>{$registro->mespago}</td>
                            <td>{$registro->netopagar}</td>
                            <td>{$registro->fechapago}</td>
                            <td>{$registro->diapago}</td>
                        </tr>
                    ";
                }
            }
        }

        //LISTAR Acreedores x mes
        if ($operacion == 'listarAcreedores') {
            // Almacenamos en un objeto
            $tabla = $pago->listarAcreedores(["mespago" => $_GET['mespago']]);
            if (count($tabla) > 0) {
                // Contiene datos que podemos mostrar
                foreach ($tabla as $registro) {
                    // Imprimimos
                    echo "
                        <tr>
                            <td>{$registro['idpago']}</td>
                            <td>{$registro['nomCli']}</td>
                            <td>{$registro['apeCli']}</td>
                            <td>{$registro['dirreccionCli']}</td>
                            <td>{$registro['dniCli']}</td>
                            <td>{$registro['mespago']}</td>
                            <td>{$registro['netopagar']}</td>
                            <td>{$registro['fechapago']}</td>
                            <td>{$registro['diapago']}</td>
                        </tr>
                    ";
                }
            }
        }

        // LISTAR PAGOS X DNI DEL CLIENTE
        if ($operacion == 'listarPagosXDni') {
            // Almacenamos en un objeto
            $tabla = $pago->listarPagosXDni(["dni" => $_GET['dni']]);
            if (count($tabla) > 0) {
                // Contiene datos que podemos mostrar
                foreach ($tabla as $registro) {
                    // Imprimimos
                    echo "
                        <tr>
                            <td>{$registro['idpago']}</td>
                            <td>{$registro['mespago']}</td>
                            <td>{$registro['fechapago']}</td>
                            <td>{$registro['netopagar']}</td>
                        </tr>
                    ";
                }
            }
        }
    }

?>