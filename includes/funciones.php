<?php

define('TEMPLATES_URL', __DIR__ . '/templates/');

function incluirTemplate(string $nombre)
{
    include TEMPLATES_URL . "$nombre.php";
}

function debuguear($variable)
{
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}

function estadoAutenticado()
{
    $login = $_COOKIE["login"];

    if ($login == true) {
        header('Location: login.php');
    }
}

function alertas($errores)
{
?>
    <script>
        alertaError('<?php foreach ($errores as $error) {
                            echo $error . '\n';
                        } ?>')
    </script>
<?php
}
