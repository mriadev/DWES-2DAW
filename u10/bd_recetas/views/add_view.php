
<!DOCTYPE html>
<html>
    <head></head>
</html>
<body>
    <h1>Recetas</h1>
    <h2>Añadir Receta</h2>
   <form action='' method='post' enctype="multipart/form-data">
    <label for='titulo'>Titulo</label>
    <input type='text' name='titulo' value=''>
    <br/>
    <label for='ingredientes'>Ingredientes</label>
    <input type='text' name='ingredientes' value=''>
    <br/>
    <label for='elaboracion'>Elaboracion</label>
    <input type='text' name='elaboracion' value=''>
    <br/>
    <label for='etiquetas'>Etiquetas</label>
    <input type='text' name='etiquetas' value=''>

    <br/>
    <label for='imagen'>Imagen</label>
    <input type='file' name='imagen' value=''>
    <br/>
    <label for='publica'>Publica</label>
    <input type='text' name='publica' value=''>

    <input type='hidden' name='idColaborador' value='<?php echo $_SESSION['usuario']['id'] ?>'>
    <br/>
    
    <input type='submit' name="addReceta" value='Añadir'>
   </form>
<br/>
    <form action='/' method='post'>
     <input type='submit' value='Cancelar'>
    </form> 
    
</body>


