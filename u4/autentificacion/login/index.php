<?php
/**
 * @author María Cervilla Alcalde
 */


 
//Como hay que trabjar con sessiones la iniciamos
 session_start();


 //Sii no se ha creado la sesión perfil
 if (!isset($_SESSION['perfil'])) {
    $_SESSION['perfil'] = "invitado";
    $_SESSION['user'] = [];

 }


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div>
        <h1>Ejercicio Login</h1>
        <?php
            if ($_SESSION['perfil'] == 'invitado') {
                include('include/login_form.php');
                echo "¿No tienes cuenta? <a href='registro.php'>Registrate</a>";
            }
            else{
                echo 'Estás registrado como '.$_SESSION['perfil'];
                echo "<a href='salir.php'>Salir</a>";
            }
        
        ?>
    </div>
    <div></div>
    <div></div>
</body>
</html>

