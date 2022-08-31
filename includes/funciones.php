<?php

declare(strict_types=1);

define('TEMPLATES_URL', __DIR__.'/templates');
define('FUNCIONES_URL', __DIR__.'funciones.php');
define('CARPETA_IMAGENES' , __DIR__ .'../../imagenes/');


function incluirTemplates(string $nombre, bool $inicio = false, bool $textoh1 = false)
{
    include TEMPLATES_URL . "/${nombre}.php";
}

function estaAutenticado(): bool
{
    session_start();

    if (!$_SESSION['login']) {
        header('Location: /');
    }
    return false;
}


function debuguear($variable){
    echo "<pre>";
    echo var_dump($variable);
    echo "<pre>";


}
//Escapa el HTML
function s($html): string{
$s = htmlspecialchars($html);
return $s;
}