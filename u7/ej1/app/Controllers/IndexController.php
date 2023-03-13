<?php
namespace  App\Controllers;

class IndexController extends BaseController{
    public function IndexAction()
    {
        $data = array("message"=>"Hola mundo");
        $this->renderHTML('../views/index_view.php',$data);
    }

    public function SaludarAction($request)
    {
        $ruta = explode("/",$request);
        $data = array("message"=>end($ruta));
        $this->renderHTML('../views/saluda_view.php',$data);
    }

    public function DiezNumerosAction($request)
    {
        $data = array("message"=>"Diez primeros números pares");
        $this->renderHTML('../views/diez_numeros_view.php',$data);
    }

    public function NumerosParesAction($request)
    {
        $ruta = explode("/",$request);
        $data = array("num_pares"=>end($ruta));
        $this->renderHTML('../views/numeros_pares_view.php',$data);
    }
    
    
}
