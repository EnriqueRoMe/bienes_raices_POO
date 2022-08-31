<?php
function conectarBD() : mysqli{
    $db =  new mysqli('localhost', 'root', 'root', 'bienes_raices');

    if(!$db) {
        echo "Fallo en la conexion";
        exit;
    }
    return $db;
}