<?php 

function conectarDB(){
    try {
   
        $db = new PDO('mysql:host='.HOST.';dbname='.DB,USER,PASSWORD);
        $db -> setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,true);
        $db -> setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND,'SET NAMES utf8');
        return($db);
    } catch (PDOException $e) {
       echo "Error conexión";
       exit();
    }
    
    
}


function getAll($db){
$sql = "SELECT * FROM `equipos`";
$query = $db->prepare($sql);
$query->execute();
return $query-> fetchAll();
}


function getEquipo($db,$search){
    $sql = "SELECT equipo FROM `equipos` WHERE `equipo` LIKE :equipo";
    $prepareSQL = $db->prepare($sql);
    $prepareSQL->execute(array(":equipo"=>'%'.$search.'%'));
    return $prepareSQL -> fetchAll();

    }

function getEquipoById($db,$id){
    $sql = "SELECT * FROM `equipos` WHERE `id` LIKE :id";
    $prepareSQL = $db->prepare($sql);
    $prepareSQL->execute(array(":id"=>$id));
    return $prepareSQL -> fetchAll();
}

function addEquipo($db,$newEquipo){
    $sql = "INSERT INTO `equipos` (equipo) VALUES (:equipo)";
    $prepareSQL = $db->prepare($sql);
    $prepareSQL->execute(array(":equipo"=>$newEquipo));
    return;

}

function editEquipo($db,$data){
    for ($i=0; $i < count($data); $i++) { 
        $id = $data['id'];
        $newName= $data['name'];
             $sql = "UPDATE `equipos` SET `equipo`=:equipo WHERE `id` = :id";
             $prepareSQL = $db->prepare($sql);
             $prepareSQL->execute(array(":id"=>$id,":equipo"=>$newName));
    }
    return;
}

function deleteEquipo($db,$id){
    $sql = "DELETE FROM `equipos` WHERE `id`= :id";
    $prepareSQL = $db->prepare($sql);
    $prepareSQL->execute(array(":id"=>$id));
    return;
}

?>