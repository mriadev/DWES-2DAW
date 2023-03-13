<form action='/' method="post">
    Usuario <input type="text" name="user">
    Contraseña <input type="password" name="pass">
    <br />
    Perfiles <select name="perfil">
        <option value="Admin">Administrador</option>
        <option value="Collaborator">Colaborador</option>
        <option value="User">Usuario</option>
        <option value="Invitado">Invitado</option>
    </select>
    <input type="submit" name="login" value="login">
</form>