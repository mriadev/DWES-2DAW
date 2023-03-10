<?php

/**
 * 
 * @author María Cervilla Alcalde
 */

include('config/config.php');

$images = [];

if (isset($_POST['send'])) {
    var_dump($_FILES);
    $tmp = explode('.', $_FILES['file']['name']); //array con las partes del nombre
    $ext = end($tmp); //elemento final del array

    if (($_FILES['file']['size'] > MAXSIZE) and (in_array($_FILES['file']['type'], $formats))
        and (in_array($ext, $extensions))
    ) {
        if ($_FILES['file']['error'] > 0) {
            echo "Return error";
        }
    } else {
        $fileName = $_FILES['file']['name'];
        $fileName = uniqid() . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
        echo "Upload :" . $_FILES['file']['name'] . '<br/>';
        echo "Type :" . $_FILES['file']['type'] . '<br/>';
        echo "Size :" . ($_FILES['file']['size'] / 1024) . '<br/>';
        echo "Temp file :" . $_FILES['file']['tmp_name'] . '<br/>';

        if (file_exists(DIRUPLOAD . $fileName)) {
            echo $_FILES['file']['name'] . "existe";
        } else {
            move_uploaded_file($_FILES['file']['tmp_name'], DIRUPLOAD . $fileName);
            echo "Stored in: " . DIRUPLOAD . $fileName;
        }
    }

    $dir = 'upload/';
    
    while ($elemento = readdir(opendir('upload/'))){
       //push($images,$elemento);
       
    }
    var_dump($elemento);
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis imágenes</title>

    <form action="" method="post" enctype="multipart/form-data">
        Imagen<input type="file" name="file"><br />
        <input type="submit" name='send' value="Enviar">
    </form>
</head>

<body>

</body>

</html>