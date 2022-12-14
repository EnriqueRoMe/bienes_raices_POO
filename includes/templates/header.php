<?php  

 
if(!isset($_SESSION)){
    session_start();
}
//Validar en caso de que este autenticado se le asigna la sesion en caso de que no se asigna como vacio
$auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>
    <header class="header <?php  echo $inicio ? 'inicio' : '' ;?>">
        <div class="contenedor contenido-header">

            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Icono menu">
                </div>

                <nav class="navegacion">
                    <a href="nosotros.php">Nosotros</a>
                    <a href="anuncios.php">Anuncios</a>
                    <a href="blog.php">Blog</a>
                    <a href="contacto.php">Contacto</a>
                    <?php if($auth): ?>
                        <a href="cerrar-sesion.php">Cerrar Sesión</a>
                    <?php endif; ?>
                </nav>
            </div>
            <?php  
            $textoh1;
            echo ($textoh1) ? '<h1>Venta de Casas y Departamentos de lujo</h1>' : '' ;?>
        </div>
    </header>