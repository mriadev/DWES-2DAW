<?php 
/**
 * 2. Carga en variables mes y año e indica el número de días del mes. Utiliza la estructura de control switch
 * @author María Cervilla Alcalde
 */

 $month = 3;
 $year = 2022;

    switch($month){
        case 1: case 3: case 5: case 7:case 8:case 10: case 12:
         echo "Tiene 31 días";
         break;
        
        case 4: case 6: case 9: case 11:
            echo "Tiene 30 días";
            break;
        
        case 2:
            if((year%400 == 0 or year%4 == 0) and not(year%100 == 0)){
                echo "Tiene 29 días";
            }else{
                echo "Tiene 28 días";
            }
            break;
        
    }

 ?>