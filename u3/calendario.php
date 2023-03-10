<?php

/**
 * @author María Cervilla Alcalde
 * 
 * Dado el mes y año almacenados en variables, escribir un programa que muestre el calendario mensual
 * correspondiente. Marcar el día actual en verde y los festivos en rojo.
 * 
 */

$daysWeek = array("L", "M", "W", "J", "V", "S", "D");
$totalDays = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));;
$monthStart = date('w', strtotime('first day of this month', time())) - 1;
$monthName = date("F", mktime(0, 0, 0, date('m'), 10));
$actualDay = date('j');
$firstDay = 1;
$count = 0;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    <style>
        body {
            font-size: 30px;
            margin: 5px;
            font-family: Roboto;
        }

        .sunday {
            color: red;
        }

        .actualDay {
            color: green;
        }
    </style>
</head>

<body>
    <?php

    echo "<table border=1><caption>$monthName</caption>";
    /** Cabecera */
    for ($i = 0; $i < count($daysWeek); $i++) {
        echo "<th>$daysWeek[$i]</th>";
    }
    echo "</th>";

    //Imprimir huecos 

    echo "<tr>";
    for ($i = 0; $i < $monthStart; $i++) {
        echo "<td></td>";
        $count++;
    }

    // Imprimir días
    for ($i = 1; $i <= $totalDays; $i++) {
        if ($count % 7 == 0) {
            echo "</tr><tr>";
            $count = 0;
            echo "<td>$i</td>";
        } else {
            if ($count % 6 == 0) {
                echo "<td><span class = 'sunday'>$i</span></td>";
            }elseif ($i == $actualDay) {
                echo "<td><span class='actualDay'>$i</span></td>";
            } else {
                echo "<td>$i</td>";
            }
        }
        $count++;
    }


    echo "</table>";
    ?>

</body>

</html>