<?php
$conexion = new mysqli("localhost", "root", "", "usuarios");
//Comprobar conexion
if (mysqli_connect_errno()) {
  printf("Fallo la conexion");
} else {
  //printf("Estas conectado");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="./assets/img/1.png" rel="shortcut icon" type="imagen/x-icon">
  <title>
    Usuarios
  </title>
  <meta content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0" name="viewport">
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
  <link rel="stylesheet" href="./assets/CSS/login.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <div class="login-wrap">
    <div class="login-html">
      <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Ingresar</label>
      <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
      <div class="login-form">
        <form class="sign-in-htm" action="./api/user/login.php" method="GET">
          <div class="group">
            <label for="user" class="label">Usuario</label>
            <input id="usuario" name="usuario" type="text" class="input">
          </div>
          <div class="group">
            <label for="pass" class="label">Password</label>
            <input id="password" name="password" type="text" class="input" data-type="password">
          </div>

          <div class="group">
            <input type="submit" class="button" value="Ingresar">
          </div>
          <div class="hr"></div>

        </form>

      </div>
    </div>
  </div>

</body>

</html>