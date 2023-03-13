<?php

namespace App\Controllers;

use App\Models\Comment;

class  CommentController extends BaseController
{
    public function postCommentSaveAction($request)
    {

        $postData = $request->getParsedBody();
        $comment = new Comment();
        $comment->user = 'Anonimus';
        $comment->comment = $postData['comment'];
        $comment->blog_id = $postData['blog_id'];
        $comment->save();
        header('Location: /blog/' . $postData['blog_id']);
        return $request;
        
    }

   
}
