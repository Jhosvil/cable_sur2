<?php 
require_once '../core/model.master.php';

class Estadistica extends ModelMaster
{
    // Modelo Listar Total de Clientes
    public function totalClientes()
    {
        try {
            return parent::getRows("total_De_clientes", true);
        } catch (Exception $e ) {
            die($e->getMessage());
        }
    }
    // GRAFICO DE BARRAS PARA MOSTRAR LOS TOTALES DE CLIENTES POR DISTRITOS 
    public function graficoBarrasTotalClientesXDistritos()
    {
        try {
            return parent::getRows("total_clientes_x_distrito", true);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}

?>