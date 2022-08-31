<?php 



 require 'includes/app.php';
 incluirTemplates('header', $inicio = true, $textoh1= true);
?>

    <main class="contenedor seccion">
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
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Departamentos</h2>

        <?php  
        $limite = 3; //Se puede pasar al include
        include 'includes/templates/anuncios.php';
        ?>

        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a class="boton-amarillo" href="contacto.php">Contactános</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpg"> 
                        <img  loading="lazy" src="build/img/blog1.jpg" alt="Texto entrda blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p>Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

                        <p>
                            Consejos para contruir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero
                        </p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpg"> 
                        <img  loading="lazy" src="build/img/blog2.jpg" alt="Texto entrda blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guia para la decoracion de tu hogar </h4>
                        <p>Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

                        <p>Maximiza el espacio en tu hogar con esta hiua, aprnede a combinar muebeles y colores para darle vida a tu espacio</p>
                    </a>
                </div>
            </article>
</section>
            <section class="testimoniales">
                <h3>Testimoniales</h3>
                <div class="testimonial">
                    <blockquote>
                        El personal se comportó de una excelenara forma, muy buena atención y l acasa que me ofrecieron cumple con todas mis expectativas
                    </blockquote>
                    <p>--Enrique Rosas--</p>
                </div>
            
        </section>
    </div>

<?php include 'includes/templates/footer.php' ?>