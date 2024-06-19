<?php

require 'funciones.php';
require 'config/database.php';
require 'vendor/autoload.php';

// Definir una conexión a la Base de Datos para todos objetos
$db = conectarDB();
Entidad::setDB($db);