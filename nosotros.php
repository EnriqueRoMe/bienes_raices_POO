<?php 
require 'includes/app.php';
incluirTemplates('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">

            
            <picture>
                <source srcset="build/img/blog3.jpg" type="image/jpg">
                <source srcset="build/img/blog3.webp" type="image/webp">
                <img loading="lazy" src="build/img/blog3.webp" alt="Imagen nosotros">
            </picture>
        </div>

            <div class="texto-nosotros">
                <blockquote>25 Años de Experiencia</blockquote>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed accumsan lacus euismod, efficitur nisi ac, scelerisque ante. Vivamus ullamcorper condimentum eros, a pellentesque turpis dignissim non. Curabitur gravida turpis a feugiat vehicula. Phasellus tincidunt varius aliquet. Nam id dolor sit amet magna vehicula mollis. Sed ut imperdiet velit. Integer blandit vestibulum odio nec consectetur. Aenean varius mauris non sem convallis, ac condimentum nunc tincidunt. Donec dapibus at nunc at semper. Quisque a odio in ante vestibulum elementum nec eget felis. Aliquam a est vitae lectus sagittis vestibulum. Pellentesque luctus commodo tellus, ut interdum libero semper in.

                    </p>
            </div>
        </div>

    </main>
    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="icono-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi rem blanditiis atque cupiditate illum, ipsa et harum dolorem! Excepturi nesciunt amet iure dolores itaque veniam animi distinctio dignissimos illum libero!</p>
            </div>

            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi rem blanditiis atque cupiditate illum, ipsa et harum dolorem! Excepturi nesciunt amet iure dolores itaque veniam animi distinctio dignissimos illum libero!</p>
            </div>

            <div class="icono">
                <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi rem blanditiis atque cupiditate illum, ipsa et harum dolorem! Excepturi nesciunt amet iure dolores itaque veniam animi distinctio dignissimos illum libero!</p>
            </div>
        </div>
    </section>

    <?php include 'includes/templates/footer.php' ?><