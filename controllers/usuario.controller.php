<?php
session_start();

//LLAMAMOS AL MODELO
require_once '../model/M.Usuario.php';

// INSTANCIAMOS AL MODELO
$usuario = new Usuario();

// Si la operacion existe
if (isset($_GET['operacion'])) {

  //CAPTURAR LA OPERACION
  $operacion = $_GET['operacion'];

  if ($operacion == 'test'){
    
    $clave = "123456";
    echo password_hash($clave, PASSWORD_BCRYPT);


  }

  //LOGIN
  if ($operacion == 'login') {
    //CREAMOS LA TABLA DONDE UN DATO (nombreUsuario) devuelve una fila
    $tabla = $usuario->login(["nombreusuario" => $_GET['nombreusuario']]);

    //Obtenemos la clave ingresada por el usuario
    $claveingresada = $_GET['claveacceso'];

    //Si encontramos los datos en la tabla
    if ($tabla) {
      // ENCONTRAmos al usuario
      //obtenemos laa clave verdadera
      $claveencriptada = $tabla[0]['claveacceso']; // se refiere a la clave guardada en la bd

      // comparamos si la clave ingresada coincide con nuestros datos
      if (password_verify($claveingresada, $claveencriptada)) {
        // contraseña es correcta
        $_SESSION['idusuario'] = $tabla[0]['idusuario'];
        $_SESSION['apellidos'] = $tabla[0]['apellidos'];
        $_SESSION['nombres']   = $tabla[0]['nombres'];
        $_SESSION['dni']       = $tabla[0]['dni'];
        $_SESSION['email']     = $tabla[0]['email'];
        $_SESSION['telefono']  = $tabla[0]['telefono'];
        $_SESSION['nombreusuario'] = $tabla[0]['nombreusuario'];
        $_SESSION['claveacceso'] = $tabla[0]['claveacceso'];
        $_SESSION['rol'] = $tabla[0]['rol'];
        $_SESSION['fecharegistro'] = $tabla[0]['fecharegistro'];
        $_SESSION['fechabaja'] = $tabla[0]['fechabaja'];

        $_SESSION['login'] = true;
        echo "";
      }else {
        //Si la clave es incorrecta
        $_SESSION['idusuario']      = "";
        $_SESSION['apellidos']      = "";
        $_SESSION['nombres']        = "";
        $_SESSION['dni']            = "";
        $_SESSION['email']          = "";
        $_SESSION['telefono']       = "";
        $_SESSION['nombreusuario']  = "";
        $_SESSION['claveacceso']    = "";
        $_SESSION['rol']            = "";
        $_SESSION['fecharegistro']  = "";
        $_SESSION['fechabaja']      = "";
        $_SESSION['login'] = false;
        echo "Error en la contraseña";
      }
    }else {
      //Si el nombre de usuario ingresado es incorrecta
      $_SESSION['idusuario']      = "";
      $_SESSION['apellidos']      = "";
      $_SESSION['nombres']        = "";
      $_SESSION['dni']            = "";
      $_SESSION['email']          = "";
      $_SESSION['telefono']       = "";
      $_SESSION['nombreusuario']  = "";
      $_SESSION['claveacceso']    = "";
      $_SESSION['rol']            = "";
      $_SESSION['fecharegistro']  = "";
      $_SESSION['fechabaja']      = "";
      $_SESSION['login'] = false;
      echo "El nombre de usuario ingresado no existe";
    }
  }

  // CERRAR SESSION
  if ($operacion == 'cerrar-sesion') {
    session_destroy();
    header("Location:../index.php");
  }

  // LISTAREMOS A USUARIOS ACTIVOS
  if ($operacion == 'listarUsuario') {
    # Almacenamos en un dato
    $tabla = $usuario->listarUsuarios();
    if (count($tabla) > 0) {
      # contiene datos que podemos mostrar
      foreach ($tabla as $registro) {
        # Imprimimos
        echo "
          <tr>
          <td>{$registro->idusuario}</td>
          <td>{$registro->nombreusuario}</td>
          <td>{$registro->rol}</td>
          <td>{$registro->fecharegistro}</td>
          <td>{$registro->nombres}</td>
          <td>{$registro->apellidos}</td>
          <td>{$registro->dni}</td>
          <td>{$registro->telefono}</td>
          <td>{$registro->email}</td>
          
          <td><center>
              <button id='btnModificarUsuario' title='Modificar Rol' data-idusuario='{$registro->idusuario}'  type='button' class='btn btn-warning' data-toggle='modal' data-target='#modalModificarUsuario' data-whatever='@mdo'>
              <i class='fas fa-user-edit'></i>
              </button>
              <button id='btnDesabilitarUsuario' title='Desabilitar - Usuario' data-idusuario='{$registro->idusuario}'  type='button' class='btn btn-danger'>
              <i class='fas fa-user-minus'></i>
              </button>
            </center>
          </td>
        </tr>
        ";
      }
    }
  }
  // LISTAR UN DATO DE PERSONAS
  if ($operacion == 'listarOneDatoUsuario'){
    $idusuario = $usuario->listarOneUsuario(["idusuario" => $_GET["idusuario"]]);

    if($idusuario){
        echo json_encode($idusuario[0]);
    }
  }

  // MODIFICAR USUARIO
  if ($operacion == 'modificarUsuario') {
    //Array asociativo con todos los datos
    $datosmodificar = [
      "idusuario"   => $_GET['idusuario'],
      "rol"         => $_GET["rol"]
    ];
      $usuario->modificarUsuario($datosmodificar);
  }

  // INABILITAR A UN USUARIO
  if ($operacion == 'inabilitarUsuario') {
    # Array asociativo con datos
    $datosenviar = [
      "idusuario" => $_GET['idusuario']
    ];
    $usuario->inabilitarUsuario($datosenviar);
  }

  // LISTAREMOS A USUARIOS INACTIVOS
  if ($operacion == 'listarUsuarioInactivo') {
    $tabla = $usuario->listarUsuariosInactivos();
    if (count($tabla) > 0) {
      # contiene datos que podemos mostrar
      foreach ($tabla as $registro) {
        # Imprimimos
        echo "
          <tr>
          <td>{$registro->idusuario}</td>
          <td>{$registro->nombreusuario}</td>
          <td>{$registro->rol}</td>
          <td>{$registro->fecharegistro}</td>
          <td>{$registro->fechabaja}</td>
          <td>{$registro->nombres}</td>
          <td>{$registro->apellidos}</td>
          <td>{$registro->dni}</td>
          <td>{$registro->telefono}</td>
          <td>{$registro->email}</td>
          
          <td><center>
              <button id='btnHabilitarUsuario' title='Habilitar-Usuario' data-idusuario='{$registro->idusuario}'  type='button' class='btn btn-warning'>
              <i class='fas fa-user-plus'></i>
              </button>
            </center>
          </td>
        </tr>
        ";
      }
    }
  }

  // HABILITAREMOS A UN USUARIO QUE ESTE INACTIVO
  if ($operacion == 'habilitarUsuarioInactivo') {
    $datosEnviar = [
      "idusuario"   => $_GET['idusuario']
    ];
      $usuario->habilitarUsuario($datosEnviar);
  }
}
?>
