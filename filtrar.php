<?php
include("navbar.php");
include 'conexion.php';
$elegido = isset($_GET['categoria']) ? $_GET['categoria'] : null;

if ($elegido !== null) {
    $query = "SELECT * FROM articulos WHERE articulos.categoria = '$elegido'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        echo "<main>";

        while ($articulo = $result->fetch_assoc()) {
            echo "<article>";
            echo "<table>";
            echo "<tr>";
            echo "<th>";
            echo "    <img id='img' src='" . htmlspecialchars($articulo['imagen']) . "' alt='" . htmlspecialchars($articulo['titulo']) . "'>";
            echo "</th>";
            echo "<th>";
            echo "    <h2 >" . htmlspecialchars($articulo['titulo']) . "</h2>";
            echo "    <p><strong>Fecha:</strong> " . htmlspecialchars($articulo['fecha']) . "</p>";
            echo "    <p><strong>Categoría:</strong> " . htmlspecialchars($articulo['categoria']) . "</p>";
            echo "    <p>" . htmlspecialchars($articulo['extracto']) . "</p>";
            echo "</th>";
            echo "</tr>";
            echo "</table>";
            echo "    <a id='uno'href='articulo.php?id=" . intval($articulo['id_articulos']) . "'>Leer más</a>";
            echo "</article>";
        }

        echo "</main>";
    } else {
        echo "<p>No se encontraron articulos.</p>";
        echo "<a href='index.php' style='display: inline-block; margin-top: 20px; padding: 10px 15px; background-color: red; color: white; text-decoration: none; border-radius: 5px;'>Volver</a>";
    }
} else {
    echo "<p>Parametro de categoria no valido.</p>";
}

$conn->close();
?>

</body>

</html>