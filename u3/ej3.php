<?php 
/**
 * 3. Carga fecha de nacimiento en variables y calcula la edad.
 * @author María Cervilla Alcalde
 */

 $actualDate =  new DateTime(date("Y-m-d"));
 $dateOfBirth = new DateTime("1998-09-14");

 $between = $actualDate->diff($dateOfBirth);

echo "Tines ",$between->format("%y")," años.";

 ?>