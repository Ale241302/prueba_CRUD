<?php
include_once '../config/database.php';
include_once '../objects/user.php';
session_start();

if (isset($_SESSION['usuario'])) {

  $database = new Database();
  $db = $database->getConnection();


  $user = new User($db);
  $user->usuario = $_SESSION['usuario'];
  $user->log("Cierre Forzado");

  session_destroy();
  header('Location: ../../login.php');

  exit;
} else {
  exit;
}
