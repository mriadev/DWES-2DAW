<?php 

include('lib/function.php');
include('config/config.php');


$db = conectaDB();

$select = 'SELECT * FROM equipos';
$resultado = $db -> query($select);

$delete = 'DELETE FROM equipos';
$resultado = $db -> query($delete);

$insert = "INSERT INTO `equipos` (`id`, `equipo`) VALUES (NULL, 'Pokemon'), (NULL, 'Legendarios') ";
$resultado = $db -> query($insert);

$resultado = $db -> query($select);

foreach ($resultado as $value) {
   echo $value['equipo'].'</br>';
}
?>