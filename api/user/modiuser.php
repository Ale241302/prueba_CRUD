<?php
// Obtener la conexión a la base de datos
include_once '../config/database.php';

// Incluir la clase Capi
include_once '../objects/user.php';

// Crear una instancia de la clase Database
$database = new Database();
$db = $database->getConnection();

// Iniciar sesión
session_start();

// Obtener los valores del formulario y asignarlos a variables
$usuario1 = isset($_GET['usuario1']) ? $_GET['usuario1'] : '';
$rol = isset($_GET['rol']) ? $_GET['rol'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
$usuario2 = isset($_POST['usuario2']) ? $_POST['usuario2'] : '';
$correo = isset($_POST['correo']) ? $_POST['correo'] : '';
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
$password2 = isset($_POST['password']) ? $_POST['password'] : '';
$password =  base64_encode($password2);
// Crear una instancia de la clase Capi
$user = new User($db);

// Start output buffering
ob_start();

// Crear el objeto $data con los valores actualizados
$data = new stdClass();
$data->id = $id;
$data->nombre = $nombre;
$data->apellido = $apellido;
$data->usuario2 = $usuario2;
$data->correo = $correo;
$data->telefono = $telefono;
$data->password = $password;
// Actualizar el registro de capacitación
if ($user->Actualizar($data)) {
  $user->log("Update");
  // Redireccionar a la página "capacitaciones.php" con los parámetros "usuario" y "rol" en la URL
  header('Location: ../../usuarios.php?usuario1=' . urlencode($usuario1) . '&rol=' . urlencode($rol));
  // Enviar el buffer de salida al navegador
  ob_end_flush();
} else {
  echo "error al modificar";
  exit;
}
