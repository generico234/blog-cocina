<?php
// Iniciar la sesión
session_start();

// Incluir la conexión a la base de datos
include 'conexion.php';

// Verificar si se recibió el ID del artículo
if (isset($_GET['id'])) {
    $id_articulo = intval($_GET['id']); // Obtener el ID del artículo desde la URL

    // Verificar si el usuario está autenticado
    if (!isset($_SESSION['user_id'])) {
        echo "<p>Debes iniciar sesión para dejar un comentario.</p>";
        exit; // Salir si el usuario no está autenticado
    }

    // Obtener el ID del usuario desde la sesión
    $id_usuario = $_SESSION['user_id'];

    // Manejar el envío del comentario
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comentario'])) {
        // Obtener el comentario y sanitizarlo
        $comentario = htmlspecialchars($_POST['comentario']);

        // Consulta SQL para insertar el comentario en la base de datos
        $insert_query = "INSERT INTO comentarios (id_articulo, id_usuario, fecha, comentario) VALUES (?, ?, NOW(), ?)";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param("iis", $id_articulo, $id_usuario, $comentario);

        // Ejecutar la consulta y verificar si se guardó correctamente
        if ($insert_stmt->execute()) {
            echo "<p>Comentario enviado exitosamente.</p>";
        } else {
            echo "<p>Error al enviar el comentario: " . $insert_stmt->error . "</p>";
        }
        $insert_stmt->close();
    }

    // Mostrar el formulario para el comentario
    ?>
    <form method="POST">
        <textarea name="comentario" required placeholder="Escribe tu comentario aquí..."></textarea>
        <button type="submit">Enviar Comentario</button>
    </form>

    <h3>Comentarios</h3>
    <?php
    // Recuperar y mostrar los comentarios
    $comentarios_query = "SELECT c.comentario, c.fecha, u.nombre FROM comentarios c JOIN usuarios u ON c.id_usuario = u.id_usuario WHERE c.id_articulo = ?";
    $comentarios_stmt = $conn->prepare($comentarios_query);
    $comentarios_stmt->bind_param("i", $id_articulo);
    $comentarios_stmt->execute();
    $comentarios_result = $comentarios_stmt->get_result();

    // Verificar si hay comentarios y mostrarlos
    if ($comentarios_result && $comentarios_result->num_rows > 0) {
        while ($comentario = $comentarios_result->fetch_assoc()) {
            echo "<div class='comentario'>";
            echo "<p><strong>" . htmlspecialchars($comentario['nombre']) . "</strong> <em>(" . htmlspecialchars($comentario['fecha']) . ")</em></p>";
            echo "<p>" . nl2br(htmlspecialchars($comentario['comentario'])) . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No hay comentarios aún.</p>";
    }

    $comentarios_stmt->close();
} else {
    echo "<p>ID de artículo no proporcionado.</p>";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
