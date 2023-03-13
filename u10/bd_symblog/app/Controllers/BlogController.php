<?php

namespace App\Controllers;

use App\Models\Blog;
use App\Models\Comment;

class  BlogController extends BaseController
{
    public function getAddBlogAction($request)
    {
        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            $blog = new Blog();
            $blog->title = $postData['title'];
            $blog->blog = $postData['description'];
            $blog->tags = $postData['tag'];
            $blog->author = $postData['author'];

            //carga de archivos
            $files = $request->getUploadedFiles();
            $image = $files['image'];
            if ($image->getError() == UPLOAD_ERR_OK) {
                $fileName = $image->getClientFilename();
                $fileName = uniqid() . $fileName;
                $image->moveTo("img/$fileName");
                $blog->image = $fileName;
            }
            $blog->save();
        }
        return $this->renderHTML('addBlog.twig');
        return $request;
    }

    public function postAddBlogAction($request)
    {
        $responseMessage = null;
        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            $blog = new Blog();
            $blog->title = $postData['title'];
            $blog->blog = $postData['description'];
            $blog->tags = $postData['tag'];
            $blog->author = $postData['author'];

            //carga de archivos
            $files = $request->getUploadedFiles();
            $image = $files['image'];
            if ($image->getError() == UPLOAD_ERR_OK) {
                $fileName = $image->getClientFilename();
                $fileName = uniqid() . $fileName;
                $image->moveTo("img/$fileName");
                $blog->image = $fileName;
            }
            $blog->save();
            $responseMessage = 'Saved';
        }
        return $this->renderHTML('addBlog.twig', [
            'responseMessage' => $responseMessage
        ]);
        return $request;
    }

    public function getBlogAction($request)
    {
        $blogId = explode('/', $request->getUri()->getPath())[2];
        $blog = Blog::find($blogId);


        $comment = Comment::where('blog_id', $blogId)->get();
        return $this->renderHTML('showBlog.twig', [
            'blog' => $blog,
            'comments' => $comment
        ]);

        return $request;
    }
}
