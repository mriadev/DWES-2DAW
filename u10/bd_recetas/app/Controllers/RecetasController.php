<?php

namespace App\Controllers;

use App\Models\Recetas;
use App\Models\Usuario;

class RecetasController extends BaseController
{

    public function SearchAction()
    {
        $recetas = Recetas::getInstancia();
        $recetas->setTitulo($_GET['buscar']);
        $data = $recetas->search();
        return $this->renderHTML('../views/index_view.php', $data);
    }

    public function AddRecetaAction($request)
    {
        if (isset($_POST['addReceta'])) {
            $recetas = Recetas::getInstancia();
            $_POST['imagen'] = $_FILES['imagen']['name'];

            $recetas->setTitulo($_POST['titulo']);
            $recetas->setIngredientes($_POST['ingredientes']);
            $recetas->setElaboracion($_POST['elaboracion']);
            $recetas->setEtiquetas($_POST['etiquetas']);
            $recetas->setPublica($_POST['publica']);
            $recetas->setImagen($_POST['imagen']);
            $recetas->setIdColaborador($_POST['idColaborador']);
            $recetas->setReceta();
            //subir archivo
            $nombre = $_FILES['imagen']['name'];
            $ruta = $_FILES['imagen']['tmp_name'];
            $destino = "../public/img/" . $nombre;
            copy($ruta, $destino);
            header('Location: /');
        } else {
            return $this->renderHTML('../views/add_view.php');
        }
    }

    public function editRecetaAction($request)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $recetas = Recetas::getInstancia();
            $ruta = explode('/', $request);
            $id = $ruta[2];
            $data = $recetas->get($id);
            return $this->renderHTML('../views/edit_view.php', $data);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $recetaEditada = Recetas::getInstancia();
            if ($_SESSION['usuario']['id'] == $_POST['idColaborador']) {

                $recetaEditada->edit($_POST);

                header('Location: /');
            } else {
                header('Location: /');
            }
        }
    }

    public function deleteRecetaAction($request)
    {
        $recetas = Recetas::getInstancia();
        $recetas->setTitulo($_GET['buscar']);
        $data = $recetas->search();
        return $this->renderHTML('../views/index_view.php', $data);
    }

    public function addFavRecetaAction($request)
    {
        $recetas = Recetas::getInstancia();
        $idReceta = explode('/', $request);
        $idReceta = $idReceta[2];
        $recetas->addFavorita($idReceta, $_SESSION['usuario']['id']);        
        
        $_SESSION['recetasFavoritas'] = $recetas->getFavoritas($_SESSION['usuario']['id']);
        var_dump($_SESSION['recetasFavoritas']);
        return $this->renderHTML('../views/index_view.php');
    }
}
