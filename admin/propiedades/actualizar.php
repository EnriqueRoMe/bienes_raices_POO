<?php

use APP\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;

require '../../includes/app.php';
estaAutenticado();



//Validar que sea un id valido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT); //Validar que el id es de tipo entero

if (!$id) {  //Si el id no es correcto nos retorna al menu
    header('Location: /admin');
}


//Obtener los datos de las propiedades
$propiedad = Propiedad::find($id);



$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

$errores = Propiedad::getErrores();




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Asigna los atributos
    $args = $_POST['propiedad']; //todos los name tienen propiedad[atributo]
    $propiedad->sincronizar($args);
    //Validacion
    $errores = $propiedad->validar();

    //Subida de archivos
    //Generar un nombre unico
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        //Set a la imagen
        //Realiza un resize a la imagen con intervetion
        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
        $propiedad->setImagen($nombreImagen);
    }



    if (empty($errores)) {
        //Alamcenar la imagen
        $image->save(CARPETA_IMAGENES . $nombreImagen);

        $propiedad->guardar();
        
    }


}


incluirTemplates('header');
?>

<main class="contenedor seccion">
    <h1>Actualizar Propiedad</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">

        <?php include '../../includes/templates/formulario_propiedades.php'; ?>
        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>
</main>



<?php include '../../includes/templates/footer.php' ?>