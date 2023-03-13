<?php

namespace App\Controllers;

use App\Models\Contacto;

class ContactosController
{
   
    public function apiAction()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $contactos = new Contacto();
        switch ($method) {
            case 'GET':
                $contactosLista = $contactos->get();
                echo json_encode($contactosLista);
                break;
            case 'POST':
                $data_contactos = (array) json_decode(file_get_contents('php://input'), TRUE);                $contactos->set($data_contactos);
                return json_encode($data_contactos);
                break;
            case 'PUT':
                $data_contactos = (array) json_decode(file_get_contents('php://input'), TRUE);                $contactos->edit($data_contactos);
                return json_encode($data_contactos);
                break;
            case 'DELETE':
                //recogemos los datos del contacto a eliminar
                $data_contactos = (array) json_decode(file_get_contents('php://input'), TRUE);
                $contactos->delete($data_contactos);
                return json_encode($data_contactos);
                break;
            default:
                echo "Metodo no permitido";
                break;
        }
    }

    public function login(){

        
    }
}
