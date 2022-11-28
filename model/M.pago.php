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

    //LISTAR ACREEDORES x mes
    public function listarAcreedores($mespago)
    {
        try {
            return parent::execProcedure($mespago, "listar_acreedores", true);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
?>