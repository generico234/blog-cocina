<?php
include_once "conexion.php";
session_start();

$usuario = $_POST['usuario'];
$pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$avatar = "avatar.jpg";
$status = "1";
$fecha_alta = date("c");

$consulta = "INSERT INTO usuarios VALUES('" . "" . "','" . $usuario . "','" . $pass . "','" . $nombre . "','" . $apellido . "','" . $email . "','" . $status . "','" . $avatar . "','" . $fecha_alta . "')";
$conn->query($consulta);
header("Location: iniciar_sesion.php");
?>