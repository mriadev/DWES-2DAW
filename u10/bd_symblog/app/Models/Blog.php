<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Blog extends Model
{
    protected $table = "blog";

    private static $instancia;
    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function __clone()
    {
        trigger_error('La clonación no está permitida!.', E_USER_ERROR);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    private $id;
    private $title;
    private $blog;
    private $image;
    private $author;
    private $tags;
    private $created_at;
    private $updated_at;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setBlog($blog)
    {
        $this->blog = $blog;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    public function setCreated($created_at)
    {
        if (is_string($created_at)) {
            $created_at = new \DateTime($created_at);
        }
        $this->created_at = $created_at->format('Y-m-d H:i:s');
    }

    public function setUpdated($updated_at)
    {
        if (is_string($updated_at)) {
            $updated_at = new \DateTime($updated_at);
        }
        $this->updated_at = $updated_at->format('Y-m-d H:i:s');
    }


    public function get()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getBlog()
    {
        return $this->blog;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function getCreated()
    {
        return $this->created_at;
    }

    public function getUpdated()
    {
        return $this->updated_at;
    }


    public function set()
    {

        $this->query = "INSERT INTO blog (title, author, blog, image, tags, created_at, updated_at) VALUES (:title, :author, :blog, :image, :tags, :created_at, :updated_at)";
        $this->parametros['title'] = $this->title;
        $this->parametros['author'] = $this->author;
        $this->parametros['blog'] = $this->blog;
        $this->parametros['image'] = $this->image;
        $this->parametros['tags'] = $this->tags;
        $this->parametros['created_at'] = $this->created_at;
        $this->parametros['updated_at'] = $this->updated_at;
        $this->get_results_from_query();

        echo "El registro se ha creado con éxito.";
    }

    public function edit($data_blog = array())
    {
    }

    public function delete($data_blog = array())
    {
    }

    public function getCommets($id = '')
    {
        return $this->comment()->where('blog_id', $id)->get();
    }

}
