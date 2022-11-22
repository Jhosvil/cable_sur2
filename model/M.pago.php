<?php 
require_once '../core/model.master.php';

class Pagos extends ModelMaster{

    // REGISTRAR PAGO
    public function registrarPago($data)
    {
        try {
            parent::execProcedure($data, "registrar_pago", false);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // LISTAR PAGOS
    public function listarPagos()
    {
        try {
            return parent::getRows("listar_pagos", true);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //LISTAR ACREEDORES
    public function listarAcrerdores($mespago)
    {
        try {
            return parent::execProcedure($mespago, "listar_pagos", true);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>