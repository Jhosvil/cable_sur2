<?php

// Integrando al modelo y la entidad BD
require_once '../model/M.ubigeo.php';

//Instanciamos el modelo
$ubigeo = new Ubigeo();

if (isset($_GET['operacion'])){

    //Almacenamos la variable operación en una variable
    $operacion = $_GET['operacion'];

    //Lista departamentos
    if ($operacion == 'listarDepartamentos'){

        // Alamcenar en un objeto
        $tabla = $ubigeo->listarDepartamentos();

        if (count($tabla) > 0){
            //Contiene datos que podemos mostrar
            echo "<option value=''>Departamento</option>";
            foreach($tabla as $registro){
                echo "<option value='{$registro->iddepartamento}'>{$registro->nombredepartamento}</option>";
            }
        }else{
            echo "<option value=''>No se encontraron datos</option>";
        }
    }

    // Lista Provincia
    if ($operacion == 'listarProvincias'){

        $tabla = $ubigeo->listarProvincias(
            ["iddepartamento" => $_GET['iddepartamento']]
        );
        
        if(count($tabla) > 0){
            //Contiene datos que podemos mostrar
            echo "<option value=''>Provincia</option>";
            foreach($tabla as $registro){
                echo "<option value='{$registro['idprovincia']}'>{$registro['nombreprovincia']}</option>";
            }
        }else{
            echo "<option value=''>No se encontraron datos</option>";
        }
    }

    if($operacion == 'listarDistritos'){
        $tabla = $ubigeo->listarDistritos(
            ["idprovincia" => $_GET['idprovincia']]
        );
        if (count($tabla) > 0) {
            # Contiene datos que podemos mostrar
            echo "<option value=''>Distrito</option>";
            foreach ($tabla as $registro){

                echo "<option value='{$registro['iddistrito']}'>{$registro['nombredistrito']}</option>";
            }
        }else{
            echo "<option value=''>No hay registro</option>";
        }
    }
}
?>