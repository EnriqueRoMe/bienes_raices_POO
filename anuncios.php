<?php
require 'includes/app.php';
incluirTemplates('header');
?>

<main class="contenedor seccion">
    <section class="seccion contenedor">
        <h2>Casas y Departamentos</h2>

        <?php  
        $limite = 10; //Se puede pasar al include
        include 'includes/templates/anuncios.php';
        ?>
    </section>
</main>

<?php include 'includes/templates/footer.php' ?>