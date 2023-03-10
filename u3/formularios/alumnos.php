<?php

/**
 * Generación dinámica de formularios 
 * 
 * @author María Cervilla Alcalde
 */

$datosFormulario = array("nombre", "apellidos", "curso");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    echo "<form action='procesa_formulario_alumnos.php' method='post'>";

    foreach ($datosFormulario as $key => $value) {
        echo "<input type='text' name='$value'/>";
    }
    echo "<input type='submit' name='enviar' value='Send'/>";
    echo "</form>";
    ?>
</body>

</html>