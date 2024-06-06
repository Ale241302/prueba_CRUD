<?php
include_once '../config/database.php';
include_once '../objects/user.php';
session_start();

if (isset($_SESSION['usuario'])) {

  $database = new Database();
  $db = $database->getConnection();


  $user = new User($db);
  $user->usuario = $_SESSION['usuario'];

  $user->log("Usuario Sin Red");
  exit;
} else {
  exit;
}
?>
?>