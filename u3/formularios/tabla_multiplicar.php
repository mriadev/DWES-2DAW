<?php

/**
 * Tablas de multiplicar del 1 al 10 con huecos aleatorios
 * @author María Cervilla Alcalde
 */


$n = 10;
$m = 10;
$isImput = false;

$empty=[];

$errorMessage = "";
$result = 0;


$row;
$column;
$procesaFormulario = false;

if (isset($_POST['multiplicar'])) {
    $procesaFormulario = true;
    $empty = $_POST['n'];
    foreach ($_POST['n'] as $key => $value) {

        foreach ($value as $key2 => $value2) {
            if ($key *$key2 != $value2) {
                $errorMessage = "*";
            } 
        }
    }
}


if (!$procesaFormulario) {
    //Generamos inputs aleatorios
    for ($i = 0; $i < 5; $i++) {
        do {
            $row = rand(1, 10);
            $column = rand(1, 10);
            $arrayRandom = array(['row' => $row, 'column' => $column]);
        } while (array_search($empty, $arrayRandom));
        array_push($empty, $arrayRandom);
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tabla_multiplicar.css">
    <title>Tabla Multiplicar</title>
</head>

<body>

    <?php

    echo "<form action='' method='post'><table border=1>";
    echo "<tr><th></th>";
    for ($i = 1; $i <= $n; $i++) {
        echo "<th>$i</th>";
    }
    echo "</tr>";

    for ($i = 1; $i <= $n; $i++) { //Filas
        echo "<tr>";
        echo "<th>$i</th>";
        for ($x = 1; $x <= $m; $x++) { //Columnas
            // Recorro fila y columna aleatoria
            foreach ($empty as $key => $value) {
                foreach ($value as $key2 => $value2) {
                    if (!$procesaFormulario) {
                        if (($value2['row'] == $i) and ($value2['column'] == $x)) {

                            echo "<td> 
                                <input type='text' name='n[$i][$x]' value='' >
                                $errorMessage</td>";
                            $isImput = true;
                        }
                    }else{
                        if (($key == $i) and ($key2 == $x)) {
                            if (($key*$key2) == $value2) {
                                echo "<td> 
                                <input type='text' name='n[$i][$x]' value='$value2' >
                                </td>";

                                $result++;
                                
                            }else{
                                echo "<td> 
                                <input type='text' name='n[$i][$x]' value='' >
                                $errorMessage</td>";
                            }
                            $isImput = true;
                        }   
                            
                    }

                }
            }


            if (!$isImput) {
                echo "<td>", ($i * $x), "</td>";
            } else {
                $isImput = false;
            }
        }
        echo "</tr>";
    }


    echo "</table>
        <input type='submit' name='multiplicar' value='Multiplicar'/>
        </form>";


    
    if ($procesaFormulario) {
        if ($result == 5) {
            echo "¡ENHORABUENA! Todas las respuestas son correctas.";
        }else{
            echo "<span>Has obtenido $result/5 respuestas correctas</span>";
        }
        
    }




    ?>
</body>

</html>