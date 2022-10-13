<?php

// OBTENEMOS LA CONEXION
require_once '../core/model.master.php';

class Cliente extends ModelMaster{


    // REGISTRAR CLIENTE
    public function registrarCliente(array $data)
    {
        try {
            parent::execProcedure($data, "spu_registrar_cliente", false);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}

?>