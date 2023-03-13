
<!DOCTYPE html>
<html>
    <head></head>
</html>
<body>
    <h1>Bookmark</h1>
    <h2>Añadir Bookmark</h2>
   <form action='' method='post'>
    URL: <input type='text' name='new_bm_url' value='<?php echo $data[0]['bm_url'] ?>'>
    Descripción: <input type='text' name='new_descripcion' value='<?php echo $data[0]['descripcion'] ?>'>
    <input type='hidden' name='id' value='<?php echo $data[0]['id'] ?>'>
    <input type='submit' name='edit' value='Editar'>

   </form>

    <form action='/' method='post'>
     <input type='submit' value='Cancelar'>
    </form> 
    
</body>


