<?php

//OBTENEMOS LA CONEXION
require_once '../core/model.master.php';
/*
 * CREAMOS LA CLASE GLOBAL
 */
class Usuario extends ModelMaster
{

  //LOGIN
  public function login(array $data)
  {
    try {
      return parent::execProcedure($data, "spu_usuarios_login", true);
    } catch (Exception $e) {
      die($e->getMessage());
    }

  }

  public function listarUsuarios(){
    try {
      //code...
      return parent::getRows("listar_usuarios_activos", true);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function listarOneUsuario(array $idusuario)
  {
    try {
      return parent::execProcedure($idusuario, "listar_one_usuario", true);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function modificarUsuario(array $idusuario)
  {
    try{
      parent::execProcedure($idusuario, "modificarUsuario", false);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function inabilitarUsuario(array $idusuario)
  {
    try {
      parent::execProcedure($idusuario, "inabilitar_usuarios", false);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function listarUsuariosInactivos()
  {
    try {
      //code...
      return parent::getRows("listar_usuarios_inactivos", true);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function habilitarUsuario(array $idusuario)
  {
    try {
      parent::execProcedure($idusuario, "habilitar_usuarios", false);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}

?>
