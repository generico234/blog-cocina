<?php
include("navbar.php");
?>

<form action="alta_usuario.php" method="post">
   <caption>Usuario</caption><br>
   <input type="text" name="usuario" required minlength="3"><br>
   <caption>Contraseña</caption><br>
   <input type="password" name="password" required minlength="3"><br>
   <caption>Nombre</caption><br>
   <input type="text" name="nombre"><br>
   <caption>Apellido</caption><br>
   <input type="text" name="apellido"><br>
   <caption>Email</caption><br>
   <input type="email" name="email" required minlength="3"><br>
   <caption>Status</caption><br>
   <input type="text" name="status"><br>
   <caption>Avatar</caption><br>
   <input type="file" name="avatar"><br>
   <caption class="fecha">Fecha de Alta</caption><br>
   <input type="date" name="fecha_alta"><br>
   <input type="submit" value="Guardar"><br>
</form>


</body>

</html>