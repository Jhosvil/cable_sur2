<?php

// OBTENEMOS LA CONEXION
require_once '../core/model.master.php';

class Contrato extends ModelMaster
{

  // REGISTRAR CONTRATOS
  function registrarContrato(array $datos)
  {
    try {
      parent::execProcedure($datos, "registrar_contratos", false);
    } catch (Exception $e) {
      die($e->getMessage());
    }

  }

  //LISTAR CONTRATOS VIGENTES
  public function listarContratos()
  {
    try {
      return parent::getRows("listar_Contratos", true);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }


  // LISTAR UN CONTRATO
  public function listarUnContrato(array $idContrato)
  {
    try {
      return parent::execProcedure($idContrato,"listar_un_contrato", true);
    } catch (Exception $e) {
      die($e->getMessage());
    }

  }

  // LISTAR DATOS PERSONALES DEL CLIENTE POR DNI
  public function listarDatosClienteXDni(array $dni)
  {
    try {
      return parent::execProcedure($dni, "listar_datos_personales_del_cliente", true);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

}


?>
