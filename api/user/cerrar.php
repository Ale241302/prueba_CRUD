<?php
session_start();
include_once '../config/database.php';
include_once '../objects/user.php';
if (isset($_GET['usuario'])) {
  $database = new Database();
  $db = $database->getConnection();
  $user = new User($db);
  $user->usuario = $_GET['usuario'];
  $user->log("Cierre de sesión");
  session_destroy();
  header('Location: ../../login.php');
  exit;
} else {
  header('Location: ../../login.php');
  exit;
}
?>
