<?php

/**
 * @author María Cervilla Alcalde
 * 
 * Dado el mes y año almacenados en variables, escribir un programa que muestre el calendario mensual
 * correspondiente. Marcar el día actual en verde y los festivos en rojo
 * 
 */

$daysWeek = array("L", "M", "W", "J", "V", "S", "D");
$actualDay = date('j');
$actualMonth = 2;//date('m');
$actualYear = 2020;//date('Y');
$monthName = date("F", mktime(0, 0, 0, $actualMonth, 10));
$totalDays = cal_days_in_month(CAL_GREGORIAN, $actualMonth, $actualYear);
$monthStart = date("w", mktime(0, 0, 0, $actualMonth, 1, $actualYear))-1;
$firstDay = 1;
$count = 0;



$festivities = array(
    "nationals"=> array(
        array("day"=>1, "month"=>1),
        array("day"=>6, "month"=>1),
        array("day"=>2, "month"=>5),
        array("day"=>15, "month"=>8),
        array("day"=>12, "month"=>10),
        array("day"=>1, "month"=>11),
        array("day"=>6, "month"=>12),
        array("day"=>8, "month"=>12),
        array("day"=>25, "month"=>12)
    ),
    "communities" => array(
        array("day"=>28, "month"=>2),
    ),

    "locals" => array(
        array("day"=>8, "month"=>9),
        array("day"=>15, "month"=>9),
        array("day"=>24, "month"=>10)


    )

);

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

        .localFestivity{
            color:brown;
        }

        .communityFestivity{
            color:green;
        }

        .nationalFestivity{
            color:yellow;
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
        
        

        if ($i == $actualDay) {
            echo "<td><span class='actualDay'>$i</span></td>";

        }elseif ($count == 6) {
            echo "<td><span class='sunday'>$i</span></td>";
        }
        else{
            foreach ($festivities as $key => $value) {
                foreach ($value as $key2 => $value2) {
                    
                    
                    switch ($key) {
                        case 'nationals':
                            if ($value2["day"]==$i and $value2["month"]==$actualMonth) {
                                echo "<td><span class='nationalFestivity'>$i</span></td>";
                                $i++;
                                $count++;
                                
                            }
                        break;
                        case 'communities':
                            if ($value2["day"]==$i and $value2["month"]==$actualMonth) {
                                echo "<td><span class='communityFestivity'>$i</span></td>";
                                $i++;
                                $count++;
                            }
                        break;
                        case 'locals':
                            if ($value2["day"]==$i and $value2["month"]==$actualMonth) {
                                echo "<td><span class='localFestivity'>$i</span></td>";
                                $i++;
                                $count++; 
                            }
                        break;
    
            
                    }
                }
            }
            echo "<td>$i</td>";
        }

              
   $count++;
        
    //Cambiar de fila
        if ($count % 7 == 0) {
            
            echo "</tr><tr>";
            $count = 0;
        } 

    }

    echo "</table>";
    ?>

</body>

</html>