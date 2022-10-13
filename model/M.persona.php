<?php

// OBTENEMOS LA CONEXION
require_once '../core/model.master.php';

/**
 * CREAMOS LA CLASE GLOBAL
 */
class Persona extends ModelMaster
{

  function listarPersona()
  {
    try {
      return parent::getRows("listar_personas", true);
    } catch (Exception $e) {
      die($e->getMessage());
    }

  }

  function registrarPersona(array $data)
  {
    try {
      parent::execProcedure($data, "registrar_personas", false);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  function listarOneDatoPersona(array $idpersona)
  {
    try {
      return parent::execProcedure($idpersona, "listar_one_dato_persona", true);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  function modificarPersona(array $idpersona)
  {
    try{
        parent::execProcedure($idpersona, "modificar_personas", false);
    }
    catch(Exception $e){
        die($e->getMessage());
    }
  }

  function registrarUsuario(array $data)
  {
    try {
      parent::execProcedure($data, "registrar_usuarios", false);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}

?>
