<?php
/* function clear_input($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
} */

$name = $email = $gender = $comment = $website ="";

$nameError = $emailError = $websiteError = "";

$aGenero = array("Hombre", "Mujer", "Otro");

$genderErr = "";


$aVehiculos = array("Bike","Car","Patinete");

$aOpciones = array(
    1 => "Opción 1", 2=>"Opción 2", 3=> "Opción 3"
);

$validarFormulario = false;


if (isset($_POST['send'])) {
    var_dump($_POST);
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
    <form action="" method="post">
    Nombre: <input type="text">*<br/>
    email: <input type="text">*<br>
    URL: <input type="text"><br>

    Comentario<br>
    <textarea name="" id="" cols="30" rows="10"></textarea>
    </br>
   <?php 
    foreach ($aGenero as $key => $value) {
        echo "$value<input type='radio' name = '$value'>";
    }
   ?> 
   </br>

   Transporte:
    </br>
     <?php
      foreach ($aVehiculos as $key => $value) {
        echo "$value<input type='checkbox' value='$key'></option>";
      }
     
     ?>
    <br/>
     Selecciona opción 
     <select name="option" id="">
      <?php 
      foreach ($aOpciones as $key => $value) {
        echo '<option value="'.$key.'">'.$value.'</option>';
      }
      ?>
     </select>
     <br>
    <select multiple name="" id="">
     <?php
      
     
     ?>
    </select>

    <input type="submit" name='send' value="Enviar">
    </form>
</body>
</html>