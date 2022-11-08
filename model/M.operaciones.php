<?php 
require_once '../core/model.master.php';

class Operacion extends ModelMaster{

    // MODELO REGISTRAR OPERACION
    public function registrarOperacion(array $datos)
    {
        try {
            parent::execProcedure($datos, "registrar_operaciones", false);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // MODELO LISTAR OPERACIONES
    public function listarOperaciones()
    {
        try {
            return parent::getRows("listar_operaciones", true);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>