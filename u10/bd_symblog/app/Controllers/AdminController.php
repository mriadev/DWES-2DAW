<?php

namespace App\Controllers;

use App\Models\Comment;

class  AdminController extends BaseController
{

    public function getAdminAction ($request)
    {
        if (isset($_SESSION['perfil'])) {
            if ($_SESSION['perfil'] == 'admin') {
                $lastComments = Comment::orderBy('created_at', 'desc')->take(5)->get();
                return $this->renderHTML('admin.twig',
                [
                    'latestComments' => $lastComments
                ]);
                return $request;
            } else {
                header('Location: /');
                return $request;
            }
        }else {
            header('Location: /auth');
            return $request;
        }
        
    }

}
