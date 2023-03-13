<?php

namespace App\Controllers;
use App\Models\Blog;
use App\Models\Comment;

class IndexController extends BaseController
{
    public function indexAction($request)
    {
        $blogs = Blog::all();
        $lastComments = Comment::orderBy('created_at', 'desc')->take(5)->get();

        //nube de tags
        $tags = Blog::all();
        $tags = $tags->pluck('tags'); //obtenemos los tags de todos los blogs
        $tags = $tags->implode(','); //los convertimos en un string
        $tags = explode(',', $tags); //los convertimos en un array
        $tags = array_count_values($tags); //contamos las veces que se repite cada tag //ordenamos el array de mayor a menor
        $tags = array_slice($tags, 0, 10); //obtenemos los 10 primeros elementos del array

        return $this->renderHTML('index.twig', [
            'blogs' => $blogs,
            'latestComments' => $lastComments,
            'tags' => $tags

        ]);
    }

    public function aboutAction($request)
    {
        $lastComments = Comment::orderBy('created_at', 'desc')->take(5)->get();
        $tags = Blog::all();
        $tags = $tags->pluck('tags'); //obtenemos los tags de todos los blogs
        $tags = $tags->implode(','); //los convertimos en un string
        $tags = explode(',', $tags); //los convertimos en un array
        $tags = array_count_values($tags); //contamos las veces que se repite cada tag //ordenamos el array de mayor a menor
        $tags = array_slice($tags, 0, 10); //obtenemos los 10 primeros elementos del array

        return $this->renderHTML('Page/about.html.twig', [
            'latestComments' => $lastComments,
            'tags' => $tags
        ]);
        
    }

    public function contactAction($request)
    {
        $lastComments = Comment::orderBy('created_at', 'desc')->take(5)->get();
        $tags = Blog::all();
        $tags = $tags->pluck('tags'); //obtenemos los tags de todos los blogs
        $tags = $tags->implode(','); //los convertimos en un string
        $tags = explode(',', $tags); //los convertimos en un array
        $tags = array_count_values($tags); //contamos las veces que se repite cada tag //ordenamos el array de mayor a menor
        $tags = array_slice($tags, 0, 10); //obtenemos los 10 primeros elementos del array

        return $this->renderHTML('Page/contact.html.twig',
        [
            'latestComments' => $lastComments,
            'tags' => $tags
        ]);
    }

}

?>