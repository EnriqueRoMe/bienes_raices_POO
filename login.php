<?php 
require 'includes/config/conexion.php';
$db = conectarBD();


//Autenticar el usuario
$errores = [];


if($_SERVER['REQUEST_METHOD'] === 'POST'){

  
    $email =mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(!$email){
        $errores[]= "El email es obligatorio o no es valido";
    }
    if(!$password){
        $errores[] = "El password es incorrecto o no es valido";
    }

    if(empty($errores)){
        //Revisar is el usuario existe

        $query = "SELECT * FROM usuarios WHERE email = '${email}'";
        $resultado = mysqli_query($db, $query);

        if($resultado-> num_rows ){//Compribar si hay resultados
            //Revisar si el password es correcto
            $usuario = mysqli_fetch_assoc($resultado);

            //Verificar si el passwors es correcto
            $auth = password_verify($password, $usuario['password']);
            if($auth){
                //El susuario esta autenticado
                session_start();
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login']= true;

               header('Location: /admin');

            }
            else{
                $errores []= "El password es incorrecto";
            }
        }else{
            $errores [] = "El usuario no existe";
        }
    }

  
}



require 'includes/funciones.php';
incluirTemplates('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php foreach($errores as $error):?>
        <div class="alerta error">
        <?php echo $error;?>
        </div>
    <?php endforeach;  ?>

    <form method="POST" class="formulario" novalidate>
    <fieldset>
                <legend>Email y Password</legend>

               

                <label for="email">E-mail</label>
                <input id="email" type="email" placeholder="Tu E-mail" name="email" require>

                <label for="password">Password</label>
                <input id="password" type="password" placeholder="Tu Password" name="password" require>

            </fieldset>

            <input type="submit" class="boton boton-verde" value="Iniciar Sesión">
    </form>
</main>

<?php 
incluirTemplates('footer');
?>