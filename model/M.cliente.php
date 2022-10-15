<?php

// OBTENEMOS LA CONEXION
require_once '../core/model.master.php';

class Cliente extends ModelMaster{

    // ESTO ES UN EJEMPLO

    // REGISTRAR CLIENTE
    public function registrarCliente(array $data)
    {
        try {
            parent::execProcedure($data, "spu_registrar_cliente", false);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarClienteSanMiguel()
    {
      try {
        return parent::getRows("listar_cliente_san_miguel", true);
      } catch (Exception $e) {
        die($e->getMessage());
      }
    }

    public function listarClienteMorochucos()
    {
      try {
        return parent::getRows("listar_cliente_morochuco", true);
      } catch (Exception $e) {
        die($e->getMessage());
      }

    }
}

?>
