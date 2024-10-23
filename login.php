<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "navbar.php";
include 'conexion.php';

if (!isset($_POST['usuario']) || !isset($_POST['password'])) {
    die('Datos del formulario no recibidos.');
}

$usuario = $_POST['usuario'];
$pass = $_POST['password'];

echo $pass;
echo "Usuario recibido: " . htmlspecialchars($usuario) . "<br>";

$stmt = $conn->prepare("SELECT id_usuario, password, nombre FROM usuarios WHERE usuario = ?");
if (!$stmt) {
    die('Error en la preparación de la consulta: ' . $conn->error);
}

$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($pass, $user['password'])) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $usuario;
        $_SESSION['nombre'] = $user['nombre'];
        header('Location: index.php');
        exit();
    } else {
        echo 'Contraseña incorrecta.';
    }
} else {
    echo 'Usuario no encontrado.';
}

$stmt->close();
$conn->close();
?>