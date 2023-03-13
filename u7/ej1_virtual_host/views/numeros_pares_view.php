<!DOCTYPE html>
<html>
    <head></head>
</html>
<body>
    <h1>MVC</h1>
    <h2>Los <?php echo $data['num_pares'] ?> primeros números pares</h2>
    <?php 
    for($i=0;$i< $data['num_pares'];$i++){
        echo $i*2;
        echo "<br>";
    }
    ?>
</body>


