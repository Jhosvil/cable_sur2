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
            $tabla = $persona->listarPersona();
            if (count($tabla) > 0) {
                // Contiene datos que podemos mostrar
                foreach ($tabla as $registro) {
                    // Imprimimos
                    echo "
                        <tr>
                            <td>{$registro->idpago}</td>
                            <td>{$registro->nomCli}</td>
                            <td>{$registro->apeCli}</td>
                            <td>{$registro->direccionCli}</td>
                            <td>{$registro->dniCli}</td>
                            <td>{$registro->mespago}</td>
                            <td>{$registro->netopagar}</td>
                            <td>{$registro->diapago}</td>
                            <td>
                                <center>
                                    <button id='btnModificarPersona' title='Modificar Persona' data-idpersona='{$registro->idpersona}'  type='button' class='btn btn-warning' data-toggle='modal' data-target='#modalModificarPersona' data-whatever='@mdo'>
                                        <i class='fas fa-user-edit'></i>
                                    </button>
                                    <button id='btnAñadirUsuario' title='Asignar a Usuario' data-idpersona='{$registro->idpersona}'  type='button' class='btn btn-success' data-toggle='modal' data-target='#modalAñadirUsuario' data-whatever='@mdo'>
                                        <i class='fas fa-user-plus'></i>
                                    </button>
                                    <button id='btnAñadirCliente' title='Asignar a clinte' data-idpersona='{$registro->idpersona}' type='button' class='btn btn-info'>
                                        <i class='fas fa-user-plus'></i>
                                    </button>
                                </center>
                            </td>
                        </tr>
                    ";
                }
            }
        }
    }

?>