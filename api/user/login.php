<?php

include_once '../config/database.php';
include_once '../objects/user.php';


$database = new Database();
$db = $database->getConnection();
session_start();


$user = new User($db);


if (!isset($_GET['usuario']) || !isset($_GET['password'])) {
    die('Usuario o contraseña no proporcionados.');
}


$user->usuario = $_GET['usuario'];
$user->password = base64_encode($_GET['password']);

$stmt = $user->login();

if ($stmt->rowCount() > 0) {

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt2 = $db->prepare("SELECT rol, estado FROM usuario WHERE usuario = :usuario");
    $stmt2->bindParam(':usuario', $user->usuario);
    $stmt2->execute();

    $resultado = $stmt2->fetch();

    $rol = $resultado['rol'];
    $estado = $resultado['estado'];

    if ($estado == "Activo") {

        $user->log("Inicio de Sesión");
        header('Location: ../../usuarios.php?usuario1=' . urlencode($user->usuario) . '&rol=' . urlencode($rol));
        exit();
    } else {

        echo "<script>alert('El usuario está inactivo.');</script>";
        echo "<script>window.location.href='../../login.php';</script>";
        exit();
    }
} else {

    echo "<script>alert('Usuario o contraseña incorrectos.');</script>";
    echo "<script>window.location.href='../../login.php';</script>";
    exit();
}
