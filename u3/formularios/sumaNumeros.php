<?php

/**
*   2. Suma dos números
*
* @author Maria Cervilla Alcalde
*/
$num1 = 0;
$num2 = 0;
$mensajeError1 = "";
$mensajeError2 = "";

$procesaFormulario = false;

if (isset($_POST['sumar'])) {
    $procesaFormulario = true;
    $num1 = $_POST['numero1'];
    $num2 = $_POST['numero2'];
    if (empty($num1)) {
        $mensajeError1 = "Campo requerido";
        $procesaFormulario = false;
    }
    if (empty($num2)) {
        $mensajeError2 = "Campo requerido";
        $procesaFormulario = false;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Formulario</title>
</head>
<body>
    <?php
        if ($procesaFormulario) {
            echo $num1 + $num2;
        }else{
            ?>
        <form action="" method="post">
        Número 1<input type="text" name="numero1" value="<?php echo $num1;?>"/>
        <?php echo $mensajeError1;?><br/>
        Número 2: <input type="text" name="numero2" value="<?php echo $num2;?>"/>
        <?php echo $mensajeError2?><br/>
        <input type="submit" name="sumar" value="sumar"/>
        </form>
          <?php  
        }
    ?>
   
    
</body>
</html>