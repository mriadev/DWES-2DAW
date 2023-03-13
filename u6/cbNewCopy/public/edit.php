<?php 
/**
 * Fichero para editar equipos de la base de datos
 * 
 * @author Maria Cervilla Alcalde
 * 
 */
require '../vendor/autoload.php';

 use Dotenv\Dotenv;
 use App\Models\Equipo;

 $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
 $dotenv->load();
 
 include('../app/config/config.php');
 include('../app/include/functions.php');
 
 session_start();
 
 if ((!isset($_SESSION['perfil'])) || $_SESSION['perfil']!= 'admin') {
     header('Location: index.php');
    }
    
    
$id = $_GET['id'];
$equipo = Equipo::getInstancia();
$dataEquipo = $equipo->get($id);

if (isset($_POST['editEquipo'])) {
    var_dump($_POST);
    $equipo->edit($_POST);
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar equipos</title>
</head>
<body>
    <h1>Club equipos Pokemon</h1>
    <h2>Editar equipos</h2>

    <form action="" method="post">
        Nuevo nombre equipo:<input type="text" name="editNewEquipo" value='<?php 
        foreach ($dataEquipo as $key => $value) {
            echo $value['equipo'];
        } ?>'>
        <input type="submit" name="editEquipo" value="Editar">
        <a href="index.php">Cancelar</a>
        <input type="hidden" value="<?php echo $_GET['id'] ?>" name="id">
    </form>

</body>
</html>