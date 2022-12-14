<?php

// OBTENEMOS LA CONEXION
require_once '../core/model.master.php';

class Contrato extends ModelMaster
{

  // REGISTRAR CONTRATOS
  function registrarContrato($datos)
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

  // LISTAR CONTRATOS NO VIGENTES
  public function listarContratosInactivos()
  {
    try {
      return parent::getRows("listar_Contratos_Incativos", true);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  // LISTAR UN CONTRATO
  public function listarUnContrato($idContrato)
  {
    try {
      return parent::execProcedure($idContrato,"listar_un_contrato", true);
    } catch (Exception $e) {
      die($e->getMessage());
    }

  }

  // CULMINAR UN CONTRATO
  public function culminarContrato($idContrato)
  {
    try {
      parent::execProcedure($idContrato, "culminar_contrato", false);
    } catch (Exception $e) {
      die ($e->getMessage());
      //throw $th;
    }
  }
}


?>
