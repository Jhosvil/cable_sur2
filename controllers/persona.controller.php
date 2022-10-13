<?php

session_start();

require_once '../model/M.persona.php';

$persona = new Persona();

if (isset($_GET['operacion'])) {
  $operacion = $_GET['operacion'];

  // listar persona
  if ($operacion == 'listarPersona') {
    // Almacenamos en un objeto
    $tabla = $persona->listarPersona();
    if (count($tabla) > 0) {
      // Contiene datos que podemos mostrar
      foreach ($tabla as $registro) {
        // Imprimimos
        echo "
        <tr>
          <td>{$registro->idpersona}</td>
          <td>{$registro->nombredistrito}</td>
          <td>{$registro->nombres}</td>
          <td>{$registro->apellidos}</td>
          <td>{$registro->dni}</td>
          <td>{$registro->telefono}</td>
          <td>{$registro->email}</td>
          <td><center>
              <button id='btnModificarPersona' title='Modificar Persona' data-idpersona='{$registro->idpersona}'  type='button' class='btn btn-warning' data-toggle='modal' data-target='#modalModificarPersona' data-whatever='@mdo'>
              <i class='fas fa-user-edit'></i>
              </button>
              <button id='btnAñadirUsuario' title='Asignar a Usuario' data-idpersona='{$registro->idpersona}'  type='button' class='btn btn-success' data-toggle='modal' data-target='#modalAñadirUsuario' data-whatever='@mdo'>
              <i class='fas fa-user-plus'></i>
              </button>
              <button id='btnAñadirCliente' title='Asignar a clinte' data-idpersona='{$registro->idpersona}' type='button' class='btn btn-info'>
              <i class='fas fa-user-plus'></i>
              </button>
            </center>
          </td>
        </tr>
        ";
      }
    }
  }
  // REGISTRAR PERSONA
  if ($operacion == 'registrarPersona') {
    $datos = [
        "iddistrito" => $_GET['iddistrito'],
        "nombres"   => $_GET['nombres'],
        "apellidos" => $_GET['apellidos'],
        "dni"       => $_GET['dni'],
        "telefono"  => $_GET['telefono'],
        "email"     => $_GET['email']
    ];

    $persona->registrarPersona($datos);
  }

  // LISTAR UN DATO DE PERSONAS
  if ($operacion == 'listarOneDatoPersona'){
    $idpersona = $persona->listarOneDatoPersona(["idpersona" => $_GET["idpersona"]]);

    if($idpersona){
        echo json_encode($idpersona[0]);
    }
  }

  // MODIFICAR PERSONA
  if ($operacion == 'modificarPersona') {
    //Array asociativo con todos los datos
    $datosmodificar = [
        "idpersona"   => $_GET['idpersona'],
        "nombres"     => $_GET["nombres"],
        "apellidos"   => $_GET["apellidos"],
        "dni"         => $_GET["dni"],
        "telefono"    => $_GET["telefono"],
        "email"       => $_GET["email"]
    ];
        $persona->modificarPersona($datosmodificar);
  }

  // REGISTRAR USUARIO
  if ($operacion == 'registrarUsuario'){
    $datos = [
      "idpersona"     => $_GET['idpersona'],
      "nombreusuario" => $_GET['nombreusuario'],
      "claveacceso"   => password_hash($_GET['claveacceso'], PASSWORD_BCRYPT),
      "rol"           => $_GET['rol']
    ];
    $persona->registrarUsuario($datos);
  }
}
?>
