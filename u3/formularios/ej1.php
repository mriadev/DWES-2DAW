<?php

/**
*   1. Crea un formulario html para introducir el nombre y los apellidos de una persona.
*
* @author Maria Cervilla Alcalde
*/


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Formulario</title>
</head>
<body>
    <form action="procesa_formulario1.php" method="get">
    <input type="text" name="nombre"/>
    <input type="text" name="apellidos"/>
    <input type="submit" name="enviar" value="Send"/>

    </form>
</body>
</html>