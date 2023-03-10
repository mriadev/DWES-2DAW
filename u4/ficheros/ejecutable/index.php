<?php

/**
 * Programa al que se pasas el archivo de una lista de séneca y te crea un ejecutable para
 *  insertar a esos usuarios en una base de datos o crear usuarios de linux
 * 
 * @author: María Cervilla Alcalde
 * 
 */

include('config/config.php');


if (isset($_POST['send'])) {
    //limpiamos datos
    $class = substr($_POST['class'], 0, 1) . strtolower(substr($_POST['class'], 3));


    $tmp = explode('.', $_FILES['file']['name']); //array con las partes del nombre
    $ext = end($tmp); //elemento final del array
    $fileName = $_FILES['file']['name'];
    var_dump($_POST);
    var_dump($_FILES['file']['type']);

    //subir fichero a upload
    if (($_FILES['file']['size'] > MAXSIZE) and ($_FILES['file']['type'] == $type) and ($ext == $extension)
    ) {
        if ($_FILES['file']['error'] > 0) {
            echo "Return error";
        }
    } else {

        //$fileName = uniqid() . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
        echo "Upload :" . $_FILES['file']['name'] . '<br/>';
        echo "Type :" . $_FILES['file']['type'] . '<br/>';
        echo "Size :" . ($_FILES['file']['size'] / 1024) . '<br/>';
        echo "Temp file :" . $_FILES['file']['tmp_name'] . '<br/>';

        if (file_exists(DIRUPLOAD . $fileName)) {
            echo $_FILES['file']['name'] . " existe";
        } else {
            move_uploaded_file($_FILES['file']['tmp_name'], DIRUPLOAD . $fileName);
            echo "Stored in: " . DIRUPLOAD . $fileName;
        }

        //Leer y escribir fichero nuevo
        $file = fopen("upload/".$fileName, "r");
       

        for ($i=0; $i < 8; $i++) { 
            fgets($file);
        }

        while (!feof($file)) {
            
        }
        
        fclose($file);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Crear usuario para una base de datos o linux</h1>
    <form action="" method="post" enctype="multipart/form-data">

        Formato: <select name="format" id="">
            <?php
            foreach ($formats as $key => $value) {
                echo "<option name = 'format' value='$value'>$value</option>";
            };
            ?>
        </select><br /><br />

        Año academico: <select name="year" id="">
            <?php
            foreach ($years as $key => $value) {
                echo "<option name = 'year' value='$value'>$value</option>";
            };
            ?>
        </select><br /><br />

        Curso: <select name="class" id="">
            <?php
            foreach ($classes as $key => $value) {
                echo "<option name = 'class' value='$value'>$value</option>";
            };
            ?>
        </select><br /><br />
        Fichero datos: <input type="file" name="file"> Ej: 2daw_22_23.txt *<br /><br />

        <input type="submit" name='send' value="Enviar">
    </form>
</body>

</html>