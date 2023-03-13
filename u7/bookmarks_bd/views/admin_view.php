<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Bookmarks</h1>
<h2>Gestión de usuarios</h2>

<?php
echo "<form action='/' method='post'>
<input type='submit' name='logout' value='Cerrar sesión'>
</form>";
?>

<h3>Listado de usuarios</h3>
<?php 
echo "<table border='1'>";
echo "<tr><th>id</th><th>Nombre</th><th>User</th><th>Password</th><th>Email</th><th>Perfil</th><th>Bloqueado</th></tr>";
foreach ($data as $usuario) {
    echo "<tr>";
    echo "<td>" . $usuario['id'] . "</td>";
    echo "<td>" . $usuario['nombre'] . "</td>";
    echo "<td>" . $usuario['user'] . "</td>";
    echo "<td>" . $usuario['psw'] . "</td>";
    echo "<td>" . $usuario['email'] . "</td>";
    echo "<td>" . $usuario['perfil'] . "</td>";
    echo "<td>" . $usuario['bloqueado'] . "</td>";
    //editar
    echo "<td>
    <form action='admin/edit/" . $usuario['id'] . "' method='post'>
        <input type='submit' name='editar' value='Editar'></input>
        <input type='hidden' name='id' value='" . $usuario['id'] . "'>
    </form>
    </td>";
    echo "</tr>";
}

?>


</body>
</html>