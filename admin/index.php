<?php
require '../includes/app.php';
$auth = estaAutenticado();
use App\Propiedad;
use App\Vendedor;

//Implementar un metodo para obtener todas la propiedades
$propiedades = Propiedad::all();
$vendedor = Vendedor::all();


//Muestra Mensaje condicional
$resultado = $_GET['resultado'] ?? null;

//Sentencia para eliminar

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    

    if ($id) {

        $propiedad = Propiedad::find($id);

        $propiedad->eliminar();

        
    }
}

//Incluye el template

incluirTemplates('header');
?>

<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>
    <?php if (intval($resultado) === 1) : ?>
        <p class="alerta correcto">Registro Realizado Correctamente</p>
    <?php elseif (intval($resultado) === 2) : ?>
        <p class="alerta correcto">Registro Actualizado Correctamente</p>
    <?php elseif (intval($resultado) === 3) : ?>
        <p class="alerta correcto">Registro Eliminado Correctamente</p>
    <?php endif; ?>


    <a href="admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>


    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <!-- Mostar los resultados-->
            <?php foreach($propiedades as $propiedad) : ?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td> <img class="imagen-tabla" src="../imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen"></td>
                    <td><?php echo '$' . $propiedad->precio; ?></td>
                    <td>
                        <form class="w-100" method="POST">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="submit" class="boton-rojo-chico" value="Eliminar">
                        </form>
                        <a class="boton-amarillo-chico" href="admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>">Actualizar</a>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>



</main>



<?php

mysqli_close($db);

incluirTemplates('footer'); ?>