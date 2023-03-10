<?php

include('include/functions.php');
$arrayTest =array(
                array('f' => 3,'c'=>5),
                array('f' => 4,'c'=>6),
                array('f' => 6,'c'=>9)

);

if (existeCoordenada(3,5,$arrayTest)) { 
    echo "existe ",3,5;
}else{
    echo "NO existe ",3,5;
}

?>