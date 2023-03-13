<?php

require '../vendor/autoload.php';
use Dotenv\Dotenv;
use App\Models\Equipo;
use App\Models\DBAbstractModel;

$dotenv = Dotenv::createImmutable(__DIR__.'/..');
$dotenv->load();

include('../app/config/config.php');


$objetoEquipo = Equipo::getInstancia();
$objetoEquipo->get("Pokemon9");
echo $objetoEquipo->getMensaje();

$objetoEquipo->edit("YanoesPokemon9");

/* $objetoEquipo->setEquipo("Pokemon9");
$objetoEquipo->set();
echo $objetoEquipo->getMensaje();

$objetoEquipo1 = Equipo::getInstancia();
$data = array('equipo'=>'PruebaEquipo1');
$objetoEquipo1->set_enlace($data);

echo $objetoEquipo1->getMensaje(); */
?>