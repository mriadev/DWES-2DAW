<?php
/**
 * @version ${1:1.0.0
 * @author María Cervilla alcalde
 */

$file = fopen("data/poema.txt","r");

while (!feof($file)) {
   $line = fgets($file)."<br/>";
   strtoupper($line);
}

fclose($file)
?>