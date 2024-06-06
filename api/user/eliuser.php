<?php
include_once '../config/database.php';
include_once '../objects/user.php';


$database = new Database();
$db = $database->getConnection();


$user = new User($db);

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'DELETE') {

  $data = json_decode(file_get_contents("php://input"));

  if (isset($data->id)) {
    $id = $data->id;

    if ($user->eliminar($id)) {
      http_response_code(200);
      echo json_encode(array("message" => "Usuario eliminado con éxito."));
    } else {
      http_response_code(503);
      echo json_encode(array("message" => "No se pudo eliminar el usuario."));
    }
  } else {
    http_response_code(400);
    echo json_encode(array("message" => "Datos incompletos."));
  }
}

if ($method == 'POST') {

  $data = json_decode(file_get_contents("php://input"));

  if (isset($data->id) && isset($data->action)) {
    $id = $data->id;
    $action = $data->action;

    if ($action === 'inactivar') {
      if ($user->inactivar($id)) {
        http_response_code(200);
        echo json_encode(array("message" => "Usuario inactivado con éxito."));
      } else {
        http_response_code(503);
        echo json_encode(array("message" => "No se pudo inactivar el usuario."));
      }
    } elseif ($action === 'activar') {
      if ($user->activar($id)) {
        http_response_code(200);
        echo json_encode(array("message" => "Usuario activado con éxito."));
      } else {
        http_response_code(503);
        echo json_encode(array("message" => "No se pudo activar el usuario."));
      }
    } else {
      http_response_code(400);
      echo json_encode(array("message" => "Acción no válida."));
    }
  } else {
    http_response_code(400);
    echo json_encode(array("message" => "Datos incompletos."));
  }
}
