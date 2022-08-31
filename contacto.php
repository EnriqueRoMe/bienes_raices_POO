<?php 
require 'includes/funciones.php';
incluirTemplates('header');
?>

    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpg">
            <img  loading="lazy" src="build/img/destacada3.jpg" alt="Imagen destacada">
        </picture>

        <h2>LLene el formulario de Contacto</h2>

        <form class="formulario" action="">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre</label>
                <input id="nombre" type="text" placeholder="Tu nombre">

                <label for="email">E-mail</label>
                <input id="email" type="email" placeholder="Tu E-mail">

                <label for="telefono">Teléfono</label>
                <input id="telefono" type="tel" placeholder="Tu teléfono">

                <label for="mensaje">Mensaje</label>
                <textarea name="menaje" id="mensaje" placeholder="Escribe el mensaje"></textarea>

            </fieldset>

            <fieldset>
                <legend>Información sobre la Propiedad</legend>

                <label for="opciones">Vende o Compra</label>
                <select name="opciones" id="opciones">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="compra">Compra</option>
                    <option value="vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o presupuesto</label>
                <input id="presupuesto" type="number" placeholder="Tu precio o presupuesto">
            </fieldset>


            <fieldset>
                <legend>Contacto</legend>

                <p>Como desea ser contactado</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input type="radio" name="contacto" id="contactar-telefono">

                    <label for="contactar-email">E-mail</label>
                    <input type="radio" name="contacto" id="contactar-email">

                    
                </div>

                <p>Si eligio telefono eliga la fecha y hora para ser contactado</p>
                <label for="fecha">Fecha</label>
                <input id="fecha" type="date" >

                <label for="hora">Hora</label>
                <input id="hora" type="time" min="09:00" max="16:00">
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>

    <?php include 'includes/templates/footer.php' ?>