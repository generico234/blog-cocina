<?php
include("navbar.php");
include 'conexion.php';

// Verificar si se pasó el ID del artículo
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Consulta para obtener los datos del artículo
    $query = "SELECT * FROM articulos WHERE id_articulos = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $articulo = $result->fetch_assoc();
        ?>
        <main>
            <article>
                <table>
                    <tr>
                        <th><img id='img' src="<?php echo htmlspecialchars($articulo['imagen']); ?>"
                                alt="<?php echo htmlspecialchars($articulo['titulo']); ?>"></th>
                        <th>
                            <h2><?php echo htmlspecialchars($articulo['titulo']); ?></h2>
                            <p><?php echo htmlspecialchars($articulo['contenido']); ?></p>
                        </th>
                    </tr>
                </table>
            </article>
            
            <!-- Sección de comentarios -->
            <section id="comentarios">
                <h3>Comentarios</h3>
                <h4>Agregar un comentario</h4>
                <form action="agregar_comentario.php" method="POST">
                    <input type="hidden" name="id_articulo" value="<?php echo $id; ?>">
                    <label for="autor">Nombre:</label>
                    <input type="text" id="autor" name="autor" required><br><br>
                    <label for="texto">Comentario:</label>
                    <textarea id="texto" name="texto" required></textarea><br><br>
                    <button type="submit">Enviar comentario</button>
                </form>

                <?php
                // Consulta para obtener los comentarios del artículo
                $query_comentarios = "SELECT * FROM comentarios WHERE id_articulo = ? ORDER BY fecha DESC";
                $stmt_comentarios = $conn->prepare($query_comentarios);
                $stmt_comentarios->bind_param("i", $id);
                $stmt_comentarios->execute();
                $result_comentarios = $stmt_comentarios->get_result();

                if ($result_comentarios && $result_comentarios->num_rows > 0) {
                    while ($comentario = $result_comentarios->fetch_assoc()) {
                        ?>
                        <div class="comentario">
                            
                            <p><?php echo htmlspecialchars($comentario['comentario']); ?></p>
                            <small><?php echo htmlspecialchars($comentario['fecha']); ?></small>
                        </div>
                        <hr>
                        <?php
                    }
                } else {
                    echo "<p>No hay comentarios aún. Sé el primero en comentar.</p>";
                }
                ?>

                <!-- Formulario para agregar nuevo comentario -->
             
            </section>
        </main>
        <?php
    } else {
        echo "<p>Artículo no encontrado.</p>";
    }
} else {
    echo "<p>ID de artículo no especificado.</p>";
}
?>

</body>
</html>