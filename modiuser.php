<?php
$conexion = new mysqli("localhost", "root", "", "usuarios");
// Comprobar conexión
if (mysqli_connect_errno()) {
    printf("Fallo la conexión");
} else {
    // printf("Estás conectado");
}
session_start();
$usuario1 = $_GET['usuario1'];
$rol =  $_GET['rol'];
$id = $_GET['id'];
$sql = "SELECT nombre, apellido, password2, usuario, correo, telefono FROM usuario WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($nombre, $apellido, $password2, $usuario2, $correo, $telefono);
$stmt->fetch();
$stmt->close();
$password = base64_decode($password2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="./assets/img/1.png" rel="shortcut icon" type="imagen/x-icon">
    <title>MODIFICAR CAPACITACIONES</title>
    <meta content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0" name="viewport">
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
    <link rel="stylesheet" href="./assets/CSS/login.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./assets/js/script.js"></script>
</head>

<body>
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Modificar</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
            <div class="login-form">
                <form class="sign-in-htm" action="./api/user/modiuser.php?usuario1=<?php echo $usuario1; ?>&rol=<?php echo $rol; ?>&id=<?php echo $id; ?>" method="POST" onsubmit="return validateForm()">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="group">
                        <label for="user" class="label">Nombre</label>
                        <input id="nombre" name="nombre" type="text" class="input " value="<?php echo $nombre; ?>" required>
                    </div>
                    <div class="group">
                        <label for="user" class="label">Apellido</label>
                        <input id="apellido" name="apellido" type="text" class="input" value="<?php echo $apellido; ?>" required>
                    </div>
                    <div class="group">
                        <label for="user" class="label">Usuario</label>
                        <input id="usuario2" name="usuario2" type="text" class="input" value="<?php echo $usuario2; ?>" required>
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="password" name="password" type="text" class="input" type="text" value="<?php echo $password; ?>" required>
                    </div>

                    <div class="group">
                        <label for="user" class="label">Correo Eletronico</label>
                        <input id="correo" name="correo" type="text" class="input" value="<?php echo $correo; ?>" required>
                    </div>
                    <div class="group">
                        <label for="user" class="label">Telefono</label>
                        <input id="telefono" name="telefono" type="text" class="input" value="<?php echo $telefono; ?>" required>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Modificar">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                    </div>
                </form>

            </div>
        </div>
        <script src="assets/js/fecha.js"></script>
        <script>
            function validateForm() {
                // Obtener el valor del campo de correo electrónico
                var correo = document.getElementById('correo').value;
                // Expresión regular para validar el formato de correo electrónico
                var correoRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                // Validar si el correo electrónico tiene un formato válido
                if (!correoRegex.test(correo)) {
                    // Mostrar un mensaje de error
                    alert("Por favor, ingrese un correo electrónico válido.");
                    // Devolver falso para evitar el envío del formulario
                    return false;
                }
                // Devolver verdadero si todos los campos son válidos
                return true;
            }
        </script>
    </div>
</body>

</html>