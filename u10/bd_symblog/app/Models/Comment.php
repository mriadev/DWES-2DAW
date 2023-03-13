<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model{
    protected $table = "comment";

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


    private $id;
    private $user;
    private $comment;
    private $blog_id;
    private $created_at;
    private $updated_at;

    public function setId($id) {
        $this->id = $id;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setComment($comment) {
        $this->comment = $comment;
    }

    public function setBlog($blog_id) {
        $this->blog_id = $blog_id;
    }

    public function setCreated($created_at) {
        $this->created_at = $created_at;
    }

    public function setUpdated($updated_at) {
        $this->updated_at = $updated_at;
    }

    public function get() {

    }

    public function getId() {
        return $this->id;
    }

    public function set()
    {
        $this->query = "INSERT INTO comment (user,comment,blog_id,created_at,updated_at) VALUES (:user,:comment,:blog_id,:created_at,:updated_at)";
        $this->parametros['user'] = $this->user;
        $this->parametros['comment'] = $this->comment;
        $this->parametros['blog_id'] = $this->blog_id;
        $this->parametros['created_at'] = date('Y-m-d H:i:s');
        $this->parametros['updated_at'] = date('Y-m-d H:i:s');

        $this->get_results_from_query();
    }

    public function edit($data_comments= array())
    {

    }
    
    public function delete($data_comments= array())
    {
      
    }



}
