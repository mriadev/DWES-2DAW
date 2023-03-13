<!DOCTYPE html>
<html>

<head></head>

</html>

<body>
    <h1>Bookmarks</h1>
    <?php
    if (!$_SESSION['login']) {
        echo "<h2>Login</h2>";
        include('../app/include/login_form.php');
    }

    if ($_SESSION['login']) {
        echo "Bienvenid@: " . $_SESSION['usuario'][0]['nombre'];
        echo "<form action='/' method='post'>
            <input type='submit' name='logout' value='Cerrar sesión'>
            </form>";
        echo "<h2>Lista Bookmarks</h2>";
        echo "<form action='/usuario/add' method='post'>
                    <input type='submit' value='Añadir'>
                    </form>";

        echo "<table border='1'>";
        echo "<tr><th>Url</th><th>Descripción</th></tr>";
        foreach ($_SESSION['bookmarks_user'] as $bookmark) {
            echo "<tr>";
            echo "<td>" . $bookmark['bm_url'] . "</td>";
            echo "<td>" . $bookmark['descripcion'] . "</td>";
    ?>
            <td>
                <form action='usuario/edit/<?php echo $bookmark['id'] ?>' method='post'>
                    <input type='submit' name='editar' value='Editar'></input>
                    <input type='hidden' name='id' value='<?php echo $bookmark['id'] ?>'>
                </form>
            </td>
            <td>
                <form action='usuario/delete/<?php echo $bookmark['id'] ?>' method='post'>
                    <input type='submit' name='<?php echo $bookmark['id']  ?>' value='Borrar' />
                    <input type='hidden' name='id' value='<?php echo $bookmark['id'] ?>' />
                    <input type='hidden' name='delete' value="delete" />
                </form>
            </td>
        <?php
            echo "</tr>";
        }
        echo "</table>";

        ?>

        <h2>Lista de bookmarks recomendados</h2>
        <table border='1'>
            <tr>
                <th>Url</th>
                <th>Descripción</th>
            </tr>
            <?php
            foreach ($_SESSION['bookmarksRecomendados'] as $bookmark) {
                echo "<tr>";
                echo "<td>" . $bookmark['bm_url'] . "</td>";
                echo "<td>" . $bookmark['descripcion'] . "</td>";
                echo "<td><form action='usuario/add' method='post'>
                        <input type='submit' name='addRecomendado' value='Añadir a mi Lista'/>
                        <input type='hidden' name='bm_url' value='" . $bookmark['bm_url'] . "'/>
                        <input type='hidden' name='descripcion' value='" . $bookmark['descripcion'] . "'/>
                        </form></td>";
                echo "</tr>";
            }
            ?>

        <?php

    }
        ?>


</body>