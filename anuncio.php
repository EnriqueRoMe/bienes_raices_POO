<?php 
require 'includes/app.php';
incluirTemplates('header');
 
//Impoortar la base de datos

$db = conectarBD();

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id){
    header('Location: /');
}

$query = "SELECT * FROM propiedades where id = ${id}";
$resultado = mysqli_query($db, $query);

if($resultado->num_rows === 0){
 header('Location: /');
}
$propiedad = mysqli_fetch_assoc($resultado);

//Consultar

//Obtener Rersultados



?>

    <main class="contenedor seccion texto-centrado">
        <h1><?php echo $propiedad['titulo']; ?></h1>


            <img  loading="lazy" src="imagenes/<?php echo $propiedad['imagen'];?>" alt="Imagen Casa">
        

        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $propiedad['precio']; ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img src="build/img/icono_wc.svg" alt="icono-wc">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>
                <li>
                    <img src="build/img/icono_dormitorio.svg" alt="icono-dormitorio">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
                <li>
                    <img src="build/img/icono_estacionamiento.svg" alt="icono-estacionamiento">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>
            </ul>

            <p><?php echo $propiedad['descripcion']; ?></p>
        </div>
    </main>

    <?php include 'includes/templates/footer.php' ;
    
    mysqli_close($db);?>