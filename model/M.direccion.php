<?php
require_once '../core/model.master.php';

/**
 *
 */
class Direccion extends ModelMaster
{

  public function registrarDireccion(array $data)
  {
    try {
      parent::execProcedure($data, "spu_registrar_direcciones", false);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}

?>
