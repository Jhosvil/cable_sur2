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
    // listar los planes Activos
    if($operacion =='listarPlanesActivos'){
        $tabla = $plan->listarPlanesActivos();
        if (count($tabla) >0){
            foreach ($tabla as $registro){
                echo"
                    <tr> 
                        <td>{$registro->idplan }</td>
                        <td>{$registro->nombreplan }</td>
                        <td>{$registro->descripcion }</td>
                        <td>{$registro->precio }</td>
                        <td><center>
                            <button id='btnModificarplan' title='Modificar Plan' data-idplan='{$registro->idplan}'  type='button' class='btn btn-warning' data-toggle='modal' data-target='#modalModificarPlan' data-whatever='@mdo'>
                            <i class='fas fa-user-edit'></i>
                            </button>
                            <button id='btneliminarplan' title='Eliminar un plan' data-idplan='{$registro->idplan}'  type='button' class='btn btn-success' data-toggle='modal' data-target='#eliminarplan' data-whatever='@mdo'>
                            <i class='fas fa-user-plus'></i>
                            </button>
                            </center>
                        </td>
                    </tr>
                ";
            }
        }
    }
    // eliminar  plan
    if($operacion == 'eliminarplanes'){
        $datosenviar = [
            "idplan" => $_GET ['idplan']
        ];
        $plan->inabilitarPlan($datosenviar);
    }
    // listar un plan
    if ($operacion == 'listarUnPlan'){
        $idplan = $plan->listarOnePlan(["idplan" => $_GET["idplan"]]);

        if($idplan){
            echo json_encode($idplan[0]);
        }
    }
    //modificar plan
    if ($operacion == 'modificarplan'){
        $datosmodificar = [
            "idplan"      => $_GET['idplan'],
            "nombreplan"  => $_GET['nombreplan'],
            "descripcion" => $_GET['descripcion'],
            "precio"      => $_GET['precio']
        ];
        $plan->modificarPlan($datosmodificar);
    }
    // listar planes inactivos
    if($operacion == 'listarPlanesInactivos'){
        $tabla = $plan->listarPlanesInactivos();
        if(count($tabla)>0){
            foreach ($tabla as $registro){
                echo"
                    <tr>
                        <td>{$registro->idplan}</td>
                        <td>{$registro->nombreplan}</td>
                        <td>{$registro->descripcion}</td>
                        <td>{$registro->precio}</td>
                        <td>
                            <center>
                                <button id='btnHabilitar' title='Habilitar Plan' data-idplan='{$registro->idplan}'  type='button' class='btn btn-warning'>
                                    <i class='fas fa-user-edit'></i>
                                </button>
                            </center>
                        </td>
                    </tr>
                ";
            }
        }
    }

    
    //habilitar al inactivo
    if ($operacion == 'habilitarPlanInactivo'){
        $datosenviar =[
            "idplan" => $_GET['idplan']
        ];
        $plan->habilitarPlan($datosenviar);
    }

    // listar planes para registrar contratos en un select
    if ($operacion == 'listarPlanesContra') {
        $tabla = $plan->listarPlanesActivos();
        if (count($tabla) >0){
            foreach ($tabla as $registro){
                echo"
                    <option selected value='{$registro->idplan}'>{$registro->nombreplan}</option>
                ";
            }
        }
    }

}
?>