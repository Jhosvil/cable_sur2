<?php
require_once '../core/model.master.php';

/**
 *
 */
class Direccion extends ModelMaster
{
  // REGISTRAR DIRECCIONES
  public function registrarDireccion(array $data)
  {
    try {
      parent::execProcedure($data, "spu_registrar_direcciones", false);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  // LISTAR DIRECCIONES
  public function listarDirecciones()
  {
    try {
      return parent::getRows("spu_listar_direcciones", true);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function eliminarDirecciones(array $iddireccion)
  {
    try {
      parent::execProcedure($iddireccion, "spu_eliminar_direccion", false);
    } catch (Exception $e) {
      die($e->getMessage());
    }

  }
}

?>
