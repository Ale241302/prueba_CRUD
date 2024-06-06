<?php
include_once '../config/database.php';
include_once '../objects/user.php';

// Inicializar la conexión a la base de datos
$database = new Database();
$db = $database->getConnection();

// Inicializar el objeto de usuario
$user = new User($db);

// Comenzar la sesión si aún no se ha iniciado
session_start();
$usuario1 = $_GET['usuario1'];
$rol = $_GET['rol'];
// Recibir los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario2 = $_POST['usuario2'];
$password = $_POST['password'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$rol2 = '2';

// Establecer los valores del objeto de usuario
$user->nombre = $nombre;
$user->apellido = $apellido;
$user->usuario = $usuario2;
$user->correo = $correo;
$user->telefono = $telefono;
$user->rol = $rol2;
$user->password = base64_encode($_POST['password']);
$user->estado = "Activo";
ob_start();
// Intentar registrar al usuario en la base de datos
if ($user->signup()) {
    // Registro exitoso
    $user->log("Creacion de Usuario");
    // Redireccionar a donde sea necesario
    header('Location: ../../usuarios.php?usuario1=' . urlencode($usuario1) . '&rol=' . urlencode($rol));
    exit;
} else {
    // Error en el registro
    echo "Error en el registro";
    exit;
}
