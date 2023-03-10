<?php
/**
 * Creación y recorrido de un array.
 * @author Gontzal García Triviño
 */
$contactos = array(
    array("id"=>1,"nombre"=>"Mafalda","telefono"=>"666123123"),
    array("id"=>2,"nombre"=>"Manolito","telefono"=>"667422100"),
    array("id"=>3,"nombre"=>"Felipe","telefono"=>"668234233")
);
foreach($contactos as $clave=>$valor){
    foreach($valor as $clave2=>$valor2){
        echo "$clave2: $valor2 ";
    }
    echo "<br>";
}

foreach($contactos as $clave=>$valor){
    
    echo $valor["id"]." ".$valor["nombre"]." ".$valor["telefono"]." <br/>";
}


foreach($contactos as $clave=>$valor){
    
    echo $clave."</br>";
}

$contactos[0][0] = ["id"=>2,"nombre"=>"Manolito","telefono"=>"667422100"];

?>