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

    // LISTAR CLIENTES DEL DISTRITO DE SAN MIGUEL
    public function listarClienteSanMiguel()
    {
      try {
        return parent::getRows("listar_cliente_san_miguel", true);
      } catch (Exception $e) {
        die($e->getMessage());
      }
    }

    // LISTAR CLIENTES DEL DISTRITO DE LOS MOROCHUCOS
    public function listarClienteMorochucos()
    {
      try {
        return parent::getRows("listar_cliente_morochuco", true);
      } catch (Exception $e) {
        die($e->getMessage());
      }

    }

    // INABILITAR A UN CLIENTE
    public function inabilitarCliente($idcliente)
    {
      try {
        parent::execProcedure($idcliente, "inabilitar_clientes", false);
      } catch (Exception $e) {
        die($e->getMessage());
      }
    }

    // LISTAR CLIENTES INACTIVOS
    public function listarClientesInactivos()
    {
      try {
        return parent::getRows("listar_clientes_inactivos", true);
      } catch (Exception $e) {
        die($e->getMessage());
      }
    }
    // HABILITAR A UN CLIENTE INACTIVO
    public function habilitarClienteActivo(array $idcliente)
    {
      try {
        parent::execProcedure($idcliente, "habilitar_clientes", false);
      } catch (Exception $e) {
        die($e->getMessage());
      }
    }
}

?>
