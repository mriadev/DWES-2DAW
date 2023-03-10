<?php

$tiempo_maximo = 10;
session_start();
if (!isset($_SESSION['count'])) {
    
$_SESSION['inicioTime'] = time();
$_SESSION['count'] = 0;
}
else {
$_SESSION['count']++;
}



if(isset($_SESSION['inicioTime'])) {
 
    $time = time();
    if ($time- $_SESSION['inicioTime'] == $tiempo_maximo) {
        $_SESSION['count'] = 0;
    }else{
        
    }
/*se multiplica por 60 segundos ya que se configura en minutos*/
//$tiempo_maximo = $_SESSION['inicioTime'] + ( $_SESSION['intervaloTime'] * 60 ) ;


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
    
<?php
echo "Contador:".$_SESSION['count']."<br/>";
?>

</body>
</html>