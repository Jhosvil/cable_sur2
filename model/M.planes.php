<?php
// obtenemos la conexion 
require_once '../core/model.master.php';

class Planes extends ModelMaster{

    // registrar planes
    public function registrarPlanes(array $data)
    {
        try{
            parent::execProcedure($data,"Registrar_planes", false);
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Listar planes activos 
    public function listarPlanesActivos()
    {
        try{
            return parent::getRows("listar_planes_activos",true);
        }   catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // listar planes inactivos
    public function listarPlanesInactivos()
    {
        try{
            return parent::getRows('listar_planes_inactivos', true);
        }   catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // eliminar plan 
    public function inabilitarPlan(array $idplan)
    {
        try {
            parent::execProcedure($idplan, "eliminar_planes", false);
        } catch (Exception $e) {
        die($e->getMessage());
        }
    }
    // listar un plan
    public function listarOnePlan(array $idplan)
    {
        try{
          return parent::execProcedure($idplan, "listar_un_plan", true);
        } catch (Exception $e) {
          die($e->getMessage());
        }
    }
    // modificar plan 
    public function modificarPlan(array $idplan)
    {
        try{
            parent::execProcedure($idplan, "modificar_plan", false);
        } catch (Exception $e){
            die($e->getMessage());
        }
        

    }
    //habilitar un plan inactivo
    public function habilitarPlan(array $idplan)
    {
        try {
            parent::execProcedure($idplan, "habilitar_planes", false);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    

}

?>

