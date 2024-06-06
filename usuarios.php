<?php

$usuario1 = $_GET['usuario1'];
$rol = $_GET['rol'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gestion de Usuarios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./assets/img/1.png" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/styletable.css" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <script>
        const usuario = "<?php echo $usuario1; ?>";
    </script>
    <script defer src="assets/js/script.js"></script>
</head>
<header class="header">
    <nav class="nav">
        <button class="nav-toggle" aria-label="Abrir menú">
            <i class="fas fa-bars"></i>
        </button>
        <ul class="nav-menu">
            <li class="nav-menu-item">
                <a href="#" class="nav-menu-link nav-link" id="ff"></a>
            </li>
            <li class="nav-menu-item">
                <a href="usuarios.php?usuario1=<?php echo $usuario1; ?>&rol=<?php echo $rol; ?>" class="nav-menu-link nav-link " id="ff">Gestion de usuarios</a>
            </li>
            <li class="nav-menu-item">
                <a href="./api/user/cerrar.php?usuario=<?php echo $usuario1; ?>&metodo=get" class="nav-menu-link nav-link nav-menu-link_active" id="ff">Cerrar Sesion</a>
            </li>
        </ul>
    </nav>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/index.js"></script>
</header>
<div class="tablap">
    <table class="table">
        <thead>
            <p align="center">Gestion de Usuarios</p>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>No Telefonico</th>
                <?php
                if ($rol != 1) {
                    echo '<th colspan="2">Opciones</th>';
                    echo '<th colspan="2">Baja</th>';
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            // include database and object files
            include_once './api/config/database.php';
            include_once './api/objects/user.php';

            // get database connection
            $database = new Database();
            $db = $database->getConnection();
            session_start();

            // prepare user object
            $user = new User($db);
            $jsonData = $user->listar();
            $decodedData = json_decode($jsonData, true);

            // Check if JSON data is properly decoded
            if (json_last_error() === JSON_ERROR_NONE) {
                foreach ($decodedData as $r) {
                    echo '<tr>';
                    echo '<td>' . $r['id'] . '</td>';
                    echo '<td>' . $r['nombre'] . '</td>';
                    echo '<td>' . $r['apellido'] . '</td>';
                    echo '<td>' . $r['usuario'] . '</td>';
                    echo '<td>' . $r['correo'] . '</td>';
                    echo '<td>' . $r['telefono'] . '</td>';
                    if ($rol != 1) {
                        echo '<td id="pupu"><a href="modiuser.php?usuario1=' . $usuario1 . '&rol=' . $rol . '&id=' . $r['id'] . '"><button type="button" class="boton2">Modificar</button></a></td>';
                        echo '<td id="pupu"><button type="button" class="boton2" onclick="deleteContact(' . $r['id'] . ')">Eliminar</button></td>';
                        if ($r['estado'] == "Activo") {
                            echo '<td id="pupu"><button type="button" class="boton2" onclick="inactivar(' . $r['id'] . ')">Inactivar</button></td>';
                        } else {
                            echo '<td id="pupu"><button type="button" class="boton2" onclick="activar(' . $r['id'] . ')">Activar</button></td>';
                        }
                    }
                    echo '</tr>';
                }
            } else {
                echo 'JSON Decoding Error: ' . json_last_error_msg();
            }
            ?>
        </tbody>
    </table>
    <?php
    if ($rol != 1) {
        echo '<a href="regiuser.php?usuario1=' . urlencode($usuario1) . '&rol=' . urlencode($rol) . '" id="aa"><button type="button" class="boton">Agregar Usuario</button></a>';
    }
    ?>
    <script>
        function deleteContact(id) {
            if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState === 4) {
                        if (this.status === 200) {
                            alert('Usuario eliminado con éxito');
                            location.reload();
                        } else {
                            alert('Error al eliminar el usuario. Status: ' + this.status);
                            console.error('Error Response:', this.responseText);
                        }
                    }
                };
                xhttp.open("DELETE", `./api/user/eliuser.php`, true);
                xhttp.setRequestHeader('Content-Type', 'application/json');
                xhttp.send(JSON.stringify({
                    id: id
                }));
            }
        }

        function inactivar(id) {
            if (confirm('¿Estás seguro de que deseas inactivar este usuario?')) {
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState === 4) {
                        if (this.status === 200) {
                            alert('Usuario inactivado con éxito');
                            location.reload();
                        } else {
                            alert('Error al inactivar el usuario. Status: ' + this.status);
                            console.error('Error Response:', this.responseText);
                        }
                    }
                };
                xhttp.open("POST", `./api/user/eliuser.php`, true);
                xhttp.setRequestHeader('Content-Type', 'application/json');
                xhttp.send(JSON.stringify({
                    id: id,
                    action: 'inactivar'
                }));
            }
        }

        function activar(id) {
            if (confirm('¿Estás seguro de que deseas activar este usuario?')) {
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState === 4) {
                        if (this.status === 200) {
                            alert('Usuario activado con éxito');
                            location.reload();
                        } else {
                            alert('Error al activar el usuario. Status: ' + this.status);
                            console.error('Error Response:', this.responseText);
                        }
                    }
                };
                xhttp.open("POST", `./api/user/eliuser.php`, true);
                xhttp.setRequestHeader('Content-Type', 'application/json');
                xhttp.send(JSON.stringify({
                    id: id,
                    action: 'activar'
                }));
            }
        }
    </script>

</div>
</body>

</html>