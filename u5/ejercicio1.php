<?php
class Mascota
{
    public static function getName(){
        echo "Soy una mascota";
    }
    public static function whoami(){
        self::getName();
    }
}

class Perro extends Mascota{
    public static function getName(){
        echo "Soy una mascota";
    }
}

Perro::whoami();

?>