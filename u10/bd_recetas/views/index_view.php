<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        nav {
            padding: 10px;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline-block;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <h1>Recetas Saludables</h1>
    <?php
    if (!$_SESSION['login']) {
        include('../app/include/login_form.php');
    } else {
        echo "Bienvenid@: " . $_SESSION['usuario']['usuario'] . "    Pefil:  " . $_SESSION['perfil'];
        switch ($_SESSION['perfil']) {
            case 'Admin':
                echo "<li><a href='/admin'>Admin</a></li>";
                break;
            case 'Collaborator':
                echo "<li><a href='/colaborator'>Colaborator</a></li>";
                break;
            case 'User':
                echo "<li><a href='/user'>User</a></li>";
                break;
            case 'invitado':
                echo "<li><a href='/invitado'>Invitado</a></li>";
                break;
        }
        echo "<li>
        <form action='/' method='post'>
            <input type='submit' name='logout' value='Logout'>
        </form>
        </li>";
    }

    echo "<h2>Listado de Recetas</h2>";
    //listar recetas que están en $data
    //`titulo`, `ingredientes`, `elaboracion`, `etiquetas`, `publica`, `imagen`, `idColaborador`
    //formulario de busqueda
    echo "<form action='/search' method='get'>
   Buscar: <input type='text' name='buscar' value=''>
   <input type='submit' value='Buscar'>
    </form>";

    echo "<br/><table border='1'>";
    echo "<tr><th>Titulo</th><th>Ingredientes</th><th>Elaboracion</th><th>Etiquetas</th><th>Imagen</th></tr>";
    if ($_SESSION['perfil'] == 'Collaborator') {
    echo "<form action='' method='post'>";
    echo "<input type='submit' name='mostrar' value='Ocultar/Mostrar Recetas'>";
    echo "</form>";

    echo "<form action='/add' method='post'>";
    echo "<input type='submit' name='add' value='Añadir Receta'>";
    echo "</form>";

    }
    echo '<table border="1">';

    foreach ($data as $receta) {
        echo "<tr>";
        echo "<td>" . $receta['titulo'] . "</td>"; 
        echo "<td>" . $receta['ingredientes'] . "</td>";
        echo "<td>" . $receta['elaboracion'] . "</td>";
        echo "<td>" . $receta['etiquetas'] . "</td>";
        echo "<td><img src='img/" . $receta['imagen'] . "' width='100px'></img></td>";
        if ($_SESSION['perfil'] == 'Collaborator' && $_SESSION['usuario']['id'] == $receta['idColaborador']) {
            echo "<td><a href='/edit/" . $receta['id'] . "'>Editar</a></td>";
            echo "<td><a href='/delete/" . $receta['id'] . "'>Borrar</a></td>";
        }
        if ($_SESSION['perfil'] == 'User') {
            echo "<td><a href='/addFav/" . $receta['id'] . "'>💛</a></td>";
        }
        echo "</tr>";
    
    }
    echo "</table>";

    if ($_SESSION['perfil'] == 'User') {
        echo'<h3>Recetas Favoritas</h3>';

        echo "<table border='1'>";
        echo "<tr><th>Titulo</th><th>Ingredientes</th><th>Elaboracion</th><th>Etiquetas</th><th>Imagen</th></tr>";
        foreach ($_SESSION['recetasFavoritas'] as $receta) {
            echo "<tr>";
            echo "<td>" . $receta['titulo'] . "</td>"; 
            echo "<td>" . $receta['ingredientes'] . "</td>";
            echo "<td>" . $receta['elaboracion'] . "</td>";
            echo "<td>" . $receta['etiquetas'] . "</td>";
            echo "<td><img src='img/" . $receta['imagen'] . "' width='100px'></img></td>";
            echo "</tr>";
        }
    }


    ?>

</body>

</html>