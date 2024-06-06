<?php
include_once '../config/database.php';
include_once '../objects/user.php';
session_start();

if (isset($_GET['usuario'])) {

  $database = new Database();
  $db = $database->getConnection();


  $user = new User($db);
  $user->usuario = $_GET['usuario'];


  session_destroy();


  $user->log("Cerrada Por Inactividad");

  header('Location: ../../login.php');
  exit;
} else {
  header('Location: ../../login.php');
  exit;
}
