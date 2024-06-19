<?php

function conectarDB() : mysqli {
    $db = new mysqli('monorail.proxy.rlwy.net', 'root', 'PksGKRjnydZJQXIOuBCrIMMoijckFzDe', 'railway', 36327);

    if(!$db){
        echo 'Error no se pudo conectar';
        exit;
    }

    return $db;
}