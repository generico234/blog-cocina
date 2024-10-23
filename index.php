<?php
include("navbar.php");
?>
<?php

include 'conexion.php';


$query = "SELECT * FROM articulos   ";
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
        echo "    <a href='articulo.php?id=" . intval($articulo['id_articulos']) . "'>Leer más</a>";      
        echo "</th>";
        echo "</tr>";
        echo "</table>";

        echo "</article>";
    }

    echo "</main>";
} else {
    echo "<p>No se encontraron artículos.</p>";
}


$conn->close();
?>

</body>

</html>