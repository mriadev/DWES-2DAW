<?php

namespace App\Controllers;

use App\Models\Contacto;

class ContactosController
{

    public function apiAction($request)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $contactos = new Contacto();

        if(count(explode("/", $request)) == 3) {
            $id = explode("/", $request)[2];

        }
        switch ($method) {
            case 'GET':
                if (isset($id)) {
                    $contactosLista = $contactos->getId($id);
                }else{
                    $contactosLista = $contactos->get();
                }
                echo json_encode($contactosLista);
                break;
            case 'POST':
                $data_contactos = (array) json_decode(file_get_contents('php://input'), TRUE);
                $contactos->set($data_contactos);
                return json_encode($data_contactos);
                break;
            case 'PUT':
                $data_contactos = (array) json_decode(file_get_contents('php://input'), TRUE);
                $data_contactos['id'] = $id;
                return json_encode($contactos->edit($data_contactos));
                break;
            case 'DELETE':
                //recogemos los datos del contacto a eliminar
                $data_contactos = (array) json_decode(file_get_contents('php://input'), TRUE);
                $data_contactos['id'] = $id;
                $contactos->delete($data_contactos);
                return json_encode($data_contactos);
                break;
            default:
                echo "Metodo no permitido";
                break;
        }
    }

    public function login()
    {
    }
}
