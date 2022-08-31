<?php

require '../../includes/app.php';

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;


estaAutenticado();

//Consulta para obtener todos los vendedores
$vendedores = Vendedor::all();




$errores = Propiedad::getErrores();

$propiedad = new Propiedad;



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $propiedad = new Propiedad($_POST['propiedad']);

    //Generar un nombre unico
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    //Comprueba la existencia de la imagen
    if($_FILES['propiedad']['tmp_name']['imagen']){
    //Set a la imagen
    //Realiza un resize a la imagen con intervetion
    $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
    $propiedad->setImagen($nombreImagen);
    }



//Valida
    $errores = $propiedad->validar();

    if (empty($errores)) {

        

    if (!is_dir(CARPETA_IMAGENES)) {
        mkdir(CARPETA_IMAGENES);
    }

        //Guarda la imagen el servidor
        $image->save(CARPETA_IMAGENES . $nombreImagen);
    }

    //Insertar en la base de datos
    $propiedad->guardar();
   
    

    

}

incluirTemplates('header');
?>

<main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form action="/admin/propiedades/crear.php " class="formulario" method="POST" enctype="multipart/form-data">
        
        <?php  include '../../includes/templates/formulario_propiedades.php'; ?>
        
        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>



<?php include '../../includes/templates/footer.php' ?>