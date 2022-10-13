<?php 

// Obtenemos la clase conexion
require_once '../core/model.master.php';

class Ubigeo extends ModelMaster{
    //METODO CRUD

    // LISTAMOS
    public function listarDepartamentos(){
        try{
            return parent::getRows("listar_departamentos", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function listarProvincias(array $iddepartamento)
    {
        try {
            return parent::execProcedure($iddepartamento, "listar_provincias", true);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarDistritos(array $idprovincia)
    {
        try {
            return parent::execProcedure($idprovincia, "listar_distritos", true);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>