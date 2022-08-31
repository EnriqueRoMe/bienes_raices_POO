<?php  
//Impoortar la base de datos
$db = conectarBD();


$query = "SELECT * FROM propiedades LIMIT ${limite}";
$resultado = mysqli_query($db, $query);


//Consultar

//Obtener Rersultados



?>

<div class="contenedor-anuncios">
            <?php while($propiedad = mysqli_fetch_assoc($resultado)) : ?>
            <div class="anuncio">

            
          
            <img  loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio1">
          
            
            <div class="contenido-anuncio">
                <h3><?php echo $propiedad['titulo']; ?></h3>
                <p><?php echo $propiedad['descripcion']; ?></p>
                <p class="precio"><?php echo $propiedad['precio']; ?></p>

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

                <a class="boton-amarillo-block" href="anuncio.php?id=<?php echo $propiedad['id']; ?>">Ver propiedad</a>
            </div>
            </div>

            <?php endwhile; ?>
        
        </div>

<?php  


//Cerrar la conexion

mysqli_close($db);
?>