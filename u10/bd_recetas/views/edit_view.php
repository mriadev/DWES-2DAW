
<!DOCTYPE html>
<html>
    <head></head>
</html>
<body>
    <h1>Recetas</h1>
    <h2>Añadir Receta</h2>
   <form action='' method='post'>
    <label for='titulo'>Titulo</label>
    <input type='text' name='titulo' value='<?php echo $data[0]['titulo'] ?>'>
    <br/>
    <label for='ingredientes'>Ingredientes</label>
    <input type='text' name='ingredientes' value='<?php echo $data[0]['ingredientes'] ?>'>
    <br/>
    <label for='elaboracion'>Elaboracion</label>
    <input type='text' name='elaboracion' value='<?php echo $data[0]['elaboracion'] ?>'>
    <br/>
    <label for='etiquetas'>Etiquetas</label>
    <input type='text' name='etiquetas' value='<?php echo $data[0]['etiquetas'] ?>'>

    <br/>
    <label for='imagen'>Imagen</label>
    <input type='text' name='imagen' value='<?php echo $data[0]['imagen'] ?>'>
    <br/>
    <label for='publica'>Publica</label>
    <input type='text' name='publica' value='<?php echo $data[0]['publica'] ?>'>


    <input type='hidden' name='id' value='<?php echo $data[0]['id'] ?>'>
    <input type='hidden' name='idColaborador' value='<?php echo $_SESSION['usuario']['id'] ?>'>
    <br/>
    
    <input type='submit' value='Guardar'>
   </form>

    <form action='/' method='post'>
     <input type='submit' value='Cancelar'>
    </form> 
    
</body>


