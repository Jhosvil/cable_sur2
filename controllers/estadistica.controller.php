<?php
// INICIAMOS LA SESSION
session_start(); 

// TRAEMOS EL MODELO
require_once '../model/M.estadistica.php';
$estadistica = new Estadistica();

if (isset($_GET['operacion'])) {
    $operacion = $_GET['operacion'];

    if ($operacion == 'graficoBarrasTotalClientesXDistritos') {
        $data = $estadistica->graficoBarrasTotalClientesXDistritos();
        echo json_encode($data);
    }

    if ($operacion == 'totalClientes') {
        $tabla = $estadistica->totalClientes();
        if (count($tabla) > 0) {
        // Contiene datos que podemos mostrar
            foreach ($tabla as $registro) {
                // Imprimimos
                echo "<h3>{$registro->totalCliente}</h3>";
            }   
        }
    }
}
?>