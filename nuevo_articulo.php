<?php
include("navbar.php");
?>

<form action="alta_articulos.php" method="post" enctype="multipart/form-data">
<caption>Titulo</caption>
<input type="text" name="titulo">
<caption>Descripción</caption>
<textarea cols="60" rows="10" name="resumen"></textarea>
<caption>Escriba la receta</caption>
<textarea cols="60" rows="10" name="contenido"></textarea>
<caption class="fecha">Fecha</caption>
<input type="date" name="fecha">
<caption>Foto</caption>
<input type="file" name="foto">
<caption>Categoria</caption>
<select name="categoria">
  <option value="pastas">Pastas</option>
  <option value="alhorno">Al Horno</option>
  <option value="aperitivos">Aperitivos</option>
  <option value="postres">Postres</option>
  <option value="fritos">Fritos</option>
</select>
<input type="submit" value="Guardar">
</form>


</body>

</html>