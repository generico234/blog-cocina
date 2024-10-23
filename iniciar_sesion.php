<?php
include_once "navbar.php";
if (isset($_GET['error']) && $_GET['error'] == 1) {
    echo "<p style='color: red;'>Nombre de usuario o contraseña incorrectos.</p>";
}
?>
<form action="login.php" method="POST">
    <label>Nombre De Usuario</label>
    <input type="text" name="usuario">
    <label>Contraseña</label>
    <input type="password" name="password">
    <input type="submit" name="Enviar">
    <a href="nuevo_usuario.php">Registrarse</a>

</form>
</body>

</html>