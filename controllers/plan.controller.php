<?php
session_start();

//llamamos al modelo
require_once '../model/M.planes.php';

// instanciamos al modelo
$plan = new Planes();

// si la operaciones existe
if (isset($_GET['operacion'])){
    //almacenamos la operaciones en una variable
    $operacion = $_GET['operacion'];

    // SI LA OPERACION ES REGISTRAR UN CLIENTE
    if($operacion =='registrarPlanes'){
        //array
        $datos = [
            'nombreplan'=>$_GET['nombreplan'],
            'descripcion'=>$_GET['descripcion'],
            'precio'=>$_GET['precio']
        ];
        //enviamos a los datos al modelo
        $plan->registrarPlanes($datos);
    }








}

?>