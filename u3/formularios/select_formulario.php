<?php

/**
 * Generación dinámica de formularios 
 * 
 * @author María Cervilla Alcalde
 */

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
   <!--    <form action="procesar_select.php" method="post">
    <select name="select">
    <option value="value1">Value 1</option>
    <option value="value2" selected>Value 2</option>
    <option value="value3">Value 3</option>
    </select>
    <input type='submit' name='enviar' value='Send'/>
    </form>
 -->
    <form action="procesar_select.php" method="post">

            <input name="input1" type="checkbox" id="cbox1" value="first_checkbox"> Este es mi primer checkbox<br>
        <input name="input2" type="checkbox" id="cbox2" value="second_checkbox"> Este es mi segundo checkbox
        <input name="input3" type='submit' name='enviar' value='Send' />
    </form>




</body>

</html>