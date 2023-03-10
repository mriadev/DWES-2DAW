<?php
/**
* Determinar si dos coordenadas están en un array
*/

function existeCoordenada($fila,$columna,$array):bool
{
$lExiste = false;
foreach ($array as $clave => $valor) {
    if (($valor['f'] == $fila) and ($valor['c'] == $columna)) {
        $lExiste = true;
    }
}
return $lExiste;
}
?>

