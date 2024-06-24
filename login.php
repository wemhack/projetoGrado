<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan de Acción</title>
    <link rel="stylesheet" href="/build/css/app.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/build/js/script.js"></script>
</head>

<body class="login">

<?php

// Archivo maestro 
require 'includes/app.php';

error_reporting(0);

// Conexión a la base de datos
$db = conectarDB();

// Arreglo para almacenar los errores
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Escapar el ingreso de strings
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // Guarda los errores
    if (!$username) {
        $errores[] = 'Usuario Incorrecto';
    }
    if (!$password) {
        $errores[] = 'Contraseña Incorrecta';
    }

    if (empty($errores)) {

        // Verifica si el usuario existe
        $query = " SELECT * FROM usuario WHERE username = '$username'; ";
        $resultado = mysqli_query($db, $query);

        if ($resultado->num_rows) {

            // Revisar si el password es correcto
            $usuario = mysqli_fetch_assoc($resultado);

            if ($password == $usuario['password']) {

                setcookie("usuario", $usuario['username']);
                setcookie("entidad", $usuario['idEntidad']);
                setcookie("login", true);

                header('Location: /index');
            } else {
                $errores[] = 'El password es incorrecto';
                alertas($errores);
            }
        } else {
            $errores[] = 'El usuario no existe';
            alertas($errores);
        }
    }else{
        alertas($errores);
    } 
}

?> 

<div class="formulario">
        <h1>Wellcome</h1>
        <form method="POST">
            <div class="username">
                <input type="text" name="username" id="user" required>
                <label>User Name</label>
            </div>
            <div class="username">
                <input type="password" name="password" id="password" required>
                <label>Password</label>
            </div>
            <div class="remember">¿Forgot your password?</div>
            <input type="submit" value="Login">
            <div class="checkin">
                I want to <a href="#">Register</a>
            </div>
            <script> history.replaceState(null, null, location.pathname) </script>
        </form>
    </div>
</body>

</html>
