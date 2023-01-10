<?php 
require_once '../core/model.master.php';

class Cobranza extends ModelMaster{
    // LISTA DE COBRANZA
    public function listarCobranza()
    {
        try {
            return parent::getRows("lista_de_cobranza", true);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarusuariosCobranza()
    {
        try {
            return parent::getRows("listar_usuarios_activos", true);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarCobranzaXUsuario(array $idusuarioregistro)
    {
        try {
            return parent::execProcedure($idusuarioregistro, "lista_de_cobranza_segun_usuarioregistro", true);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>