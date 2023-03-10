<?php

/**
 * 3. Crea un formulario de login que permita al usuario recordar los datos introducidos. Incluye una
 * opción para borrar la información almacenada.
 * 
 * @author María Cervilla Alcalde
 */

$validar = false;
$user = "";
$password = "";

if (isset($_COOKIE['user'])) {
    $user = $_COOKIE['user'];
    $password = $_COOKIE['password'];
}


if (isset($_POST['send'])) {
    
    //Si usuario  y contraseña son correctos    
    if ($_POST['user'] == "usuario" and $_POST['password'] == 1234) {
        $user = $_POST['user'];
        $password = $_POST['password'];
        $validar = true;

        //Si el usuario quiere recordar sus datos
        if (isset($_POST['remember'])){
            setcookie('user', $user, time() + 60 * 60 * 24 * 30);
            setcookie('password', $password, time() + 60 * 60 * 24 * 30);
        }
        
        
    }else{
        setcookie('user', $user, time() - 3600);
        setcookie('password', $password, time() - 3600);
        $user = "";
        $password = "";
    }

    
    
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>

<body>
    <?php
    if ($validar) {
        echo "<p>Acceso autorizado</p>";
    } else {
    ?>
        <form action="" method="post">
            <span>Usuario</span><input type="text" name="user" value="<?php echo $user ?>">
            <span>Contraseña</span><input type="password" name="password" value="<?php echo $password ?>"><br/>
            <span>Recordar</span><input type="checkbox" name="remember" value="Recordar" ><br/>
            <input type="submit" name="send" value="Enviar">
        </form>
    <?php
    }
    ?>





</body>

</html>