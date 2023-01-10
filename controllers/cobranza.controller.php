<?php
    session_start();
    require_once '../model/M.cobranza.php';
    $cobranza = new Cobranza();

    if (isset($_GET['operacion'])) {
        $operacion = $_GET['operacion'];

        // LISTAR COBRANZA
        if ($operacion == 'listarCobranza') {
            // Almacenamos en un objeto
            $tabla = $cobranza->listarCobranza();
            if (count($tabla) > 0) {
                // Contiene datos que podemos mostrar
                foreach ($tabla as $registro) {
                    // Imprimimos
                    echo "
                        <tr>
                            <td>{$registro->idcliente}</td>
                            <td>{$registro->cliente}</td>
                            <td>{$registro->direccion}</td>
                            <td>{$registro->referencia}</td>
                            <td>{$registro->telefono}</td>
                            <td>{$registro->dni}</td>
                            <td>{$registro->anexo}</td>
                            <td>{$registro->enero}</td>
                            <td>{$registro->febrero}</td>
                            <td>{$registro->marzo}</td>
                            <td>{$registro->abril}</td>
                            <td>{$registro->mayo}</td>
                            <td>{$registro->junio}</td>
                            <td>{$registro->julio}</td>
                            <td>{$registro->agosto}</td>
                            <td>{$registro->setiembre}</td>
                            <td>{$registro->octubre}</td>
                            <td>{$registro->noviembre}</td>
                            <td>{$registro->diciembre}</td>
                        </tr>
                    ";
                }
            }
        }

        //listar planes para registrar contratos en un select
        if ($operacion == 'listarusuariosCobranza') {
            $tabla = $cobranza->listarusuariosCobranza();
            if (count($tabla) >0){
                echo "
                    <option selected > Seleccione a un usuario...</option>
                ";
                foreach ($tabla as $registro){
                    echo"
                        <option  value='{$registro->idusuario}'>{$registro->nombres} {$registro->apellidos}</option>
                    ";
                }
            }
        }

        // LISTAR COBRANZA X USUARIO REGISTRADO
        if ($operacion == 'listarCobranzaXUsuario') {
            // Almacenamos en un objeto
            $tabla = $cobranza->listarCobranzaXUsuario(["idusuarioregistro" => $_GET['idusuarioregistro']]);
            if (count($tabla) > 0) {
                // Contiene datos que podemos mostrar
                foreach ($tabla as $registro) {
                    // Imprimimos
                    echo "
                        <tr>
                            <td>{$registro['idcliente']}</td>
                            <td>{$registro['cliente']}</td>
                            <td>{$registro['direccion']}</td>
                            <td>{$registro['referencia']}</td>
                            <td>{$registro['telefono']}</td>
                            <td>{$registro['dni']}</td>
                            <td>{$registro['anexo']}</td>
                            <td>{$registro['enero']}</td>
                            <td>{$registro['febrero']}</td>
                            <td>{$registro['marzo']}</td>
                            <td>{$registro['abril']}</td>
                            <td>{$registro['mayo']}</td>
                            <td>{$registro['junio']}</td>
                            <td>{$registro['julio']}</td>
                            <td>{$registro['agosto']}</td>
                            <td>{$registro['setiembre']}</td>
                            <td>{$registro['octubre']}</td>
                            <td>{$registro['noviembre']}</td>
                            <td>{$registro['diciembre']}</td>
                        </tr>
                    ";
                }
            }
        }
    }
?>