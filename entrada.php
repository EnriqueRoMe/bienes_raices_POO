<?php 
require 'includes/funciones.php';
incluirTemplates('header');
?>

    <main class="contenedor seccion texto-centrado">
        <h1>Guia para la decoracion de tu hogar</h1>

        <p class="informacion-meta">Escrito el <span>20/10/10</span>por: <span>Enrique Rosas</span></p>
        <picture>
            <source srcset="build/img/destacada2.webp" type=image/webp>
            <source srcset="build/img/destacada2.jpg" type=image/jpg>
            <img  loading="lazy" src="build/img/destacada2.jpg" alt="Imagen Casa">
        </picture>

        <div class="resumen-propiedad">
            
            

            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Possimus nesciunt praesentium cum sunt veritatis quo repellendus ab ut suscipit tempora consequuntur, nobis vero expedita autem, illum hic ipsum dolorum asperiores.</p>
        </div>
    </main>

    <?php include 'includes/templates/footer.php' ?>