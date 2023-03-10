<?php

/**
 * 8. Tablas de multiplicar del 1 al 10. Aplicar estilos en filas/columnas
 * @author María Cervilla Alcalde
 */

$n = 10;
$m = 10;

echo "<table border=1>";
echo"<tr><th></th>";
for ($i=1; $i <= $n; $i++) { 
    echo "<th>$i</th>";
}
echo"</tr>";

for ($i = 1; $i <= $n; $i++) {
    echo "<tr>";
    echo "<th>$i</th>";
    for ($x = 1; $x <= $m; $x++) {
        echo "<td>", $i * $x, "</td>";
    }
    echo "</tr>";
}

echo "</table>";

?>
