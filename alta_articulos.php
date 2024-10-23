<?php
include_once "conexion.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $extracto = $_POST['resumen'];
    $fecha_alta = $_POST['fecha'];
    $contenido = $_POST['contenido'];
    $categoria = $_POST['categoria'];
    $imagen = $_FILES['foto'];
    $ruta_imagen = 'imagenes/' . basename( $imagen['name']);


    if (move_uploaded_file($imagen['tmp_name'], $ruta_imagen)) {

        $consulta = "INSERT INTO articulos (titulo, extracto, fecha, contenido, imagen, categoria) VALUES ('$titulo', '$extracto', '$fecha_alta', '$contenido', '$ruta_imagen', '$categoria')";

          if (mysqli_query($conn, $consulta)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error al subir la imagen.";
    }
}
?>